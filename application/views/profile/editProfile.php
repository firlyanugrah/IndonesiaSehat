<div class="container row">
	<form method="post" action="<?=base_url('changeprofile')?>">
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="username" name="username" type="text" class="validate" value="<?=$user->username?>" disabled>
			<label for="first_name" class="active">Username</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="first_name" name="first_name" type="text" class="validate" value="<?=$user->first_name?>">
			<label for="first_name" class="active">Nama Depan</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="last_name" name="last_name" type="text" class="validate" value="<?=$user->last_name?>">
			<label for="first_name" class="active">Nama Belakang</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="password" name="password" class="validate" type="password">
			<label for="first_name" class="active">Password Baru</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="konfirm_pass" class="validate" type="password">
			<label for="first_name" class="active">Konfirmasi Password Baru</label>
		  </div>
		<div class="input-field col s8">
			<textarea id="address" name="address" class="materialize-textarea">Jl. Haji Senin II, Binus Syahdan</textarea>
			<label for="first_name" class="active">Alamat</label>
		  </div>
		<div class="input-field col s8">
			<input id="postal" name="postal" class="validate" type="text" value="14340">
			<label for="postal" class="active">Kode Pos</label>
		  </div>
		<div class="input-field col s8">
			<select name="city">
				<?php foreach($citys as $city){ if($city->name == "Pilih Kota"){}elseif($city->name == $user->city){ ?>
				<option value="<?=$user->city?>" selected><?=$user->city?></option>
				<?php }else{ ?>
				<option value="<?=$city->name?>"><?=$city->name?></option>
				<?php } } ?>
			</select>
			<label>Kota</label>
		</div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="phone" name="phone" type="text" class="validate" value="<?=$user->phone?>">
			<label for="phone" class="active">No Telepon</label>
		  </div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="submit" formaction="<?=base_url('profile');?>">Batal</button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Ubah<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
</div>