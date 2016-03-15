<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>POS Monitor</title>

<link rel="stylesheet" type="text/css" href="system/layout/styles/main_style.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/admin.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/menu.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/franchiser.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/pos_monitor.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/stores.css">

<link rel="stylesheet" type="text/css" href="system/layout/styles/CRM.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/pos_monitor.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	new POSMonitor().update();
	
});
</script>
</head>
<body>
<div class="head-hover">
	<span><?php require_once 'menu.php'; ?></span>
</div>