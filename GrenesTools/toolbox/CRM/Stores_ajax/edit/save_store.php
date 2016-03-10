<?php
//$stores = new Stores($db,$getset->header("id"));

$sdl->set_Input("franchiser_id",$getset->header("franchiser_id"));
$sdl->set_Input("store_id",$getset->header("store_id"));
$sdl->set_Input("name",$getset->header("name"));
$sdl->set_Input("address",$getset->header("address"));
$sdl->set_Input("city",$getset->header("city"));
$sdl->set_Input("zipcode",$getset->header("zipcode"));
$sdl->set_Input("store_email",$getset->header("store_email"));
$sdl->set_Input("store_phone",$getset->header("store_phone"));
$sdl->set_Input("manager",$getset->header("manager"));
$sdl->set_Input("manager_phone",$getset->header("manager_phone"));
$sdl->set_Input("organization_number",$getset->header("organization_number"));
$sdl->set_Input("bax",$getset->header("bax"));
$sdl->set_Input("tof",$getset->header("tof"));
$sdl->set_Input("cvr",$getset->header("cvr"));
$sdl->set_Input("forretnings_nummer",$getset->header("forretnings_nummer"));
$sdl->set_Input("country_id",$getset->header("country_id"));

$sdl->save_Store( $getset->header("id") );
?>