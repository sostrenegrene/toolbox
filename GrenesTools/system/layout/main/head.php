<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Grenes Toolbox</title>

<link rel="stylesheet" type="text/css" href="system/layout/main/styles/main_style.css">
<link rel="stylesheet" type="text/css" href="system/layou/maint/styles/admin.css">
<link rel="stylesheet" type="text/css" href="system/layout/main/styles/menu.css">
<link rel="stylesheet" type="text/css" href="system/layout/main/styles/franchiser.css">
<link rel="stylesheet" type="text/css" href="system/layout/main/styles/pos_monitor.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/franchiser_details.js"></script>

<script type="text/javascript">
var franchiser;
$(document).ready(function() {

	franchiser = new FranchiserDetails();
	
});
</script>
</head>
<body>
<div class="head">
	<?php require_once 'menu.php'; ?>
</div>