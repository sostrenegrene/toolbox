<table class="inline" style="vertical-align:top;margin:0px;padding:0px;">

<?php
$franch = new Franchisers($db,0,$getset->header("country_id"));
$franchList = $franch->get_All();

if ($franchList != null) {
foreach($franchList as $fItem) {
	$fSelected = "";
	if ($fItem['id'] == $getset->header("franchiser_id")) { $fSelected = "selected-bot"; }
?>
	
	<tr>
		<td class="<?=$fSelected?>" style="width:200px;">
			 <a href="?country_id=<?=$getset->header("country_id")?>&franchiser_id=<?=$fItem['id']?>"><?=$fItem['franchiser']?></a>
		</td>		
	</tr>
			
<?php } }//ENd forach / if ?>

</table>
<?php require 'stores.php'; ?>