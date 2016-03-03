<?php

class ModulesAdmin {
	
	var $db;
	
	var $input;
	
	function __construct($db) {
		$this->db = $db;
		
		$this->input = $db->input_factory();
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	function make_Module() {
		//Before building query, handle that module_name might not have a value
		$moduleItem = $this->input->get("module_folder");
		$nameItem = $this->input->get("module_name");
		//Add 
		if ( ($nameItem == null) || ( ($nameItem != null) && ($nameItem['value'] == "") ) ) { 
			//Avoid extra if statement. Just delete empty value if it exist and recreate
			$this->input->remove("module_name");
			$this->input->add("module_name",$moduleItem['name']); 
		}
		
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		
		$query = $qf->insert( DB_TABLE_MODULES );
		
		/*
		$query_ = "INSERT INTO " . DB_TABLE_MODULES . " 
				(menu_id,package_folder,module_name,module_folder,module_index) 
				VALUES
				('".$menu_id."','".$package."','".$n."','".$module."','".$index."')";
		*/
		
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