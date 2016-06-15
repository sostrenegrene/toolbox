var JSTime = function() {
	
	/** Converts timestamp(seconds) to array of hh,mm,ss
	 * 
	 * @param int $seconds
	 * @return array
	 */
	this.seconds_to_ttmmss = function(seconds) {
		var out = {hh:"00",mm:"00",ss:"00"};
		
		var hours = floor(seconds / 3600);
		var minutes = floor((seconds - ($hours * 3600)) / 60);
		seconds = seconds - (hours * 3600) - (minutes * 60);
		if (hours < 10) { hours = "0".hours; }
		if (minutes < 10) { minutes = "0".minutes; }
		if (seconds < 10) { seconds = "0".seconds; }
		out.hh = hours;
		out.mm = minutes;
		out.ss = seconds;
		
		return out;
	}
	
	/** Formates timestamp(seconds) to string hh:mm:ss
	 * 
	 * @param int $seconds
	 * @return string
	 */
	this.format_ttmmss = function(seconds) {
		var array = this.seconds_to_ttmmss(seconds);
		var out = array.hh + ":" array.mm + ":" + array.ss;
		return out;
	}
	
	/** Formates timestamp(seconds) to string mm:ss
	 *
	 * @param int $seconds
	 * @return string
	 */
	this.format_mmss = function(seconds) {
		var array = this.seconds_to_ttmmss(seconds);
		var out = array.mm + ":" + array.ss;
		return out;
	}
	
}