<?php
$sdl = new StoresDataLoader($db);
$stores = new Stores($db);
$pos = new POS($db);
$getset->setStandardValue("exact_search",false);
$getset->setStandardValue("search","store_id");
$getset->setStandardValue("value","%");

$result = $sdl->get( $getset->header("search"), $getset->header("value"),$getset->header("exact_search") );

print json_encode($result);
?>