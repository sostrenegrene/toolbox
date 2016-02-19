<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';
		
$stores = new Stores($db,0,0);
$sItems = $stores->get_All();
//print_r($sItems);
if ($sItems != null) {
?> 
	<div class="monitor-block"> 
<?php 
	foreach($sItems as $i=>$sItem) {				
		require 'store.php';
	}
?> 
	</div> 
<?php } ?>