<?php
class Menus {
	
	var $db;
	var $level;
	
	var $menus;
	var $submenus;
	
	function __construct($db,$level) {
		$this->db 		= $db;
		$this->level 	= $level;
		$this->menus 	= $this->fetch_Menus();		
	}
	
	private function fetch_Menus() {
		$query = "SELECT * FROM " . DB_SYS_MENUS . " WHERE sub_id = '0' AND level <= '".$this->level."'";
		
		return $this->db->query($query);		
	}
	
	private function fetch_SubMenus($menu_id) {
		$query = "SELECT * FROM " . DB_SYS_MENUS . " WHERE sub_id = '".$menu_id."' AND level <= '".$this->level."'";
		
		return $this->db->query($query);
	}
	
	function menuIdByName($name,$subForMenu=null){
		if ($subForMenu != null) { $s = " AND sub_id = (SELECT id FROM " . DB_SYS_MENUS . " WHERE name = '".$subForMenu."')"; }
		else { $s = ""; }
		
		//$query = "SELECT id FROM " . DB_TABLE_MENUS . " WHERE name = '".$name."'".$s;
		$query = "SELECT id FROM " . DB_SYS_MENUS . " WHERE name = '".$name."'".$s;
		
		$res = $this->db->query($query);		
		
		print $this->db->error();
		if ($res != null) { $res = $res[0]['id']; }
		
		return $res;
	}
	
	function menu() {
		return $this->menus;
	}

	function submenu($menu_id) {
		return $this->fetch_SubMenus($menu_id);
	}
	
	
}
?>