<?php
$sdl = new StoresDataLoader($db);
$stores = new Stores($db);
$pos = new POS($db);
$getset->setStandardValue("exact_search",false);

switch($getset->header(FORM_ACTION)) {

	case FORM_ACTION_SAVE."_store":
		require_once __DIR__.'/edit/save_store.php';
		$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		break;
		
	case FORM_ACTION_SAVE."_pos":
		require_once __DIR__.'/edit/save_pos.php';
		$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		break;
	
	case FORM_ACTION_CREATE:
		$result = $sdl->get("","");
		break;
		
	case FORM_ACTION_DELETE."_store":
		$stores->delete_Store($getset->header("delete_id"));
		$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );
		$result = null;
		break;
		
	case FORM_ACTION_DELETE."_pos":
		$pos->delete_POS($getset->header("delete_id"));
		$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );		
		break;
		
	case FORM_ACTION_SEARCH:
		$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );		
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