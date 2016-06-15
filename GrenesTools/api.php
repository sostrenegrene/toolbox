<?php
require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';
require_once 'system/sys_lib/mssql.class.php';
require_once 'system/includes/system/Menus.class.php';
require_once 'system/includes/system/Modules.class.php';
require_once 'system/includes/system/MessageFactory.class.php';
require_once 'system/includes/system/POS_API.class.php';
require_once 'system/includes/crm/StoresDataLoader.class.php';

define("API_TYPE_JSON","json");

$getset = new GetSet();
$db 	= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);
$sys_mods = new Modules($db,0);

//Handles a new request
//Data in header is store_id=int & pos_num=int
switch($getset->header("type")) {
	case API_TYPE_JSON:	
		$modItem = $sys_mods->get_Unassigned($getset->header("load"));		
		$modPath = 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];
		
		//Test for file
		//Dump err message if not found.
		if (is_file($modPath)) { require_once $modPath; }		
		else { print "Module not found![".$getset->header("load")."][".$modPath."]"; }
		break;
	
	default:
		new POS_API($db,$getset);		
		break;
}
?>

<?php $db->close_conn(); ?>