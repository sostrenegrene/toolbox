<?php

class Modules {
	
	var $db;
	var $menu_id;
	
	var $modules;
	
	function __construct($db,$menu_id) {
		$this->db 		= $db;
		$this->menu_id 	= $menu_id;
		
		$this->fetch_Modules();
	}
	
	private function fetch_Modules() {
		$query = "SELECT * FROM " . DB_SYS_MODULES . " WHERE menu_id = '".$this->menu_id."'";
		$this->db->query($query);
		
		$this->modules = $this->db->get_rows();
	}
	
	function get_FromId($id) {
		$query = "SELECT * FROM " . DB_SYS_MODULES . " WHERE id = '".$id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error();
		
		if ($res != null) { $res = $res[0]; }
		
		return $res;
	}
	
	function get_Unassigned($name) {
		$query = "SELECT * FROM " . DB_SYS_MODULES . " WHERE module_name = '".$name."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error();
		
		if ($res != null) { $res = $res[0]; }
		
		return $res;
	}
	
	function modules() {
		return $this->modules;
	}
	
}

?>