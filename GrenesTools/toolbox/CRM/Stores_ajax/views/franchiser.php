<?php
?>
<table class="container">
	<tr>
		<th class="col-franchiser"></th>
		<td>
		
			<table class="store-item">
				<tr>
					<td class="w50">
						<table class="store-item">
							<tr>
								<th>Franchiser</th>
								<td>												
									<?=$sdl->franchiser_Select($store->franchiser()->get("id"))?>
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td>
									<?=$store->franchiser()->get("email")?>
								</td>
							</tr>
							<tr>
								<th>Phone</th>
								<td>
									<?=$store->franchiser()->get("phone_number")?>
								</td>
							</tr>
						</table>
					</td>
					
					<td class="w50">
						<table class="store-item">
							<tr>
								<th>Address</th>
								<td>												
									<?=$store->franchiser()->get("address")?>
								</td>
							</tr>
							<tr>
								<th>City</th>
								<td>
									<?=$store->franchiser()->get("city")?>
								</td>
							</tr>
							<tr>
								<th>Zipcode</th>
								<td>
									<?=$store->franchiser()->get("zipcode")?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			
			</table>
			
		</td>
	</tr>
</table>