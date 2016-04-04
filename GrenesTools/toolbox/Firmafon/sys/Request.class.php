<?php

class Request {
	
	var $token;
	var $url;
	
	function __construct($token,$url) {
		$this->token = $token;
		$this->url = $url;
	}
	
	/** Send auth request with post
	 *
	 * @return String
	 */
	private function send_get($type) {
		//open connection
		$ch = curl_init();			
		
		$headers = array('Content-type: application/json');
		
		//set the url and headers for get request
		curl_setopt($ch,CURLOPT_URL, $this->url.$type."?access_token=".$this->token);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		//Suppress browser output and get data from method return
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			
		//execute GET and get data
		$out = curl_exec($ch);
	
		//close connection
		curl_close($ch);
	
		return $out;
	}
	
	public function get($type) {
		$d = json_decode( $this->send_get($type), true );
		
		return $d;
	}
	
}

?>