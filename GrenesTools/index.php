<?php
session_start();

require_once 'system/config/config.php';

require_once 'system/sys_lib/getset.php';
require_once 'system/sys_lib/mysql.php';

require_once 'system/includes/Menus.class.php';
require_once 'system/includes/Modules.class.php';

$getset = new GetSet();
$db 	= new MySQL(DB_HOST, DB_USER, DB_PASS, DB_DB);

//Save "load" id to session
$getset->setSession("load",$getset->header("load"));

//Create menus. Load with level 0
$sys_menu = new Menus($db,0);
$sys_mods = new Modules($db,$getset->header("load"));

//print_r($mods->modules());
?>


<!-- INCLUDE HEAD/MENU -->
<?php require_once 'system/layout/head.php'; ?>

<!-- BODY(module loader) -->
<?php require_once 'system/layout/body.php'; ?>

<!-- INCLUDE FOOT -->
<?php require_once 'system/layout/foot.php'; ?>