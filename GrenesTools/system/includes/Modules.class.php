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
		$query = "SELECT * FROM " . DB_TABLE_MODULES . " WHERE menu_id = '".$this->menu_id."'";
		$this->db->query($query);
		
		$this->modules = $this->db->get_rows();
	}
	
	function modules() {
		return $this->modules;
	}
	
}

?>