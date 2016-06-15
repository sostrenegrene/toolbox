<div class="posmon-timer">
	<div id="updateTimer"></div>
</div>

<?php 
$modules = $sys_mods->modules();
$mList = array();
if ($modules != null) {
	foreach ($modules as $modItem) {
		$modPath = 'toolbox/'.$modItem['package_folder'].'/'.$modItem['module_folder'].'/'.$modItem['module_index'];		
?> 
	<div class="module-body" id="mbody<?=$modItem['id']?>">
		<?php 
		//Test for file 
		//Dump err message if not found.
		//if (is_file($modPath)) { require_once $modPath; }
		//else { print "Module not found! [".$modPath."]"; }
		?>
	</div>
	
<script type="text/javascript">
CLConfig.file = "ajax.php";
CLConfig.load = "load=<?=$modItem['id']?>";
CLConfig.bodyID = "#mbody<?=$modItem['id']?>";
CLConfig.timerBody = "#updateTimer";
CLConfig.reloadTimer = 30;

cload.get();
</script>
<?php } }//ENd foreach / if ?>