<?php 
$modules = $sys_mods->modules();
if ($modules != null) {
	foreach ($modules as $modItem) {
		$modPath = 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];
?>

	<div class="module-body">
		<?php 
		//Test for file 
		//Dump err message if not found.
		if (is_file($modPath)) { require_once $modPath; }
			else { print "Module not found! [".$modPath."]"; }
		?>
	</div>

<?php } }//ENd foreach / if ?>