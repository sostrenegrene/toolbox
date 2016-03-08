<?php
/** This class handles all data on direct franchiser info
 * 
 * 
 * @author S�ren Pedersen
 *
 */
class Franchisers {
	
	var $db;
	var $franchiser_id;
	var $country_id;
	
	var $inputVal;
	
	function __construct($db,$franchiser_id=null,$country_id=null) {
		$this->db = $db;
		$this->franchiser_id = $franchiser_id;
		$this->country_id = $country_id;
		$this->inputVal = $db->input_factory();
	}
	
	function set_FranchiserID($id) {
		$this->franchiser_id = $id;
	}
	
	function set_CountryID($id) {
		$this->country_id = $id;
	}
	
	function set_InputValue($name,$value) {
		$this->inputVal->add($name, $value);
	}
	
	function get_Search($franchiser) {
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS . " WHERE franchiser LIKE '%".$franchiser."%' ORDER BY franchiser";
		$res = $this->db->query($query);
		
		return $res;
	}
	
	/** Returns an array with all franchisers
	 * 
	 * @return array
	 */
	function get_All() {
		if ($this->country_id != null) { $s = " WHERE country_id = '".$this->country_id."'"; }
		else { $s = ""; }
		
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS . $s;
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		return $res;
	}
	
	/** Returns an array with a single franchiser
	 * 
	 * @return array
	 */
	function get_One() {
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS . " WHERE id = '".$this->franchiser_id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_Franchiser(); }
	
		return $res;
	}
	
	function empty_Franchiser() {
		$ip = $this->db->input_factory();
		$ip->add('franchiser',"");
		$ip->add('country_id',"");
		$ip->add('email',"");
		$ip->add('phone_number',"");		
		
		return $ip->to_array();
	}
	
	/** Create new frachiser
	 * 
	 */
	private function make_Franchiser() {
		$values = $this->inputVal->to_array();
		
		$qf = $this->db->query_factory();
		$qf->add("franchiser",$values['franchiser']);
		$qf->add("email",$values['email']);
		$qf->add("phone_number",$values['phone_number']);
		$qf->add("country_id",$values['country_id']);
		
		$query = $qf->insert( TABLE_GRENES_FRANCHISERS );
		
		$this->db->query($query);
		print $this->db->error();
	}
	
	/** Update frachiser
	 *
	 */
	private function update_Franchiser() {
		$values = $this->inputVal->to_array();
		
		$qf = $this->db->query_factory();
		$qf->add("franchiser",$values['franchiser']);
		$qf->add("email",$values['email']);
		$qf->add("phone_number",$values['phone_number']);
		$qf->add("country_id",$values['country_id']);
		
		$where = "id = '".$this->franchiser_id."'";
		$query = $qf->update( TABLE_GRENES_FRANCHISERS,$where );
		
		$this->db->query($query);
		print $this->db->error();
	}
	
	function save_Franchiser() {		
		
		if ($this->franchiser_id != 0) {
			$this->update_Franchiser();
		}
		else {
			$this->make_Franchiser();
		}
	
	}
	
	/** Delete a franchiser 
	 * Must have direct id input, this is to easy enable confirmation
	 * and not having to init another Franchiser object to delete
	 * 
	 * @param int $id
	 */
	function delete_Franchiser($id) {
		$query = "DELETE FROM " . TABLE_GRENES_FRANCHISERS . " WHERE id = '".$id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function get_SelectOptions() {
		$f = $this->get_All();
		$out = "";
		
		if ($f != null) {
			foreach($f as $item) {
				//Add selected to option if id matches
				if ($item['id'] == $this->franchiser_id) { $s = "selected"; }
				else { $s = ""; }
				
				$out .= "<option value=\"".$item['id']."\" ".$s.">".$item['franchiser']."</option>\n"; 
			}
		}
		
		return $out;
	}
}
?>