<?php
$editor = $sys_menu->menuIdByName("Store");
?>
<a href="?search=<?=$getset->header("search")?>&value=<?=$store->store("store_id")?>&<?=FORM_ACTION?>=<?=FORM_ACTION_SEARCH?>stores&exact_search=true">
<table class="container">
	<tr>
		<th>
			<?=$store->store("store_id")?>
		</th>
		<td>
			<?=$store->store("name")?>
		</td> 
	</tr>
</table>
</a>