<?php
$storeList = $stores->get_All();
?>
<div class="admin-block inline">
<table>
	<tr>
		<th>ID</th>
		<th>Store</th>
		<th>Address</th>
		<th>City</th>
		<th>Zipcode</th>
		<td></td>
	</tr>
<?php if ($storeList != null) { foreach($storeList as $storeItem) { ?>
	<tr>
		<td><?=$storeItem['store_id']?></td>
		<td><?=$storeItem['name']?></td>
		<td><?=$storeItem['address']?></td>
		<td><?=$storeItem['city']?></td>
		<td><?=$storeItem['zipcode']?></td>
		<td>
			<!-- Remember to send franchiser_id with the edit id, so franchiser is selected  -->
			<a href="?id=<?=$storeItem['id']?>&franchiser_id=<?=$storeItem['franchiser_id']?>">Edit</a>
			<a href="?id=<?=$storeItem['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>">Del</a>
		</td>
	</tr>

<?php } }//ENd foreach/if ?>
</table>
</div>