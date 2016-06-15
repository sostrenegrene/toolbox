<?php
class POSData {
	
	var $poslist;
	var $store_id;
	
	function __construct($poslist=array(),$store_id=0) {
		$this->store_id = $store_id;
			
		$this->poslist = $poslist;
	}
	
	function print_r() {
		print "<pre>";
		print_r($this->poslist);
		print "</pre>";
	}
	
	function get($i,$val) {
		if (isset($this->poslist[$i][$val])) { return $this->poslist[$i][$val]; }
		else { return null; }
	}
	
	function count() {
		return count($this->poslist);
	}
	
	function status($type) {
		
		if (!empty($this->poslist['total'][$type])) {
			return $this->poslist['total'][$type];
		}
		else {
			return 0;
		}
	}
	
}
?>