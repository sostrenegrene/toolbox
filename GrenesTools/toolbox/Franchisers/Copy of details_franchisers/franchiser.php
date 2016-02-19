<?php
$divid = "franchiser_".$fItem['id'];
?>
<div class="franchiser-block">
<table>
	<tr>
		<th>Franchiser: <?=$fItem['franchiser']?></th>
		<td class="btn-save">
			<a href="javascript:franchiser.show('<?=$divid?>')">View</a>			
		</td>
		<!-- 
		<th>Org Num</th>
		<th>Bax</th>
		<th>Tof</th>
		<th>CVR</th>
		<th>Forretnings. Nr.</th>
		 -->		
	</tr>
	<!-- 
	<tr>
		<td><?=$fItem['franchiser']?></td>
		<td><?=$fItem['organization_number']?></td>
		<td><?=$fItem['bax']?></td>
		<td><?=$fItem['tof']?></td>
		<td><?=$fItem['cvr']?></td>
		<td><?=$fItem['forretnings_nummer']?></td>
		<td>
			<a href="javascript:franchiser.show('<?=$divid?>')">View</a>			
		</td>
	</tr>
	 -->
	<tr>
		<td colspan="2" class="franchiser-store-details hidden" id="<?=$divid?>">		
		<?php //Load stores for fanchiser 
			$stores = new Stores($db,0,$fItem['id']);
			$sItems = $stores->get_All();
			if ($sItems != null) { 
				foreach ($sItems as $sItem) { 
					require 'store.php'; 
				} 
			}
			else { print "No stores..."; }
		?>
		</td>
	</tr>			
</table>
</div>