<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);

switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SEARCH."_id":
		$all = $sdl->search("store_id", $getset->header("store_id") );
		break;
		
	case FORM_ACTION_SEARCH."_name":
		$all = $sdl->search("name", $getset->header("name") );
		break;
		
	case FORM_ACTION_SEARCH."_city":
		$all = $sdl->search("city", $getset->header("city") );
		break;
	
	default:
		$all = $sdl->search("store_id", "" );
		break;
}



?>

<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>_id">
	<input type="text" name="store_id" placeholder="Search Store ID">
</form>

<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>_name">
	<input type="text" name="name" placeholder="Search Store name">
</form>

<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>_city">
	<input type="text" name="city" placeholder="Search City">
</form>



<?php 
print "<pre>";
//print $all[0]->franchiser("franchiser");
//print $all[0]->store("name");
//print $all[0]->pos(0,"terminal_id");

print "</pre>";

foreach($all as $i=>$item) {
	
	print $item->franchiser("franchiser")."<br>";
	print $item->store("store_id")."-".$item->store("name")."<br>";
	
	for($i=0; $i<$item->pos_Count(); $i++) {
		print $item->pos($i,"pos_num") . " - " . $item->pos($i,"pos_online")."<br>";
	}
	
	//print "<pre>";
	//print_r($item);
	//print "</pre>";
	print "<br>";

}

?>