<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);
$getset->setStandardValue("exact_search",false);

switch($getset->header(FORM_ACTION)) {

	case FORM_ACTION_SAVE."_store":
		require_once __DIR__.'/edit/save_store.php';
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		break;
		
	case FORM_ACTION_SAVE."_pos":
		require_once __DIR__.'/edit/save_pos.php';
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		break;
	
	case FORM_ACTION_CREATE:
		$result = $sdl->search_Store( "", "" );
		break;
		
	case FORM_ACTION_DELETE."_store":
		$sdl->delete_Store($getset->header("id"));
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		$result = null;
		break;
		
	case FORM_ACTION_DELETE."_pos":
		$sdl->delete_POS($getset->header("id"));
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );		
		break;
		
	case FORM_ACTION_SEARCH."stores":
		$result = $sdl->search_Store( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );		
		break;
		
	case FORM_ACTION_SEARCH."franchisers":
		$result = $sdl->search_Franchiser( $getset->header("value") );
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