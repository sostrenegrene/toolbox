<?php
require_once 'system/config/constants.php';
require_once 'system/sys_lib/getset.php';
require_once 'system/includes/oauth/OAuth.class.php';

$getset = new GetSet();

//New OAuth with received request code
$oauth = new OAuth($getset->header("code"));
//URL to request auth token
$oauth->authURL('https://app.firmafon.dk/api/v2/token');
//URL for auth callback
$oauth->callbackURL(FIRMAFON_CALLBACK_URL);
//Client/App ID
$oauth->appID(APPLICATION_ID);
//App secret
$oauth->secret(APPLICATION_SECRET);

//Send auth request
if ( $oauth->auth() ) {		
	//print "Success!";
	header("Location: index.php?load=Firmafon&token=".$oauth->get_token());
}
else {
	//print "Nooo..!";
	$oauth->message();
}

?>