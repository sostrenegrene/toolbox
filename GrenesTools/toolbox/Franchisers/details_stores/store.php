<?php 
if ($getset->header("store_dbid") > 0) {  
	$franchiser = new Franchisers($db,$getset->header("franchiser_id"),0);
	$store = new Stores($db,$getset->header("store_dbid"));
	$pos = new POS($db,0,$getset->header("store_dbid"));

	$franchItem = $franchiser->get_One();
	$storeItem = $store->get_One();
	$posItems = $pos->get_All();
?>
<table class="inline">
	<tr>
		<td>
			<table class="franchisee">
				<tr>
					<td style="width:50%;">Franchisee</td>
					<td>
						<?=$franchItem['franchiser']?><br>
						<?=$franchItem['email']?><br>
						<?=$franchItem['phone_number']?>
					</td>
				</tr>				
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table class="store">				
				<tr>
					<td>
						<?=$storeItem['name']?><br>
						<?=$storeItem['address']?><br>
						<?=$storeItem['zipcode']?> <?=$storeItem['city']?><br>
					</td>
					<td>
						<p>Store:</p>
						<?=$storeItem['store_email']?><br>
						<?=$storeItem['store_phone']?><br>
						<p>Manager:</p>
						<?=$storeItem['manager']?><br>
						<?=$storeItem['manager_phone']?><br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
		
			<table class="economics">
				<tr>
					<td>Organization number</td>
					<td><?=$storeItem['organization_number']?></td>
				</tr>
				<tr>
					<td>Bax</td>
					<td><?=$storeItem['bax']?></td>
				</tr>
				<tr>
					<td>Tof</td>
					<td><?=$storeItem['tof']?></td>
				</tr>
				<tr>
					<td>CVR</td>
					<td><?=$storeItem['cvr']?></td>
				</tr>
				<tr>
					<td>PBS. Forretningsnummer</td>
					<td><?=$storeItem['forretnings_nummer']?></td>
				</tr>
			</table>
			
		</td>	
	</tr>
	<tr>
		<td>
			<table class="pos">
				<tr>
					<td>POS</td>
					<td>Term. ID</td>
					<td>Teamviwer</td>
					<td>NAV</td>
					<td style="width:50px;">Online</td>
				</tr>
				<?php if ($posItems != null) { foreach($posItems as $posItem) { ?>
				
				<tr>
					<td><?=$posItem['pos_num']?></td>
					<td><?=$posItem['terminal_id']?></td>
					<td>(LINK)</td>
					<td>(LINK)</td>
					<td><div class="<?=$posItem['status']?>"></div></td>
				</tr>
				
				<?php } }//ENd foreach / if ?>
			</table>
		</td>
	</tr>
</table>
<?php }//ENd if ?>