<?php
class FranchiserData {
	
	var $franchiser;
	
	function __construct($franchiser=array()) {
		$this->franchiser = $franchiser;
	}
	
	function get($val) {
		if (isset($this->franchiser[$val])) { return $this->franchiser[$val]; }
		else { return null; }
	}
	
}
?>