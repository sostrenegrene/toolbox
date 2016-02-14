<?php
$francList = $franc->get_All();
?>
<div class="admin-block inline">
<table>
	<tr>
		<th>Franchiser</th>
		<th>Org Num</th>
		<th>Bax</th>
		<th>Tof</th>
		<th>Edit</th>
	</tr>
	<?php if ($francList != null) { foreach($francList as $francItem) { ?>
	<tr>
		<td><?=$francItem['franchiser']?></td>
		<td><?=$francItem['organization_number']?></td>
		<td><?=$francItem['bax']?></td>
		<td><?=$francItem['tof']?></td>
		<td>
			<a href="?id=<?=$francItem['id']?>">Edit</a>
			<a href="?id=<?=$francItem['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>">Del</a>
		</td>
	</tr>	
	<?php } }//ENd foreach / if?>
</table>
</div>