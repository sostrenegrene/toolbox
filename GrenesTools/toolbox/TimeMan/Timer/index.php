<?php
require_once __DIR__.'/../sys/tManProject.class.php';
require_once __DIR__.'/../sys/tManTimer.class.php';
//Index file for TimeMan/Timer

$getset->setSession("id", $getset->header("id"));
$getset->setSession("project_id", $getset->header("project_id"));
$getset->setSession("user_email", $getset->header("user_email"));

$pman = new tManagerProject($db,$getset->header("project_id"));
$tman = new tManagerTimer($db,$getset->header("id"));

require_once __DIR__.'/includes/actions.php';

switch($getset->header("project_id")) {
	
	case null:
		require_once __DIR__.'/includes/select.php';
		break;
	
	case "null":
		require_once __DIR__.'/includes/select.php';
		break;
	
	default:
		require_once __DIR__.'/includes/timer.php';
		break;
}
?>