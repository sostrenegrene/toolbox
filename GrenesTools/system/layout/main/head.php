<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Grenes Toolbox</title>

<link rel="stylesheet" type="text/css" href="system/layout/styles/main_style.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/admin.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/menu.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/franchiser.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/pos_monitor.css">
<link rel="stylesheet" type="text/css" href="system/layout/styles/stores.css">

<link rel="stylesheet" type="text/css" href="system/layout/styles/CRM.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/franchiser_details.js"></script>
<script type="text/javascript" src="system/javascript/AJAXResult.js"></script>
<script type="text/javascript" src="system/javascript/InputGetter.js"></script>
<script type="text/javascript" src="system/javascript/ViewLoader.js"></script>

<script type="text/javascript">
var franchiser;
var ajaxr = new AJAXResult();
var inget = new InputGetter();
$(document).ready(function() {
	
	franchiser = new FranchiserDetails();
	
});
</script>
</head>
<body>
<table class="head">
	<tr>
		<td><?php require_once 'menu.php'; ?></td>
		<td class="login-container"><?php require_once 'login.php'; ?></td>
	</tr>
</table>