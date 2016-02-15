<?php
$pos = new POS($db,0,$sItem['id']);
$posList = $pos->get_All();
$pos_string = "";
if ($posList != null) {	
	foreach($posList as $pItem) {
		if ($pItem['online_minute'] > 5) { $status = "off"; }
		else { $status = "on"; }

		$pos_string .= "<div class=\"online-status-".$status." inline\">".$pItem['pos_num']."</div>&nbsp;";
	}//ENd foreach	
}//ENd if
?>
<div class="admin-block">
	<table class="pos-table">
		<tr>
			<th><?=$sItem['name']?></th>
			<td><?=$pos_string?></td>
		</tr>
	</table>
</div>