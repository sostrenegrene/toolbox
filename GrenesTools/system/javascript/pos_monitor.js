var POSMonitor = function() {
	
	var interval;
	
	var updateLoc = function() {
		var time = 60*1000;//Update every minute
		
		interval = setInterval(function() {
			location.reload();
		},time);
		
	}
	
	this.update = function() {
		updateLoc();
	}
	
}