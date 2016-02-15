var FranchiserDetails = function() {
	
	var hide = function() {
		$(".franchiser-store-details").hide();
	}
	
	this.show = function(id) {
		hide();
		$("#"+id).show();
	}
	
}