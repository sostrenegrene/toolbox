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
	var $input;
	
	/** Class constructor
	 * 
	 * @param handler $db
	 * @param number $store_dbid
	 * @param number $franchiser_id
	 */
	function __construct($db) {
		$this->db = $db;
		$this->input = $db->input_factory();
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	/** Resets input factory
	 * 
	 */
	private function reset() {
		$this->input = $this->db->input_factory();
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
	
	/** Returns all stores or from search result
	 * Search params via input handler: 
	 * search(string)
	 * value(string)
	 * exact(bool)
	 * 
	 * @param array $search
	 */
	function get() {
		
		$query = "SELECT s.*,c.country,f.franchiser FROM " . TABLE_GRENES_STORES . " AS s
				JOIN ".TABLE_GRENES_COUNTRIES." AS c ON c.id = s.country_id
				JOIN ".TABLE_GRENES_FRANCHISERS." AS f ON f.id = s.franchiser_id".$this->get_search()." ORDER BY store_id DESC";
		
		$res = $this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
		
		$this->reset();		
		
		return $res;
	}
	
	/** Returns stores name and id formatted for <select> in html
	 * 
	 * @return string
	 */
	function get_StoreSelectOptions() {
		$f = $this->get();
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
	
	
	/******* INPUT ******/
	
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
	
		//print $query;
	
		//Exec query
		$this->db->query($query);
	
		//Print errors if any
		print $this->db->error(__FUNCTION__);
	}
	
}
?>