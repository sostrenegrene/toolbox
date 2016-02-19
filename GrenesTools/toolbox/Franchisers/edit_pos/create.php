<?php 
$posItem = $pos->get_One();
//print_r($posItem);
//Assign values(if any) to getset as standard values
//These will be loaded if nothing else is provided in header
$getset->setStandardValue("pos_num",$posItem['pos_num']);
$getset->setStandardValue("terminal_id",$posItem['terminal_id']);
$getset->setStandardValue("terminal_model",$posItem['terminal_model']);
$getset->setStandardValue("terminal_software",$posItem['terminal_software']);
$getset->setStandardValue("terminal_software_version",$posItem['terminal_software_version']);
$getset->setStandardValue("terminal_software_registered",$posItem['terminal_software_registered']);
$getset->setStandardValue("teamviewer_user",$posItem['teamviewer_user']);
$getset->setStandardValue("teamviewer_pass",$posItem['teamviewer_pass']);
?>

<div class="admin-block-sff inline">
	<form method="get" action="?">
		<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<input type="hidden" name="id" value="<?=$getset->header("id")?>">
		<table>
			<tr>
				<th>POS <a href="?">Clear</a></th>				
			</tr>
			<tr>
				<td>
					<select name="store_dbid">
						<option>Store</option>
						<?=$stores->get_StoreSelectOptions()?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="pos_num" value="<?=$getset->header("pos_num")?>" placeholder="POS Num">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="terminal_id" value="<?=$getset->header("terminal_id")?>" placeholder="Terminal id">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="terminal_model" value="<?=$getset->header("terminal_model")?>" placeholder="Terminal model">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="terminal_software" value="<?=$getset->header("terminal_software")?>" placeholder="Terminal software">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="terminal_software_version" value="<?=$getset->header("terminal_software_version")?>" placeholder="Terminal software ver.">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="terminal_software_registered" value="<?=$getset->header("terminal_software_registered")?>" placeholder="Software reg.">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="teamviewer_user" value="<?=$getset->header("teamviewer_user")?>" placeholder="Teamviewer User">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="teamviewer_pass" value="<?=$getset->header("teamviewer_pass")?>" placeholder="Teamviewer password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Save">
				</td>
			</tr>
		</table>
	</form>
</div>