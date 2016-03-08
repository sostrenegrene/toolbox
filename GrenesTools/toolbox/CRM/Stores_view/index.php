<?php
//Get the module that loads with ajax
$ajaxMod = $sys_mods->get_Unassigned("Stores_ajax");
$ajaxMod = $ajaxMod['id'];
?>

<table class="search-table container">
	<tr>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>stores">
				<input type="hidden" name="search" value="store_id">
				<input type="text" name="value" placeholder="Store ID">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>stores">
				<input type="hidden" name="search" value="name">
				<input type="text" name="value" placeholder="Store name">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>franchisers">
				<input type="hidden" name="search" value="franchiser">
				<input type="text" name="value" placeholder="Franchiser">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_CREATE?>">
				<input type="submit" value="New"> 				
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">				
				<input type="submit" value="Clear"> 				
			</form>
		</td>
	</tr>
</table>
<div id="view_body"></div>

<!-- 
<script type="text/javascript">
var header = "load=<?=$ajaxMod?>";
var init = "search=<?=$getset->header("search")?>&value=<?=$getset->header("value")?>&<?=FORM_ACTION?>=<?=$getset->header(FORM_ACTION)?>";
var viewLoader = new view_Loader(header);

viewLoader.view_LoadFromHeader("view_body",init);
viewLoader.view_LoadFromSearch(".search_form","view_body");
</script>
-->

<?php 
$loadMod = $sys_mods->get_Unassigned("Stores_ajax");
require "toolbox/".$loadMod['package_folder']."/".$loadMod['module_folder']."/".$loadMod['module_index'];
?>	