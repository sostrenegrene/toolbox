<?php 
$termAll = $term->loadAll(); 

foreach($termAll as $termItem) {
?>
	
	<table>
	<tr>
		<th>
			<label for="store_id">Store ID</label>
		</th>
		<th>
			<label for="store">Store</label>
		</th>
		<th>
			<label for="city">City</label>
		</th>
		<th>
			<label for="address">Address</label>
		</th>
		<th>
			<label for="zipcode">Zip Code</label>
		</th>
		<th>
			<label for="bax">BAX</label>
		</th>
		<th>
			<label for="tof">TOF</label>
		</th>
		<th>
			<label for="organization_number">Org. Nr.</label>
		</th>
		<th>
			<label for="terminal_id">Terminal ID</label>
		</th>
		<th>
			<label for="pos">POS</label>
		</th>
		<th>
			<label for="terminal_model">Terminal Model</label>
		</th>
		<th>
			<label for="franchiser">Franchiser</label>
		</th>
		<th>
			Options
		</th>
	</tr>
	<tr>			
		<td>
			<input type="text" name="store_id" id="store_id" value="<?=$termItem['store_id']?>">
		</td>			
		<td>
			<input type="text" name="store" id="store" value="<?=$termItem['store']?>">
		</td>			
		<td>
			<input type="text" name="address" id="address" value="<?=$termItem['address']?>">
		</td>			
		<td>
			<input type="text" name="city" id="city" value="<?=$termItem['city']?>">
		</td>			
		<td>
			<input type="text" name="zipcode" id="zipcode" value="<?=$termItem['zipcode']?>">
		</td>			
		<td>
			<input type="text" name="bax" id="bax" value="<?=$termItem['bax']?>">
		</td>	
		<td>
			<input type="text" name="tof" id="tof" value="<?=$termItem['tof']?>">
		</td>			
		<td>
			<input type="text" name="organization_number" id="organization_number" value="<?=$termItem['organization_number']?>">
		</td>			
		<td>
			<input type="text" name="terminal_id" id="terminal_id" value="<?=$termItem['terminal_id']?>">
		</td>			
		<td>
			<input type="text" name="pos" id="pos" value="<?=$termItem['pos']?>">
		</td>			
		<td>
			<input type="text" name="terminal_model" id="terminal_model" value="<?=$termItem['terminal_model']?>">
		</td>		
		<td>
			<input type="text" name="franchiser" id="franchiser" value="<?=$termItem['franchiser']?>">
		</td>	
		<td>
			<a href="?include=edit&id=<?=$termItem['id']?>">Edit</a>
			<a href="?id=<?=$termItem['id']?>&store_id=<?=$termItem['store_id']?>&pos=<?=$termItem['pos']?>&action=dublicate">Copy</a>
			<a href="?include=view&action=delete&id=<?=$termItem['id']?>">Delete</a>
		</td>
	</tr>
</table>
	
	
	
	
<?php } ?>