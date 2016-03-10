<?php
/** 
 * 
 * @author S�ren Pedersen
 *
 * Handles all in and outputting of stores data
 *
 */
class Stores {
	
	var $db;
	var $store_dbid;	
	var $franchiser_id;	
	var $input;
	
	/** Class constructor
	 * 
	 * @param handler $db
	 * @param number $store_dbid
	 * @param number $franchiser_id
	 */
	function __construct($db,$store_dbid=0,$franchiser_id=0) {
		$this->db = $db;
		$this->store_dbid = $store_dbid;
		$this->franchiser_id = $franchiser_id;
		$this->input = $db->input_factory();
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	/** Makes a new store entry in DB
	 * 
	 * @param int $franchiser_id
	 * @param int $store_id
	 * @param string $store_name
	 * @param string $address
	 * @param string $city
	 * @param int $zipcode
	 * @param string $store_email
	 * @param int $store_phone
	 * @param string $manager
	 * @param int $manager_phone
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 * @param int $cvr
	 * @param int $forret_num
	 * @param int $country_id
	 */
	private function make_Store() 
	{
	
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		$query = $qf->insert( TABLE_GRENES_STORES );
			
		
		//Exec query
		$this->db->query($query);
		
		//Print errors if any
		print $this->db->error(__FUNCTION__);
	}
	
	/** Updates a store entry in DB
	 * 
	 * @param int $franchiser_id
	 * @param int $store_id
	 * @param string $store_name
	 * @param string $address
	 * @param string $city
	 * @param int $zipcode
	 * @param string $store_email
	 * @param int $store_phone
	 * @param string $manager
	 * @param int $manager_phone
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 * @param int $cvr
	 * @param int $forret_num
	 * @param int $country_id
	 */
	private function update_Store() 
	{
		$qf = $this->db->query_factory();
		$qf->set_InputFactory($this->input);
		
		$where = "id = '".$this->store_dbid."'";
		$query = $qf->update( TABLE_GRENES_STORES,$where );	
		
		//Exec query
		$this->db->query($query);
		
		//Print errors if any
		print $this->db->error(__FUNCTION__);
	}
	
	/** Returns an empty store item
	 * 
	 * @return array
	 */
	private function empty_Store() {
		$a['id'] = "0";
		$a['country_id'] = "";
		$a['franchiser_id'] = "";
		$a['store_id'] = "";
		$a['name'] = "";
		$a['address'] = "";
		$a['city'] = "";
		$a['zipcode'] = "";
		$a['store_email'] = "";
		$a['store_phone'] = "";
		$a['manager'] = "";
		$a['manager_phone'] = "";
		$a['organization_number'] = "";
		$a['bax'] = "";
		$a['tof'] = "";
		$a['cvr'] = "";
		$a['forretnings_nummer'] = "";
		
		return $a;
	}
	
	function add_SearchOption($option,$value) {
		
		$a['option'] = $option;
		$a['value'] = $value;
		$this->search_array[] = $a; 
		
	}
	
	/** Save or update a store
	 *
	 * @param int $franchiser_id
	 * @param int $store_id
	 * @param string $store_name
	 * @param string $address
	 * @param string $city
	 * @param int $zipcode
	 * @param string $store_email
	 * @param int $store_phone
	 * @param string $manager
	 * @param int $manager_phone
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 * @param int $cvr
	 * @param int $forret_num
	 * @param int $country_id
	 */
	function save_Store() {
		
		if ($this->store_dbid != 0) {
			$this->update_Store();
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
	
	/** Returns all stores
	 *  If franchiser id is provided returns all stores for franchiser
	 *  Else returns all stores in db
	 * 
	 * @return array
	 */
	function get_All() {
		 
		if ($this->franchiser_id != 0) { 
			$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE franchiser_id = '".$this->franchiser_id."' ORDER BY country_id,store_id ASC"; 
		}
		else { $query = "SELECT * FROM ". TABLE_GRENES_STORES . " ORDER BY country_id,store_id ASC"; }
	
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	/** Returns a single store, either from method provided store id
	 * Else if null from store dbid
	 * 
	 * @param int $store_id
	 * @return array
	 */
	function get_One($store_id=null) {
		if ($store_id != null) {
			$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE store_id = '".$store_id."'";
		}
		else {
			$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		}
		
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_Store(); }
	
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_FromCountry($country_id) {
		$query = "SELECT * FROM " . TABLE_GRENES_STORES . " WHERE country_id = '".$country_id."' ORDER BY store_id";
		
		$res = $this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	/** Returns stores name and id formatted for <select> in html
	 * 
	 * @return string
	 */
	function get_StoreSelectOptions() {
		$f = $this->get_All();
		$out = "";
	
		if ($f != null) {
			foreach($f as $item) {
				//Add selected to option if id matches
				if ($item['id'] == $this->store_dbid) { $s = "selected"; }
				else { $s = ""; }
	
				$out .= "<option value=\"".$item['id']."\" ".$s.">".$item['store_id']."-".$item['name']."</option>\n";
			}
		}
	
		return $out;
	}
	
	
	function _get_CountrySelectOptions($c="") {
		
		$out = "";
		$country = array("DK","NO","NL","IS");
	
		
		foreach($country as $item) {
			//Add selected to option if id matches
			if ($item == $c) { $s = "selected"; }
			else { $s = ""; }

			$out .= "<option value=\"".$item."\" ".$s.">".$item."</option>\n";
		}
	
	
		return $out;
	}
	
}

?>