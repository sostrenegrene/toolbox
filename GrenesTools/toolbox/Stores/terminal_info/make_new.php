<?php
?>
<form method="get" action="?">
<input type="hidden" name="action" value="create">
	<table>
		<tr>
			<td>
				<label for="store_id">Butik Nr.</label>
			</td>
			<td>
				<input type="text" name="store_id" id="store_id">				
			</td>
		</tr>
		<tr>
			<td>
				<label for="pos">POS</label>
			</td>
			<td>
				<input type="text" name="pos" id="pos">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Save">
			</td>
		</tr>
	</table>
</form>