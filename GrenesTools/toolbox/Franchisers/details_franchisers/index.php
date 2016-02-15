<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';

$franch = new Franchisers($db,0);
$frachisers = $franch->get_All();
//print_r($frachisers);
if ($frachisers != null) {
	foreach($frachisers as $fItem) {
		require 'franchiser.php';
		
		
		
		//TODO Load store details
		
		if ($sItems != null) {
			foreach($sItems as $i=>$sItem) {				
				//TODO Load POS details
			}
		}
	}//End foreach
}//End if
?>