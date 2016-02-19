<?php
class POS {
	
	var $db;
	var $pos_id;
	var $store_dbid;
	var $current_status;
	
	/** Class Constructor
	 * 
	 * @param handler $db
	 * @param int $id
	 * @param int $store_dbid
	 */
	function __construct($db,$id=0,$store_dbid=0) {
		$this->db = $db;
		$this->pos_id = $id;
		$this->store_dbid = $store_dbid;
	}
	
	/** Create a new POS entry
	 * 
	 * @param int $store_id 
	 * @param int $pos_num
	 * @param int $terminal_id
	 * @param string $teamviewer_user
	 * @param string $teamviewer_pass
	 * @param string $term_model
	 * @param string $term_sw
	 * @param string $term_sw_ver
	 * @param string $term_sw_reg
	 */
	private function make_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass,$term_model,$term_sw,$term_sw_ver,$term_sw_reg) {
		$query = "INSERT INTO " . TABLE_GRENES_POS . " (store_id,pos_num,terminal_id,teamviewer_user,teamviewer_pass,terminal_model,terminal_software,terminal_software_version,terminal_software_registered) 
					VALUES ('".$store_id."','".$pos_num."','".$terminal_id."','".$teamviewer_user."','".$teamviewer_pass."','".$term_model."','".$term_sw."','".$term_sw_ver."','".$term_sw_reg."')";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	/** Updates POS entry
	 *
	 * @param int $store_id
	 * @param int $pos_num
	 * @param int $terminal_id
	 * @param string $teamviewer_user
	 * @param string $teamviewer_pass
	 * @param string $term_model
	 * @param string $term_sw
	 * @param string $term_sw_ver
	 * @param string $term_sw_reg
	 */
	private function update_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass,$term_model,$term_sw,$term_sw_ver,$term_sw_reg) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET 
					store_id = '".$store_id."', 
					pos_num = '".$pos_num."', 
					terminal_id = '".$terminal_id."', 
					teamviewer_user = '".$teamviewer_user."',
					teamviewer_pass = '".$teamviewer_pass."', 
					terminal_model = '".$term_model."', 
					terminal_software = '".$term_sw."',
					terminal_software_version = '".$term_sw_ver."', 
					terminal_software_registered = '".$term_sw_reg."' 
					WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	/** Returns an empty pos entry array
	 *  
	 */
	private function empty_POS() {
		$a['id'] = "";
		$a['store_id'] = "";
		$a['store_name'] = "";
		$a['pos_num'] = "";
		$a['terminal_id'] = "";
		$a['terminal_model'] = "";
		$a['terminal_software'] = "";
		$a['terminal_software_version'] = "";
		$a['terminal_software_registered'] = "";
		$a['teamviewer_user'] = "";
		$a['teamviewer_pass'] = "";
		
		return $a;
	}

	/** Adds a total pos and total offline count
	 * 
	 * @param array $list
	 * @return array
	 */
	private function pos_Status($l) {
		$this->current_status['total'] = count($l);
		$this->current_status['offline'] = 0;
		//print_r($l);
		
		for ($i=0; $i<count($l); $i++) {
			$item = $l[$i];
			
			if ($item['online_minute'] == null) {
				$this->current_status['total'] -= 1;
			}
			else {
				if ($item['online_minute'] > 5) { $this->current_status['offline'] += 1; }
			}
		}
		
		if ($this->current_status['total'] < 0) { $this->current_status['total'] = 0; }		
		
		return $l;
	}
	
	/** Save POS entry
	 *
	 * @param int $store_id
	 * @param int $pos_num
	 * @param int $terminal_id
	 * @param string $teamviewer_user
	 * @param string $teamviewer_pass
	 * @param string $term_model
	 * @param string $term_sw
	 * @param string $term_sw_ver
	 * @param string $term_sw_reg
	 */
	function save_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass,$term_model,$term_sw,$term_sw_ver,$term_sw_reg) {
		if ($this->pos_id != 0) {
			$this->update_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass,$term_model,$term_sw,$term_sw_ver,$term_sw_reg);
		}
		else {
			$this->make_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass,$term_model,$term_sw,$term_sw_ver,$term_sw_reg);
		}
	}
	
	/** Delete POS entry
	 * 
	 */
	function delete_POS() {
		$query = "DELETE FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	function get_Status() {
		return $this->current_status;
	}
	
	/** Get all pos entries
	 * 
	 * @return array
	 */
	function get_All() {
		if ($this->store_dbid != 0) { $where = " WHERE pos.store_id = '".$this->store_dbid."' "; }
		else { $where = ""; }
		$query = "SELECT pos.*,
						CONVERT(varchar,pos.pos_online,120) AS pos_online, 
						DATEDIFF(MINUTE,pos.pos_online,GETDATE()) AS online_minute,
						stores.name AS store_name 
					FROM " . TABLE_GRENES_POS . " AS pos 
					JOIN " . TABLE_GRENES_STORES . " AS stores ON pos.store_id = stores.id " .  
					$where . " ORDER BY pos.store_id ASC";
		
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
		
		$res = $this->pos_Status($res);
		
		
		return $res;
	}
	
	function get_One() {
		$query = "SELECT * FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_POS(); }
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}

	
}

?>