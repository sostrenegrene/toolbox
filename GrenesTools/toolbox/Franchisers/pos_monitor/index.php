<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';

$franch = new Franchisers($db,0);
$frachisers = $franch->get_All();
//print_r($frachisers);
if ($frachisers != null) {
	foreach($frachisers as $fItem) {
		//print $fItem['franchiser']."<br>";
		
		$stores = new Stores($db,0,$fItem['id']);		
		$sItems = $stores->get_All();
		print_r($sItems);
		if ($sItems != null) {
			foreach($sItems as $i=>$sItem) {				
				require 'store.php';
			}
		}
	}//End foreach
}//End if
?>