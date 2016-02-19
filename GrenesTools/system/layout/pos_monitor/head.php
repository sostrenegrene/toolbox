<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>POS Monitor</title>

<link rel="stylesheet" type="text/css" href="system/layout/pos_monitor/styles/main_style.css">
<link rel="stylesheet" type="text/css" href="system/layout/pos_monitor/styles/menu.css">
<link rel="stylesheet" type="text/css" href="system/layout/pos_monitor/styles/pos_monitor.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/pos_monitor.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	new POSMonitor().update();
	
});
</script>
</head>
<body>
<div class="head">
	<span><?php require_once 'menu.php'; ?></span>
</div>