<?php 
$francItem = $franc->get_One($getset->header("id"));
?>
<div class="admin-block-sff inline">
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$getset->header("id")?>">
	<table>
		<tr>
			<th>Create Franchiser &nbsp;&nbsp;<a href="?">Clear</a></th>
		</tr>
		<tr>
			<td>
				<input type="text" name="franchiser" value="<?=$francItem['franchiser']?>" placeholder="Franchiser">
			</td>
		</tr>
		<!-- 
		<tr>
			<td>
				<input type="text" name="org_num" value="<?=$francItem['organization_number']?>" placeholder="Organization Number(no)">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="bax" value="<?=$francItem['bax']?>" placeholder="Bax(no)">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="tof" value="<?=$francItem['tof']?>" placeholder="Tof(no)">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="cvr" value="<?=$francItem['cvr']?>" placeholder="CVR(dk)">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="forretnings_nr" value="<?=$francItem['forretnings_nummer']?>" placeholder="Forretnings nr.(dk)">
			</td>
		</tr>
		 -->
		<tr>
			<td>
				<input type="submit" value="Save">				
			</td>
		</tr>
	</table>
</form>
</div>