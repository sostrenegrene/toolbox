var view_Loader = function(headers) {

	var h = headers;
	
	this.view_LoadFromSearch = function(id,output_id) {
		output_id = "#" + output_id;
		
		inget.keyUp(id,function(data) {
			console.log(data);
			var urlVal = h +"&"+ data;
			ajaxr.load(urlVal,function(data) {
				$(output_id).html( data );
			});
			
		});
	}

	this.view_LoadFromHeader = function(output_id,data) {
		output_id = "#" + output_id;
		var urlVal = h + "&"+data;
		ajaxr.load(urlVal,function(data) {
			$(output_id).html( data );
		});
	}
	
	
	
};