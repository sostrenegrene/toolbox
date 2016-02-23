<?php
class Countries {
	
	var $db;
	
	function __construct($db) {
		$this->db = $db;
	}
	
	function get_All() {
		$query = "SELECT * FROM " . TABLE_GRENES_COUNTRIES;
		$res = $this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function make_Country($country) {
		$query = "INSERT INTO " . TABLE_GRENES_COUNTRIES . " (country) VALUES ('".$country."')";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	function get_CountrySelectOptions($c="") {	
		$out = "";
	
		foreach($this->get_All() as $item) {
			//Add selected to option if id matches
			if ($item['id'] == $c) { $s = "selected"; }
			else { $s = ""; }
	
			$out .= "<option value=\"".$item['id']."\" ".$s.">".$item['country']."</option>\n";
		}	
	
		return $out;
	}
	
}
?>