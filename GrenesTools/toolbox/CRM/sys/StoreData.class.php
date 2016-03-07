<?php
class StoreData {
	
	var $franchiser;
	
	var $store;
	
	var $pos;
	
	function __construct($franchiser,$store,$pos) {
		$this->franchiser 	= $franchiser;
		$this->store 		= $store;
		$this->pos 			= $pos;		
	}
	
	function franchiser($val) {
		return $this->franchiser[$val];
	}
	
	function store($val) {
		return $this->store[$val];
	}
	
	function pos($num,$val) {
		return $this->pos[$num][$val];
	}
	
	function pos_Count() {
		return count($this->pos);
	}
	
}
?>