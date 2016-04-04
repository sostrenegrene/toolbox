<?php
class POSData {
	
	var $poslist;
	var $store_id;
	
	var $current_status;
	
	var $msg_handler;
	
	function __construct($poslist=array(),$store_id=0) {
		$this->store_id = $store_id;
		
		$this->msg_handler = new MessageFactory();
		$this->poslist = $this->pos_Status( $poslist );
	}
	
	function get($i,$val) {
		if (isset($this->poslist[$i][$val])) { return $this->poslist[$i][$val]; }
		else { return null; }
	}
	
	function count() {
		return count($this->poslist);
	}
	
	function status($type) {
		if (!empty($this->current_status[$type])) {
			return $this->current_status[$type];
		}
		else {
			return 0;
		}
	}
	
	/** Returns either messages array
	 * or the entire handler if $handler = TRUE
	 * 
	 * @param bool $handler
	 * @return MessageFactory|array
	 */
	function messages($handler=false) {		
		if ($handler) { return $this->msg_handler; }
		else { return $this->msg_handler->messages(); }
	}
	
	private function set_Current($name,$value) {
		if (!empty($this->current_status[$name])) { 
			$this->current_status[$name] += $value; 
		
			if ($this->current_status[$name] < 0) { $this->current_status[$name] = 0; }
		}
		else { $this->current_status[$name] = $value; }		
		
	}
	
	private function is_Unknown($pos) {
		return ( ($pos['pos_timeout_seconds'] == null) && ($pos['inactive'] == null) );
	}
	
	private function is_Inactive($pos) {
		return ( ($pos['pos_timeout_seconds'] == null) && ( $pos['inactive'] == 1 ) );
	}
	
	private function set_POSStatus($pos) {
			
		if ( $this->is_Unknown($pos) ) {
		
			//Remove it from total count
			//$this->current_status['total'] -= 1;
			$this->set_Current("total", -1);
			//Set as unknown
			$pos['status'] = "unknown";
		}
		elseif ( $this->is_Inactive($pos) ) {
			//Set as unknown
			$this->set_Current("total", -1);
			$this->set_Current("inactive", 1);
			$pos['status'] = "inactive";
		}
		else {
		
			if (POSMON_TIMER_OFFLINE < $pos['pos_timeout_seconds']) { 
					
					//Add to offline count
					//$this->current_status['offline'] += 1;
					$this->set_Current("offline", 1);
					//Set as offline
					$pos['status'] = "offline";
					
			}
			elseif (POSMON_TIMER_WARNING < $pos['pos_timeout_seconds']) {
					
					$pos['status'] = "warning";
					//$this->current_status['warning'] += 1;
					$this->set_Current("warning", 1);
			}
			else {
				$pos['status'] = "online";				
			}
			
		}
		
		return $pos;
	}
	
	/** This adds a streamer message if pos is offline
	 * 
	 * @param obj $pos
	 * @param obj $message
	 */
	private function set_Message($pos) {
	
		$msg = "";
		if ($pos['status'] == "offline") {					
			$msg .= "POS: " . $pos['pos_num'] . " - No response for: ".$pos['pos_timeout']." minutes";			
			
			if ($pos['notes'] != null) { $msg .= "<br>" . $pos['notes']; }
			
			$this->msg_handler->add($msg);
		}
		
	}
	
	/** Adds a total pos and total offline count
	 *
	 * @param array $l
	 * @return array
	 */
	private function pos_Status($l) {
		//Get total pos count
		$this->set_Current("total", count($l) );
		//reset offline count
		$this->set_Current("offline", 0);
		$this->set_Current("warning", 0);
		$this->set_Current("inactive", 0);		
		
		$sendWarn = false;//If true sends a warning mail
		$warnMessage = "";//Message to send on warning
		if (!empty($l)) {
			for ($i=0; $i<count($l); $i++) {
				$item = $l[$i];
					
				$item = $this->set_POSStatus($item);
				$this->set_Message($item);
				
				$l[$i] = $item;
			}//ENd for
		}//ENd if
		
		return $l;
	}
	
	
}
?>