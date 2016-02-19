<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';

//Ensures that id always has a value
$getset->setStandardValue("id","0");

$franc = new Franchisers($db,$getset->header("franchiser_id"));
$stores = new Stores($db,$getset->header("id"));

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$stores->save_Store($getset->header("franchiser_id"),
							$getset->header("store_id"),
							$getset->header("store_name"),
							$getset->header("address"),
							$getset->header("city"),
							$getset->header("zipcode"),
							$getset->header("organization_number"),
							$getset->header("bax"),
							$getset->header("tof"),
							$getset->header("cvr"),
							$getset->header("forretnings_nummer"),
							$getset->header("country"));
		break;
		
	case FORM_ACTION_DELETE:
		$stores->delete_Store();
		break;
	
}

require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>