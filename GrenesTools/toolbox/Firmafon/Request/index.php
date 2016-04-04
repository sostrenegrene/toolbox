<?php
require_once __DIR__.'/../sys/Request.class.php';
require_once __DIR__.'/../sys/RequestHandler.class.php';

$getset->setSession("token",$getset->header("token"));

$req = new RequestHandler($getset->header("token"),FIRMAFON_API_URL);

$myself = $req->get_Myself();

if (!empty($myself)) { require_once 'request.php'; }
else { print "<a href=\"https://app.firmafon.dk/api/v2/authorize?client_id=".APPLICATION_ID."&response_type=code&redirect_uri=".FIRMAFON_CALLBACK_URL."\">Authenticate thyself</a>"; }
?>

YAY