<?php
require_once 'system/config/config.php';
require_once 'system/sys_lib/getset.php';
require_once 'system/sys_lib/mssql.class.php';

require_once 'system/includes/system/POS_API.class.php';

$getset = new GetSet();
$db 	= new MS_SQL(DB_HOST, DB_USER, DB_PASS, DB_DB);

//Handles a new request
//Data in header is store_id=int & pos_num=int
new POS_API($db,$getset);
?>

<?php $db->close_conn(); ?>