<?php
require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';

require_once 'system/sys_lib/mssql.class.php';

require_once 'system/includes/system/Menus.class.php';
require_once 'system/includes/system/Modules.class.php';

require_once 'system/includes/system/SendMail.class.php';
require_once 'system/includes/system/MessageFactory.class.php';

require_once 'system/includes/crm/StoresDataLoader.class.php';

$getset = new GetSet();
$db 	= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);

//Create menus. Load with level 0
$sys_menu = new Menus($db,0);
$sys_mods = new Modules($db,0);

//Test if string has been sent as load value
//fint id of load if string
if (!is_numeric($getset->header("load"))) { $load_id = $sys_menu->menuIdByName($getset->header("load")); }
else { $load_id = $getset->header("load"); }

$getset->setSession("load",$load_id);
$modItem = $sys_mods->get_FromId($load_id);

$modPath = 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];

//Test for file
//Dump err message if not found.
if (is_file($modPath)) { require_once $modPath; }
elseif($getset->header("phpinfo") != null) { print phpinfo(); }
else { 
	print "Module not found![".$load_id."][".$modPath."]";
	
}
?>

<?php $db->close_conn(); ?>