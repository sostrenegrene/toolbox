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