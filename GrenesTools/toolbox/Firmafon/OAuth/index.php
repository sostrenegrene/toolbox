<?php
//print "<a href=\"https://app.firmafon.dk/api/v2/authorize?client_id=26e6e84ff4cdf32055a6c31e7e81c9a2f47b322c5d3e31e3c81e2998277d724d&response_type=code&redirect_uri=http://mudlogic.dk/Apps/auth.php\">Fetch Firmafon</a>";
print "<a href=\"https://app.firmafon.dk/api/v2/authorize?client_id=".APPLICATION_ID."&response_type=code&redirect_uri=http://posapi.grenes.dk/auth.php\">Auth Firmafon</a>";

/*
require_once __DIR__.'/../sys/OAuth.class.php';

//New OAuth with received request code
$oauth = new OAuth($getset->header("code"));
//URL to request auth token
$oauth->authURL('https://app.firmafon.dk/api/v2/token');
//URL for auth callback
$oauth->callbackURL("http://mudlogic.dk/Apps/Firmafon/auth.php");
//Client/App ID
$oauth->appID('26e6e84ff4cdf32055a6c31e7e81c9a2f47b322c5d3e31e3c81e2998277d724d');
//App secret
$oauth->secret('dba9353aa52b0343ff0260ac6a0766ec5b0d06f66c7605fc34a4f1c6a5853d83');

$request_mod = $sys_mods->get_Unassigned("Request");

//Send auth request
if ( $oauth->auth() ) {
	//print "Success!";
	$url = "load=".$request_mod['id']."&token=".$oauth->get_token();
	print "<script type=\"text/javascript\">inget.view_LoadHREF('".$url."');</script>";
	//header("Location: main.php?token=".$oauth->get_token());
}
else {
	//print "Nooo..!";
	$oauth->message();
}
*/	
?>