<?php
$divid = "franchiser_".$fItem['id'];
?>
<div class="franchiser-block">
<table>
	<tr>
		<th class="pointer" onclick="javascript:franchiser.show('<?=$divid?>');">Franchiser: <?=$fItem['franchiser']?></th>					
	</tr>	
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