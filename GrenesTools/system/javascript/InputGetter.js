var InputGetter = function() {
	
	this.keyUp = function(id,callback) {
		$(id).keyup(function() {
			var val = $(this).serialize();
			callback(val);
		});
	}
	
	this.submit = function(click_id,form_id,callback) {
		$(id).click(function() {
			var val = $(form_id).serialize();
			callback(val);
		});
	}
	
	this.confirm = function(text,url) {
		if (confirm(text) == true) {
	        location.href = url;
	    } 
	}
	
}