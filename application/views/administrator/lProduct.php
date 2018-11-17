<div class="container row">
	<form method="get" id="filter_brand">
	<div class="input-field col s3">
		<select>
		  <option value="" disabled selected>Pilih Merek</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Filter Merek</label>
	</div>
	<div class="input-field col s3">
		<select>
		  <option value="" disabled selected>Pilih Tipe Produk</option>
		  <option value="1">Option 1</option>
		  <option value="2">Option 2</option>
		  <option value="3">Option 3</option>
		</select>
		<label>Filter Tipe Produk</label>
	</div>
	</form>
		<table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Merek</th>
              <th>Tipe Produk</th>
              <th>Nama Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
		<?php
		foreach($products as $product){ 
			if($product->status != 0){
		?>
          <tr>
            <td><?=$product->id?></td>
            <td><?=$product->brand?></td>
            <td><?=$product->type?></td>
            <td><?=$product->name?></td>
            <td><?=$product->quantity?></td>
            <td>Rp. <?=$product->price?></td>
            <td>
				<form id="<?=$product->id?>" action="<?=base_url('delProduct')?>">
					<input type="hidden" name="id" value="<?=$product->id?>">
					<button class="waves-effect waves-light btn" type="submit" formaction="<?=base_url('updProduct')?>"><i class="material-icons left">settings</i>Ubah</button>
					<button class="waves-effect waves-light btn" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')" id="del_<?=$product->id?>"><i class="material-icons right">delete</i>Hapus</button>
				</form>
			</td>
          </tr>
		  <?php }
		  } ?>
        </tbody>
      </table>
</div>
	
<script type="text/javascript">
$(document).ready(function(e) {
	<?php foreach($products as $product){ ?>
	$("#del_<?=$product->id?>").submit(function(e) {
		$("#modal_konfirmasi #ya").click(function(e) {
			$("form#<?=$product->id?>").submit();
		});
	});
	<?php } ?>
});
</script>