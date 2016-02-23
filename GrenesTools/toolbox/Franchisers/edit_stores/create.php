<?php 
$storeItem = $stores->get_One();
$ajax_mod = $sys_mods->get_Unassigned("stores_edit_ajax");
//print_r($storeItem);
//Assign values(if any) to getset as standard values
//These will be loaded if nothing else is provided in header
$getset->setStandardValue("store_id",$storeItem['store_id']);
$getset->setStandardValue("store_name",$storeItem['name']);
$getset->setStandardValue("address",$storeItem['address']);
$getset->setStandardValue("city",$storeItem['city']);
$getset->setStandardValue("zipcode",$storeItem['zipcode']);
$getset->setStandardValue("store_email",$storeItem['store_email']);
$getset->setStandardValue("store_phone",$storeItem['store_phone']);
$getset->setStandardValue("manager",$storeItem['manager']);
$getset->setStandardValue("manager_phone",$storeItem['manager_phone']);
$getset->setStandardValue("organization_number",$storeItem['organization_number']);
$getset->setStandardValue("bax",$storeItem['bax']);
$getset->setStandardValue("tof",$storeItem['tof']);
$getset->setStandardValue("cvr",$storeItem['cvr']);
$getset->setStandardValue("forretnings_nummer",$storeItem['forretnings_nummer']);
$getset->setStandardValue("country_id",$storeItem['country_id']);


?>

<div class="admin-block-sff inline">
	<form method="get" action="?">
		<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<input type="hidden" name="id" value="<?=$getset->header("id")?>">
		<table>
			<tr>
				<th>Store<a href="?">Clear</a></th>				
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
					<select name="country">
						<option>Country</option>
						<?=$country->get_CountrySelectOptions($getset->header("country_id"))?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" id="store_id" name="store_id" value="<?=$getset->header("store_id")?>" placeholder="Store ID">
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
					<input type="text" name="store_email" value="<?=$getset->header("store_email")?>" placeholder="E-mail">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="store_phone" value="<?=$getset->header("store_phone")?>" placeholder="Store phone">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="manager" value="<?=$getset->header("manager")?>" placeholder="Manager">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="manager_phone" value="<?=$getset->header("manager_phone")?>" placeholder="Manager phone">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="organization_number" value="<?=$getset->header("organization_number")?>" placeholder="Organization number">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="bax" value="<?=$getset->header("bax")?>" placeholder="Bax">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="tof" value="<?=$getset->header("tof")?>" placeholder="tof">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="cvr" value="<?=$getset->header("cvr")?>" placeholder="cvr">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="forretnings_nummer" value="<?=$getset->header("forretnings_nummer")?>" placeholder="Forretnings nummer">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Save <?=$getset->header("load")?>">
				</td>
		</table>
	</form>
</div>

<script type="text/javascript">
inget.keyUp("store_id",function(data) {
	var load_str = "load=<?=$ajax_mod['id']?>&store_id="+data;

	ajaxr.load(load_str,function(data) {
		console.log("Callback started");		
		data = JSON.parse(data);
		if (data.id != 0) { 
			$("#store_id").attr("style","border:1px solid red;"); 
		}
		else { 
			$("#store_id").attr("style","border:1px solid green;"); 
		}
	});

});
</script>