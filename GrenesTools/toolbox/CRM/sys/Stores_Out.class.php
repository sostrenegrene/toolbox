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
	
	function set_dbID($id) {
		$this->store_dbid = $db;
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	/** Returns an empty store item
	 * 
	 * @return array
	 */
	function empty_Store() {
		$a = $this->db->input_factory();
		$a->add('id',"0");
		$a->add('country_id',"");
		$a->add('franchiser_id',"");
		$a->add('store_id',"");
		$a->add('name',"");
		$a->add('address',"");
		$a->add('city',"");
		$a->add('zipcode',"");
		$a->add('store_email',"");
		$a->add('store_phone',"");
		$a->add('manager',"");
		$a->add('manager_phone',"");
		$a->add('organization_number',"");
		$a->add('bax',"");
		$a->add('tof',"");
		$a->add('cvr',"");
		$a->add('forretnings_nummer',"");
		
		return $a->to_array();
	}
	
	/** Returns all stores
	 *  If franchiser id is provided returns all stores for franchiser
	 *  Else returns all stores in db
	 * 
	 * @return array
	 */
	function get_All() {
		 
		if ($this->franchiser_id != 0) { 
			//$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE franchiser_id = '".$this->franchiser_id."' ORDER BY country_id,store_id ASC";
			$query = "SELECT s.*,c.country FROM ". TABLE_GRENES_STORES . " AS s
					JOIN ".TABLE_GRENES_COUNTRIES . " AS c ON c.id = s.country_id 
					WHERE franchiser_id = '".$this->franchiser_id."' ORDER BY country_id,store_id ASC";
		}
		else { $query = "SELECT s.*,c.country FROM ". TABLE_GRENES_STORES . " AS s
				JOIN " . TABLE_GRENES_COUNTRIES . " AS c ON c.id = s.country_id
				ORDER BY s.country_id,s.store_id ASC"; 
		}
	
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error("s".__FUNCTION__);
		
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
			$query = "SELECT s.*,c.country FROM " . TABLE_GRENES_STORES . " AS s
						JOIN ".TABLE_GRENES_COUNTRIES." AS c ON c.id = s.country_id
						WHERE s.id = '".$store_id."'";
		}
		else {
			$query = "SELECT s.*,c.country FROM " . TABLE_GRENES_STORES . " AS s
						JOIN ".TABLE_GRENES_COUNTRIES." AS c ON c.id = s.country_id
						WHERE s.id = '".$this->store_dbid."'";
		}
		
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_Store(); }
	
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_Search($type,$search) {
		$query = "SELECT s.*,c.country FROM " . TABLE_GRENES_STORES . " AS s
				JOIN ".TABLE_GRENES_COUNTRIES." AS c ON c.id = s.country_id
				WHERE s.".$type." LIKE '".$search."%'";
		$res = $this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_FromStoreID($store_id) {
		$query = "SELECT * FROM " . TABLE_GRENES_STORES . " WHERE store_id = '".$store_id."'";
		$res = $this->db->query($query);
		
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
	
}
?>