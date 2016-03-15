<?php
class Settings {
	
	var $db;
	var $input;
	
	var $settings;
	
	
	function __construct($db) {
		$this->db = $db;		
		$this->load();
	}
	
	private function reset() {
		$this->input = $this->db->input_factory();
	}
	
	private function fetch_All() {
		$query = "SELECT * FROM " . DB_TABLE_SETTINGS . " ORDER BY group_name";
		$res = $this->db->query($query);
		
		print $this->db->error();
		
		return $res;
	}
	
	private function fetch_Group($group) {
		$query = "SELECT * FROM " . DB_TABLE_SETTINGS . " WHERE group_name = '".$group."' ORDER BY group_name";
		$res = $this->db->query($query);
	
		print $this->db->error();
	
		return $res;
	}
	
	private function build($s) {
		
		$a = array();
		if ($s != null) {
			foreach($s as $item) {		
				
				if ($item['group_name'] != null) { $gn = $item['group_name']; }
				else { $gn = "sys_nogroup"; }
				
				$a[$gn]['name'] = $item['name'];
				$a[$gn][$item['name']] = $item['value'];
			}
		}
		
		return $a;
	}
	
	private function save() {
		
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		$this->db->query( $qf->insert( DB_TABLE_SETTINGS ) );
		
		print $this->db->error();
		
		$this->reset();
	}
	
	private function update($id) {
	
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		$this->db->query( $qf->update( DB_TABLE_SETTINGS,"id = '".$id."'" ) );
	
		print $this->db->error();
		
		$this->reset();
	}
	
	function load() {
		$this->settings = $this->build( $this->fetch_All() );
		
		$this->reset();
	}
	
	function insert($name,$value,$group=null,$id=null) {
		$this->input->add("group_name",$group);
		$this->input->add("name",$name);
		$this->input->add("value",$value);
		
		if ($id != null) { $this->update($id); }
		else { $this->save(); }
	}
	
	function delete($id) {
		$query = "DELETE FROM " . DB_TABLE_SETTINGS . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	function get($name,$group="sys_nogroup") {
		if (!empty($this->settings[$group][$name])) {
			return $this->settings[$group][$name];
		}
		else {
			return null;
		}
	}
	
	function group($group="sys_nogroup") {
		if (!empty($this->settings[$group])) {
			return $this->settings[$group];
		}
		else {
			return null;
		}
	}
	
	function group_to_array($group=null) {
		return $this->fetch_Group($group);
	}
	
	function get_All() {
		return $this->fetch_ALL();
	}
}
?>