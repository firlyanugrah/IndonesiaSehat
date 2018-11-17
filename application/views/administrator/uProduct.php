<div class="container row">
	<?php
	$id = $_REQUEST['id'];
	foreach($products as $product){
		if($product->id == $id){
	?>
	<form method="get" action="<?=base_url('updateProd')?>">
		<input id="id" name="id" type="hidden" class="validate" value="<?=$product->id?>">
		<div class="input-field col s8">
			<input id="brand" name="brand" type="text" class="validate" value="<?=$product->brand?>" readonly>
			<label for="brand">Merek Produk</label>
		</div>
		<div class="input-field col s8">
			<input id="type" name="type" type="text" class="validate" value="<?=$product->type?>" readonly>
			<label for="quantity">Tipe Produk</label>
		</div>
		<div class="input-field col s8">
			<input id="name" name="name" type="text" class="validate" value="<?=$product->name?>" readonly>
			<label for="name">Nama Produk</label>
		</div>
		<div class="input-field col s8">
			<textarea name="description" id="description" class="materialize-textarea"><?=$product->description?></textarea>
			<label for="description">Deskripsi Lengkap</label>
		</div>
		<div class="input-field col s8">
			<textarea name="descriptionS" id="descriptionS" class="materialize-textarea"><?=$product->description_small?></textarea>
			<label for="descriptionS">Deskripsi Singkat</label>
		</div>
		<div class="col s8">
			<div class="file-field input-field">
				<div class="btn">
					<span>Gambar</span>
					<input type="file">
				</div>
				<div class="file-path-wrapper">
					<input name="image" class="file-path validate" type="text" value="<?=$product->image?>">
				</div>
			</div>	
		</div>
		<div class="input-field col s8">
			<input id="quantity" name="quantity" type="text" class="validate" value="<?=$product->quantity?>">
			<label for="quantity">Jumlah</label>
		</div>
		<div class="input-field col s8">
			<input id="price" name="price" type="text" class="validate" value="<?=$product->price?>">
			<label for="price">Harga</label>
		</div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="submit" formmethod="post" formaction="<?=base_url('dashboard/daftar%20produk');?>">Batal</button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Ubah<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
	<?php }
	} ?>
</div>