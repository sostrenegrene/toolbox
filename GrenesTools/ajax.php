<?php
require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';

require_once 'system/sys_lib/mssql.class.php';

require_once 'system/includes/Menus.class.php';
require_once 'system/includes/Modules.class.php';

$getset = new GetSet();
$db 	= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);

//Create menus. Load with level 0
$sys_menu = new Menus($db,0);
$sys_mods = new Modules($db,0);
$modItem = $sys_mods->get_FromId($getset->header("load"));

$modPath = 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];

//Test for file
//Dump err message if not found.
if (is_file($modPath)) { require_once $modPath; }
elseif($getset->header("phpinfo") != null) { print phpinfo(); }
else { 
	print "Module not found! [".$modPath."]";
	
}
?>

<?php $db->close_conn(); ?>