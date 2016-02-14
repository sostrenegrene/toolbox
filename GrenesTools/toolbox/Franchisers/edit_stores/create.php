<?php 
$storeItem = $stores->get_One();
//Assign values(if any) to getset as standard values
//These will be loaded if nothing else is provided in header
$getset->setStandardValue("store_id",$storeItem['store_id']);
$getset->setStandardValue("store_name",$storeItem['name']);
$getset->setStandardValue("address",$storeItem['address']);
$getset->setStandardValue("city",$storeItem['city']);
$getset->setStandardValue("zipcode",$storeItem['zipcode']);
?>

<div class="admin-block-sff inline">
	<form method="get" action="?">
		<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<input type="hidden" name="id" value="<?=$getset->header("id")?>">
		<table>
			<tr>
				<th>Franchiser</th>				
			</tr>
			<tr>
				<td>
					<select name="franchiser_id">
						<option>Franchiser</option>
						<?=$franc->get_SelectOptions()?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="store_id" value="<?=$getset->header("store_id")?>" placeholder="Store ID">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="store_name" value="<?=$getset->header("store_name")?>" placeholder="Store Name">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="address" value="<?=$getset->header("address")?>"  placeholder="Address">
				</td>
			</tr>
			<tr>				
				<td>
					<input type="text" name="city" value="<?=$getset->header("city")?>"  placeholder="City">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="zipcode" value="<?=$getset->header("zipcode")?>" placeholder="Zipcode">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Save">
				</td>
		</table>
	</form>
</div>