<?php
$sdl = new StoresDataLoader($db);

switch($getset->header(FORM_ACTION)) {
		
	case FORM_ACTION_SAVE:
		$f = new Franchisers($db);
		
		$f->set_Input("franchiser",$getset->header("franchiser"));
		$f->set_Input("country_id",$getset->header("country_id"));
		$f->set_Input("email",$getset->header("email"));
		$f->set_Input("phone_number",$getset->header("phone_number"));
		$f->set_Input("address",$getset->header("address"));
		$f->set_Input("city",$getset->header("city"));
		$f->set_Input("zipcode",$getset->header("zipcode"));
		
		if ($sys_users->hasAccess("Admin")) { $f->save_Franchiser($getset->header("id")); }		
		break;
		
	case FORM_ACTION_DELETE:
		$f = new Franchisers($db);
		$f->delete_Franchiser($getset->header("delete_id"));
		break;
		
	default:		
		break;
}
$f = $sdl->get_Franchiser("franchiser","");
?>


<?php
require __DIR__.'/views/create.php';

if ($f != null) {
	foreach($f as $item) { require __DIR__.'/views/list.php'; }
}
?>