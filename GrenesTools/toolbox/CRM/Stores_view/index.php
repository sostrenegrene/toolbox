<?php
//Get the module that loads with ajax
$loadMod = $sys_mods->get_Unassigned("Stores_ajax");
?>

<table class="search-table container">
	<tr>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="store_id">
				<input type="text" name="value" placeholder="Store ID">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="name">
				<input type="text" name="value" placeholder="Store name">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="franchiser">
				<input type="text" name="value" placeholder="Franchiser">
			</form>
		</td>
		<td>
			<form class="search_form" method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SEARCH?>">
				<input type="hidden" name="search" value="terminal_id">
				<input type="text" name="value" placeholder="Terminal ID">
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

<?php 
require "toolbox/".$loadMod['package_folder']."/".$loadMod['module_folder']."/".$loadMod['module_index'];
?>	