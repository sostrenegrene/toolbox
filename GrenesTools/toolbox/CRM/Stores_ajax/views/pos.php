<table class="container">
	<tr>
		<th class="col-pos"></th>
		<td>
			<table class="store-item pos-item">
				<tr>
					<td>POS</td>
					<td>Status</td>
					<td>Terminal ID</td>
					<td>Software</td>
					<td>Software version</td>
					<td>Integration</td>
					<td>
						<a href="?<?=FORM_ACTION?>=<?=FORM_ACTION_SAVE?>_pos&store_dbid=<?=$store->store("id")?>&search=<?=$getset->header("search")?>&value=<?=$getset->header("value")?>&exact_search=<?=$getset->header("exact_search")?>">[Add]</a>
					</td>
				</tr>				
				<?php 
					for ($i=0; $i<$store->pos_Count(); $i++) {
						$deletePOSLink = "?".FORM_ACTION . "=" . FORM_ACTION_DELETE . "_pos&id=" . $store->pos($i,"id") . "&search=".$getset->header("search")."&value=".$getset->header("value")."&exact_search=".$getset->header("exact_search");
				?>
				<form method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>_pos">
				<input type="hidden" name="id" value="<?=$store->pos($i,"id")?>">
				<input type="hidden" name="store_dbid" value="<?=$store->store("id")?>">
				<input type="hidden" name="search" value="<?=$getset->header("search")?>">
				<input type="hidden" name="value" value="<?=$getset->header("value")?>">
				<input type="hidden" name="exact_search" value="<?=$getset->header("exact_search")?>">
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
						<td>
							<table>
								<tr>
									<td>
										<input type="submit" value="Save">
										<a href="javascript:inget.confirm('Delete?','<?=$deletePOSLink?>')">[Del]</a>
									</td>
								</tr> 
							</table>
						</td>
					</tr>
				</form>
				<?php }//ENd for?>
			</table>
		</td>
	</tr>
</table>