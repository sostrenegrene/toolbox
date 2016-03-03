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
		$pos->set_Input("store_id",$getset->header("store_dbid"));
		$pos->set_Input("pos_num",$getset->header("pos_num"));
		$pos->set_Input("terminal_id",$getset->header("terminal_id"));
		$pos->set_Input("teamviewer_user",$getset->header("teamviewer_user"));
		$pos->set_Input("teamviewer_pass",$getset->header("teamviewer_pass"));
		$pos->set_Input("terminal_model",$getset->header("terminal_model"));
		$pos->set_Input("terminal_software",$getset->header("terminal_software"));
		$pos->set_Input("terminal_software_version",$getset->header("terminal_software_version"));
		$pos->set_Input("terminal_software_registered",$getset->header("terminal_software_registered"));
		$pos->set_Input("monitor_installed",$getset->header("monitor_installed"));
		
		$pos->save_POS();
		break;
		
	case FORM_ACTION_DELETE:
		$pos->delete_POS($getset->header("delete_id"));
		break;
}


require_once __DIR__.'/create.php';

require_once __DIR__.'/list.php';
?>