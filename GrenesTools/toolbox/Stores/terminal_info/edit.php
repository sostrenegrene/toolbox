<?php $termItem = $term->load(); ?>
<form method="get" action="?">
<input type="hidden" name="include" value="view">
<input type="hidden" name="action" value="edit">
<input type="hidden" name="id" value="<?=$termItem['id']?>">
<table>
<!-- 
	<tr>
		<td>
			<label for="amount">Amount</label>
		<td>
			<input type="text" name="amount" id="amount" value="<?=$termItem['amount']?>">
		</td>
	</tr>
-->
	<tr>
		<td>
			<label for="store_id">Store ID</label>
		<td>
			<input type="text" name="store_id" id="store_id" value="<?=$termItem['store_id']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="store">Store</label>
		<td>
			<input type="text" name="store" id="store" value="<?=$termItem['store']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="address">Address</label>
		<td>
			<input type="text" name="address" id="address" value="<?=$termItem['address']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="city">City</label>
		<td>
			<input type="text" name="city" id="city" value="<?=$termItem['city']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="zipcode">Zip Code</label>
		<td>
			<input type="text" name="zipcode" id="zipcode" value="<?=$termItem['zipcode']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="bax">BAX</label>
		<td>
			<input type="text" name="bax" id="bax" value="<?=$termItem['bax']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="tof">TOF</label>
		<td>
			<input type="text" name="tof" id="tof" value="<?=$termItem['tof']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="organization_number">Org. Nr.</label>
		<td>
			<input type="text" name="organization_number" id="organization_number" value="<?=$termItem['organization_number']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="terminal_id">Terminal ID</label>
		<td>
			<input type="text" name="terminal_id" id="terminal_id" value="<?=$termItem['terminal_id']?>">
			<div style="display:inline;" id="terminal_id_check"></div>
		</td>
	</tr>
	<tr>
		<td>
			<label for="pos">POS</label>
		<td>
			<input type="text" name="pos" id="pos" value="<?=$termItem['pos']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="terminal_model">Terminal Model</label>
		<td>
			<input type="text" name="terminal_model" id="terminal_model" value="<?=$termItem['terminal_model']?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="franchiser">Franchiser</label>
		<td>
			<input type="text" name="franchiser" id="franchiser" value="<?=$termItem['franchiser']?>">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Save">
		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
terms.has_TermID("terminal_id");
</script>