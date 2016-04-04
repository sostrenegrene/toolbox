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
cload.headers("load=<?=$modItem['id']?>");
cload.toID("mbody<?=$modItem['id']?>");

cload.reload(function() {
	cload.load();
	cload.loadTimer( 30 );	
},30);
</script>
<?php } }//ENd foreach / if ?>

<div id="updateTimer">UT</div>