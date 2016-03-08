<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);

switch($getset->header(FORM_ACTION)) {

	case FORM_ACTION_SEARCH:
		$result = $sdl->search_Store( "id", $getset->header("id") );		
		break;
		
	default:
		$result = null;
		break;
}

//Make sure result has anything
if ($result != null) {
	$store = $result[0];
	
	require __DIR__.'/store_view.php';
	
}//ENd foreach/if 
?>