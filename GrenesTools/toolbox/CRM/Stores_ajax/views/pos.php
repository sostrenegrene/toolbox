<table class="container">
	<tr>
		<th class="col-pos"></th>
		<td>
			<table class="store-item">
				<td>POS</td>
				<td>Status</td>
				<td>Terminal ID</td>
				<td>Software</td>
				<td>Software version</td>
				<td>Integration</td>
				<td><!-- empty for options --></td>
				<?php for ($i=0; $i<$store->pos_Count(); $i++) { ?>
				<tr>
					<td>
						<input type="text" name="pos_num" value="<?=$store->pos($i,"pos_num")?>" size="2">
					</td>
					<td><div class="pos-status <?=$store->pos($i,"status")?>"></div></td>
					<td>
						<input type="text" name="terminal_id" value="<?=$store->pos($i,"terminal_id")?>">
					</td>
					<td>
						<input type="text" name="terminal_software" value="<?=$store->pos($i,"terminal_software")?>">
					</td>
					<td>
						<input type="text" name="terminal_software_version" value="<?=$store->pos($i,"terminal_software_version")?>">
					</td>
					<td>
						<input type="text" name="terminal_software_registered" value="<?=$store->pos($i,"terminal_software_registered")?>">
					</td>
					<td>TW</td>
				</tr>
				<?php }//ENd for?>
			</table>
		</td>
	</tr>
</table>