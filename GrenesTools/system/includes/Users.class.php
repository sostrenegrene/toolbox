<?php
class Users {
	
	var $db;
	var $getset;
	var $token;
	var $access;
	
	function __construct($db,$getset) {
		$this->db = $db;
		$this->getset = $getset;
		$this->token = $getset->header("sys_token");
		
		$this->logout();
		$this->access = $this->is_User($getset->header("sys_username"),$getset->header("sys_password"));
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
		
		$this->getset->setSession("sys_token",$token);
	}
	
	private function logout() {
		if ($this->getset->header(FORM_ACTION) == FORM_ACTION_LOGOUT) {
			$this->getset->setSession("sys_token",null);
		}
	}
	
	function make_User($username,$password,$level) {
		$query = "INSERT INTO " . DB_TABLE_USERS ." (username,password,access_level) VALUES ('".$username."','".$password."','".$level."')";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	function delete_User($id) {
		
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
		if ($this->level() >= $min_level) { 
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