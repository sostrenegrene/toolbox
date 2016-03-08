<?php
class StoreData {
	
	var $franchiser;
	
	var $store;
	
	var $pos;
	
	function __construct($franchiser=array(),$store=array(),$pos=array()) {
		$this->franchiser 	= $franchiser;
		$this->store 		= $store;
		$this->pos 			= $pos;		
	}
	
	function set_Franchiser($franchiser) {
		$this->franchiser = $franchiser;
	}
	
	function set_Store($store) {
		$this->store = $store;
	}
	
	function set_POS($pos) {
		$this->pos = $pos;
	}
	
	function franchiser($val) {
		return $this->franchiser[$val];
	}
	
	function store($val) {
		if (isset($this->store[$val])) { return $this->store[$val]; }
		else { return null; }
	}
	
	function pos($num,$val) {
		if (isset($this->pos[$num][$val])) { return $this->pos[$num][$val]; }
		else { return null; }
	}
	
	function pos_Count() {
		return count($this->pos);
	}
	
}
?>