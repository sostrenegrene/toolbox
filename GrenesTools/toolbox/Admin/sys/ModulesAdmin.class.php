<?php

class ModulesAdmin {
	
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	function make_Module($menu_id,$package,$module,$index) {
		
		$query = "INSERT INTO " . DB_TABLE_MODULES . " 
				(menu_id,package_folder,module_name,module_folder,module_index) 
				VALUES
				('".$menu_id."','".$package."','".$module."','".$module."','".$index."')";
		
		$this->db->query($query);
		
		print $this->db->error();
		
	}
	
	function delete_Module($id) {
		$query = "DELETE FROM " . DB_TABLE_MODULES . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error();
	}
	
}

?>