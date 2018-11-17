<div class="container row">
	<div class="col l12">
		<h4>Keranjang</h4>
		<div class="divider"></div>
	</div>	
	<table>
	<thead>
	  <tr>
		  <th style="width:8%;">No</th>
		  <th style="width:60%">Produk</th>
		  <th class="center-align" style="width:10px;">Jumlah</th>
		  <th class="center-align">Harga Produk</th>
		  <th class="center-align"></th>
	  </tr>
	</thead>

	<tbody>
	<?php
	$count = 1;
	foreach($productTransactions as $productTransaction){
		if($productTransaction->id_transaction == $_SESSION['transaction']){
			foreach($products as $product){
				if($product->id == $productTransaction->product_code){
	?>
	<form method="post" action="<?=base_url('delProductCart')?>">
	  <tr>
		<td><?=$count?></td>
		<td>
			<table>
				<tr>
					<td style="width:10%"><img src="<?=$product->image?>" width="100px"></td>
					<td style="vertical-align:top"><b><?=$product->name?></b><br><span class="f-small">@Rp <?=$product->price?></span></td>
				</tr>
			</table>
		</td>
		<input type="hidden" name="id" value="<?=$product->id?>">
		<td class="center-align"><?=$productTransaction->jumlah?></td>
		<td class="center-align">Rp <?=$productTransaction->payment?>,00</td>
		<td class="center-align"><button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini dari keranjang?')" style="border:none; background:transparent; color:blue"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
	  </tr>
	 </form>
	<?php
				}
			}
			$count = $count + 1;
		}
	}
	?>
	</tbody>
  </table>
  <div class="divider"></div>
  <table>
	<tr>
		<?php
		foreach($transactions as $transaction){
			if($transaction->id == $_SESSION['transaction']){
				if($transaction->jenis_barang != 0){
		?>
		<td><a href="<?=base_url('delCart')?>" onclick="return confirm('Apakah anda yakin ingin menghapus semua produk yang berada di keranjang?')"><i class="fa fa-times" aria-hidden="true"></i> hapus semua</a></td>
		<td class="right-align">Total Harga <b>Rp <?=$transaction->total_payment?>,00</b></td>
		<input type="hidden" id="total_payment" value="<?=$transaction->total_payment?>">
		<td style="width:11.7%"></td>
		<?php 
				}else{
		?>
		<td class="center-align">Tidak ada Produk Dalam Keranjang Anda!</td>
		<input type="hidden" id="total_payment" value="0">
		<?php
				} 
			}
		}
		?>
	</tr>
  </table>
</div>
<div class="container row">
	<div class="col l12">
		<h4>Pengiriman</h4>
		<div class="divider"></div>
	</div>
	<form method="get" action="<?=base_url('payTransaction')?>">
		<div class="input-field col s12">
			<textarea id="address" class="materialize-textarea" name="address"></textarea>
			<label for="description">Alamat</label>
		</div>
		<div class="input-field col s8">
			<select id="city_selector">
				<option value="0" disabled selected>Pilih Kota</option>
				<?php 
				foreach($citys as $city){ 
					if($city->name == "Pilih Kota"){}else{
						echo '<option value="'.$city->fee.'">'.$city->name.'</option>';
					}
				} ?>
			</select>
			<label>Kota</label>
			<input type="hidden" id="city" name="city" value="">
		</div>
		<?php /*?><div class="input-field col s8">
			<select>
				<option value="" disabled selected>Pilih Kurir</option>
				<?php foreach($brands as $brand){ ?>
				<option value="<?=$brand->id?>"><?=$brand->name?></option>
				<?php } ?>
			</select>
			<label>Kurir</label>	
		</div><?php */?>
		<div class="input-field col s4">
			<input id="fee" type="text" class="validate" value="Rp. 0,00" readonly>
			<input id="fee_amount" type="hidden" name="fee" value="">
			<label for="fee">Ongkos kirim</label>
		</div>
		<?php /*?><div class="input-field col s10">
			<input id="quantity" name="quantity" type="text" class="validate">
			<label for="quantity">Kode Kupon</label>
		</div>
		<div class="input-field col s2">
			<button class="btn waves-effect waves-light">Cek Kupon</button>
		</div>
		<div class="input-field col s12">
			<input id="quantity" name="quantity" type="text" class="validate" value="Rp. 20.000, 00" readonly>
			<label for="quantity">Total Diskon</label>
		</div><?php */?>
		<div class="input-field col s12">
		<?php
		foreach($transactions as $transaction){
			if($transaction->id == $_SESSION['transaction']){
				if($transaction->jenis_barang != 0){
		?>
			<input id="total_fee" type="text" class="validate" value="Rp. <?=$transaction->total_payment?>,00" readonly>
			<?php /*?><input id="total_fee2" name="total_fee"  type="hidden" value=""><?php */?>
		<?php }else{ ?>
			<input id="total_fee" type="text" class="validate" value="Rp. 0,00" readonly>
			<?php /*?><input id="total_fee2" name="total_fee"  type="hidden" value=""><?php */?>
		<?php }
			}
		} ?>
			<label for="total_fee">Total Pembayaran</label>
		</div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="submit" formaction="<?=base_url();?>">Belanja Lagi</button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Bayar<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
$(document).ready(function(e) {
	
	$("#city_selector").change(function(e) {
		if($("#city_selector option").is(":selected")){
			var city = $('#city_selector option').filter(':selected').text();
			var fee_amount = $('#city_selector option').filter(':selected').val();
			var fee = "Rp. " + fee_amount + ",00";
			var sum_fee = parseInt($('#total_payment').val()) + parseInt($('#city_selector option').filter(':selected').val());
			var total_fee = "Rp. " + sum_fee + ",00";
			$("#city").val(city);
			$("#fee").val(fee);
			$("#fee_amount").val(fee_amount);
			$("#total_fee").val(total_fee);
			/*$("#total_fee2").val(sum_fee);*/
		}
	});
});
</script>