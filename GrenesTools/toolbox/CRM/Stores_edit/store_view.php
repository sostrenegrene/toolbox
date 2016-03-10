<table class="store-container container">	
	<tr>
		<td id="store">
			<?php require __DIR__.'/views/store_head.php'; ?>
		</td>
	</tr>
	<tr>
		<td id="store-items">
		
			<form method="get" action="?">
				<table>
					<tr>
						<td>
							<?php require __DIR__.'/views/franchiser.php'; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require __DIR__.'/views/store_details.php'; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php require __DIR__.'/views/economics.php'; ?>
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
						<?php require __DIR__.'/views/pos.php'; ?>
					</td>
				</tr>
			</table>				
		</td>
	</tr>
</table>