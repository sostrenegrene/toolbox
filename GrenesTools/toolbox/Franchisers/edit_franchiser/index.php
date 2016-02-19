<?php
require_once __DIR__.'/../sys/Franchisers.class.php';

$franc = new Franchisers($db,$getset->header("id"));

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
		$franc->save_Franchiser($getset->header("franchiser"),$getset->header("email"),$getset->header("phone_number"));
		break;
		
	case FORM_ACTION_DELETE:
		$franc->delete_Franchiser();
		break;
	
}

require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>