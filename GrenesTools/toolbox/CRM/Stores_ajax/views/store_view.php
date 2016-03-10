<?php $deleteLink = "?".FORM_ACTION . "=" . FORM_ACTION_DELETE . "_store&id=" . $store->store("id"); ?>
<table class="store-container container">
	<tr>
		<td id="store">
			<?php require __DIR__.'/store_head.php'; ?>
		</td>
	</tr>
	<tr>
		<td id="store-items">
			
			<form method="get" action="?">
			<input type="hidden" name="<?=FORM_ACTION?>" value="<?=FORM_ACTION_SAVE?>_store">
			<input type="hidden" name="search" value="<?=$getset->header("search")?>">
			<input type="hidden" name="value" value="<?=$getset->header("value")?>">
			<input type="hidden" name="exact_search" value="<?=$getset->header("exact_search")?>">
			<input type="hidden" name="id" value="<?=$store->store("id")?>">			
			
				<table>
					<tr>
						<td>
							<input type="submit" value="Save">
							<a href="javascript:inget.confirm('Delete?','<?=$deleteLink?>')">Delete</a>
						</td>
					</tr> 
					<tr>
						<td>
							<?php require __DIR__.'/franchiser.php'; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require __DIR__.'/store_details.php'; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require __DIR__.'/economics.php'; ?>
						</td>
					</tr>
				</table>
			</form>
			
		</td>
	</tr>
	<tr>
		<td>
		
			<table>
				<tr>
					<td>
						<?php require __DIR__.'/pos.php'; ?>
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>