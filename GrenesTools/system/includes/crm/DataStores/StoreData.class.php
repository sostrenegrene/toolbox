<?php
class StoreData {
	
	var $store;//array
	
	var $franchiser_obj;//Obj
	var $pos_obj;//Obj
	
	var $messages;
	
	function __construct($store=array()) {
		$this->store = $store;
		$this->franchiser_obj = null;
		$this->pos_obj = null;
		
		$this->messages = new MessageFactory();		
		
		if (!empty($store)) { $title = $store['store_id']."-".$store['name']; }
		else { $title = null; }
		
		$this->messages->title($title);
		$this->messages->type("offline");
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
	
	function messages() {
		
		if ($this->pos()->messages(true)->has_Message()) {
			$this->messages->add_List( $this->pos()->messages() );
			
			return $this->messages;
		}
		else {
			return null;
		}
	}
	
}
?>