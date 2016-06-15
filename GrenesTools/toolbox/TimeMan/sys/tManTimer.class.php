<?php
class tManagerTimer {
	
	var $db;
	var $input;
	var $timer_id;
	
	function __construct($db,$timer_id=null) {
		$this->db = $db;
		
		$this->timer_id = $timer_id;
		$this->settings = $db->input_factory();
		$this->reset();
	}
	
	private function reset() {
		$this->input = $this->db->input_factory();
	}
	
	/** Add new input for DB
	 * 
	 * @param string $name
	 * @param string $value
	 */
	function add_Input($name,$value,$cmd=false) {
		$this->input->add($name,$value,$cmd);
	}
	
	/** Creates a new active timer entry
	 * 
	 */
	function start_Timer() {
		$this->add_Input("time_start", "GETDATE()",true);
		
		$qf = $this->db->query_factory();		
		
		$qf->set_InputFactory($this->input);
		$query = $qf->insert( DB_GRENES_TIME_ACTIVE );
	
		//print $query;
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
		
		$newID = $this->fetch_NewID();
		$this->reset();
		
		return $newID;
	}
	
	/** Returns the last row created by the user
	 * 
	 * @return int
	 */
	private function fetch_NewID() {
		$query = "SELECT TOP 1 id FROM " . DB_GRENES_TIME_ACTIVE . " WHERE project_id = '".$this->input->value("project_id")."' AND user_email = '".$this->input->value("user_email")."' ORDER BY id DESC";
		$res = $this->db->query($query);
		
		print $this->db->error(__FUNCTION__);
		
		if (!empty($res[0]['id'])) { $res = $res[0]['id']; }
				
		return $res;
	}
	
	/** Updates a timer entry
	 * 
	 * @param int $id
	 */
	function stop_Timer() {
		$this->add_Input("time_end", "GETDATE()",true);
		
		$qf = $this->db->query_factory();
	
		$qf->set_InputFactory($this->input);
	
		$where = "id = '".$this->timer_id."'";
		$query = $qf->update( DB_GRENES_TIME_ACTIVE,$where );
		//print $query;
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
		
		$this->reset();
	}
	
	function get_Timer() {
		$query = "SELECT *,DATEDIFF(SECOND,time_start,GETDATE()) AS timer_seconds FROM " . DB_GRENES_TIME_ACTIVE . " WHERE id = '".$this->timer_id."'";
		$res = $this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	
		if ($res != null) { $res = $res[0]; }
		
		//print_r($res);
		
		return $res;
	}
		
}
?>