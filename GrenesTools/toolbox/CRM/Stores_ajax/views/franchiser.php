<?php
?>
<table class="container">
	<tr>
		<th class="col-franchiser"></th>
		<td>
				
			<table>
				<tr>
					<td>Franchiser</td>
					<td>
						<?=$store->franchiser("franchiser")?>
					</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>
						<?=$store->franchiser("email")?>
					</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>
						<?=$store->franchiser("phone_number")?>
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>