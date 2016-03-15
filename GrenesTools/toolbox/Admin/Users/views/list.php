<?php foreach($sys_users->get_All() as $user) { ?>
	
	<div class="container">
	<form method="get" action="?">
	<input type="hidden" name="id" value="<?=$user['id']?>">
	<input type="hidden" name="username" value="<?=$user['username']?>">
	<input type="hidden" name="password" value="<?=$user['password']?>">
	<input type="hidden" name="access_level" value="<?=$user['access_level']?>">
		<table class="container">
			<tr>
				<td>
					<?=$user['username']?>
				</td>				
			</tr>
			<tr>				
				<td>
					<input type="submit" value="Edit">
					<a href="javascript:inget.confirm('Delete?','?<?=FORM_ACTION?>=<?=FORM_ACTION_DELETE?>&delete_id=<?=$user['id']?>')">[Del]</a>
				</td>
			</tr>
		</table>
		</form>
	</div>

<?php } ?>