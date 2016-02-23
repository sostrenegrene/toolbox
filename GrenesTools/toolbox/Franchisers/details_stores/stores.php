<?php if ($getset->header("franchiser_id") > 0) { ?>
<table class="inline" style="vertical-align:top;">
<?php 
$stores = new Stores($db,0,$getset->header("franchiser_id"));
$storesList = $stores->get_All();
if ($storesList != null) {
	foreach($storesList as $sItem) {
		$sSelected = "";
		if($sItem['id'] == $getset->header("store_dbid")) { $sSelected = "selected-bot"; }
?>
	
	<tr>		
		<td class="<?=$sSelected?>" style="width:300px;">
			<a href="?country_id=<?=$getset->header("country_id")?>&franchiser_id=<?=$sItem['franchiser_id']?>&store_dbid=<?=$sItem['id']?>">
				<?=$sItem['store_id']?> - <?=$sItem['name']?>
			</a>
		</td>
	</tr>
	
<?php } }//ENd foreach / if ?>		
</table>
<?php 
require 'store.php';
}//ENd if 
?>