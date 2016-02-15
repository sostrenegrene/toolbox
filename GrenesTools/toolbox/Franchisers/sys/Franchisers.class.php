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
	
	function __construct($db,$franchiser_id=null) {
		$this->db = $db;
		$this->franchiser_id = $franchiser_id;
	}
	
	/** Returns an array with all franchisers
	 * 
	 * @return array
	 */
	function get_All() {
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS;
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
		$a['organization_number'] = "";
		$a['bax'] = "";
		$a['tof'] = "";
		$a['cvr'] = "";
		$a['forretnings_nummer'] = "";
		
		return $a;
	}
	
	/** Create new frachiser
	 * 
	 * @param string $franchiser
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 */
	//private function make_Franchiser($franchiser,$org_num,$bax,$tof,$cvr,$forretnings_nr) {
	private function make_Franchiser($franchiser) {
		//$query = "INSERT INTO " . TABLE_GRENES_FRANCHISERS . " (franchiser,bax,tof,organization_number,cvr,forretnings_nummer) VALUES ('".$franchiser."','".$bax."','".$tof."','".$org_num."','".$cvr."','".$forretnings_nr."')";
		$query = "INSERT INTO " . TABLE_GRENES_FRANCHISERS . " (franchiser) VALUES ('".$franchiser."')";
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
	//private function update_Franchiser($franchiser,$org_num,$bax,$tof,$cvr,$forretnings_nr) {
	private function update_Franchiser($franchiser) {
		//$query = "UPDATE " . TABLE_GRENES_FRANCHISERS . " SET franchiser = '".$franchiser."', bax ='".$bax."', tof = '".$tof."',organization_number = '".$org_num."', cvr = '".$cvr."',forretnings_nummer = '".$forretnings_nr."' WHERE id = '".$this->franchiser_id."'";
		$query = "UPDATE " . TABLE_GRENES_FRANCHISERS . " SET franchiser = '".$franchiser."' WHERE id = '".$this->franchiser_id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	//function save_Franchiser($franchiser,$org_num,$bax,$tof,$cvr,$forretnings_nr) {
	function save_Franchiser($franchiser) {
		
		if ($this->franchiser_id != 0) {
			//$this->update_Franchiser($id,$franchiser,$org_num,$bax,$tof,$cvr,$forretnings_nr);
			$this->update_Franchiser($franchiser);
		}
		else {
			//$this->make_Franchiser($franchiser,$org_num,$bax,$tof,$cvr,$forretnings_nr);
			$this->make_Franchiser($franchiser);
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