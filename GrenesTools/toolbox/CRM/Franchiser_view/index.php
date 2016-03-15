<?php
//Get the module that loads with ajax
$loadMod = $sys_mods->get_Unassigned("Franchiser_ajax");
?>
<table class="container store-container">
	<tr>		
		<td>
			<?php require_once "toolbox/".$loadMod['package_folder']."/".$loadMod['module_folder']."/".$loadMod['module_index']; ?>
		</td>
	</tr>
</table>