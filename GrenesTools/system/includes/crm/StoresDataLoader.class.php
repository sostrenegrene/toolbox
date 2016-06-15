<?php
require_once 'Countries.class.php';
require_once 'Franchisers.class.php';
require_once 'Stores.class.php';
require_once 'POS.class.php';
require_once 'POSStatus.class.php';
require_once 'DataStores/StoreData.class.php';
require_once 'DataStores/FranchiserData.class.php';
require_once 'DataStores/POSData.class.php';

class StoresDataLoader {	
		
	var $db;
	
	var $input;
	
	var $franchisers;
	var $stores;
	var $pos;
	var $countries;
	
	function __construct($db) {
		$this->db = $db;
		
		$this->input = $db->input_factory();
		
		$this->franchisers 	= new Franchisers($db);
		$this->stores 		= new Stores($db);
		$this->pos 			= new POS($db);
		$this->countries 	= new Countries($db);
	}
	
	function country_Select($id=null) {
		
		$res = $this->countries->get_CountrySelectOptions($id);		
		$res = "<select name=\"country_id\">".$res."</select>";
		
		return $res;
	}
	
	function franchiser_Select($id=null) {
		
		$res = $this->franchisers->get_SelectOptions($id);
		$res = "<select name=\"franchiser_id\">" . $res . "</select>";
		
		return $res;
	}	
	
	function get($search=null,$value=null,$exact=false) {
		
		
		if ( $search != null) {
			$this->stores->search($search,$value,$exact);
		 	$res = $this->stores->get(); 
		}
		else { $res = null; }
	
		
		if ($res != null) {
			foreach($res as $item) {
				$store = new StoreData($item);
				
				$this->franchisers->search("id", $store->get('franchiser_id'),true );
				$this->pos->search("store_id", $store->get('id'),true );
				
				$f = $this->franchisers->get();
				$fobj = new FranchiserData( $f[0] );
				$pobj = new POSData( $this->pos->get(),$store->get("store_id") );
				
				$store->add_Franchiser($fobj);
				$store->add_POS($pobj);
					
				$out[] = $store;
			}
		}
		else {
			//Setup empty store
			$s = new StoreData();
			$s->add_Franchiser( new FranchiserData() );
			$s->add_POS( new POSData() );
			
			$out[] = $s;
		}
		
		
		return $out;
	}
	
	function get_Franchiser($search=null,$value=null,$exact=false) {
		$this->franchisers->search($search, $value,$exact );		
		
		$f = $this->franchisers->get();
		
		$out = array();
		if ($f != null) {
			foreach($f as $item) {
				$out[] = new FranchiserData($item);				
			}
		}
		
		return $out;
	}
	
	function franchiser($id) {		
		
		$this->franchisers->set_FranchiserID($id);		
		$s = new StoreData($this->franchisers->get_One(),array(),array());
		
		$this->franchisers->reset();
		
		return $s;
	}
	
	function get_All() {
		$out = array();
		
		foreach($this->stores->get() as $store) {					
				$this->pos->search("store_id", $store['id'], true);
				$this->franchisers->search("id", $store['franchiser_id'], true);
				
				$s = new StoreData($this->franchisers->get(),$store,$this->pos->get());
					
				$out[] = $s;
				
				//Reset values for safty
				$this->franchisers->reset();
				$this->pos->reset();
		}
		
		
		return $out;
	}
	
	
	/************ INPUT **********/
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
}
?>