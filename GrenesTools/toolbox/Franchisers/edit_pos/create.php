<?php 
$posItem = $pos->get_One();
//Assign values(if any) to getset as standard values
//These will be loaded if nothing else is provided in header
$getset->setStandardValue("pos_num",$posItem['pos_num']);
$getset->setStandardValue("terminal_id",$posItem['terminal_id']);
$getset->setStandardValue("teamviewer_user",$posItem['teamviewer_user']);
$getset->setStandardValue("teamviewer_pass",$posItem['teamviewer_pass']);
?>

<div class="admin-block-sff inline">
	<form method="get" action="?">
		<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<input type="hidden" name="id" value="<?=$getset->header("id")?>">
		<table>
			<tr>
				<th>POS</th>				
			</tr>
			<tr>
				<td>
					<select name="store_dbid">
						<option>Store</option>
						<?=$stores->get_SelectOptions()?>
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