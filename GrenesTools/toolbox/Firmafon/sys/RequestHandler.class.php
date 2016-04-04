<?php
class RequestHandler {
	
	var $request;
	
	var $url;
	var $token;
	
	function __construct($token,$url) {
		$this->token 	= $token;
		$this->url 		= $url;
		$this->request 	= new Request($token,$url);
	}
	
	function get_Myself() {
		return $this->request->get("employee");
	}
	
	function get_Employees() {
		return $this->request->get("employees");
	}
	
	
}
?>