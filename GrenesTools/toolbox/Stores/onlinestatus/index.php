<?php
require_once 'OnlineStatus.class.php';

$status = new OnlineStatus($db);

$store_id = $getset->header("store_id");
$pos_id = $getset->header("pos_id");
$txt = $getset->header("txt");
$status->set_Status($store_id, $pos_id);


print "You sent store_id: ".$store_id." - pos_id: ".$pos_id . "<br>\n";
print "You also sendt additional text: ".$txt;
?>