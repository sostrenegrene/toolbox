<?php
?>
<table class="container">
	<tr>
		<th class="col-contact"></th>
		<td>
			
			<table class="store-item">
				<tr>
					<th>Store</th>
					<td>
						<input type="text" name="store_name" value="<?=$store->store("name")?>">
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td><?=$sdl->country_Select($store->store("country_id"))?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<input type="text" name="store_address" value="<?=$store->store("address")?>">
						<br>
						<input type="text" name="store_zipcode" value="<?=$store->store("zipcode")?>">						
					</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>
						<input type="text" name="store_email" value="<?=$store->store("email")?>">
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
						<input type="text" name="store_phone_number" value="<?=$store->store("phone_number")?>">
					</td>
				</tr>
				<tr>
					<td>Manager</td>
					<td>
						<input type="text" name="store_manager" value="<?=$store->store("manager")?>">
					</td>
				</tr>
				<tr>
					<td>Manager Phone</td>
					<td>
						<input type="text" name="store_manager_phone" value="<?=$store->store("manager_phone")?>">
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>