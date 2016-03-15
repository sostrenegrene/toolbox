<?php
/** This class handles all data on direct franchiser info
 * 
 * 
 * @author S�ren Pedersen
 *
 */
class Franchisers {
	
	var $db;
	var $input;
	
	function __construct($db) {
		$this->db = $db;
		$this->input = $db->input_factory();
	}
	
	function reset() {
		$this->input = $this->db->input_factory();
	}
	
	function set_Input($name,$value) {
		$this->input->add($name, $value);
	}
	
	/** Sets up search string for query if any
	 * search data is supplied with input handler
	 *
	 */
	private function get_Search() {
		$where = "";
	
		//If search value exist
		if ($this->input->value("search") != null) {
			//if exact match exist and is true
			if ( ($this->input->value("exact") != null) && ($this->input->value("exact") == true) ) {
				//Set wehere ==
				$where = " WHERE ".$this->input->value("search")." = '".$this->input->value("value")."'";
			}
			else {
				//Set where something like..
				$where = " WHERE ".$this->input->value("search")." LIKE '".$this->input->value("value")."%'";
			}
		} else { $where = ""; }
	
		//Reset input handler
		$this->reset();
	
		return $where;
	}
	
	/** Set up a search query
	 *
	 * @param string $search
	 * @param string $value
	 * @param bool $exact
	 */
	function search($search,$value,$exact) {
		$this->set_Input("search", $search);
		$this->set_Input("value", $value);
		$this->set_Input("exact", $exact);
	}
	
	function get() {
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS . $this->get_Search() ." ORDER BY franchiser";
		$res = $this->db->query($query);

		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	/** Create new frachiser
	 * 
	 */
	private function make_Franchiser() {
		$values = $this->input->to_array();
		
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
	private function update_Franchiser($id) {
		$values = $this->input->to_array();
		
		$qf = $this->db->query_factory();
		$qf->add("franchiser",$values['franchiser']);
		$qf->add("email",$values['email']);
		$qf->add("phone_number",$values['phone_number']);
		$qf->add("country_id",$values['country_id']);
		
		$where = "id = '".$id."'";
		$query = $qf->update( TABLE_GRENES_FRANCHISERS,$where );
		
		$this->db->query($query);
		print $this->db->error();
	}
	
	function save_Franchiser($id=null) {		
		
		if ($id != null) {
			$this->update_Franchiser($id);
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
	
	function get_SelectOptions($id) {
		$f = $this->get();
		$out = "";
		
		if ($f != null) {
			foreach($f as $item) {
				//Add selected to option if id matches
				if ($item['id'] == $id) { $s = "selected"; }
				else { $s = ""; }
				
				$out .= "<option value=\"".$item['id']."\" ".$s.">".$item['franchiser']."</option>\n"; 
			}
		}
		
		return $out;
	}
}
?>