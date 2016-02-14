<?php
$posItems = $pos->get_All();
//print_r($posItems);
?>
<div class="admin-block inline">
	<table>
		<tr>
			<th>POS</th>
			<th>Term. ID</th>
			<td></td>
		</tr>	
<?php if ($posItems != null) { foreach ($posItems as $posItem) { ?>
		<tr>
			<td><?=$posItem['pos_num']?></td>
			<td><?=$posItem['terminal_id']?></td>
			<td>
				<a href="?id=<?=$posItem['id']?>&store_dbid=<?=$posItem['store_id']?>">Edit</a>
				<a href="?id=<?=$posItem['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>">Del</a>
			</td>
		</tr>
<?php } } //ENd foreach / if ?>	
	</table>
</div>