<?php 
if ($getset->header("store_dbid") > 0) {  
	$franchiser = new Franchisers($db,$getset->header("franchiser_id"),0);
	$store = new Stores($db,$getset->header("store_dbid"));
	$pos = new POS($db,0,$getset->header("store_dbid"));

	$franchItem = $franchiser->get_One();
	$storeItem = $store->get_One();
	$posItems = $pos->get_All();
	
	$fEdit = $sys_menu->menuIdByName("Edit","Franchisers");
	$sEdit = $sys_menu->menuIdByName("Edit","Stores");
	$pEdit = $sys_menu->menuIdByName("Edit","POS");
?>
<table class="inline container">
	<tr>
		<td class="franchisee"></td>
		<td>
			<table class="stores-store container">
				<tr>
					<td style="width:50%;">					
						<a href="?">Franchisee</a>
						<?php $sys_users->hasAccess(1,"<a href=\"?load=".$fEdit."&id=".$franchItem['id']."\">Edit</a>"); ?>	
					</td>
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
		<td class="store"></td>
		<td>
			<table class="stores-store container">				
				<tr>
					<td>
						<?php $sys_users->hasAccess(1,"<a href=\"?load=".$sEdit."&id=".$storeItem['id']."\">Edit</a>"); ?><br>
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
		<td class="economics"></td>
		<td>
		
			<table class="stores-store container">
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
		<td class="pos"></td>
		<td>
			<table class="stores-store container">
				<tr>
					<td>POS</td>
					<td>Term. ID</td>
					<td>Teamviwer</td>					
					<td style="width:50px;">Online</td>
				</tr>
				<?php if ($posItems != null) { foreach($posItems as $posItem) { ?>
				
				<tr>
					<td><?=$posItem['pos_num']?></td>
					<td><?=$posItem['terminal_id']?></td>
					<td>
						<a href="teamviewer://<?=$posItem['teamviewer_user']?>">TW</a>
					</td>					
					<td><div class="<?=$posItem['status']?>"></div></td>
					<td>
						<?php $sys_users->hasAccess(1,"<a href=\"?load=".$pEdit."&id=".$posItem['id']."&store_dbid=".$storeItem['id']."\">Edit</a>"); ?>
					</td>
				</tr>
				
				<?php } }//ENd foreach / if ?>
			</table>
		</td>
	</tr>
</table>
<?php }//ENd if ?>