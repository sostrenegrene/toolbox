<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';

//Ensures that id always has a value
$getset->setStandardValue("id","0");

//$franc = new Franchisers($db,$getset->header("franchiser_id"));
//$stores = new Stores($db,$getset->header("id"));
$pos = new POS($db);

print json_encode($pos->get_FromTerminalId($getset->header("terminal_id")));
//print json_encode( $stores->get_One($getset->header("store_id")) ); 
?>