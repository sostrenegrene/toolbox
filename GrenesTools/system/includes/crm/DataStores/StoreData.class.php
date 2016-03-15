<?php
class StoreData {
	
	var $store;//array
	
	var $franchiser_obj;//Obj
	var $pos_obj;//Obj
	
	function __construct($store=array()) {
		$this->store = $store;
		$this->franchiser_obj = null;
		$this->pos_obj = null;
	}
	
	function add_Franchiser($franchiser) {
		$this->franchiser_obj = $franchiser;
	}
	
	function add_POS($poslist) {
		$this->pos_obj = $poslist;
	}
	
	function franchiser() {
		return $this->franchiser_obj;
	}
	
	function pos() {
		return $this->pos_obj;
	}
	
	function get($val) {
		if (isset($this->store[$val])) { return $this->store[$val]; }
		else { return null; }
	}
	
}
?>