CLConfig = {};

var ContentLoader = function() {		
	
	var load = function() {		
		var url = CLConfig.file +"?"+ CLConfig.load;
		
		ajaxr.load(url,function(data) {			
			console.log("Loading...");			
			$(CLConfig.bodyID).html(data);
		});
		
		clearInterval( CLConfig.timerInterval );
		timer();
	}
	
	var reload = function() {
		
		CLConfig.reloadInterval = setInterval(function() {
			load();
		},( CLConfig.reloadTimer*1000) );
		
	}
	
	var timer = function() {
		var usedT = 0;
		
		$(CLConfig.timerBody).attr("style","width:0%;");
		//$(CLConfig.timerBody).html("Reloading...");
		
		CLConfig.timerInterval = setInterval(function() {
			var total = CLConfig.reloadTimer - usedT;
			
			//$(CLConfig.timerBody).html(total);
			var width = mathhelper.percentage(usedT,CLConfig.reloadTimer);
			$(CLConfig.timerBody).attr("style","width:"+width+"%");
			
			usedT++;
		},1000);
		
	}
	
	this.get = function() {
		load();
		
		reload();
	}
}