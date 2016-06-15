	
<?php
foreach($sList as $store) {

	if ( ($store->get("monitor") != null) && ($store->get("monitor") > 0)) {
	
 		if ( ($store->pos()->status("offline") > 0) || ($store->pos()->status("warning") > 0)) {?>
	
			<table class="container inline">
				<tr>
					<th class="insert-type"><?=$store->get("store_id")?></th>
				</tr>
		
				<?php 
					//$store->pos()->print_r();
					for ($i=0; $i<$store->pos()->count(); $i++) {
						$status = $store->pos()->get($i,"status");
						$message = $store->pos()->get($i,"message");
						
						if (($status == "offline") || ($status == "warning")) {
				?>
				<tr>
					<td class="<?=$status?>"><?=$message?></td>									
				</tr>
			<?php }} ?>	
			
			</table>						
		<?php } 
	}
}
?>