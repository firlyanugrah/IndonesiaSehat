 <!--Global Navigation-->
    <div id="gnav" class="col s12">
        <!--for side nav mobile--><div class="col s3 valign-wrapper left-align hide-on-large-only" style="height:50px"><div class="col s12"><i class="fa fa-bars fa-2x"></i></div></div>
    	<div class="col s6 l2 center-align" id="logo"><a href="<?=base_url()?>"><img src="<?=base_url()?>/common/images/logo.png" alt="Indonesia Sehat"></a></div><!--in pc width logo 190px and sp make width logo to 100%-->
    </div>
</header>

<main class="container row clearfix">
	<h4 class="center-align">Register</h4>
		<form id="regist_form" class="col s12" method="post" action="<?=base_url('doRegist')?>">
			<div class="row">
				<div class="input-field col s9">
					<input id="first_name" name="first_name" type="text" class="validate">
					<label for="first_name">Nama Depan</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row">
				<div class="input-field col s9">
					<input id="last_name" name="last_name" type="text" class="validate">
					<label for="last_name">Nama Belakang</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row">
				<div class="input-field col s9">
					<input id="username" name="username" type="email" class="validate">
					<label for="username">Email</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row">
				<div class="input-field col s9">
					<input id="password" name="password" type="password" class="validate">
					<label for="password">Sandi</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row">
				<div class="input-field col s9">
					<input id="conf_password" name="conf_password" type="password" class="validate">
					<label for="conf_password">Konfirmasi Sandi</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row">
				<div class="input-field col s1">
					<input type="tel" class="validate" value="+62" readonly>
				</div>
				<div class="input-field col s8">
					<input id="telp" name="telp" type="tel" class="checkPhone">
					<label for="telp">Nomor Telpon</label>
				</div>
				<div class="col s3"><label class="notif"></label></div>
			</div>
			<div class="row submit-regist">
				<div class="col s9">
					<span style="color: rgba(86,86,86,0.75)">Dengan menekan Daftar, saya mengkonfirmasi telah menyetujui<br><a href="#">Syarat dan Ketentuan</a>, serta <a href="#">Kebijakan Privasi</a> Indonesia Sehat.</span>
				</div>
				<div class="col s1">
					<button id="btn-cancel-regist" class="btn waves-effect waves-light" type="submit" formaction="<?=base_url()?>">Batal</button>
				</div>
				<div class="col s2 right-align">
					<button id="btn-regist" class="btn waves-effect waves-light" type="submit" name="btn-regist">Daftar<i class="material-icons right">send</i></button>
				</div>
			</div>
		</form>
	</div>
</main>