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
						<input type="text" name="organization_number" value="<?=$store->store("organization_number")?>">
					</td>
				</tr>
				<tr>
					<th>BAX</th>					
					<td>
						<input type="text" name="bax" value="<?=$store->store("bax")?>">
					</td>
				</tr>
				<tr>
					<th>TOF</th>
					<td>
						<input type="text" name="tof" value="<?=$store->store("tof")?>">
					</td>
				</tr>
				<tr>
					<th>CVR</th>
					<td>
						<input type="text" name="cvr" value="<?=$store->store("cvr")?>">
					</td>
				</tr>
				<tr>
					<th>PBS Forretnings Num.</th>
					<td>
						<input type="text" name="forretnings_nummer" value="<?=$store->store("forretnings_nummer")?>">
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>