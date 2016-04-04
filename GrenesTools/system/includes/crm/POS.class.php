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
		$this->db = $db;
		$this->input = $db->input_factory();
		
		$this->set_Inactive();
	}

	function reset() {
		$this->input = $this->db->input_factory();
	}
	
	private function make_WarnMessage($pos) {
		$out = "<tr>\r\n";
		$out .= "<td>Store</td><td>".$pos['store_id']."</td>\r\n";
		$out .= "<td>POS</td><td>".$pos['pos_num']."</td>\r\n";
		$out .= "<td>Last seen</td><td>".$pos['pos_online']."</td>\r\n";
		$out .= "<td>Offline</td><td>".$pos['online_minute']." minutes</td>\r\n";
		$out .= "</tr>\r\n";
		
		return $out;
	}
	
	/** Will set POS with too long timeouts as inactive
	 * 
	 */
	private function set_Inactive() {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET pos_online = NULL, inactive = '1' WHERE DATEDIFF(SECOND,pos_online,GETDATE()) > " . POSMON_TIMER_INACTIVE_TIMEOUT;
		$this->db->query($query);
		
		print $this->db->error();
	}
	
	private function send_MailWarn($message) {
		$mailer = new SendMail();
		$msg = "<p>Toolbox_Report</p>\r\n";
		$msg .= $message ."\r\n";
		
		$mailer->add_recipient("Support","support@grenes.zendesk.com");
		//$mailer->add_recipient("Support","soren.pedersen@sostrenegrene.com");
		$mailer->message("Toolbox",$msg);
		//$mailer->send();
	}
	
	private function flag_POSRepport($id,$flag) {
		$query = "UPDATE " . TABLE_GRENES_POS . " SET report_flag = '".$flag."' WHERE id = '".$id."'";
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
				//Set wehere ==
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
	 * @param bool $exact
	 */
	function search($search,$value,$exact) {
		$this->set_Input("search", $search);
		$this->set_Input("value", $value);
		$this->set_Input("exact", $exact);
	}
	
	function get() {
		$query = "SELECT *,CONVERT(varchar,pos_online,120) AS pos_response, 
						DATEDIFF(MINUTE,pos_online,GETDATE()) AS pos_timeout,
						DATEDIFF(SECOND,pos_online,GETDATE()) AS pos_timeout_seconds
						FROM " . TABLE_GRENES_POS . $this->get_Search();
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error(__FUNCTION__);
		
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
		$query = $qf->insert( TABLE_GRENES_POS );
	
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
		$query = $qf->update( TABLE_GRENES_POS,$where );
	
		$this->db->query($query);
	
		print $this->db->error(__FUNCTION__);
	}
	
	function delete_POS($id) {
		$query = "DELETE FROM " . TABLE_GRENES_POS . " WHERE id = '".$id."'";
		$this->db->query($query);
	}
}

?>