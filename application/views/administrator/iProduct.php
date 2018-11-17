<div class="container row">
	<form method="post" action="<?=base_url('doInsertProduct')?>">
		<div class="input-field col s8">
			<select name="type" id="type">
				<option value="" disabled selected>Pilih tipe produk</option>
				<?php foreach($typeProducts as $typeProduct){ ?>
				<option value="<?=$typeProduct->id?>"><?=$typeProduct->name?></option>
				<?php } ?>
			</select>
			<label>Tipe produk</label>
			<input name="typeName" id="typeName" type="hidden" value="">
		</div>
		<div class="input-field col s8">
			<select name="brand" id="brand">
				<option value="" disabled selected>Pilih merek produk</option>
				<?php foreach($brands as $brand){ ?>
				<option value="<?=$brand->id?>"><?=$brand->name?></option>
				<?php } ?>
			</select>
			<label>Merek</label>
			<input name="brandName" id="brandName" type="hidden" value="">
		</div>
		<div class="input-field col s8">
			<input id="product" name="product" type="text" class="validate">
			<label for="product">Nama produk</label>
		</div>
		<div class="input-field col s8">
			<input id="quantity" name="quantity" type="text" class="validate">
			<label for="quantity">Jumlah</label>
		</div>
		<div class="input-field col s8">
			<textarea id="descriptionS" name="descriptionS" class="materialize-textarea"></textarea>
			<label for="descriptionS">Deskripsi singkat</label>
		</div>
		<div class="input-field col s8">
			<textarea id="description" name="description" class="materialize-textarea"></textarea>
			<label for="description">Deskripsi lengkap</label>
		</div>
		<div class="col s8">
			<div class="file-field input-field">
				<div class="btn">
					<span>Tabel nutrisi</span>
					<input type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" name="nutriFact">
				</div>
			</div>	
		</div>
		<div class="col s8">
			<div class="file-field input-field">
				<div class="btn">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gambar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<input type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" name="image">
				</div>
			</div>	
		</div>
		<div class="input-field col s8">
			<input id="price" name="price" type="text" class="validate">
			<label for="price">Harga</label>
		</div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="button"><a href="<?=base_url("dashboard")?>" style="text-decoration:none;color:white">Batal</a></button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Tambah<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
</div>


<script type="text/javascript">
	$(document).ready(function(e) {
		$("#brand").change(function(e) {
			if($("#brand option").is(":selected")){
				var brandName = $('#brand option').filter(':selected').text();
				$("#brandName").val(brandName);
			}
		});
		$("#type").change(function(e) {
			if($("#type option").is(":selected")){
				var typeName = $('#type option').filter(':selected').text();
				$("#typeName").val(typeName);
			}
		});
	});
</script>
