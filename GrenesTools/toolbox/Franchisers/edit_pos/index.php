<?php
require_once __DIR__.'/../sys/POS.class.php';
require_once __DIR__.'/../sys/Stores.class.php';

//Ensures that id always has a value
$getset->setStandardValue("id","0");
$getset->setStandardValue("store_dbid","0");

$stores = new Stores($db,$getset->header("store_dbid"));

$pos = new POS($db,$getset->header("id"));

switch($getset->header(FORM_ACTION)) {
	case FORM_ACTION_SAVE:
		$pos->save_POS($getset->header("store_dbid"),
					$getset->header("pos_num"),
					$getset->header("terminal_id"),
					$getset->header("teamviewer_user"),
					$getset->header("teamviewer_pass"),
					$getset->header("terminal_model"),
					$getset->header("terminal_software"),
					$getset->header("terminal_software_version"),
					$getset->header("terminal_software_registered"));
		break;
		
	case FORM_ACTION_DELETE:
		$pos->delete_POS();
		break;
}


require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>