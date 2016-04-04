<?php

class OAuth {
	
	var $app_id;//firmafon app id
	var $secret;//Firmafon secret
	var $auth_url;//Auth url
	var $callback_url;//Auth callback url
	
	var $request_token;//First request token from firmafon
	var $token;//Access token from firmafon(after successfull login)
	var $fields;//POST fields for auth
	
	var $msg = "";
	
	function __construct($token) {
		
		$this->app_id 		= null;
		$this->secret 		= null;
		$this->auth_url 	= null;
		$this->callback_url = null;		
		
		$this->fields = array();
		$this->request_token = $token;
		$this->token = null;
		
	}
	
	/** Tests if auth values has been provided
	 * 
	 *  @return bool
	 */
	private function hasValues() {
		$out = true;
		
		if ($this->auth_url == null) {
			$this->msg .= "No Auth URL provided!<br>";
				
			$out = false;
		}
		
		if ($this->app_id == null) {
			$this->msg .= "No App ID provided!<br>";
			
			$out = false;
		}		
		
		if ($this->secret == null) {
			$this->msg .= "No secret provided!<br>";
				
			$out = false;
		}
		
		if ($this->callback_url == null) {
			$this->msg .= "No callback URL provided!<br>";
				
			$out = false;
		}
		
		return $out;
	}
	
	private function makeFields() {
		$fields_string = "";
		
		
		$fields = array(
				'client_id' => urlencode($this->app_id),
				'client_secret' => urlencode($this->secret),
				'grant_type' => urlencode("authorization_code"),
				'redirect_uri' => urlencode($this->callback_url),
				'code' => urlencode($this->request_token)
		);
		
		//url-ify the data for the POST
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');		
		
		$f['string'] = $fields_string;
		$f['length'] = count($fields);
		
		return $f;
	}
	
	/** Send auth request with post
	 * 
	 * @return String
	 */
	private function get_AuthToken($fields) {
		//open connection
		$ch = curl_init();
			
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $this->auth_url);
		curl_setopt($ch,CURLOPT_POST, $fields['length']);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields['string']);
		//Suppress browser output and get data from method return
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			
		//execute post and get data
		$out = curl_exec($ch);
		
		//close connection
		curl_close($ch);
		
		return $out;
	}
	
	public function authURL($url) {
		$this->auth_url = $url;
	}
	
	public function appID($id) {
		$this->app_id = $id;
	}
	
	public function secret($secret) {
		$this->secret = $secret;
	}
	
	public function callbackURL($url) {
		$this->callback_url = $url;
	}
	
	public function auth() {
		$out = false;
		
		if ($this->hasValues()) {
			$fields = $this->makeFields();

			$this->token = $this->get_AuthToken($fields);
			$this->token = json_decode( $this->token, true );
			//print_r( $this->access_token );
			
			//If token is set return true
			//If not return auth error message
			if (isset($this->token['access_token'])) {				
				$out = true;
			}
			else {
				$this->msg .= $this->token['error_description'] . "<br>";
				$this->msg .= "<a href=\"index.php\">Try again</a><br>";
			}
			
		}//ENd if	
				
		return $out;
	}
	
	public function get_token() {		
		return $this->token['access_token'];
	}
	
	public function message() {
		print $this->msg;				
	}
	
}
?>