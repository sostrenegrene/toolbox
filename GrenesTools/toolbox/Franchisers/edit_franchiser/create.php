<?php 
$francItem = $franc->get_One($getset->header("id"));

$getset->setStandardValue("franchiser",$francItem['franchiser']);
$getset->setStandardValue("email",$francItem['email']);
$getset->setStandardValue("phone_number",$francItem['phone_number']);
?>
<div class="admin-block-sff inline">
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$getset->header("id")?>">
	<table>
		<tr>
			<th>Create Franchiser &nbsp;&nbsp;<a href="?">Clear</a></th>
		</tr>
		<tr>
			<td>
				<input type="text" name="franchiser" value="<?=$getset->header("franchiser")?>" placeholder="Franchiser">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="email" value="<?=$getset->header("email")?>" placeholder="E-mail">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="phone_number" value="<?=$getset->header("phone_number")?>" placeholder="Phone Number">
			</td>
		</tr>		
		<tr>
			<td>
				<input type="submit" value="Save">				
			</td>
		</tr>
	</table>
</form>
</div>