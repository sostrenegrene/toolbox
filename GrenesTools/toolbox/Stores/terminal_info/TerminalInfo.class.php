<?php

class TerminalInfo {
	
	var $db;
	var $loadID;
	var $update_fields;
	
	function __construct($db,$loadID=null) {
		$this->db = $db;
		$this->loadID = $loadID;
		$this->update_fields = array();
	}
	
	/** Returns DB ID on newly created entry
	 * 
	 * @param int $store_id
	 * @param int $pos
	 */
	private function getID($store_id,$pos) {
		$query = "SELECT id FROM tech_terminals WHERE store_id = '".$store_id."' AND pos = '".$pos."' LIMIT 1";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]['id']; }
		
		//print $query;
		//print $this->db->error();
		
		return $res;
	}
	
	function has_TermID($term_id) {
		$query = "SELECT terminal_id FROM tech_terminals WHERE terminal_id LIKE '".$term_id."%' LIMIT 1";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]['terminal_id']; }
		
		return $res;
	}
	
	function create($store_id=null,$pos=null) {
		
		if (($store_id != null) && ($pos != null)) {
			$query = "INSERT INTO tech_terminals (store_id,pos) VALUES ('".$store_id."','".$pos."')";
			$this->db->query($query);
			print $query;
			print $this->db->error();			
		}		
		
		return $this->getID($store_id, $pos);
	}
	
	function delete() {
		$query = "DELETE FROM tech_terminals WHERE id = '".$this->loadID."'";
		$this->db->query($query);
	}
	
	/** Add a value for update
	 * 
	 * @param int $id
	 * @param mixed $field
	 * @param mixed $value
	 */
	function update_add($field,$value) {
		
		if ($value != null) {
			$a['id'] = $this->loadID;
			$a['field'] = $field;
			$a['value'] = $value;			
			$this->update_fields[] = $a;
		}
		
	}
	
	function update() {
		//Query build string
		$q = "";
		//Db ID(just grab the first row)
		$id = $this->update_fields[0]['id'];
		
		//Build value string for query
		foreach($this->update_fields as $i=>$field) {
			if ($i>0) { $q .= ","; }//Add , after each field/value insert (except the last one)
				$q .= $field['field']." = '".$field['value']."'";		
		}
		
		$query = "UPDATE tech_terminals SET " . $q . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		
		print $this->db->error();		
	}
	
	private function blank() {
		//Make sure array can be returned with empty fields
		$a["id"] = "";
		$a["amount"] = "";
		$a["store_id"] = "";
		$a["store"] = "";
		$a["address"] = "";
		$a["city"] = "";
		$a["zipcode"] = "";
		$a["bax"] = "";
		$a["tof"] = "";
		$a["organization_number"] = "";
		$a["terminal_id"] = "";
		$a["pos"] = "";
		$a["terminal_model"] = "";
		$a["franchiser"] = "";
		
		return $a;
	}
	
	function fetch($id) {
		$query = "SELECT * FROM tech_terminals WHERE id = '".$id."' LIMIT 1";
		$this->db->query($query);
		$res = $this->db->get_rows();
		//print_r($res);
		print $this->db->error();
		
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->blank(); }
		
		return $res;
	}
	
	function load() {	
		return $this->fetch($this->loadID);
	}
	
	function loadAll() {		
		$query = "SELECT * FROM tech_terminals WHERE 1";
		$this->db->query($query);
		$res = $this->db->get_rows();
		//print_r($res);
		print $this->db->error();
	
		if ($res == null) { $res = $this->blank(); }		
	
		return $res;
	}
	
}//ENd class

?>