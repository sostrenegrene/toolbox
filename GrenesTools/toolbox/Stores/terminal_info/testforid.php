<?php
require_once '../../../system/config/config.php';
require_once '../../../system/sys_lib/getset.php';
require_once '../../../system/sys_lib/mysql.php';
require_once '../../terminal_info/TerminalInfo.class.php';

$getset = new GetSet();
$db 	= new MySQL(DB_HOST, DB_USER, DB_PASS, DB_DB);
$term 	= new TerminalInfo($db,0);

if ($term->has_TermID($getset->header("terminal_id")) != null) { $a['unique'] = "No"; }
else { $a['unique'] = "Yes"; }
print json_encode( $a );
?>