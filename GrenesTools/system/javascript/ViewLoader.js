var viewLoader = function() {

	var header
	
	var set_Header = function(h) {
		header = h
	}
	
	this.view_LoadFromSearch = function(id,output_id) {
		output_id = "#" + output_id;
		
		inget.keyUp(id,function(data) {
			console.log(data);
			var urlVal = header +"&"+ data;
			ajaxr.load(urlVal,function(data) {
				$(output_id).html( data );
			});
			
		});
	}

	this.view_LoadFromHeader = function(output_id,data) {
		output_id = "#" + output_id;
		var urlVal = header + "&"+data;
		ajaxr.load(urlVal,function(data) {
			$(output_id).html( data );
		});
	}
	
	this.view_Submit = function(click_id,form_id) {
		inget.submit(click_id,form_id,function(data) {
			location.href = data;
		});
	}
	
	this.view_LoadHREF = function(url) {
		location.href = url;
	}
};

/** Loads content with ajax
 * from load_file
 * 
 */
var ContentLoader = function(load_file) {
	
	var baseTime = 1000;
	var interval;
	
	var file = load_file;
	var headers = "";
	var output_id = "";
	
	/** Sets the header values for next load call
	 * 
	 * @param string h
	 */
	this.headers = function(h) {
		headers = h;
	}
	
	this.toID = function(id) {
		output_id = id;
	}
	
	/** Loads the selected content
	 * 
	 * @param int id
	 */
	this.load = function() {		
		output_id = "#" + output_id;
		
		if (headers !== "") { headers = "?" + headers; }
		var url = file + headers;
		
		ajaxr.load(url,function(data) {
			$(output_id).html(data);
		});
	}
	
	this.clear = function() {
		this.headers("");
	}
	
	this.reload = function(callback,timer) {
		var time = timer*baseTime;//Update every minute
		
		interval = setInterval(callback(),time);
	}
	
	this.loadTimer = function(total_time) {
		var used_time = 0;
		
		var ti = setInterval(function() {
			$("#updateTimer").html( (total_time - used_time) );
			
			used_time++;
			
			if ( (total_time - used_time) <= 0 ) { clearInterval(ti); }
		},1000);
		
	}
}