<?php
class POSData {
	
	var $poslist;
	
	var $current_status;
	
	function __construct($poslist=array()) {
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
		if (!empty($l)) {
			for ($i=0; $i<count($l); $i++) {
				$item = $l[$i];
					
				//If POS has no minute value
				if ($item['pos_timeout'] === null) {
					//Remove it from total count
					$this->current_status['total'] -= 1;
					//Set as inactive
					$item['status'] = "inactive";
				}
				else {
					//Set as warning, before setting as offline and sending ticket
					if ($item['pos_timeout'] > POSMON_TIMER_OFFLINE) {
						//Add to offline count
						$this->current_status['offline'] += 1;
						//Set as offline
						$item['status'] = "offline";
							
						//Test if report flag is unset
						if ($item['report_flag'] == 0) {
							$sendWarn = true;//Flag to send warning
							//Update flag on POS
							//$this->flag_POSrepport($item['id'],1);
						}
							
						//Build warning message
						//$warnMessage .= $this->make_WarnMessage($item);
					}
					elseif ($item['pos_timeout'] > POSMON_TIMER_WARNING) {
						$item['status'] = "warning";
						$this->current_status['warning'] += 1;
		
					}
					else {
						$item['status'] = "online";
							
						//$this->flag_POSRepport($item['id'],0);
					}//ENd if
				}//ENd if
				
				$l[$i] = $item;
			}//ENd for
		}//ENd if
	
		if ($this->current_status['total'] < 0) { $this->current_status['total'] = 0; }
	
		return $l;
	}
	
	
}
?>