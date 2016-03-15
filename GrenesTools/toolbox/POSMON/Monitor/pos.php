<?php
//print_r($store);
?>
<table class="container inline monitor-table">
	<tr>
		<td class="store_id"><?=$store->get("store_id")?></td>
	</tr>
	<tr>		
		<?php if ( $store->pos()->status("offline") > 0 ) {?>
			<td class="offline count"><?=$store->pos()->status("offline")?></td>
		<?php } elseif ( $store->pos()->status("warning") > 0 ) {?>
			<td class="warning count"><?=$store->pos()->status("warning")?></td>
		<?php } elseif ( $store->pos()->status("total") > 0 ) {?>
			<td class="online count"><?=$store->pos()->status("total")?></td>			
		<?php } else { ?>
			<td class="inactive">-</td>
		<?php } ?>
	</tr>
</table>