<table class="container">
	<tr>
		<th class="col-pos"></th>
		<td>
			<table class="store-item pos-item">
				<tr>
					<td class="small-title">POS</td>
					<td class="small-title"><!-- Status --></td>
					<td class="small-title">POS Note</td>
					<td class="small-title">Monitor Note</td>
					<td class="small-title">Terminal</td>
					<td class="small-title">Software</td>
					<td class="small-title">Version</td>
					<td class="small-title">Reg.</td>
					<td class="small-title">Term Note</td>
					<td>
						<? $sys_users->hasAccess("User","<a class=\"button\" href=\"?".FORM_ACTION."=".FORM_ACTION_SAVE."_pos&store_dbid=".$store->get("id")."&search=".$getset->header("search")."&value=".$getset->header("value")."&exact_search=".$getset->header("exact_search")."\">Add</a>") ?>
					</td>
				</tr>				
				<?php 
					for ($i=0; $i<$store->pos()->count(); $i++) {
						$deletePOSLink = "?".FORM_ACTION . "=" . FORM_ACTION_DELETE . "_pos&delete_id=" . $store->pos()->get($i,"id") . "&search=".$getset->header("search")."&value=".$getset->header("value")."&exact_search=".$getset->header("exact_search");
				?>
				<form method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>_pos">
				<input type="hidden" name="id" value="<?=$store->pos()->get($i,"id")?>">
				<input type="hidden" name="store_dbid" value="<?=$store->get("id")?>">
				<input type="hidden" name="search" value="<?=$getset->header("search")?>">
				<input type="hidden" name="value" value="<?=$getset->header("value")?>">
				<input type="hidden" name="exact_search" value="<?=$getset->header("exact_search")?>">
					<tr>
						
						<td>
							<input class="input wSmall" type="text" name="pos_num" value="<?=$store->pos()->get($i,"pos_num")?>">
						</td>
						<td>
							<div class="pos-status <?=$store->pos()->get($i,"status")?>"></div>
						</td>
						<td>
							<input class="input wLarge" type="text" name="pos_note" placeholder="POS Note" value="<?=$store->pos()->get($i,"pos_note")?>">
						</td>
						<td>
							<input class="notes wLarge" type="text" name="monitor_note" placeholder="Monitor Note" value="<?=$store->pos()->get($i,"monitor_note")?>">
						</td>									
						<td>
							<input class="input wMedium" type="text" name="terminal_id" placeholder="Term ID" value="<?=$store->pos()->get($i,"terminal_id")?>">
						</td>
						<td>
							<input class="input wMedium" type="text" name="terminal_software" placeholder="Software" value="<?=$store->pos()->get($i,"terminal_software")?>">
						</td>
						<td>
							<input class="input wMedium" type="text" name="terminal_software_version" placeholder="Version" value="<?=$store->pos()->get($i,"terminal_software_version")?>">
						</td>
						<td>
							<input class="input wMedium" type="text" name="terminal_software_registered" placeholder="Sofw Reg." value="<?=$store->pos()->get($i,"terminal_software_registered")?>">
						</td>
						<td>
							<input class="input wLarge" type="text" name="terminal_note" placeholder="Term Note" value="<?=$store->pos()->get($i,"terminal_note")?>">
						</td>
			
						<td>
							<table>
								<tr>
									<td>										
										<? $sys_users->hasAccess("Admin","<a class=\"button\" href=\"javascript:inget.confirm('Delete?','".$deletePOSLink."')\">Del</a>") ?>
									</td>
									<td>										
										<? $sys_users->hasAccess("User","<input type=\"submit\" value=\"Save\" class=\"button\">") ?>
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