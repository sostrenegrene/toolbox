<?php
$editor = $sys_menu->menuIdByName("Store");
?>
<a href="?search=<?=$getset->header("search")?>&value=<?=$store->get("store_id")?>&<?=FORM_ACTION?>=<?=FORM_ACTION_SEARCH?>&exact_search=true">
<table class="container">
	<tr>
		<th>
			<?=$store->get("store_id")?>
		</th>
		<td>
			<?=$store->get("name")?>
		</td> 
	</tr>
</table>
</a>