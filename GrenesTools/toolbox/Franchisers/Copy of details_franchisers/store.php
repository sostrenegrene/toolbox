<div class="franchiser-block-inner">
<table>
	<tr>
		<th>ID</th>
		<th>Store</th>
		<th>Address</th>
		<th>City</th>
		<th>Zipcode</th>
		<th>Org. Nr</th>
		<th>Bax</th>
		<th>Tof</th>
		<th>CVR</th>
		<th>Forretnings Nr.</th>		
	</tr>
	<tr>
		<td><?=$sItem['store_id']?></td>
		<td><?=$sItem['name']?></td>
		<td><?=$sItem['address']?></td>
		<td><?=$sItem['city']?></td>
		<td><?=$sItem['zipcode']?></td>		
		<td><?=$sItem['organization_number']?></td>
		<td><?=$sItem['bax']?></td>
		<td><?=$sItem['tof']?></td>
		<td><?=$sItem['cvr']?></td>
		<td><?=$sItem['forretnings_nummer']?></td>
	</tr>
</table>
<?php 
	$pos = new POS($db,0,$sItem['id']);
	$pItems = $pos->get_All();
	if ($pItems != null) {
		foreach($pItems as $pItem) {
			require 'pos.php';
		}
	}
?>
</div>