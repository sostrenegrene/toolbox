<?php
/** This class handles all data on direct franchiser info
 * 
 * 
 * @author Søren Pedersen
 *
 */
class Franchisers {
	
	var $db;
	var $franchiser_id;
	var $country_id;
	
	function __construct($db,$franchiser_id=null,$country_id=null) {
		$this->db = $db;
		$this->franchiser_id = $franchiser_id;
		$this->country_id = $country_id;
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
	
	private function empty_Franchiser() {
		$a['franchiser'] = "";
		$a['country_id'] = "";
		$a['organization_number'] = "";
		$a['bax'] = "";
		$a['tof'] = "";
		$a['cvr'] = "";
		$a['forretnings_nummer'] = "";
		$a['email'] = "";
		$a['phone_number'] = "";
		
		return $a;
	}
	
	/** Create new frachiser
	 * 
	 * @param string $franchiser
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 */
	private function make_Franchiser($franchiser,$country_id,$email,$phone) {
		$query = "INSERT INTO " . TABLE_GRENES_FRANCHISERS . " (franchiser,email,phone_number,country_id) VALUES ('".$franchiser."','".$email."','".$phone."','".$country_id."')";
		$this->db->query($query);
		print $this->db->error();
	}
	
	/** Update frachiser
	 *
	 * @param int $id
	 * @param string $franchiser
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 */
	private function update_Franchiser($franchiser,$country_id,$email,$phone) {
		$query = "UPDATE " . TABLE_GRENES_FRANCHISERS . " SET franchiser = '".$franchiser."',email = '".$email."',phone_number = '".$phone."',country_id = '".$country_id."' WHERE id = '".$this->franchiser_id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function save_Franchiser($franchiser,$country_id,$email,$phone) {
		
		if ($this->franchiser_id != 0) {
			$this->update_Franchiser($franchiser,$country_id,$email,$phone);
		}
		else {
			$this->make_Franchiser($franchiser,$country_id,$email,$phone);
		}
		
	}
	
	/** Delete a franchiser 
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