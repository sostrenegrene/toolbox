<?php

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$sys_users->create($getset->header("username"), $getset->header("password"), $getset->header("level"),$getset->header("id"));
		break;
	
	case FORM_ACTION_DELETE:
		$sys_users->delete_User($getset->header("delete_id"));
		break;
}



require_once __DIR__.'/views/edit.php';
require_once __DIR__.'/views/list.php';
?>