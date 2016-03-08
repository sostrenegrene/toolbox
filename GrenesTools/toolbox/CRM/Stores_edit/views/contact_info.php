<?php
?>
<table class="container">
	<tr>
		<th class="col-contact"></th>
		<td>
			
			<table>
				<tr>
					<td>Store</td>
					<td><?=$store->store("name")?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><?=$store->store("country")?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<?=$store->store("address")?><br>
						<?=$store->store("zipcode")?> <?=$store->store("city")?>
					</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td><?=$store->store("store_email")?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?=$store->store("store_phone")?></td>
				</tr>
				<tr>
					<td>Manager</td>
					<td><?=$store->store("manager")?></td>
				</tr>
				<tr>
					<td>Manager Phone</td>
					<td><?=$store->store("manager_phone")?></td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>