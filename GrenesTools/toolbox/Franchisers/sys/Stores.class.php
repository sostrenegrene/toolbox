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
	
	private function make_Store($franchiser_id,
								$store_id,
								$store_name,
								$address,
								$city,
								$zipcode,
								$store_email,
								$store_phone,
								$manager,
								$manager_phone,
								$org_num,
								$bax,
								$tof,
								$cvr,
								$forret_num,
								$country_id) 
	{
		$query = "INSERT INTO " . TABLE_GRENES_STORES . "(franchiser_id,
															store_id,
															name,
															address,
															city,
															zipcode,
															store_email,
															store_phone,
															manager,
															manager_phone,
															organization_number,
															bax,
															tof,
															cvr,
															forretnings_nummer,
															country_id)
				VALUES ('".$franchiser_id."',
						'".$store_id."',
						'".$store_name."',
						'".$address."',
						'".$city."',
						'".$zipcode."',
						'".$store_email."',
						'".$store_phone."',
						'".$manager."',
						'".$manager_phone."',
						'".$org_num."',
						'".$bax."',
						'".$tof."',
						'".$cvr."',
						'".$forret_num."',
						'".$country_id."')";
		
		$this->db->query($query);
		print $this->db->error(__FUNCTION__);
	}
	
	private function update_Store($franchiser_id,
									$store_id,
									$store_name,
									$address,
									$city,
									$zipcode,
									$store_email,
									$store_phone,
									$manager,
									$manager_phone,
									$org_num,
									$bax,
									$tof,
									$cvr,
									$forret_num,
									$country_id) 
	{
		$query = "UPDATE " . TABLE_GRENES_STORES . " SET 
						franchiser_id = '".$franchiser_id."',
						store_id = '".$store_id."',
						name = '".$store_name."',
						address = '".$address."',
						city = '".$city."',
						zipcode = '".$zipcode."',
						store_email = '".$store_email."',
						store_phone = '".$store_phone."',
						manager = '".$manager."',
						manager_phone = '".$manager_phone."',
						organization_number = '".$org_num."',
						bax = '".$bax."',
						tof = '".$tof."',
						cvr = '".$cvr."',
						forretnings_nummer = '".$forret_num."',
						country_id = '".$country_id."'
						WHERE id = '".$this->store_dbid."'";
	
		$this->db->query($query);
		print $this->db->error(__FUNCTION__);
	}
	
	private function empty_Store() {
		$a['id'] = "0";
		$a['country_id'] = "";
		$a['franchiser_id'] = "";
		$a['store_id'] = "";
		$a['name'] = "";
		$a['address'] = "";
		$a['city'] = "";
		$a['zipcode'] = "";
		$a['store_email'] = "";
		$a['store_phone'] = "";
		$a['manager'] = "";
		$a['manager_phone'] = "";
		$a['organization_number'] = "";
		$a['bax'] = "";
		$a['tof'] = "";
		$a['cvr'] = "";
		$a['forretnings_nummer'] = "";
		
		return $a;
	}
	
	function add_SearchOption($option,$value) {
		
		$a['option'] = $option;
		$a['value'] = $value;
		$this->search_array[] = $a; 
		
	}
	
	function save_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$store_email,$store_phone,$manager,$manager_phone,$org_num,$bax,$tof,$cvr,$forret_num,$country) {
		
		$store_name = htmlspecialchars($store_name,ENT_QUOTES);
		$address = htmlspecialchars($address,ENT_QUOTES);
		$city = htmlspecialchars($city,ENT_QUOTES);
		$store_email = htmlspecialchars($store_email,ENT_QUOTES);
		$store_phone = htmlspecialchars($store_phone,ENT_QUOTES);
		$manager = htmlspecialchars($manager,ENT_QUOTES);
		$manager_phone = htmlspecialchars($manager_phone,ENT_QUOTES);		
		
		if ($this->store_dbid != 0) {
			$this->update_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$store_email,$store_phone,$manager,$manager_phone,$org_num,$bax,$tof,$cvr,$forret_num,$country);
		}
		else {
			$this->make_Store($franchiser_id,$store_id,$store_name,$address,$city,$zipcode,$store_email,$store_phone,$manager,$manager_phone,$org_num,$bax,$tof,$cvr,$forret_num,$country);
		}
		
	}
	
	function delete_Store() {
		$query = "DELETE FROM " . TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function get_All() {
		 
		if ($this->franchiser_id != 0) { $query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE franchiser_id = '".$this->franchiser_id."' ORDER BY country_id,store_id ASC"; }
		else { $query = "SELECT * FROM ". TABLE_GRENES_STORES . " ORDER BY country_id,store_id ASC"; }
	
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_One($store_id=null) {
		if ($store_id != null) {
			$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE store_id = '".$store_id."'";
		}
		else {
			$query = "SELECT * FROM ". TABLE_GRENES_STORES . " WHERE id = '".$this->store_dbid."'";
		}
		$this->db->query($query);
		$res = $this->db->get_rows();
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_Store(); }
	
		print $this->db->error(__FUNCTION__);
		
		return $res;
	}
	
	function get_StoreSelectOptions() {
		$f = $this->get_All();
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
	
	function get_CountrySelectOptions($c="") {
		
		$out = "";
		$country = array("DK","NO","NL","IS");
	
		
		foreach($country as $item) {
			//Add selected to option if id matches
			if ($item == $c) { $s = "selected"; }
			else { $s = ""; }

			$out .= "<option value=\"".$item."\" ".$s.">".$item."</option>\n";
		}
	
	
		return $out;
	}
	
}

?>