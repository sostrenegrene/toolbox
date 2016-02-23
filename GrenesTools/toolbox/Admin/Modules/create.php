<div class="admin-block inline">
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>"> 
		<table>
			<tr>
				<th>Menu</th>
				<th>Name</th>
				<th>Package</th>
				<th>Module</th>
				<th>Index</th>
				<td></td>
			</tr>
			<tr>
				<td>
					<select name="menu_id">
						<?=$menuSelect?>
					</select>	
				</td>
				<td> <input type="text" name="name" placeholder="name"> </td>
				<td> <input type="text" name="package" placeholder="folder"> </td>
				<td> <input type="text" name="module" placeholder="folder"> </td>			
				<td> <input type="text" name="index" placeholder="file"> </td>
				<td class="btn-save"> <input type="submit" value="Save"> </td>
			</tr>			
		</table>
	</form>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
		<table>
			<tr>
				<th>Submenu</th>
				<th>Package</th>
				<th>Module</th>
				<th>Index</th>
				<td></td>
			</tr>
			<tr>
				<td>
					<select name="menu_id">
						<?=$subSelect?>
					</select>	
				</td>
				<td> <input type="text" name="package" placeholder="folder"> </td>
				<td> <input type="text" name="module" placeholder="folder"> </td>			
				<td> <input type="text" name="index" placeholder="file"> </td>
				<td class="btn-save"> <input type="submit" value="Save"> </td>
			</tr>			
		</table>
	</form>
</div>