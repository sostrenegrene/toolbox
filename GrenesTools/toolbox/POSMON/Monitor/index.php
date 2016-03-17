<?php
$stores = new StoresDataLoader($db);

$sList = $stores->get("store_id","");
//print_r($sList);
?>

<style type="text/css">
.monitor-table {
	width:5em;
	border:1px solid;
	font-weight:bold;
	text-align:center;
	margin:1px;
	padding:0px;
	border-collapse:collapse;	
}

.monitor-table * {	
	width:100px;
	font-size:1.2em;
}

.monitor-table .count {
	color:#fff;
}

.streamer {
	position:absolute;
	z-index:10;
	bottom:0em;
	left:0px;
	width:99.5%;
	height:10em;
	margin:0px;
	padding:0px;
}
</style>

<?php 
$factories = new MessageFactory();
foreach($sList as $store) {	
	$factories->add_Factory($store->messages());
	
	require 'pos.php'; 
} 

require_once 'messages.php';
?>