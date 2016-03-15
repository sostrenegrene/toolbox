<div class="container">
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$getset->header("id")?>">
	<table class="container">
		<tr>
			<td>
				<input type="text" name="username" value="<?=$getset->header("username")?>" placeholder="Username">
			</td>
			<td>
				<input type="text" name="password" value="<?=$getset->header("password")?>" placeholder="Password">
			</td>
		</tr>
		<tr>
			<td>
				<select name="level">
					<option value="0">0</option>
					<?php foreach ($settings->group_to_array("access_level") as $level) {
							if ($getset->header("access_level") == $level['value']) { $sel = "selected"; } else { $sel = ""; }	
					?>
						<option value="<?=$level['value']?>" <?=$sel?> ><?=$level['name']?></option>
					<?php } ?>
				</select>
			</td>
			<td>
				<input type="submit" value="Save">
			</td>
		</tr>
	</table>
</form>
</div>