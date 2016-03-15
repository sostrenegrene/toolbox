<?php
switch($getset->header(FORM_ACTION)) {
	
	case FORM_ACTION_SAVE:
		$settings->insert($getset->header("name"),
						$getset->header("value"),
						$getset->header("group_name"),
						$getset->header("id"));
		break;
		
	case FORM_ACTION_DELETE:
		$settings->delete($getset->header("delete_id"));
		break;
}

$setList = $settings->get_All();
?>

<div class="container">
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
	<table class="container center">
		<tr>
			<td>
				<input type="text" name="name" placeholder="Setting name">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="value" placeholder="Setting value">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="group_name" placeholder="Group name">
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

<?php if ($setList != null) {
	foreach($setList as $item) { 
?>

<div class="container">
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$item['id']?>">
	<table class="container center">
		<tr>
			<td>
				<input type="text" name="name" value="<?=$item['name']?>" placeholder="Setting name">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="value"value="<?=$item['value']?>" placeholder="Setting value">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="group_name" value="<?=$item['group_name']?>" placeholder="Group name">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Save">
				<a href="javascript:inget.confirm('Delete?','?delete_id=<?=$item['id']?>&<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>')">[Del]</a>
			</td>
		</tr>
	</table>
</form>
</div>

<?php } } ?>