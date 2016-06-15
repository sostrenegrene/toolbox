<?php
switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_CREATE:
		//Start timer
		$tman->add_Input("user_email", $getset->header("user_email"));
		$tman->add_Input("project_id", $getset->header("project_id"));
		$id = $tman->start_Timer();
		$getset->setSession("id",$id);
		break;
	
	case FORM_ACTION_UPDATE:
		//End timer
		$tman->stop_Timer($getset->header("id"));
		break;
		
	default:
		//Do nothing
		break;
}
?>