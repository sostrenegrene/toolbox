<?php
class tManagerProject {
	
	var $db;
	var $input;
	var $projects;
	var $project_id;
	
	function __construct($db,$project_id=null) {
		$this->db = $db;
		$this->project_id = $project_id;
		
		$this->input = $db->input_factory();		
		
		$this->projects = $this->fetch_Projects();		
	}
	
	/** Add new input for DB
	 * 
	 * @param string $name
	 * @param string $value
	 */
	function add_Input($name,$value,$cmd=false) {
		$this->input->add($name,$value,$cmd);
	}
	
	/** Creates a new project entry
	 *  
	 */
	private function make_Project() {		
		$this->add_Input("closed", 0);
		
		//New query factory
		$qf = $this->db->query_factory();
		
		//Add input factory to qf
		$qf->set_InputFactory($this->input);
		
		//Make insert query
		$query = $qf->insert( DB_GRENES_TIME_MANAGER );
		
		//Exec query
		$this->db->query($query);
		
		//print errors
		print $this->db->error();	
	}
	
	/** Updates a projects entry
	 * 
	 * @param int $id
	 */
	private function update_Project() {
		//Make query factory 
		$qf = $this->db->query_factory();
	
		//Add input factory to qf
		$qf->set_InputFactory($this->input);
		
		//Set where params
		$where = "id = '".$this->project_id."'";
		
		//Make update query
		$query = $qf->insert( DB_GRENES_TIME_MANAGER,$where );
	
		//Exec query
		$this->db->query($query);
	
		//Print errors
		print $this->db->error();
	}
	
	private function fetch_Projects() {
		$query = "SELECT * FROM " . DB_GRENES_TIME_MANAGER;
		$res = $this->db->query($query);
	
		return $res;
	}
	
	function save_Project() {
		
		if ($id != null) { $this->update_Project(); }
		else { $this->make_Project(); }
		
		$this->projects = $this->fetch_Projects();		
	}
	
	function delete_Project($id) {
		$query = "DELETE FROM " . DB_GRENES_TIME_MANAGER . " WHERE id = '".$id."'";
		$this->db->query($query);
		
		print $this->db->error();
		
		$this->projects = $this->fetch_Projects();
	}
	
	function get_Projects() {
		return $this->projects;
	}
	
	function get_Select() {
		
		$out = "<option>Select Project</option>\n";
		if ($this->projects != null) {
			foreach($this->projects as $project) {
				$out .= "<option value=\"".$project['id']."\">".$project['name']."</option>\n";
			}
		}
		
		$out = "<select name=\"project_id\">".$out."</select>\n";
		
		return $out;
	}
	
}
?>