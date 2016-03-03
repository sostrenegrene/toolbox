<?php

class MenuAdmin {

	var $db;
	var $sys_menu;
	
	var $input;
	
	function __construct($db,$sys_menu) {
		$this->db = $db;
		$this->sys_menu = $sys_menu;
		
		$this->input = $db->input_factory();
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	function make_Menu() {
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		
		$query = $qf->insert( DB_TABLE_MENUS );
		$this->db->query($query);
	
		print $this->db->error();
	}
	
	function update_Menu($id) {
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		$where = "id = '".$id."'";
		$query = $qf->update( DB_TABLE_MENUS,$where );
		
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
		
		$out['main_menu'] .= "<option value=\"0\">Unassigned</option>\n";
		
		return $out;
	}
	
}

?>