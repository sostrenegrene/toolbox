<?php
//print_r($store);
$crmID = $sys_menu->menuIdByName("CRM");
?>

<a class="link-nodeco" href="?load=<?=$crmID?>&<?=FORM_ACTION?>=<?=FORM_ACTION_SEARCH?>&search=store_id&value=<?=$store->get('store_id')?>">
	<table class="container inline monitor-table">
		<tr>
			<td colspan="3" class="store_id"><?=$store->get("store_id")?></td>
		</tr>
		<tr>		
			<?php if ( $store->pos()->status("offline") > 0 ) {?>
				<td class="offline count"><?=$store->pos()->status("offline")?></td>
			<?php } if ( $store->pos()->status("warning") > 0 ) {?>
				<td class="warning count"><?=$store->pos()->status("warning")?></td>		
			<?php } if ( ( $store->pos()->status("total") > 0 )) {?>
				<td class="online count"><?=$store->pos()->status("total")?></td>					
			<?php } else { ?>
				<td class="unknown">-</td>
			<?php } ?>
		</tr>
	</table>
</a>