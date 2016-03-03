<div class="admin-block inline">
<?php 
//Load main menu items
$mainItems = $sys_menu->menu();
//Create a dummy entry for unassigned main menus
$mainItems[] = array("id"=>"0","name"=>"Unassigned");
//Get netx main menu item
foreach($mainItems as $mainItem) {
	//Load sub menus for menu id
	$subm = $sys_menu->submenu($mainItem['id']);
	//Load modules for main menu
	$tmpMods = new Modules($db, $mainItem['id']);
	$tmods = $tmpMods->modules();	
?>

<table>
	<tr>
		<td colspan="2"><b><?=$mainItem['name']?></b></td>	
		<td></td>	
	</tr>
	<tr>
		<td>
			<?php //Check if any mods are loaded
				if ($tmods != null) {
					//Get next mod
					foreach($tmods as $tmpMod) {
						print $tmpMod['module_name']."<br>";
						print "<i>".$tmpMod['module_folder']."/".$tmpMod['module_index']."</i>";
						print "<a href=\"?".FORM_ACTION."=".FORM_ACTION_DELETE."&delete_id=".$tmpMod['id']."\">Delete</a>";
						print "<br>";
					}
				}
			?>
		</td>
		<td>				
			<?php 
				if ($subm != null) { 
					foreach($subm as $subItem) {
						print "<b>".$subItem['name']."</b><br>";
						
						$tmpMods = new Modules($db, $subItem['id']);
						$tmods = $tmpMods->modules();
						//print_r($tmods);
						if ($tmods != null) {
							foreach($tmods as $tmpMod) {
								print $tmpMod['module_name']."<br>";
								print "<i>".$tmpMod['module_folder']."/".$tmpMod['module_index']."</i>";
								print "<a href=\"?".FORM_ACTION."=".FORM_ACTION_DELETE."&id=".$tmpMod['id']."\">Delete</a>";
								print "<br>";
							} 
						}
					}
				}//ENd foreach / if 
			?>			
		</td>
	</tr>
</table>
	
<?php }//ENd foreach ?>
</div>
