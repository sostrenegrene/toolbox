<div class="franchiser-block-inner">
<table>
	<tr class="franchiser-header">
		<th class="th-width">ID</th>
		<th class="th-width">Store</th>
		<th class="th-width">Address</th>
		<th class="th-width">City</th>
		<th class="th-width">Zipcode</th>
		<td></td>
		<th class="th-width">Org. Nr</th>
		<th class="th-width">Bax</th>
		<th class="th-width">Tof</th>
		<th class="th-width">CVR</th>
		<th class="th-width">Forretnings Nr.</th>		
	</tr>
	<tr>
		<td><?=$sItem['store_id']?></td>
		<td><?=$sItem['name']?></td>
		<td><?=$sItem['address']?></td>
		<td><?=$sItem['city']?></td>
		<td><?=$sItem['zipcode']?></td>		
		<td></td>
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
?>
	<div class="franchiser-block-s">
		<table>		
		<tr class="franchiser-header">
			<th>POS</th>
			<th>Term. ID.</th>
			<th>Model</th>
			<th>Software</th>
			<th>Ver.</th>
		</tr>
		<?php	
			foreach($pItems as $pItem) {
				require 'pos.php';
			}		
		?>
		</table>
	</div>
	<?php } else { print "<div class=\"franchiser-block-s\">No POS...</div>"; }//ENd if ?>
</div>