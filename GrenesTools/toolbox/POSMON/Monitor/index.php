<?php
$stores = new StoresDataLoader($db);

$sList = $stores->get("store_id","");
//print_r($sList);
?>

<style type="text/css">

</style>

<?php
foreach($sList as $store) {	
	
	if ( ($store->get("monitor") != null) && ($store->get("monitor") > 0)) {		
		require 'pos.php';
	}
}
?>

<div class="streamer container">
<?php require_once 'messages.php'; ?>
</div>