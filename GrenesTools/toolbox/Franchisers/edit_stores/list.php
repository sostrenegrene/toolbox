<?php
$storeList = $stores->get_All();
?>
<div class="franchiser-block inline">
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
		<td class="stores-row"><?=$storeItem['store_id']?></td>
		<td class="stores-row"><?=$storeItem['name']?></td>
		<td class="stores-row"><?=$storeItem['address']?></td>
		<td class="stores-row"><?=$storeItem['city']?></td>
		<td class="stores-row"><?=$storeItem['zipcode']?></td>
		<td class="stores-row">
			<!-- Remember to send franchiser_id with the edit id, so franchiser is selected  -->
			<a href="?id=<?=$storeItem['id']?>&franchiser_id=<?=$storeItem['franchiser_id']?>">Edit</a>
			<a href="?delete_id=<?=$storeItem['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>">Del</a>
		</td>
	</tr>

<?php } }//ENd foreach/if ?>
</table>
</div>