<div class="admin-block inline">
<p>Delete</p>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_DELETE?>">
		<table>
			<tr>
				<th>Menu<sup>will delete subs & modules</sup></th>				
				<th></th>
			</tr>	
			<tr>				
				<td>
					<select name="delete_id">
						<option>Select</option>
						<?=$menuSelect?>
					</select>
				</td>				
				<td class="btn-save">
					<input type="submit" value="Delete">
				</td>				
			</tr>
		</table>
	</form>
	<form method="get" action="?">
	<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_DELETE?>">
		<table>
			<tr>
				<th>Submenu</th>				
				<th></th>
			</tr>	
			<tr>			
				<td>
					<select name="id">
						<option>Select</option>
						<?=$subSelect?>
					</select>
				</td>				
				<td class="btn-save">
					<input type="submit" value="Delete">
				</td>				
			</tr>
		</table>
	</form>
</div>