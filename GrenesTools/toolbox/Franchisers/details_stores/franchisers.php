<div class="inline container">
<?php
if($getset->header("country_id") > 0) {
$franch = new Franchisers($db,0,$getset->header("country_id"));
$franchList = $franch->get_All();

if ($franchList != null) {
foreach($franchList as $fItem) {	 
	
	$fSelected = "";
	if ($fItem['id'] == $getset->header("franchiser_id")) { $fSelected = "selected-bot container_"; }
?>
<table class="">	
	<tr>
		<td class="<?=$fSelected?>" style="width:250px;margin:0px;padding:0px;">
			 <a href="?country_id=<?=$getset->header("country_id")?>&franchiser_id=<?=$fItem['id']?>"><?=$fItem['franchiser']?></a>
		</td>				
	</tr>
</table>
<?php }	} }//ENd forach / if / if ?>
</div>
<?php require_once 'stores.php'; ?>