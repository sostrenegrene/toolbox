<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<table class="container store-item">
	<tr>
		<th colspan="2"><b>Create franchiser</b></th>
	</tr>
	<tr>
		<th>Franchiser</th>
		<td>
			<input type="text" name="franchiser"  placeholder="Franchiser">
		</td>
	</tr>				
	<tr>
		<th>Country</th>
		<td>
			<?=$sdl->country_Select( )?>
		</td>
	</tr>
	<tr>
		<th>Phone number</th>
		<td>
			<input type="text" name="phone_number"  placeholder="Phone number">
		</td>
	</tr>
	<tr>
		<th>E-mail</th>
		<td>
			<input type="text" name="email"  placeholder="E-mail">
		</td>
	</tr>
	<tr>
		<th>Address</th>
		<td>
			<input type="text" name="address"  placeholder="Address">
		</td>
	</tr>
	<tr>
		<th>City</th>
		<td>
			<input type="text" name="city"  placeholder="City">
		</td>
	</tr>
	<tr>
		<th>Zipcode</th>
		<td>
			<input type="text" name="zipcode" value="" placeholder="Zipcode">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" value="Save">
		</td>
	</tr>
</table>
</form>