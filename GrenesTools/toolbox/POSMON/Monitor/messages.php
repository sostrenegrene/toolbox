<?php if ($factories->has_Factory()) { ?>
<div class="streamer container">

<?php
		foreach($factories->factories() as $factory) {
			if ($factory->has_Message()) {
?>
				<table class="container inline">
					<tr>
						<th class="<?=$factory->type()?>"><?=$factory->title()?></th>
					</tr>
					<?php foreach ($factory->messages() as $msg) { ?>
					<tr>
						<td><?=$msg?></td>									
					</tr>
					<?php } ?>
				</table>						
<?php 
			}//ENd if			
		}//ENd foreach
?>

</div>
<?php }//ENd if ?>