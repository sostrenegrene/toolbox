<?php
$ajaxMod = $sys_mods->get_Unassigned("view_Stores_ajax");
$ajaxMod = $ajaxMod['id'];
?>

<table>
	<tr>
		<td>
			<form method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="store_id">
				<input type="text" id="search_id" name="value" placeholder="Store ID">
			</form>
		</td>
		<td>
			<form method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="name">
				<input type="text" id="search_name" name="value" placeholder="Store name">
			</form>
		</td>
	</tr>
</table>
<div id="view_body"></div>


<script type="text/javascript">
<?php require_once __DIR__.'/../javascript/view_loader.js';?>
var header = "load=<?=$ajaxMod?>&<?=FORM_ACTION?>=<?=FORM_ACTION_SEARCH?>";
var h_searchID = header + "&search=store_id";
var h_searchName = header + "&search=name";

view_LoadFromSearch("search_id","view_body",h_searchID);
view_LoadFromSearch("search_name","view_body",h_searchName);
</script>