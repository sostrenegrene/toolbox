<?php
class Stores {
	
	var $db;
	var $store_dbid;	
	
	function __construct($db,$id=0) {
		$this->db = $db;
		$this->store_dbid = $id;
	}
	
	private function make_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode) {
		$query = "INSERT INTO " . TABLE_GRENES_STORES . "(franchiser_id,store_id,name,address,city,zipcode)
				VALUES ('".$franchiser_id."','".$store_id."','".$store_name."','".$address."','".$city."','".$zipcode."')";
		
		$this->db->query($query);
		print $this->db->error(); 
	}
	
	private function update_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode) {
		$query = "UPDATE " . TABLE_GRENES_STORES . " SET 
						franchiser_id = '".$franchiser_id."',
						store_id = '".$store_id."',
						name = '".$store_name."',
						address = '".$address."',
						city = '".$city."',
						zipcode = '".$zipcode."' 
						WHERE id = '".$this->store_dbid."'";
	
		$this->db->query($query);
		print $this->db->error();
	}
	
	private function empty_Store() {
		$a['id'] = "0";
		$a['franchiser_id'] = "";
		$a['store_id'] = "";
		$a['name'] = "";
		$a['address'] = "";
		$a['city'] = "";
		$a['zipcode'] = "";		
		
		return $a;
	}
	
	function save_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode) {
		
		if ($this->store_dbid != 0) {
			$this->update_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode);
		}
		else {
			$this->make_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode);
		}
		
	}
	
	function delete_Store() {
		$query = "DELETE FROM " . TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function get_All() {
		$query = "SELECT * FROM ". TABLE_GRENES_STORES;
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		return $res;
	}
	
	function get_One() {
		$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_Store(); }
	
		return $res;
	}
	
	function get_SelectOptions() {
		$f = $this->get_All();
		$out = "";
	
		if ($f != null) {
			foreach($f as $item) {
				//Add selected to option if id matches
				if ($item['id'] == $this->store_dbid) { $s = "selected"; }
				else { $s = ""; }
	
				$out .= "<option value=\"".$item['id']."\" ".$s.">".$item['name']."</option>\n";
			}
		}
	
		return $out;
	}
	
}
	

/*
 * id
frachise_id
store_id
name
address
city
zipcode
 */
?>