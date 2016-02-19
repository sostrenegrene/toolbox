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
		$query = "SELECT * FROM " . DB_TABLE_MENUS . " WHERE sub_id = '0' AND level >= '".$this->level."'";
		$this->db->query($query);
		
		return $this->db->get_rows();
	}
	
	private function fetch_SubMenus($menu_id) {
		$query = "SELECT * FROM " . DB_TABLE_MENUS . " WHERE sub_id = '".$menu_id."'";
		$this->db->query($query);
		return $this->db->get_rows();
	}
	
	function menuIdByName($name,$subForMemnu=null){
		if ($subForMemnu != null) { $s = " AND sub_id = (SELECT id FROM " . DB_TABLE_MENUS . " WHERE name = '".$sub_id."')"; }
		else { $s = ""; }
		
		//$query = "SELECT id FROM " . DB_TABLE_MENUS . " WHERE name = '".$name."'".$s;
		$query = "SELECT id FROM " . DB_TABLE_MENUS . " WHERE name = '".$name."'".$s;
		$this->db->query($query);
		$res = $this->db->get_rows();		
		
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