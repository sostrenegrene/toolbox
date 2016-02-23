<?php
session_start();

require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';

require_once 'system/sys_lib/mssql.class.php';

require_once 'system/includes/Menus.class.php';
require_once 'system/includes/Modules.class.php';

$getset = new GetSet();
$db 	= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);

//Set layout standard value
$getset->setStandardValue("layout","main");

//Save "load" id and layout to session
$getset->setSession("load",$getset->header("load"));
$getset->setSession("layout",$getset->header("layout"));

//Create menus. Load with level 0
$sys_menu = new Menus($db,0);
$sys_mods = new Modules($db,$getset->header("load"));

//print_r($sys_menu->menu());
//$query = "UPDATE " . TABLE_GRENES_STORES . " SET country_id = '1'";
//$db->query($query);
//print $db->error();
?>


<!-- INCLUDE HEAD/MENU -->
<?php require_once 'system/layout/'.$getset->header("layout").'/head.php'; ?>

<!-- BODY(module loader) -->
<?php require_once 'system/layout/'.$getset->header("layout").'/body.php'; ?>

<!-- INCLUDE FOOT -->
<?php require_once 'system/layout/'.$getset->header("layout").'/foot.php'; ?>