<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);

switch($getset->header(FORM_ACTION)) {

	case FORM_ACTION_SEARCH:
		$result = $sdl->search( $getset->header("search"), $getset->header("value") );		
		break;

	default:
		$result = null;
		break;
}

//Make sure result has anything
if ($result != null) {
	foreach($result as $store) {
		require __DIR__.'/store_view.php';
	}
}//ENd foreach/if 
?>