<?php
require_once '../../../system/config/config.php';
require_once '../../../system/sys_lib/getset.php';
require_once '../../../system/sys_lib/mysql.php';
require_once 'TerminalInfo.class.php';

$getset = new GetSet();
$db 	= new MySQL(DB_HOST, DB_USER, DB_PASS, DB_DB);
$term 	= new TerminalInfo($db,$getset->header("id"));

switch($getset->header("action")) {
	case "create":
		$id = $term->create($getset->header("store_id"),$getset->header("pos"));		
		header("Location: ?include=edit&id=".$id);
		break;
	
	case "delete":
		$term->delete();
		break;
		
	case "dublicate":
		$store = $term->load();		
		$id = $term->create($store["store_id"],($store["pos"]+1));
		$nt = new TerminalInfo($db,$id);
		
		$nt->update_add("store_id", $store["store_id"]);
		$nt->update_add("store", $store["store"]);
		$nt->update_add("address", $store["address"]);
		$nt->update_add("city", $store["city"]);
		$nt->update_add("zipcode", $store["zipcode"]);
		$nt->update_add("bax", $store["bax"]);
		$nt->update_add("tof", $store["tof"]);
		$nt->update_add("organization_number", $store["organization_number"]);
		$nt->update_add("terminal_id", 0);		
		$nt->update_add("terminal_model", "");
		$nt->update_add("franchiser", $store["franchiser"]);
		
		$nt->update();
		
		header("Location: ?include=edit&id=".$id);
		break;
		
	case "edit":
		//$term->update_add("amount", $getset->header("amount"));
		$term->update_add("store_id", $getset->header("store_id"));
		$term->update_add("store", $getset->header("store"));
		$term->update_add("address", $getset->header("address"));
		$term->update_add("city", $getset->header("city"));
		$term->update_add("zipcode", $getset->header("zipcode"));
		$term->update_add("bax", $getset->header("bax"));
		$term->update_add("tof", $getset->header("tof"));
		$term->update_add("organization_number", $getset->header("organization_number"));
		$term->update_add("terminal_id", $getset->header("terminal_id"));
		$term->update_add("pos", $getset->header("pos"));
		$term->update_add("terminal_model", $getset->header("terminal_model"));
		$term->update_add("franchiser", $getset->header("franchiser"));
		
		$term->update();
		break;
		
	default:
		break;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Terminals</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="system/javascript/terminals.js"></script>
<style type="text/css">
	td,input {
		width:100px;
	}
	
	#terminal_id,#terminal_id_check {
		width:50px;
		font-size:0.8em;
	}
	
	label {
		font-size:0.8em;
	}
	
</style>
</head>
<body>

<a href="?include=make_new">New Entry</a> -
<a href="?include=view">View</a>
<br><br>

<?php if ($getset->header("include") != null) { include_once 'toolbox/terminal_info/'.$getset->header("include").".php"; } ?>

</body>
</html>