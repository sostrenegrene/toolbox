<?php

$pos->set_Input("store_id",$getset->header("store_dbid"));
$pos->set_Input("pos_num",$getset->header("pos_num"));
$pos->set_Input("terminal_id",$getset->header("terminal_id"));
$pos->set_Input("teamviewer_user",$getset->header("teamviewer_user"));
$pos->set_Input("teamviewer_pass",$getset->header("teamviewer_pass"));
$pos->set_Input("terminal_model",$getset->header("terminal_model"));
$pos->set_Input("terminal_software",$getset->header("terminal_software"));
$pos->set_Input("terminal_software_version",$getset->header("terminal_software_version"));
$pos->set_Input("terminal_software_registered",$getset->header("terminal_software_registered"));
$pos->set_Input("monitor_note",$getset->header("monitor_note"));
$pos->set_Input("pos_note",$getset->header("pos_note"));
$pos->set_Input("terminal_note",$getset->header("terminal_note"));

if ($sys_users->hasAccess("User")) { $pos->save_POS($getset->header("id")); }
?>