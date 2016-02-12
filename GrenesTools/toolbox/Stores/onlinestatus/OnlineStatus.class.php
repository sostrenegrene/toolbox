<?php

class OnlineStatus {
	
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	function set_Status($store_id,$pos_id) {
		if ( ($store_id != null) && ($pos_id != null) ) {
			
			$id = $this->exist($store_id, $pos_id);
			if ($id != null) {
				$this->update($id);
			}
			
		}
	}
	
	private function update($id) {
		$query = "UPDATE " . DB_TABLE_STORES . " SET pos_online = NOW() WHERE id = '".$id."'";
		$this->db->query($query);
		
		//print $query;
	}
	
	private function exist($store_id,$pos_id) {
		$query = "SELECT id FROM ". DB_TABLE_STORES . " WHERE store_id = '".$store_id."' AND pos = '".$pos_id."' LIMIT 1";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		//print $query;
		
		if ($res != null) { return $res[0]['id']; }
		else { return null; }
	}
	
}

?>