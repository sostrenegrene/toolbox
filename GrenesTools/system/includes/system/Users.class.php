<?php
class Users {
	
	var $db;
	var $getset;
	var $access_levels;
	var $token;
	var $access;
	
	function __construct($db,$getset,$access_levels) {
		$this->db = $db;
		$this->getset = $getset;
		$this->token = $getset->header( SYS_HEADER_LOGIN_TOKEN );
		$this->access_levels = $access_levels;
		$this->logout();
		$this->access = $this->is_User($getset->header( SYS_HEADER_LOGIN_USERNAME ),$getset->header( SYS_HEADER_LOGIN_PASSWORD ));
		//print_r($this->access);
	}
	
	private function is_User($username,$password) {
		$query = "SELECT id,username,access_level,token FROM " . DB_TABLE_USERS . " WHERE username = '".$username."' AND password = '".$password."' OR token = '".$this->token."'";
		$res = $this->db->query($query);
		
		if ($res != null) { 
			$res = $res[0];
			
			//Only create or update token if it's not set
			if (($res['token'] == null) || ($res['token'] != $this->token)) {
				$res['token'] = md5( $res['username'].$res['access_level'] );
				$this->set_Token($res['id'],$res['token']);
			}
		}
		else {
			$res['token'] = "";
			$res['username'] = "";
			$res['access_level'] = 0;
		}
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	private function set_Token($id,$token) {
		$query = "UPDATE " . DB_TABLE_USERS . " SET token = '".$token."' WHERE id = '".$id."'";
		$this->db->query($query);
		
		$this->getset->setSession(SYS_HEADER_LOGIN_TOKEN,$token);
	}
	
	private function logout() {
		if ($this->getset->header(FORM_ACTION) == FORM_ACTION_LOGOUT) {
			$this->getset->setSession(SYS_HEADER_LOGIN_TOKEN,null);
		}
	}
	
	private function get_Level($level_name) {
		if (!empty($this->access_levels[$level_name])) { $out = $this->access_levels[$level_name]; }
		else { $out = 0; }
		
		return $out;
	}
	
	private function make_User($input) {
		
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($input);
		$this->db->query($qf->insert(DB_TABLE_USERS));
		
		print $this->db->error(__FUNCTION__);
	}
	
	private function update_User($id,$input) {
		
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($input);
		$this->db->query($qf->update(DB_TABLE_USERS, "id = '".$id."'"));
	
		print $this->db->error(__FUNCTION__);
	}
	
	function create($username,$password,$level,$id=null) {
		$if = $this->db->input_factory();
		$if->add("username",$username);
		$if->add("password",$password);
		$if->add("access_level",$level);
		
		if ($id != null) { $this->update_User($id,$if); }
		else { $this->make_User($if); }
	}
	
	function delete_User($id) {
		$query = "DELETE FROM " . DB_TABLE_USERS . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	function get_All() {
		$query = "SELECT * FROM ".DB_TABLE_USERS;
		$res = $this->db->query($query);
		
		return $res;
	}
	
	function token() {
		if ($this->access != null) { return $this->access['token']; }
		else { return md5("iamnotarealtoken"); }
	}
	
	function level() {
		if ($this->access != null) { return $this->access['access_level']; }
		else { return 0; }
	}
	
	function hasAccess($min_level,$print_str=null) {
		if ($this->level() >= $this->get_Level($min_level)) { 
			if ($print_str != null) { print $print_str; }
			return true; 
		}
		else { return false; }
	}
	
	function username() {
		if ($this->access != null) { return $this->access['username']; }
		else { return ""; }
	}
	
	function id() {
		if ($this->access != null) { return $this->access['id']; }
		else { return 0; }
	}
	
}
?>