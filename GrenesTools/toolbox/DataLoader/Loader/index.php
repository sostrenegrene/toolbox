<?php
require_once __DIR__.'/../sys/StoresDataLoader.class.php';

$sdl = new StoresDataLoader($db);
//$all = $sdl->get_All();
$all = $sdl->search("store_id","103");

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