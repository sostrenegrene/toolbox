<div class="admin-block inline">
<p>Create</p>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<table>
			<tr>
				<th>Main menu</th>
				<th>Level</th>
				<th></th>
			</tr>	
			<tr>
				<td>
					<input type="text" name="menu_name" placeholder="Menu name">
				</td>
				<td>
					<select name="level">
						<option value="0">0</option>
					</select>
				</td>
				<td class="btn-save">
					<input type="submit" value="Save">
				</td>				
			</tr>
		</table>
	</form>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<table>
			<tr>
				<th>Sub menu</th>
				<th>For menu</th>
				<th>Level</th>
				<th></th>
			</tr>	
			<tr>
				<td>
					<input type="text" name="menu_name" placeholder="Menu name">
				</td>
				<td>
					<select name="sub_id">
						<?=$menuSelect?>
					</select>
				</td>
				<td>
					<select name="level">
						<option value="0">0</option>
					</select>
				</td>
				<td class="btn-save">
					<input type="submit" value="Save">
				</td>				
			</tr>
		</table>
	</form>
</div>