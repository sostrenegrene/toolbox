<?php
$pos = new POS($db,0,$sItem['id']);
$posList = $pos->get_All();
$status = $pos->get_Status();
$pos_string = "";
//print_r($status);
$pos_string = "";
if ($posList != null) {	

	if ($status['total'] == 0) {
		$pos_string = "<div class=\"online-status-inactive\">".$status['total']."</div>";
	}
	else {
		if ($status['offline'] > 0) {
			$pos_string = "<div class=\"online-status-off\">".$status['offline']."</div>";
		}
		else {
			$pos_string = "<div class=\"online-status-on\">".$status['total']."</div>";
		}
	}
	
}//ENd if
?>
<div class="monitor-block-s inline">
	<a href="?load=<?=$sys_menu->menuIdByName("Stores")?>&country_id=<?=$sItem['country_id']?>&store_dbid=<?=$sItem['id']?>&franchiser_id=<?=$sItem['franchiser_id']?>">
		<table class="pos-table">
			<tr>
				<th>
					<?=$sItem['store_id']?>
				</th>
			</tr>
			<tr>
				<td>			
					<?=$pos_string?>			
				</td>
			</tr>
		</table>
	</a>
</div>