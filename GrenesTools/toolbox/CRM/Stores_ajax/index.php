<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);

switch($getset->header(FORM_ACTION)) {

	case FORM_ACTION_SEARCH."stores":
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value") );		
		break;
		
	case FORM_ACTION_SEARCH."franchisers":
		$result = $sdl->search_Franchiser( $getset->header("value") );
		break;

	case FORM_ACTION_CREATE:
		$result = $sdl->search_Store( "", "" );
		break;
		
	default:
		$result = array();
		break;
}

//Make sure result has anything
if ($result != null) {
	foreach($result as $store) {
		require __DIR__.'/views/store_view.php';
	}
}//ENd foreach/if 
?>