var InputGetter = function() {
	
	this.keyUp = function(id,callback) {
		$("#"+id).keyup(function() {
			var val = $(this).val();
			callback(val);
		});
	}
	
}