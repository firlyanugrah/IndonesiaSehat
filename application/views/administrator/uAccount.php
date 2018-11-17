<div class="container row">
	<?php
	$username = $_REQUEST['username'];
	
	foreach($users as $user){
		if($user->username == $username){
	?>
	<form method="get" action="<?=base_url('updateAcc')?>">
		<div class="input-field col s8">
			<input name="username" id="username" type="text" class="validate" value="<?=$user->username?>" readonly>
			<label for="username" class="active">Username</label>
		  </div>
		<div class="input-field col s8">
			<input id="name" type="text" class="validate" value="<?=$user->first_name?> <?=$user->last_name?>" readonly>
			<label for="name" class="active">Nama Lengkap</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Placeholder" id="first_name" type="text" class="validate" value="<?=$user->phone?>" readonly>
			<label for="first_name" class="active">No Telepon</label>
		  </div>
		<div class="input-field col s8">
			<input id="first_name" type="text" class="validate" value="<?=$user->password?>" readonly>
			<label for="first_name" class="active">Password Lama</label>
		  </div>
		<div class="input-field col s8">
			<input placeholder="Password Baru" name="password" id="password" class="validate" type="text">
			<label for="password" class="active">Password Baru</label>
		  </div>
		<div class="row">
			<div class="col s9"></div>
			<div class="col s1">
				<button id="btn-cancel" class="btn waves-effect waves-light" type="submit" formmethod="post" formaction="<?=base_url('dashboard/daftar%20akun');?>">Batal</button>
			</div>
			<div class="col s2 right-align">
				<button id="btn-submit" class="btn waves-effect waves-light" type="submit" name="btn-submit">Ubah<i class="material-icons right">send</i></button>
			</div>
		</div>
	</form>
	<?php }
	} ?>
</div>