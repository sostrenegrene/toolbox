<?php
class POS {
	
	var $db;
	var $pos_id;
	var $store_dbid;
	var $current_status;
	
	var $input;
	
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
		
		$this->input = $db->input_factory();
	}
	
	/** Returns an empty pos entry array
	 *  
	 */
	function empty_POS() {
		$a = $this->db->input_factory();
		
		$a->add('id',"");
		$a->add('store_id',"");
		$a->add('store_name',"");
		$a->add('pos_num',"");
		$a->add('terminal_id',"");
		$a->add('terminal_model',"");
		$a->add('terminal_software',"");
		$a->add('terminal_software_version',"");
		$a->add('terminal_software_registered',"");
		$a->add('teamviewer_user',"");
		$a->add('teamviewer_pass',"");
		$a->add('monitor_installed',"");
		
		return $a->to_array();
	}

	/** Adds a total pos and total offline count
	 * 
	 * @param array $l
	 * @return array
	 */
	private function pos_Status($l) {
		//Get total pos count
		$this->current_status['total'] = count($l);
		//reset offline count
		$this->current_status['offline'] = 0;
		$this->current_status['warning'] = 0;
		//print_r($l);
		
		$sendWarn = false;//If true sends a warning mail
		$warnMessage = "";//Message to send on warning
		for ($i=0; $i<count($l); $i++) {
			$item = $l[$i];			
			
			//If POS has no minute value
			if ($item['online_minute'] === null) {
				//Remove it from total count
				$this->current_status['total'] -= 1;
				//Set as inactive
				$item['status'] = "inactive";
			}
			else {
				//Set as warning, before setting as offline and sending ticket				
				if ($item['online_minute'] > POSMON_TIMER_OFFLINE) { 
					//Add to offline count
					$this->current_status['offline'] += 1;
					//Set as offline
					$item['status'] = "offline";
					
					//Test if report flag is unset
					if ($item['report_flag'] == 0) { 
						$sendWarn = true;//Flag to send warning
						//Update flag on POS
						$this->flag_POSrepport($item['id'],1);
					}
					
					//Build warning message
					$warnMessage .= $this->make_WarnMessage($item);
				}
				elseif ($item['online_minute'] > POSMON_TIMER_WARNING) {
					$item['status'] = "warning";
					$this->current_status['warning'] += 1;
						
				}
				else {
					$item['status'] = "online";
					
					$this->flag_POSRepport($item['id'],0);
				}
			}
			$l[$i] = $item;			
		}
		
		if ($sendWarn) { 
			$warnMessage = "<table>\r\n".$warnMessage."</table>\r\n";
			$this->send_MailWarn($warnMessage); 
			//print $warnMessage;
		}
		
		if ($this->current_status['total'] < 0) { $this->current_status['total'] = 0; }		
		
		return $l;
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
	
	/** Save POS entry
	 *
	 */
	function save_POS() {
		
		if ($this->pos_id != 0) {
			$this->update_POS();
		}
		else {
			$this->make_POS();
		}
	}
	
	function get_Status() {
		return $this->current_status;
	}
	
	function get_FromTerminalId($term_id) {
		$query = "SELECT * FROM " . TABLE_GRENES_POS . " WHERE terminal_id = '".$term_id."'";
		$this->db->query($query);
		$res = $this->db->get_rows();
		if ($res != null) { $res = $res[0]; }
		else { $res = $this->empty_POS(); }
		
		return $res;
	}
	
	/** Get all pos entries
	 * 
	 * @return array
	 */
	function get_All() {
		if ($this->store_dbid != 0) { $where = " WHERE pos.store_id = '".$this->store_dbid."' "; }
		else { $where = ""; }
		$query = "SELECT pos.*,pos.store_id AS store_dbid,
						CONVERT(varchar,pos.pos_online,120) AS pos_online, 
						DATEDIFF(MINUTE,pos.pos_online,GETDATE()) AS online_minute,
						stores.name AS store_name,stores.store_id AS store_id 
					FROM " . TABLE_GRENES_POS . " AS pos 
					JOIN " . TABLE_GRENES_STORES . " AS stores ON pos.store_id = stores.id " .  
					$where . " ORDER BY stores.store_id,pos.store_id ASC";
		
		$this->db->query($query);
		$res = $this->db->get_rows();
		
		print $this->db->error("p".__FUNCTION__);
		
		
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