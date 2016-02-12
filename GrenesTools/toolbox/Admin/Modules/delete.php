<div class="admin-block inline">
<?php 
foreach($sys_menu->menu() as $mainItem) {
	$subm = $sys_menu->submenu($mainItem['id']);
	$tmpMods = new Modules($db, $mainItem['id']);
	$tmods = $tmpMods->modules();	
?>
		<p><?=$mainItem['name']?></p>	
		
		<?php 
			if ($tmods != null) {
				foreach($tmods as $tmpMod) {
					print "&nbsp;&nbsp;-- ".$tmpMod['module_name'];
					print "<a href=\"?".FORM_ACTION."=".FORM_ACTION_DELETE."&id=".$tmpMod['id']."\">Delete</a>";
					print "<br>";
				}
			}
		?>
		
		
		<div class="">		
			<?php 
				if ($subm != null) { 
					foreach($subm as $subItem) {
						print $subItem['name']."<br>";
						
						$tmpMods = new Modules($db, $subItem['id']);
						$tmods = $tmpMods->modules();
						//print_r($tmods);
						foreach($tmods as $tmpMod) {
							print "&nbsp;&nbsp;-- ".$tmpMod['module_name'];
							print "<a href=\"?".FORM_ACTION."=".FORM_ACTION_DELETE."&id=".$tmpMod['id']."\">Delete</a>";
							print "<br>";
						} 
					}
				}//ENd foreach / if 
			?>
		</div>
	
<?php }//ENd foreach ?>
</div>
