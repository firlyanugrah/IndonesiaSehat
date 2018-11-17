<div class="container row">
	<div class="col l12">
		<h4>Pembayaran</h4>
		<div class="divider"></div>
	</div>
	<div class="col l12"><h6><b>Id Pemesanan</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?=$id?></span></h6></div>
	<div class="col l12 center-align">
		<div class="col l12"><h5><b>Total Pembayaran Anda</b></h5></div>
		<div class="col l12"></div>
		<?php
		foreach($transactions as $transaction){
			if($transaction->id == $id){
				$payment = $transaction->total_payment + $transaction->delivery_fee + $randomInt;
			}
		}
		?>
		<div class="col l12"><h5>Rp. <?=$payment?></h5></div>
		<div class="col l12"><span>*<?=$randomInt?> merupakan kode unik anda</span></div>
	</div>
	<div class="col l8" style="margin-top:100px">
		<div class="col l12"><h5><b>Daftar Bank</b></h5></div>
		<table class="list_bank">
			<tbody>
				<tr>
					<td><img src="<?=base_url('common/images/bank_central_asia.PNG')?>" alt="BCA" width="40"></td>
					<td><img src="<?=base_url('common/images/bank_mandiri.PNG')?>" alt="BCA" width="40"></td>
					<td><img src="<?=base_url('common/images/bank_negara_indonesia.PNG')?>" alt="BCA" width="40"></td>
				</tr>
				<tr>
					<td>a/n PT. Indonesia Sehat</td>
					<td>a/n PT. Indonesia Sehat</td>
					<td>a/n PT. Indonesia Sehat</td>
				</tr>
				<tr>
					<td>500 123 1234</td>
					<td>500 123 1234</td>
					<td>500 123 1234</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="container row" style="margin-top:50px">
	<div class="col l12">
		<h4>Konfirmasi</h4>
		<div class="divider"></div>
	</div>
	
	<form method="get" action="<?=base_url('confirmPayment')?>">
		<div class="input-field col s8">
			<input id="id" name="id" type="text" class="validate">
			<label for="id">Id Pemesanan</label>
		</div>
		<div class="input-field col s8">
			<select name="bank">
				<option value="" disabled selected>Pilih Bank</option>
				<option value="BCA">BCA</option>
				<option value="Mandiri">Mandiri</option>
				<option value="BNI">BNI</option>
			</select>
			<label>Bank</label>
		</div>
		<div class="input-field col s5">
			<input id="name" name="name" type="text" class="validate">
			<label for="name">Nama pemilik bank</label>
		</div>
		<div class="input-field col s3">
			<input id="rek" name="rek" type="text" class="validate">
			<label for="rek">No rekening</label>
		</div>
		<div class="input-field col s8">
			<input id="nom" name="nom" type="text" class="validate">
			<label for="nom">Nominal transfer</label>
		</div>
		<input type="hidden" name=""
		<div class="row">
			<div class="col s12 center-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="button" name="btn-submit" data-target="modal_bayar">Konfirmasi</button>
			</div>
		</div>
		<div id="modal_bayar" class="modal">
			<div class="modal-content center-align">
				<h5>Terima kasih telah berbelanja!</h5>
				<h6>Produk pesanan akan segera kami proses<br>Informasi pengiriman produk akan kami informasikan melalui e-mail</h6>
				<div style="margin:50px 0">
					<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Ok</button>
				</div>
			</div>
		</div>
	</form>
</div>