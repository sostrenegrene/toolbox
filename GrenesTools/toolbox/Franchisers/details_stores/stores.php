<div class="inline container" style="margin:0px;padding:0px;">
<?php if ($getset->header("franchiser_id") > 0) {  
$stores = new Stores($db,0,$getset->header("franchiser_id"));
$storesList = $stores->get_All();
if ($storesList != null) {
	foreach($storesList as $sItem) {
		$sSelected = "";
		if($sItem['id'] == $getset->header("store_dbid")) { $sSelected = "selected-bot"; }
?>
<table class="" style="vertical-align:top;margin:0px;padding:0px;">	
	<tr>		
		<td class="<?=$sSelected?>" style="width:300px;">
			<a href="?country_id=<?=$getset->header("country_id")?>&franchiser_id=<?=$sItem['franchiser_id']?>&store_dbid=<?=$sItem['id']?>">
				<?=$sItem['store_id']?> - <?=$sItem['name']?>
			</a>
		</td>
		<td>
			
		</td>
	</tr>
</table>	
<?php } } }//ENd foreach / if / if ?>		
</div>
<?php //if($getset->header("store_dbid") == $sItem['id']) { require_once 'store.php'; } ?>