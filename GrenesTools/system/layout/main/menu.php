<?php //Debug
//print_r($menu->menu());
//print_r($menu->submenu(1));
?>

<?php 
foreach($sys_menu->menu() as $mainItem) {
	$subm = $sys_menu->submenu($mainItem['id']);
?>

	<div class="menu-container inline">
		<a href="?load=<?=$mainItem['id']?>"><?=$mainItem['name']?></a>	
		
		<div class="submenu-container">
			<?php if ($subm != null) { foreach($subm as $subItem) { ?>
			<div> <a href="?load=<?=$subItem['id']?>"><?=$subItem['name']?></a> </div>
			<?php } }//ENd foreach / if ?>
		</div>
	</div>
<?php }//ENd foreach ?>