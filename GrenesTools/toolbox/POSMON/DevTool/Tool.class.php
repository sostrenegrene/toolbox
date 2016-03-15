<?php
class Tool {
	
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	function update_POSTime($store_id,$pos_num) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET pos_online = GETDATE() WHERE store_id = (SELECT TOP 1 id FROM ".TABLE_GRENES_STORES." WHERE store_id = '".$store_id."') AND pos_num = '".$pos_num."'";
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	function update_StoreTime($store_id) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET pos_online = GETDATE() WHERE store_id = (SELECT TOP 1 id FROM ".TABLE_GRENES_STORES." WHERE store_id = '".$store_id."')";
		$this->db->query($query);
		
		print $query;
		
		print $this->db->error();
	}
	
}
?>