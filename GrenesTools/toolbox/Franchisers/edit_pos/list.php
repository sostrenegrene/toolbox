<?php
$posItems = $pos->get_All();
//print_r($posItems);
?>
<div class="admin-block inline">
	<table>
		<tr>
			<th>POS</th>
			<th>Term. ID</th>
			<th>Remote</th>
			<td></td>
			<td></td>
		</tr>	
<?php 
$is_new_store = $posItems[0]['store_id']; 
if ($posItems != null) { foreach ($posItems as $posItem) { 
	if ($is_new_store != $posItem['store_id']) {
		print "<tr><td colspan=\"3\"><hr></td></tr>";
		$is_new_store = $posItem['store_id'];
	}//ENd if
?>
		<tr>
			<td><?=$posItem['pos_num']?></td>
			<td><?=$posItem['terminal_id']?></td>
			<td>
				<a href="teamviewer8://remotecontrol?connectcc=<?=$posItem['teamviewer_user']?>&passwd=<?=$posItem['teamviewer_pass']?>">
					<img src="system/layout/images/teamviewer-icon200x200.png" style="width:25px;height:25px;">			
				</a>
			</td>
			<td><?=$posItem['store_id']?> / <?=$posItem['pos_num']?></td>
			<td>
				<a href="?id=<?=$posItem['id']?>&store_dbid=<?=$posItem['store_id']?>">Edit</a>
				<a href="?id=<?=$posItem['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>">Del</a>
			</td>
		</tr>
<?php 
} } //ENd foreach / if 
?>	
	</table>
</div>