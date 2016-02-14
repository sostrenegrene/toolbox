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
	function get_One($id) {
		$query = "SELECT * FROM " . TABLE_GRENES_FRANCHISERS . " WHERE id = '".$id."'";
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
		
		return $a;
	}
	
	/** Create new frachiser
	 * 
	 * @param string $franchiser
	 * @param int $org_num
	 * @param int $bax
	 * @param int $tof
	 */
	private function make_Franchiser($franchiser,$org_num,$bax,$tof) {
		$query = "INSERT INTO " . TABLE_GRENES_FRANCHISERS . " (franchiser,bax,tof,organization_number) VALUES ('".$franchiser."','".$bax."','".$tof."','".$org_num."')";
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
	private function update_Franchiser($id,$franchiser,$org_num,$bax,$tof) {
		$query = "UPDATE " . TABLE_GRENES_FRANCHISERS . " SET franchiser = '".$franchiser."', bax ='".$bax."', tof = '".$tof."',organization_number = '".$org_num."' WHERE id = '".$id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function save_Franchiser($id,$franchiser,$org_num,$bax,$tof) {
		
		if ($id != 0) {
			$this->update_Franchiser($id,$franchiser,$org_num,$bax,$tof);
		}
		else {
			$this->make_Franchiser($franchiser,$org_num,$bax,$tof);
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