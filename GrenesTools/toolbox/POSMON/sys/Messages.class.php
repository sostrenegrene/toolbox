<?php
class Messages {
	var $db;
	
	var $streamer;
	
	function __construct($db=null) {
		$this->db = $db;
		$this->streamer = array();
	}
	
	
	function add($message) {
		$this->streamer[] = $message;
	}
	
	function hasMessages() {
		return ( count($this->streamer) > 0 );
	}
	
	function get() {
		return $this->streamer;
	}
	
	function check_POS($pos) {
		
	}
	
}
?>