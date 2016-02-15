<?php
class Stores {
	
	var $db;
	var $store_dbid;	
	var $franchiser_id;
	
	function __construct($db,$id=0,$franchiser_id=0) {
		$this->db = $db;
		$this->store_dbid = $id;
		$this->franchiser_id = $franchiser_id;
	}
	
	private function make_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$org_num,$bax,$tof,$cvr,$forret_num) {
		$query = "INSERT INTO " . TABLE_GRENES_STORES . "(franchiser_id,
															store_id,
															name,
															address,
															city,
															zipcode,
															organization_number,
															bax,
															tof,
															cvr,
															forretnings_nummer)
				VALUES ('".$franchiser_id."','".$store_id."','".$store_name."','".$address."','".$city."','".$zipcode."','".$org_num."','".$bax."','".$tof."','".$cvr."','".$forret_num."')";
		
		$this->db->query($query);
		print $this->db->error(); 
	}
	
	private function update_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$org_num,$bax,$tof,$cvr,$forret_num) {
		$query = "UPDATE " . TABLE_GRENES_STORES . " SET 
						franchiser_id = '".$franchiser_id."',
						store_id = '".$store_id."',
						name = '".$store_name."',
						address = '".$address."',
						city = '".$city."',
						zipcode = '".$zipcode."',
						organization_number = '".$org_num."',
						bax = '".$bax."',
						tof = '".$tof."',
						cvr = '".$cvr."',
						forretnings_nummer = '".$forret_num."'
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
		$a['organization_number'] = "";
		$a['bax'] = "";
		$a['tof'] = "";
		$a['cvr'] = "";
		$a['forretnings_nummer'] = "";
		
		return $a;
	}
	
	function save_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$org_num,$bax,$tof,$cvr,$forret_num) {
		
		if ($this->store_dbid != 0) {
			$this->update_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$org_num,$bax,$tof,$cvr,$forret_num);
		}
		else {
			$this->make_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$org_num,$bax,$tof,$cvr,$forret_num);
		}
		
	}
	
	function delete_Store() {
		$query = "DELETE FROM " . TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function get_All() {
		
		if ($this->franchiser_id != 0) { $query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE franchiser_id = '".$this->franchiser_id."' ORDER BY franchiser_id ASC"; }
		else { $query = "SELECT * FROM ". TABLE_GRENES_STORES . " ORDER BY franchiser_id ASC"; }
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

?>