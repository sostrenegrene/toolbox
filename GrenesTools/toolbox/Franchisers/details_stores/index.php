<?php
require_once __DIR__.'/../sys/Franchisers.class.php';
require_once __DIR__.'/../sys/Stores.class.php';
require_once __DIR__.'/../sys/POS.class.php';
require_once __DIR__.'/../sys/Countries.class.php';

$getset->setStandardValue("franchiser_id","0");
$getset->setStandardValue("store_dbid","0");
$getset->setStandardValue("pos_id","0");

$country = new Countries($db);

$countries = $country->get_All();
?>

<div style="width:100%-1em;text-align:left;" class="container__">
<table class="inline" style=vertical-align:top;margin:0px;padding:0px;">
<?php 
foreach($countries as $cItem) { 
	$cSelected = "";
	if ($cItem['id'] == $getset->header("country_id")) { $cSelected = "selected-r"; }
?>
	<tr>
		<td class="<?=$cSelected?> container" style="width:150px;vertical-align:top;margin:0px;padding:0px;">
			<a href="?country_id=<?=$cItem['id']?>"><?=$cItem['country']?></a>
		</td>
		<td style="vertical-align:top;margin:0px;padding:0px;">
			<?php if ($getset->header("country_id") == $cItem['id']) { require_once 'franchisers.php'; } ?>
		</td>		
	</tr>
<?php }//ENd foreach ?>
</table>
<?php require_once 'store.php'; ?>
</div>