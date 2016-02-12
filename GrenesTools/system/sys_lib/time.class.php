<?php
class Time {
	
	function __construct() {
		
	}
	
	/** Converts timestamp(seconds) to array of hh,mm,ss
	 * 
	 * @param int $seconds
	 * @return array
	 */
	function seconds_to_ttmmss($seconds) {
		$out = array("hh"=>"00","mm"=>"00","ss"=>"00");
		
		$hours = floor($seconds / 3600);
		$minutes = floor(($seconds - ($hours * 3600)) / 60);
		$seconds = $seconds - ($hours * 3600) - ($minutes * 60);
		if ($hours < 10) { $hours = "0".$hours; }
		if ($minutes < 10) { $minutes = "0".$minutes; }
		if ($seconds < 10) { $seconds = "0".$seconds; }
		$out['hh'] = $hours;
		$out['mm'] = $minutes;
		$out['ss'] = $seconds;
		
		return $out;
	}
	
	/** Formates timestamp(seconds) to string hh:mm:ss
	 * 
	 * @param int $seconds
	 * @return string
	 */
	function format_ttmmss($seconds) {
		$array = $this->seconds_to_ttmmss($seconds);
		$out = $array['hh'].":".$array['mm'].":".$array['ss'];
		return $out;
	}
	
	/** Formates timestamp(seconds) to string mm:ss
	 *
	 * @param int $seconds
	 * @return string
	 */
	function format_mmss($seconds) {
		$array = $this->seconds_to_ttmmss($seconds);
		$out = $array['mm'].":".$array['ss'];
		return $out;
	}
	
}
?>