<?php
require_once __DIR__.'/../sys/Messages.class.php';

$stores = new StoresDataLoader($db);
$messages = new Messages();


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

<?php foreach($sList as $store) { require 'pos.php'; } ?>

<?php if ($messages->hasMessages()) { ?>
	<div class="streamer container">
		<?php require_once 'messages.php'; ?>
	</div>
<?php }//ENd if?>