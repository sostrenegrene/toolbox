<table class="container">
	<tr>
		<td class="wSmall">
			<?$sys_users->hasAccess("User","<input class=\"button\" type=\"submit\" value=\"Save\">")?>
		</td>
		<td class="wSmall">
			<?$sys_users->hasAccess("Admin","<a class=\"button\" href=\"javascript:inget.confirm('Delete?','".$deleteLink."')\">Delete</a>")?>
		</td>
		<td class="wMedium">
			<? if (($sys_users->hasAccess("Admin")) && ($store->get("meraki_url") != null)) { ?>
				<a href="<?=$store->get("meraki_url")?>" class="button" target="_blank">Meraki</a>
			<? }	
			if (($store->get("monitor") != null) || ($store->get("monitor") > 0)) { ?>
				<span class="button-clear online"> <input type="checkbox" name="monitor" value="1" checked > Montor </span>
			<? } else { ?>
				<span class="button-clear offline"> <input type="checkbox" name="monitor" value="1"> Montor </span>
			<? } ?>	
		</td>
		<td></td>
	</tr>
</table>