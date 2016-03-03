<?php
require_once __DIR__.'/../sys/Countries.class.php';
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';

//Ensures that id always has a value
$getset->setStandardValue("id","0");

$country = new Countries($db);
$franc = new Franchisers($db,$getset->header("franchiser_id"));
$stores = new Stores($db,$getset->header("id"));

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$stores->set_Input("franchiser_id",$getset->header("franchiser_id"));
		$stores->set_Input("store_id",$getset->header("store_id"));
		$stores->set_Input("name",$getset->header("store_name"));
		$stores->set_Input("address",$getset->header("address"));
		$stores->set_Input("city",$getset->header("city"));
		$stores->set_Input("zipcode",$getset->header("zipcode"));
		$stores->set_Input("store_email",$getset->header("store_email"));
		$stores->set_Input("store_phone",$getset->header("store_phone"));
		$stores->set_Input("manager",$getset->header("manager"));
		$stores->set_Input("manager_phone",$getset->header("manager_phone"));
		$stores->set_Input("organization_number",$getset->header("organization_number"));
		$stores->set_Input("bax",$getset->header("bax"));
		$stores->set_Input("tof",$getset->header("tof"));
		$stores->set_Input("cvr",$getset->header("cvr"));
		$stores->set_Input("forretnings_nummer",$getset->header("forretnings_nummer"));
		$stores->set_Input("country_id",$getset->header("country"));
		
		$stores->save_Store();
		break;
		
	case FORM_ACTION_DELETE:
		$stores->delete_Store($getset->header("delete_id"));
		break;
	
}

require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>