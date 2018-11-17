<div class="container row">
	<div class="input-field col s2">
		<select>
		  <option value="" disabled selected>Pilih Tipe Sorting</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Sorting Tanggal Transaksi</label>
	</div>
	<div class="input-field col s2">
		<select>
		  <option value="" disabled selected>Pilih Tipe Sorting</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Sorting Pelanggan</label>
	</div>
		<table>
		<thead>
		  <tr>
			  <th class="center-align">Id Transaksi</th>
			  <th class="center-align">Pelanggan</th>
			  <th class="center-align">Tanggal</th>
			  <th class="center-align">Nominal</th>
			  <th class="center-align">Status Pembayaran</th>
			  <th class="center-align">Status Pengiriman</th>
			  <th class="center-align">Aksi Pembayaran</th>
			  <th class="center-align">Aksi Pengiriman</th>
		  </tr>
		</thead>
	
		<tbody>
		<?php
		foreach($transactions as $transaction){
			if($transaction->jenis_barang != 0){
		?>
		  <tr>
			<td class="center-align"><?=$transaction->id?></td>
			<?php
			$count = 1;
			foreach($productTransactions as $productTransaction){
				if($productTransaction->id_transaction == $transaction->id){
					if($count > 1){
						break;
					}else{
						foreach($users as $user){
							if($user->username == $productTransaction->customer){
								$count++;
			?>
			<td class="center-align"><?=$user->username?></td>
			<?php
							}
						}
					}
				}
			}
			?>
			<td class="center-align"><?=$transaction->date_transaction?></td>
			<td class="center-align">Rp. <?=$transaction->total_payment + $transaction->delivery_fee?></td>
			<?php
			$paymentStatus = $transaction->status;
			switch($paymentStatus){
				case "paid":
					$paymentStatus = "Lunas"; break;
				case "unpaid":
					$paymentStatus = "Belum dibayar"; break;
				case "canceled":
					$paymentStatus = "Dibatalkan"; break;
			}
			?>
			<td class="center-align"><?=$paymentStatus?></td>
			<?php
			foreach($deliverys as $delivery){
				if($delivery->id_transaction == $transaction->id){
					$deliveryStatus = $delivery->status;
					switch($deliveryStatus){
						case "on process":
							$deliveryStatus = "Dalam proses"; break;
						case "on the way":
							$deliveryStatus = "Dalam perjalanan"; break;
						case "delivered":
							$deliveryStatus = "Sudah terkirim"; break;
						case "none":
							$deliveryStatus = "-"; break;
					}
			?>
			<td class="center-align"><?=$deliveryStatus?></td>
			<?php
				}
			}
			?>
			<td class="center-align">
			<form method="post">
				<input type="hidden" name="id" value="<?=$transaction->id?>">
				<button type="submit" formaction="<?=base_url('lunas')?>" class="waves-effect waves-light btn">Lunas</button>
				<button type="submit" formaction="<?=base_url('batal')?>" class="waves-effect waves-light btn">Batal</button>
			</td>
			<td class="center-align">
				<button type="submit" formaction="<?=base_url('kirim')?>" class="waves-effect waves-light btn">Dikirim</button>
				<button type="submit" formaction="<?=base_url('sampai')?>" class="waves-effect waves-light btn">Terkirim</button>
			</form>
			</td>
		  </tr>
		<?php }
		} ?>
		</tbody>
	  </table>
</div>