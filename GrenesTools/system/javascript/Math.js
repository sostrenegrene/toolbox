var MathHelper = function() {
	
	/** Get a% of b
	 *
	 * @param a double
	 * @param b double
	 * @return double
	 */
	this.percentage = function(a,b) {
	    var out = ((a * 100) / b);

	    return out;
	}	
	
}

var mathhelper = new MathHelper();