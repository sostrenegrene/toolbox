var Terminals = function() {
	
	this.has_TermID = function(id) {
		
		$("#"+id).keyup(function() {
			//console.log("keyup");
			var input = $(this).val();
			$.getJSON("toolbox/terminal_info/testforid.php?terminal_id="+input,function(data) {
				var json = tmp(data);	
				console.log(json.unique);
				$("#"+id+"_check").html(json.unique);
			});
		});		
	}	
	
	var tmp = function(data) {
		return data;
	}
}

var terms = new Terminals();