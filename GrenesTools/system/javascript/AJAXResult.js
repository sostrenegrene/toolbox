/** Does calls to a selected file throug ajax with jquery
*
*
**/

var AJAXResult = function() {
	
	var error = function(err) {
		console.log(err);
	}
	
	var query = function(url_values,callback) {
		console.log("Query");
		
		$.ajax({
			   url: url_values,
			   data: {
			      format: 'json'
			   },
			   error: function(e) {
			      error(e);
			   },
			   dataType: 'jsonp',
			   complete: function(data) {
			      console.log("Success! Starting callback");
				   callback(data.responseText);
			   },
			   type: 'GET'
			});		
	}
	
	this.load = function(url_values,callback) {
		query( url_values,callback );
	}
	
}