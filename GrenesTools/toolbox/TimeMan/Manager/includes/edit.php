<?php
$deleteUrl = "?".FORM_ACTION."=".FORM_ACTION_DELETE."&delete_id=".$getset->header("_id"); 
?>
<form method="get" action="?">
<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>">
<input type="hidden" name="id" value="<?=$getset->header("_id")?>">
	<table class="container">
		<tr>
			<td>
				<input type="text" name="name" value="<?=$getset->header("_name")?>" placeholder="Project Name">
			</td>
			<td>
				<input type="text" name="manager_email" value="<?=$getset->header("_manager_email")?>" placeholder="Manager E-mail">
			</td>			
			<td>
				<input class="button" type="submit" value="Save">
			</td>
			<? if ($getset->header("_id") != null) {?>
			<td>				
				<a class="button" href="javascript:inget.confirm('Delete?','<?=$deleteUrl?>')">Del</a>
			</td>
			<? } ?>
		</tr>
	</table>
</form>
		