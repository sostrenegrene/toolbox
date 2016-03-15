<?php
$stores->set_Input("franchiser_id",$getset->header("franchiser_id"));
$stores->set_Input("store_id",$getset->header("store_id"));
$stores->set_Input("country_id",$getset->header("country_id"));
$stores->set_Input("name",$getset->header("name"));

$stores->set_Input("address",$getset->header("address"));
$stores->set_Input("city",$getset->header("city"));
$stores->set_Input("zipcode",$getset->header("zipcode"));

$stores->set_Input("delivery_address",$getset->header("delivery_address"));
$stores->set_Input("delivery_city",$getset->header("delivery_city"));
$stores->set_Input("delivery_zipcode",$getset->header("delivery_zipcode"));

$stores->set_Input("store_email",$getset->header("store_email"));
$stores->set_Input("store_phone",$getset->header("store_phone"));
$stores->set_Input("manager",$getset->header("manager"));
$stores->set_Input("manager_phone",$getset->header("manager_phone"));

$stores->set_Input("organization_number",$getset->header("organization_number"));
$stores->set_Input("bax",$getset->header("bax"));
$stores->set_Input("tof",$getset->header("tof"));
$stores->set_Input("cvr",$getset->header("cvr"));
$stores->set_Input("forretnings_nummer",$getset->header("forretnings_nummer"));

if ($sys_users->hasAccess("User")) {  $stores->save_Store( $getset->header("id") ); }
?>