<div class="container">
<p>Update</p>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_UPDATE?>">
		<table>
			<tr>
				<th>New name</th>
				<th>For menu</th>
				<th>Level</th>
				<th></th>
			</tr>	
			<tr>
				<td>
					<input type="text" name="menu_name" placeholder="Menu name">
				</td>
				<td>
					<select name="id">
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
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_UPDATE?>">
		<table>
			<tr>
				<th>New name</th>
				<th>For submenu</th>
				<th>Level</th>
				<th></th>
			</tr>	
			<tr>
				<td>
					<input type="text" name="menu_name" placeholder="Menu name">
				</td>
				<td>
					<select name="id">
						<?=$subSelect?>
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