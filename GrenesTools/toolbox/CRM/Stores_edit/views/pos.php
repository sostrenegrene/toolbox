<table class="container">
	<tr>
		<th class="col-pos"></th>
		<td>
			<table>
				<td>POS</td>
				<td>Status</td>
				<td>Terminal ID</td>
				<td>Software</td>
				<td>Software version</td>
				<td>Integration</td>
				<td><!-- empty for options --></td>
				<?php for ($i=0; $i<$store->pos_Count(); $i++) { ?>
				<tr>
					<td><?=$store->pos($i,"pos_num")?></td>
					<td><div class="pos-status <?=$store->pos($i,"status")?>"></div></td>
					<td><?=$store->pos($i,"terminal_id")?></td>
					<td><?=$store->pos($i,"terminal_software")?></td>
					<td><?=$store->pos($i,"terminal_software_version")?></td>
					<td><?=$store->pos($i,"terminal_software_registered")?></td>
					<td>TW</td>
				</tr>
				<?php }//ENd for?>
			</table>
		</td>
	</tr>
</table>