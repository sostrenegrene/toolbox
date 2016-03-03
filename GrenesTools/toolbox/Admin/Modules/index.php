<?php
require_once __DIR__.'/../sys/MenuAdmin.class.php';
require_once __DIR__.'/../sys/ModulesAdmin.class.php';

$amenu = new MenuAdmin($db,$sys_menu);
$amods = new ModulesAdmin($db);

//Load data for lists
$opts 		= $amenu->make_SelectOptStr();
$menuSelect = $opts['main_menu'];
$subSelect 	= $opts['sub_menu'];

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$amods->set_Input("menu_id",$getset->header("menu_id"));
		$amods->set_Input("package_folder",$getset->header("package"));
		$amods->set_Input("module_folder",$getset->header("module"));
		$amods->set_Input("module_index",$getset->header("index"));
		$amods->set_Input("module_name",$getset->header("name"));
		//$amods->make_Module($getset->header("menu_id"), $getset->header("package"), $getset->header("module"), $getset->header("index"),$getset->header("name"));
		$amods->make_Module();
		break;
	
	case FORM_ACTION_DELETE:
		$amods->delete_Module($getset->header("delete_id"));
		break;
		
	default:
		//Do nothing
		break;
}

//Include the varius option forms
require_once 'create.php';
require_once 'delete.php';
?>