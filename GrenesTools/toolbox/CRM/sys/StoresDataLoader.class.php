<?php
require_once 'Countries.class.php';
require_once 'Franchisers.class.php';
require_once 'Stores_Out.class.php';
require_once 'POS_Out.class.php';
require_once 'StoreData.class.php';

class StoresDataLoader {	
		
	var $db;
	
	var $input;
	
	function __construct($db) {
		$this->db = $db;
		
		$this->input = $db->input_factory();
	}
	
	function country_Select($id=null) {
		$country = new Countries($this->db);
		
		$res = $country->get_CountrySelectOptions($id);		
		$res = "<select name=\"country_id\">".$res."</select>";
		
		return $res;
	}
	
	function franchiser_Select($id=null) {
		$franc = new Franchisers($this->db);
		$franc->set_FranchiserID($id);
		
		$res = $franc->get_SelectOptions();
		$res = "<select name=\"franchiser_id\">" . $res . "</select>";
		
		return $res;
	}
	
	
	
	function search_Store($type,$search,$exact=false) {
		$stores = new Stores($this->db);
		
		if ( ($type != null)) {
			if (!$exact) { $res = $stores->get_Search($type,$search); }
			else { $res = $stores->get_FromStoreID($search); }
		}
		else { $res = null; }
	
		
		if ($res != null) {
			foreach($res as $store) {
				$f = new Franchisers($this->db,$store['franchiser_id']);
				$p = new POS($this->db,null,$store['id']);
					
				$s = new StoreData($f->get_One(),$store,$p->get_All());
					
				$out[] = $s;
			}
		}
		else {
			$f = new Franchisers($this->db);
			//$p = new POS($this->db);
			$out[] = new StoreData($f->empty_Franchiser(),$stores->empty_Store(),array()) ;
		}
		
		
		return $out;
	}
	
	function search_Franchiser($search) {
		$franc = new Franchisers($this->db);	
	
		//Search franchisers
		$res = $franc->get_Search($search);
	
		if ($res != null) {
			//Get next franchiser
			foreach($res as $f) {
							
				//Load stores for franchiser
				$s = new Stores($this->db,0,$f['id']);
				$stores = $s->get_All();
				
				if ($stores != null) {
					//Get next store
					foreach($stores as $store) {
						//Load all POSs for store and save:
						//Franchiser, Store and POS list as store object
						$p = new POS($this->db,null,$store['id']);
						$pos = $p->get_All();
						
						$sData = new StoreData();
						$sData->set_Franchiser($f);
						$sData->set_Store($store);
						$sData->set_POS($pos);
						
						$out[] = $sData;
					}
				}
				else {
					$out[] = new StoreData($f);
				}				
				
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
	
	
	/************ INPUT **********/
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	function save_Store($id) {
		
		if ( ($id > 0) && ($id != null) ) {
			$this->update_Store($id);
		}
		else {
			$this->make_Store();
		}
	
	}
	
	/** Delete store
	 *
	 */
	function delete_Store($id) {
		$query = "DELETE FROM " . TABLE_GRENES_STORES . " WHERE id = '".$id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function delete_POS($id) {
		$query = "DELETE FROM " . TABLE_GRENES_POS . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	private function make_Store()
	{
	
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		$query = $qf->insert( TABLE_GRENES_STORES );
			
		//print $query;
		//Exec query
		$this->db->query($query);
	
		//Print errors if any
		print $this->db->error(__FUNCTION__);
	}
	
	private function update_Store($id)
	{
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		
		$where = "id = '".$id."'";
		$query = $qf->update( TABLE_GRENES_STORES,$where );
	
		print $query;
		
		//Exec query
		$this->db->query($query);
	
		//Print errors if any
		print $this->db->error(__FUNCTION__);
	}
	
	
	
	
	
	
}
?>