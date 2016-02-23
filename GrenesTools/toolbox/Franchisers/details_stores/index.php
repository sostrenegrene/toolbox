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

<table class="stores-container">
<?php 
foreach($countries as $cItem) { 
	$cSelected = "";
	if ($cItem['id'] == $getset->header("country_id")) { $cSelected = "selected-r"; }
?>
	<tr>
		<td class="<?=$cSelected?>" style="width:150px;vertical-align:top;">
			<a href="?country_id=<?=$cItem['id']?>"><?=$cItem['country']?></a>
		</td>
		<td>			
			<?php if($getset->header("country_id") > 0) { require_once 'franchisers.php'; } ?>			
		</td>
	</tr>
<?php }//ENd foreach ?>
</table>