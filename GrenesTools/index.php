<?php
session_start();

require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';

require_once 'system/sys_lib/mssql.class.php';

require_once 'system/includes/system/Menus.class.php';
require_once 'system/includes/system/Modules.class.php';
require_once 'system/includes/system/Users.class.php';
require_once 'system/includes//system/Settings.class.php';
require_once 'system/includes/system/SendMail.class.php';

require_once 'system/includes/crm/StoresDataLoader.class.php';

$getset 	= new GetSet();
$db 		= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);
$settings 	= new Settings($db);
$settings->load();
$levels		= $settings->group("access_level");

//Set layout standard value
$getset->setStandardValue("layout","main");

//Save "load" id and layout to session
$getset->setSession("layout",$getset->header("layout"));

//Create menus. Load with level 0
$sys_users 	= new Users($db,$getset,$levels);
$sys_menu 	= new Menus($db,$sys_users->level());
$getset->setStandardValue("load", $sys_menu->menuIdByName("CRM"));

//Test if string has been sent as load value
//fint id of load if string
if (!is_numeric($getset->header("load"))) { $load_id = $sys_menu->menuIdByName($getset->header("load")); }
else { $load_id = $getset->header("load"); }

$getset->setSession("load",$load_id);
$sys_mods = new Modules($db,$getset->header("load"));
?>


<!-- INCLUDE HEAD/MENU -->
<?php require_once 'system/layout/'.$getset->header("layout").'/head.php'; ?>

<!-- BODY(module loader) -->
<?php require_once 'system/layout/'.$getset->header("layout").'/body.php'; ?>

<!-- INCLUDE FOOT -->
<?php require_once 'system/layout/'.$getset->header("layout").'/foot.php'; ?>

<?php $db->close_conn(); ?>