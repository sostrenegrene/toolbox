<?php
class POS {
	
	var $db;
	var $current_status;
	
	var $input;
	
	/** Class Constructor
	 * 
	 * @param handler $db
	 * @param int $id
	 * @param int $store_dbid
	 */
	function __construct($db) {
		$this->db 		= $db;
		$this->input 	= $db->input_factory();
		
		//$this->set_Inactive();
	}

	/** Reset all data input
	 * 
	 */
	function reset() {
		$this->input = $this->db->input_factory();
	}
	
	/** Will set POS with too long timeouts as inactive
	 * 
	 */
	private function set_Inactive() {
		$query = "UPDATE " . DB_GRENES_POS . " SET pos_online = NULL, activity = '1' WHERE DATEDIFF(SECOND,pos_online,GETDATE()) > " . POSMON_TIMER_INACTIVE_TIMEOUT;
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	/** Flag POS as "mail repport is sent"
	 * 
	 * @param int $id
	 * @param int $flag 0/1 (false/true)
	 */
	function flag_POSRepport($id,$flag) {
		$query = "UPDATE " . DB_GRENES_POS . " SET report_flag = '".$flag."' WHERE id = '".$id."'";
		$this->db->query($query);
		print $this->db->error();
	}
	
	function get_Status() {
		return $this->current_status;
	}
	
	/** Sets up search string for query if any
	 * search data is supplied with input handler
	 *
	 */
	private function get_Search() {
		$where = "";
	
		//If search value exist
		if ($this->input->value("search") != null) {
			//if exact match exist and is true
			if ( ($this->input->value("exact") != null) && ($this->input->value("exact") == true) ) {
				//Set where ==
				$where = " WHERE ".$this->input->value("search")." = '".$this->input->value("value")."'";
			}
			else {
				//Set where something like..
				$where = " WHERE ".$this->input->value("search")." LIKE '".$this->input->value("value")."%'";
			}
		} else { $where = ""; }
	
		//Reset input handler
		$this->reset();
	
		return $where;
	}
	
	/** Set up a search query
	 *
	 * @param string $search
	 * @param string $value
	 * @param boolean $exact
	 */
	function search($search,$value,$exact) {
		$this->set_Input("search", $search);
		$this->set_Input("value", $value);
		$this->set_Input("exact", $exact);
	}
	
	function get() {
		$query = "SELECT *,CONVERT(varchar,pos_online,120) AS pos_response, 
						DATEDIFF(HOUR,pos_online,GETDATE()) AS pos_timeout_hour,
						DATEDIFF(MINUTE,pos_online,GETDATE()) AS pos_timeout,
						DATEDIFF(SECOND,pos_online,GETDATE()) AS pos_timeout_seconds
						FROM " . DB_GRENES_POS . $this->get_Search();
		
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
		$status = new POSStatus($this->db, $res);		
		$res = $status->get();		
		$res['total'] = $status->total();
		
		return $res;
	}

	/** Save POS entry
	 *
	 */
	function save_POS($id) {
	
		if ($id != 0) {
			$this->update_POS($id);
		}
		else {
			$this->make_POS();
		}
	}
	
	function set_Input($name,$value) {
		$this->input->add($name,$value);
	}
	
	/** Create a new POS entry
	 *
	 **/
	private function make_POS() {
		$qf = $this->db->query_factory();
	
		$qf->set_InputFactory($this->input);
		$query = $qf->insert( DB_GRENES_POS );
	
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	/** Updates POS entry
	 *
	 */
	private function update_POS($id) {
	
		$qf = $this->db->query_factory();
	
		$qf->set_InputFactory($this->input);
		$where = "id = '".$id."'";
		$query = $qf->update( DB_GRENES_POS,$where );
	
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	function delete_POS($id) {
		$query = "DELETE FROM " . DB_GRENES_POS . " WHERE id = '".$id."'";
		$this->db->query($query);
	}
}
?>