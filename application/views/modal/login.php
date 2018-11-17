<div id="modalLogin" class="modal bottom-sheet">
	<div class="modal-content">
      <h4>Login</h4>
      <div class="row">
			<form id="login_form" class="col s12" method="post">
				<div class="row">
					<div class="input-field col s3"></div>
					<div class="input-field col s6">
						<i class="material-icons prefix">assignment_ind</i>
						<input id="username" name="username" type="text" class="validate">
						<label for="usename">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s3"></div>
					<div class="input-field col s6">
						<i class="material-icons prefix">vpn_key</i>
						<input id="password" name="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="col s3">
						<input type="hidden" id="url" name="url" value="<?=current_url()?>">
					</div>
					<div class="col s9">
						<span id="logerror" style="color:red"></span>
					</div>
				</div>
				<div class="row">
					<div class="col s3"></div>
					<div class="col s1 center-align">
						<a href="#">Lupa password?</a>
					</div>
					<div class="col s1 center-align">
						<a href="<?=base_url('register')?>">Belum mendaftar?</a>
					</div>
					<div class="col s2"></div>
					<div class="col s3">
						<button id="btn-login" class="btn waves-effect waves-light" type="submit" name="btn-login">Masuk<i class="material-icons right">send</i></button>
					</div>
					<div class="col s2"></div>
				</div>
			</form>
		</div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#login_form").submit(function() {
		$.ajax({
			type: "POST",
			url: "<?=base_url('doLogin')?>",
			data: $(this).serialize(),
			success: function(res){
				switch(res){
					case 'member':
						<?php $url = uri_string(); ?>
						window.location = '<?=current_url()?>';
						break;
					case 'admin':
						window.location = '<?=base_url("dashboard")?>';
						break;
					case 'failed':
						$('#logerror').html('Email atau Password yang anda masukan salah!');
						break;
					case 'deleted':
						$('#logerror').html('Username sudah tidak aktif');
						break;
				}
			}
		});
		return false;
	});
});
</script>

