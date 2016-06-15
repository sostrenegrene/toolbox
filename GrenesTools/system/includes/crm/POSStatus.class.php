<?php
class POSStatus {

	var $db;
	
	var $list;
	var $status_total;
	

	function __construct($db,$list) {
		$this->db = $db;
		
		$this->list = array();
		$this->status($list);
	}

	function get() {
		return $this->list;
	}

	function total() {
		return $this->status_total;
	}

	private function status($list) {
		//print_r($list);
		
		$this->status_total['total'] = count($list);
		$this->status_total['offline'] = 0;
		$this->status_total['warning'] = 0;
		$this->status_total['inactive'] = 0;

		for($i=0; $i<count($list); $i++) {
			$pos = $list[$i];
			$pos = $this->online($pos);
			$pos = $this->inactive($pos);
			//$pos = $this->notify($pos);			
			$pos = $this->warning($pos);
			$pos = $this->offline($pos);
			
				
			$this->list[] = $pos;
		}

	}

	private function inactive($pos) {
		if ( ($pos['pos_timeout_seconds'] == null) && ($pos['activity'] == null) ) {

			//Remove it from total count
			$this->status_total["total"] -= 1;
			//Set as unknown
			$pos['status'] = "unknown";
		}
		elseif ( ($pos['pos_timeout_seconds'] == null) && ( $pos['activity'] == '1' ) ) {
			//Set as inactive
			$this->status_total["total"] -= 1;
			$this->status_total["inactive"] += 1;
				
			$pos['status'] = "inactive";
		}

		if ($this->status_total['total'] < 0) { $this->status_total['total'] = 0; }

		//No message output
		$pos['message'] = "";
		
		return $pos;
	}

	private function offline($pos) {

		if (POSMON_TIMER_OFFLINE < $pos['pos_timeout_seconds']) {

			//Add to offline count
			$this->status_total['offline'] += 1;
				
			//Set as offline
			$pos['status'] = "offline";	
			$pos['message'] = "POS ".$pos['pos_num'] . " offline for " . $pos['pos_timeout'] . " minutes";
		}

		return $pos;
	}

	private function warning($pos) {

		if (POSMON_TIMER_WARNING < $pos['pos_timeout_seconds']) {
				
			//Add to warning count
			$this->status_total['warning'] += 1;
				
			$pos['status'] = "warning";
			$pos['message'] = "POS ".$pos['pos_num']." no response for ".$pos['pos_timeout']." minutes";				
		}

		return $pos;
	}

	private function notify($pos) {

		if (POSMON_TIMER_NOTIFY < $pos['pos_timeout_seconds']) {
			$pos['notify'] = true;
		}
		else {
			$pos['notify'] = false;
		}

		return $pos;
	}

	private function online($pos) {

		$pos['status'] = "online";
		$pos['message'] = "";
		
		return $pos;
	}

}
?>