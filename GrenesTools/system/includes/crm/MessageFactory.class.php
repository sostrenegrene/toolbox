<?php
class MessageFactory {
	
	var $title;	
	var $type;
	var $messages;
	
	var $factories;
	
	function __construct() {
		$this->title 		= null;
		$this->type 		= null;
		$this->messages 	= array();
		$this->factories 	= array();
	}
	
	function title($title=null) {
		if ($title != null) { $this->title = $title; }
		
		return $this->title;
	}
	
	function type($type=null) {
		if ($type != null) { $this->type = $type; }
		
		return $this->type;
	}
	
	function add($message) {
		if ($message != null) { $this->messages[] = $message; }
	}
	
	function add_List($list) {
		if ($list != null) { $this->messages = $list; }
	}
	
	function add_Factory($factory) {
		if ($factory != null) { $this->factories[] = $factory; }
	}
	
	function messages() {
		return $this->messages;
	}
	
	function factories() {
		return $this->factories;
	}
	
	function has_Message() {
		return ( count($this->messages) > 0);
	}
	
	function has_Factory() {
		return ( count($this->factories) > 0);
	}
}
?>