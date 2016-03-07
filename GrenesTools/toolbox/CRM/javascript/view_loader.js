function view_LoadFromSearch(id,output_id,headers) {
	output_id = "#" + output_id;
	
	inget.keyUp(id,function(data) {
		var urlVal = headers + "&value="+data;
		ajaxr.load(urlVal,function(data) {
			$(output_id).html( data );
		});
		
	});
}