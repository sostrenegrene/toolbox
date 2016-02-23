<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Countries.class.php';

$franc = new Franchisers($db,$getset->header("id"));
$country = new Countries($db);

$getset->setStandardValue("id","0");//ensures id is always set with some value

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		/*
		$franc->save_Franchiser(
			$getset->header("franchiser"),
			$getset->header("org_num"),
			$getset->header("bax"),
			$getset->header("tof"),
			$getset->header("cvr"),
			$getset->header("forretnings_nr"));
			*/
		$franc->save_Franchiser($getset->header("franchiser"),$getset->header("country_id"),$getset->header("email"),$getset->header("phone_number"));
		break;
		
	case FORM_ACTION_DELETE:
		$franc->delete_Franchiser();
		break;
	
}

require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>