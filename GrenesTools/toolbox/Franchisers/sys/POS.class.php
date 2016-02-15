<?php
class POS {
	
	var $db;
	var $pos_id;
	var $store_dbid;
	
	function __construct($db,$id=0,$store_dbid=0) {
		$this->db = $db;
		$this->pos_id = $id;
		$this->store_dbid = $store_dbid;
	}
	
	private function make_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass) {
		$query = "INSERT INTO " . TABLE_GRENES_POS . " (store_id,pos_num,terminal_id,teamviewer_user,teamviewer_pass) VALUES ('".$store_id."','".$pos_num."','".$terminal_id."','".$teamviewer_user."','".$teamviewer_pass."')";
		$this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
	}
	
	private function update_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET store_id = '".$store_id."', pos_num = '".$pos_num."', terminal_id = '".$terminal_id."', teamviewer_user = '".$teamviewer_user."',teamviewer_pass = '".$teamviewer_pass."' WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}

	function save_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass) {
		if ($this->pos_id != 0) {
			$this->update_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass);
		}
		else {
			$this->make_POS($store_id,$pos_num,$terminal_id,$teamviewer_user,$teamviewer_pass);
		}
	}
	
	function delete_POS() {
		$query = "DELETE FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	function get_All() {
		if ($this->store_dbid != 0) { $where = " WHERE store_id = '".$this->store_dbid."' "; }
		else { $where = ""; }
		$query = "SELECT *,CONVERT(varchar,pos_online,120) AS pos_online, DATEDIFF(MINUTE,pos_online,GETDATE()) AS online_minute FROM " . TABLE_GRENES_POS . $where . " ORDER BY store_id ASC";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_One() {
		$query = "SELECT * FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]; }
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}

	
}
	
/*
 * 
 * id
store_id
pos_num
terminal_id
pos_online
 */
?>