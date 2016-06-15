<?php
switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:		
		//Set input for save action
		$tman->add_Input("name", $getset->header("name"));
		$tman->add_Input("manager_email", $getset->header("manager_email"));
		
		$tman->save_Project($getset->header("id"));
		break;
		
	case FORM_ACTION_DELETE:
		$tman->delete_Project($getset->header("delete_id"));
		break;
		
	default:
		break;
	
}
?>