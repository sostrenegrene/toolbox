<?php
?>
	<table class="container">
		<tr>
			<th class="col-contact"></th>
			<td>
				
				<table>
					<tr>
						<td>
				
							<table class="store-item">
								<tr>
									<th>ID</th>
									<td>
										<input type="text" name="store_id" value="<?=$store->get("store_id")?>">
									</td>
								</tr>
								<tr>
									<th>Store</th>
									<td>
										<input type="text" name="name" value="<?=$store->get("name")?>">
									</td>
								</tr>
								<tr>
									<td>Country</td>
									<td><?=$sdl->country_Select($store->get("country_id"))?></td>
								</tr>
							</table>
							
						</td>
						<td>
							
							<table class="store-item">
								<tr>
									<th>Meraki URL</th>
									<td>
										<input type="text" name="meraki_url" value="<?=$store->get("meraki_url")?>">										
									</td>
								</tr>
							</table>
							
						</td>
					</tr>
				</table>
				
				<table class="store-item">
					<tr>
						<td class="bold">Store</td>
						<td class="bold">Delivery</td>
					</tr>
					<tr>
						<td>
				
							<table class="store-item">					
								<tr>
									<th>Address</th>
									<td><input type="text" name="address" value="<?=$store->get("address")?>"></td>
								</tr>
								<tr>
									<th>City</th>
									<td><input type="text" name="city" value="<?=$store->get("city")?>"></td>
								</tr>
								<tr>
									<th>Zipcode</th>
									<td><input type="text" name="zipcode" value="<?=$store->get("zipcode")?>"></td>	
								</tr>
							</table>
						
						</td>
						<td>
						
							<table class="store-item">					
								<tr>
									<th>Address</th>
									<td><input type="text" name="delivery_address" value="<?=$store->get("delivery_address")?>"></td>
								</tr>
								<tr>
									<th>City</th>
									<td><input type="text" name="delivery_city" value="<?=$store->get("delivery_city")?>"></td>
								</tr>
								<tr>
									<th>Zipcode</th>
									<td><input type="text" name="delivery_zipcode" value="<?=$store->get("delivery_zipcode")?>"></td>	
								</tr>
							</table>
						
						</td>
					</tr>
				</table>
								
				<table class="store-item">
					<tr>
						<th>E-mail</th>
						<td>
							<input type="text" name="store_email" value="<?=$store->get("store_email")?>">
						</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>
							<input type="text" name="store_phone" value="<?=$store->get("store_phone")?>">
						</td>
					</tr>
					<tr>
						<th>Manager</th>
						<td>
							<input type="text" name="manager" value="<?=$store->get("manager")?>">
						</td>
					</tr>
					<tr>
						<th>Manager Phone</th>
						<td>
							<input type="text" name="manager_phone" value="<?=$store->get("manager_phone")?>">
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
	</table>