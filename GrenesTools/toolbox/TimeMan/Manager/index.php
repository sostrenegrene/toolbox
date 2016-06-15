<?php
require_once __DIR__.'/../sys/TimeMan.class.php';
//Index file for TimeMan/Manager

$tman = new TimeMan($db);

// I/O actions
require __DIR__.'/includes/actions.php';

//Make new
require __DIR__.'/includes/edit.php';

//Edit
$prj = $tman->get_Projects();
if ($prj != null) {
	foreach($tman->get_Projects() as $project) {
		$getset->setStandardValue("_id", $project['id']);
		$getset->setStandardValue("_name", $project['name']);
		$getset->setStandardValue("_manager_email", $project['manager_email']);
	
		require __DIR__.'/includes/edit.php';
	}
}
?>