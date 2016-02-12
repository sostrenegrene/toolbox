<?php 
$modules = $sys_mods->modules();
if ($modules != null) {
	foreach ($modules as $modItem) {
?>

	<div class="module-body">
		<?php require_once 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];?>
	</div>

<?php } }//ENd foreach / if ?>