<?php
$getset->setStandardValue("username", $sys_users->username());
?>
<form method="get" action="?">
<input type="hidden" name="id" value="null">
	<table class="container">
		<tr>
			<td>
				<?=$pman->get_Select()?>
			</td>
			<td>
				<input type="text" name="user_email" value="<?=$getset->header("username")?>" placeholder="E-mail">
			</td>
			<td>
				<input class="button" type="submit" value="Select">
			</td>
		</tr>
	</table>
	
</form>