<?php
?>
	<table class="container">
		<tr>
			<th class="col-contact"></th>
			<td>
				
				<table class="store-item">
					<tr>
						<th>ID</th>
						<td>
							<input type="text" name="store_id" value="<?=$store->store("store_id")?>">
						</td>
					</tr>
					<tr>
						<th>Store</th>
						<td>
							<input type="text" name="name" value="<?=$store->store("name")?>">
						</td>
					</tr>
					<tr>
						<td>Country</td>
						<td><?=$sdl->country_Select($store->store("country_id"))?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="address" value="<?=$store->store("address")?>"></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input type="text" name="city" value="<?=$store->store("city")?>"></td>
					</tr>
					<tr>
						<td>Zipcode</td>
						<td><input type="text" name="zipcode" value="<?=$store->store("zipcode")?>"></td>						
					</tr>
					<tr>
						<td>E-mail</td>
						<td>
							<input type="text" name="store_email" value="<?=$store->store("store_email")?>">
						</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>
							<input type="text" name="store_phone" value="<?=$store->store("store_phone")?>">
						</td>
					</tr>
					<tr>
						<td>Manager</td>
						<td>
							<input type="text" name="manager" value="<?=$store->store("manager")?>">
						</td>
					</tr>
					<tr>
						<td>Manager Phone</td>
						<td>
							<input type="text" name="manager_phone" value="<?=$store->store("manager_phone")?>">
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
	</table>