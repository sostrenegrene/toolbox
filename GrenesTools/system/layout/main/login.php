<?php

?>
<table>
	<tr>
	<?php if ($sys_users->level() == 0) { ?>
		<td>
			<form method="get" action="?">
				<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_LOGIN?>">
				<input type="text" name="sys_username" placeholder="Username" style="width:5em;">
				<input type="text" name="sys_password" placeholder="Password" style="width:5em;">
				<input type="submit" value="OK">
			</form>
		</td>
	<?php } else { ?>
		<td>
			<a href="?<?=FORM_ACTION?>=<?=FORM_ACTION_LOGOUT?>"><?=$sys_users->username()?></a>
		</td>
	<?php } ?>
	</tr>
</table>