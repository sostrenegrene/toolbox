<?php
class POS_API {
	
	var $db;
	var $getset;
	
	var $store_id;
	var $pos_num;
	
	function __construct($db,$getset) {
		$this->db = $db;
		$this->getset = $getset;
		
		$this->update();		
	}
	
	/* Test is correct data is sent and update online status if true
	 * 
	 */
	private function update() {
		if ($this->is_Valid()) {
			$this->update_OnlineState();
		}
	}
	
	/** Get header values for store_id & pos_num
	 * Test if values are sent
	 * @return bool
	 */
	private function is_Valid() {
		$this->store_id = $this->getset->header("store_id"); 
		$this->pos_num 	= $this->getset->header("pos_id");
			
		if ( ($this->store_id != null) && ($this->pos_num != null) ) {
			return true;
		}
		else {
			return false;
		}
	}
	
	/** Update online status for pos_num in store_id
	 * 
	 */
	private function update_OnlineState() {
		
		$query = "UPDATE " . DB_GRENES_POS . " SET pos_online = GETDATE() WHERE store_id = (SELECT id FROM ".DB_GRENES_STORES." WHERE store_id = '".$this->store_id."') AND pos_num = '".$this->pos_num."'";
		$this->db->query($query);
		//print $query;
		//print $this->db->error( __FUNCTION__ );
		
	}
	
	
}
?>