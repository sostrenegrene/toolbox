var POSMonitor = function() {
	
	var interval;
	var baseTime = 1000;
	
	var updateLoc = function() {
		var time = 30*baseTime;//Update every minute
		
		interval = setInterval(function() {
			location.reload();
		},time);
		
	}
	
	this.update = function() {
		updateLoc();
	}
	
	this.reload = function(callback,timer) {
		var time = timer*baseTime;//Update every minute
		
		interval = setInterval(callback(),time);
	}
}