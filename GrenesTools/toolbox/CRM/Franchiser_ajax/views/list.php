<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$item->get("id")?>">
<table class="container store-item">
	<tr>
		<th>Franchiser</th>
		<td>
			<input type="text" name="franchiser" value="<?=$item->get('franchiser')?>">
		</td>
	</tr>				
	<tr>
		<th>Country</th>
		<td>
			<?=$sdl->country_Select( $item->get('country_id') )?>
		</td>
	</tr>
	<tr>
		<th>Phone number</th>
		<td>
			<input type="text" name="phone_number" value="<?=$item->get('phone_number')?>">
		</td>
	</tr>
	<tr>
		<th>E-mail</th>
		<td>
			<input type="text" name="email" value="<?=$item->get('email')?>">
		</td>
	</tr>
	<tr>
		<th>Address</th>
		<td>
			<input type="text" name="address" value="<?=$item->get('address')?>">
		</td>
	</tr>
	<tr>
		<th>City</th>
		<td>
			<input type="text" name="city" value="<?=$item->get('city')?>">
		</td>
	</tr>
	<tr>
		<th>Zipcode</th>
		<td>
			<input type="text" name="zipcode" value="<?=$item->get('zipcode')?>">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" value="Save">
			<a href="javascript:inget.confirm('Delete?','?<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>&delete_id=<?=$item->get('id')?>')">[Del]</a>
		</td>
	</tr>
</table>
</form>