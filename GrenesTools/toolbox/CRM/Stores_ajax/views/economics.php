<?php
?>
<table class="container">
	<tr>
		<th class="col-economics"></th>
		<td>
			
			<table class="store-item">
				<tr>
					<th>Organization Num.</th>
					<td>
						<input type="text" name="store_org_num" value="<?=$store->store("organization_number")?>">
					</td>
				</tr>
				<tr>
					<th>BAX</th>					
					<td>
						<input type="text" name="store_bax" value="<?=$store->store("bax")?>">
					</td>
				</tr>
				<tr>
					<th>TOF</th>
					<td>
						<input type="text" name="store_tof" value="<?=$store->store("tof")?>">
					</td>
				</tr>
				<tr>
					<th>CVR</th>
					<td>
						<input type="text" name="store_cvr" value="<?=$store->store("cvr")?>">
					</td>
				</tr>
				<tr>
					<th>PBS Forretnings Num.</th>
					<td>
						<input type="text" name="store_forret_num" value="<?=$store->store("forretnings_nummer")?>">
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>