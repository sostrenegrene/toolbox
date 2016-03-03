<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Countries.class.php';

$franc = new Franchisers($db);
$franc->set_FranchiserID($getset->header("id"));

$country = new Countries($db);

$getset->setStandardValue("id","0");//ensures id is always set with some value

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$franc->set_InputValue("franchiser",$getset->header("franchiser"));
		$franc->set_InputValue("country_id",$getset->header("country_id"));
		$franc->set_InputValue("email",$getset->header("email"));
		$franc->set_InputValue("phone_number",$getset->header("phone_number"));
		$franc->save_Franchiser();
		break;
		
	case FORM_ACTION_DELETE:
		$franc->delete_Franchiser($getset->header("delete_id"));
		break;
	
}

require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>