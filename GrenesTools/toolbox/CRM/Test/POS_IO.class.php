<?php
class POS_io {
	
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	public function get($value) {
		if (!empty($this->pos_data[$value])) {
			return $this->pos_data[$value];
		}
		else {
			return null;
		}
	}
	
}
?>