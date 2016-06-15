<?php
$fTime = new Time();
$timer = $tman->get_Timer();
$tFormat = $fTime->format_ttmmss($timer['timer_seconds']);

if ($timer['time_end'] == null) { $active = "online"; }
else { $active = "offline"; }
?>
<table class="container text-center">
	<tr>
		<th colspan="2" class="container">
			<span class="<?=$active?>"><?=$tFormat?></span>
		</th>
	</tr>
	<tr>
	
	<? //if (empty($timer)) { ?>
		<td>
			<a class="button" href="?<?=FORM_ACTION?>=<?=FORM_ACTION_CREATE?>">Start</a>
		</td>
	<? //} else { ?>
		<td>
			<a class="button" href="?<?=FORM_ACTION?>=<?=FORM_ACTION_UPDATE?>&project_id=null&id=<?=$getset->header("id")?>">End</a>
		</td>
	<? //} ?>
	</tr>
	<tr>
		<td colspan="2" class="container">
			<a class="button" href="?project_id=null">Clear</a>
		</td>
	</tr>			
</table>