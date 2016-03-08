<?php
require_once __DIR__.'/../sys/MenuAdmin.class.php';

$amenu = new MenuAdmin($db,$sys_menu);

//Sets a standard value for sub_id if none is provided by form
$getset->setStandardValue("sub_id", "0");
switch($getset->header( FORM_ACTION )) {
	//Create new menu
	case FORM_ACTION_SAVE:
		$amenu->set_Input("sub_id",$getset->header("sub_id"));
		$amenu->set_Input("name",$getset->header("menu_name"));
		$amenu->set_Input("level",$getset->header("level"));
		
		$amenu->make_Menu();
		break;
		
	//Delete menu
	case FORM_ACTION_DELETE:
		$amenu->delete($getset->header("delete_id"));
		break;
		
	case FORM_ACTION_UPDATE:
		$amenu->set_Input("name",$getset->header("menu_name"));
		$amenu->set_Input("level",$getset->header("level"));
		$amenu->update_Menu($getset->header("id"));
		break;
		
	default:
		//Do nothing
		break;
}

///////////////////////////////////

$levels = "";//TODO
$opts = $amenu->make_SelectOptStr();
$subSelect = $opts['sub_menu'];
$menuSelect = $opts['main_menu'];

//Include the varius option forms
require_once __DIR__.'/create.php';
require_once __DIR__.'/delete.php';
require_once __DIR__.'/update.php';
?>