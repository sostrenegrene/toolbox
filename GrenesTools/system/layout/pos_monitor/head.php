<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>POS Monitor</title>

<link rel="stylesheet" type="text/css" href="system/layout/styles/main_style.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/menu.css">

<link rel="stylesheet" type="text/css" href="system/layout/styles/CRM.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/pos_monitor.js"></script>
<script type="text/javascript" src="system/javascript/ViewLoader.js"></script>
<script type="text/javascript" src="system/javascript/AJAXResult.js"></script>

<script type="text/javascript">
var cload  = new ContentLoader("ajax.php");
var ajaxr = new AJAXResult();

$(document).ready(function() {});
</script>
</head>
<body>
<div class="head-hover">
	<span><?php require_once 'menu.php'; ?></span>
</div>