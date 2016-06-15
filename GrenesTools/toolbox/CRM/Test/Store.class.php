<?php
class Store_d {
	
	var $store_data;
	var $poslist;
	
	function __construct($store) {
		$this->store_data = $store;
		$this->poslist = array();
	}
	
	public function add_pos($pos) {
		$this->poslist[] = $pos;
	}
	
	public function get($value) {
		if (!empty($this->store_data[$value])) {
			return $this->store_data[$value];
		}
		else {
			return null;
		}
	}
	
}
?>