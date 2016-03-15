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
						<input type="text" name="organization_number" value="<?=$store->get("organization_number")?>">
					</td>
				</tr>
				<tr>
					<th>BAX</th>					
					<td>
						<input type="text" name="bax" value="<?=$store->get("bax")?>">
					</td>
				</tr>
				<tr>
					<th>TOF</th>
					<td>
						<input type="text" name="tof" value="<?=$store->get("tof")?>">
					</td>
				</tr>
				<tr>
					<th>CVR</th>
					<td>
						<input type="text" name="cvr" value="<?=$store->get("cvr")?>">
					</td>
				</tr>
				<tr>
					<th>PBS Forretnings Num.</th>
					<td>
						<input type="text" name="forretnings_nummer" value="<?=$store->get("forretnings_nummer")?>">
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>