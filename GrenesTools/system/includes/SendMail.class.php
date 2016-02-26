<?php
class SendMail {
	
	var $headers;
	var $subject;
	var $message;
	var $recipients;
	
	function __construct() {		
		$this->headers = "";
		$this->recipients = array();
		
		//Set content type headers
		$this->headers = "MIME-Version: 1.0\r\n";
		$this->headers .= "Content-type: text/html; charset=UTF-8\r\n";		
	}
	
	function add_recipient($name,$email) {
		$a['name'] = $name;
		$a['email'] = $email;
		
		$this->recipients[] = $a;
	}
	
	function message($subject,$message) {
		$this->subject = $subject;
		$this->message = $message;
	}
	
	function send() {
		
		$to = "";
		foreach($this->recipients as $i=>$r) {
			if ($i>0) { $to .= ","; }
			$to .= $r['name']."<".$r['email'].">";
		}
		$this->headers .= "To: " . $to . "\r\n";
		$this->headers .= "From: Toolbox <soren.pedersen@sostrenegrene.com>\r\n";
		
		mail($to,$this->subject,$this->message,$this->headers);		
	}
	
}
?>