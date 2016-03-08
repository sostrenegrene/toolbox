<?php
$editor = $sys_menu->menuIdByName("Store");
?>
<a href="#">
<table class="container">
	<tr>
		<th>
			<?=$store->store("store_id")?>
		</th>
		<td>
			<?=$store->store("name")?>
		</td>
		<td>
			<a href="?load=<?=$editor?>&id=<?=$store->store("id")?>&<?=FORM_ACTION?>=<?=FORM_ACTION_SEARCH?>">
				<button>Save</button>
			</a>
	</tr>
</table>
</a>