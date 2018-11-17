<div class="container row">
	<form method="get">
		<div class="input-field col s8">
			<select>
				<option value="" disabled selected>Pilih tipe produk</option>
				<?php foreach($typeProducts as $typeProduct){ ?>
				<option value="<?=$typeProduct->id?>"><?=$typeProduct->name?></option>
				<?php } ?>
			</select>
			<label>Type</label>
		</div>
		<div class="input-field col s8">
			<select>
				<option value="" disabled selected>Pilih merek produk</option>
				<?php foreach($brands as $brand){ ?>
				<option value="<?=$brand->id?>"><?=$brand->name?></option>
				<?php } ?>
			</select>
			<label>Brand</label>
		</div>
		<div class="input-field col s8">
			<select>
				<option value="" disabled selected>Pilih Product</option>
				<?php foreach($brands as $brand){ ?>
				<option value="<?=$product->id?>"><?=$product->name?></option>
				<?php } ?>
			</select>
			<label>Product</label>
		</div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="button" formaction="<?=base_url();?>">Cancel</button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Delete<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
</div>