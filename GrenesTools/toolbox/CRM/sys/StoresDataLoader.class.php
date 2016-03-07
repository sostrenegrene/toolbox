<?php
require_once 'Countries.class.php';
require_once 'Franchisers.class.php';
require_once 'Stores_Out.class.php';
require_once 'POS_Out.class.php';
require_once 'StoreData.class.php';

class StoresDataLoader {	
		
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	function search($type,$search) {
		$stores = new Stores($this->db);
		
		$res = $stores->get_Search($type,$search);
		
		if ($res != null) {
			foreach($res as $store) {
				$f = new Franchisers($this->db,$store['franchiser_id']);
				$p = new POS($this->db,null,$store['id']);
					
				$s = new StoreData($f->get_One(),$store,$p->get_All());
					
				$out[] = $s;
			}
		}
		else {
			$out = null;
		}
		
		
		return $out;
	}
	
	function get_All() {
		$stores = new Stores($this->db);
		$out = array();
		
		foreach($stores->get_All() as $store) {
			$f = new Franchisers($this->db,$store['franchiser_id']);
			$p = new POS($this->db,$store['id']);
			
			$s = new StoreData($f->get_One(),$store,$p->get_All());
			
			$out[] = $s;
		}
		
		
		return $out;
	}
	
}
?>