<?php
class POS {
	
	var $db;
	var $pos_id;
	
	function __construct($db,$id) {
		$this->db = $db;
		$this->pos_id = $id;
	}
	
	private function make_POS($store_id,$pos_num,$terminal_id) {
		$query = "INSERT INTO " . TABLE_GRENES_POS . " (store_id,pos_num,terminal_id) VALUES ('".$store_id."','".$pos_num."','".$terminal_id."')";
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	private function update_POS($store_id,$pos_num,$terminal_id) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET store_id = '".$store_id."', pos_num = '".$pos_num."', terminal_id = '".$terminal_id."' WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error();
	}

	function save_POS($store_id,$pos_num,$terminal_id) {
		if ($this->pos_id != 0) {
			$this->update_POS($store_id,$pos_num,$terminal_id);
		}
		else {
			$this->make_POS($store_id,$pos_num,$terminal_id);
		}
	}
	
	function delete_POS() {
		$query = "DELETE FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
	
		print $this->db->error();
	}
	
	function get_All() {
		$query = "SELECT * FROM " . TABLE_GRENES_POS;
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error();
		
		return $res;
	}
	
	function get_One() {
		$query = "SELECT * FROM " . TABLE_GRENES_POS . " WHERE id = '".$this->pos_id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		if ($res != null) { $res = $res[0]; }
		
		print $this->db->error();
		
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