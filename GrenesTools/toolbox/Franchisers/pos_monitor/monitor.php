<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';
require_once __DIR__.'/../sys/Countries.class.php';
		
$country = new Countries($db);
$stores = new Stores($db,0,0);

foreach($country->get_All() as $cItem) {
	$sItems = $stores->get_FromCountry($cItem['id']);
	if ($sItems != null) {
?>

	<div class="container">
		<?php foreach($sItems as $i=>$sItem) { require 'store.php'; } ?>
 	</div>
 	
<? } } ?>