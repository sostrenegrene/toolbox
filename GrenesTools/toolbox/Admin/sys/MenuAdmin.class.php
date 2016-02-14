<?php

class MenuAdmin {

	var $db;
	var $sys_menu;
	
	function __construct($db,$sys_menu) {
		$this->db = $db;
		$this->sys_menu = $sys_menu;
	}
	
	function make_Menu($sub_id,$name,$level) {
		$query = "INSERT INTO " . DB_TABLE_MENUS . " (sub_id,name,level) VALUES ('".$sub_id."','".$name."','".$level."')";
		$this->db->query($query);
	
		print $this->db->error();
	}
	
	function update_Menu($id,$name,$level) {
		$query = "UPDATE " . DB_TABLE_MENUS . " name = '".$name."', level = '".$level."' WHERE id = '".$id."'";
		$this->db->query($query);
	
		print $this->db->error();
	}
	
	function delete($id) {
		$query = "DELETE FROM " . DB_TABLE_MENUS . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	function make_SelectOptStr() {
		$out['main_menu'] = "";
		$out['sub_menu'] = "";
		
		foreach($this->sys_menu->menu() as $mitem) {
			//Get submenu items to make select <option>'s
			$sitems = $this->sys_menu->submenu($mitem['id']);
			$out['main_menu'] .= "<option value=\"".$mitem['id']."\">".$mitem['name']."</option>\n";
			//Make main menu select <option>'s
			if ($sitems != null) {
				foreach($sitems as $sitem) { $out['sub_menu'] .= "<option value=\"".$sitem['id']."\">".$mitem['name']."/".$sitem['name']."</option>\n"; }
			}
		}
		
		return $out;
	}
	
}

?>