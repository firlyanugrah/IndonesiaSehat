<div id="modalKalkulator" class="modal modal-fixed-footer">
	<!--Modal Kalkulator-->
	<div class="modal-content">
		<h4>Kalkulator Gizi</h4>
		<div class="row">
			<form id="calculator_form" class="col s12" method="post">
				<div class="row">
					<div class="input-field col s12">
						<input id="first_name" name="first_name" type="text" class="validate">
						<label for="first_name">Nama Depan</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="last_name" name="last_name" type="text" class="validate">
						<label for="last_name">Nama Belakang</label>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						Tinggi&nbsp;&nbsp;:
						<div class="input-field inline" style="width:83%">
							<input id="height" name="height" type="text" class="validate right-align"> 	
						</div>
					</div>
					<div class="input-field col s1">
						<label>Cm</label>
					</div>
					<div class="col s5">
						Berat&nbsp;&nbsp;&nbsp;:
						<div class="input-field inline" style="width:83%">
							<input id="weight" name="weight" type="text" class="validate right-align">
						</div>
					</div>
					<div class="input-field col s1">
						<label>Kg</label>
					</div>
				</div>
				<div class="row">
					<div class="col s5">
						Umur&nbsp;&nbsp;&nbsp;:
						<div class="input-field inline" style="width:83%">
							<input id="age" name="age" type="text" class="validate right-align">
						</div>
					</div>
					<div class="input-field col s1">
						<label>Tahun</label>
					</div>
					<div class="col s5">
						<div class="col s4">Jenis Kelamin :</div>
						<div class="col s8">
							<p>
								<input name="gender" type="radio" id="male" value="male" />
								<label for="male">Laki-laki</label>
							</p>
							<p>
								<input name="gender" type="radio" id="female" value="female" />
								<label for="female">Perempuan</label>
							</p>
						</div>
					</div>
				</div>
				<?php if(isset($_SESSION['id'])){ ?>
				<div class="row">
					<div class="col s12">
						<div class="col s2">Porsi latihan :</div>
						<div class="col s10">
							<p>
								<input name="exercise" type="radio" id="type1" value="type1" />
								<label for="type1">Ringan sampai tak ada latihan</label>
							</p>
							<p>
								<input name="exercise" type="radio" id="type2" value="type2" />
								<label for="type2">Latihan ringan (1 - 3 hari per minggu)</label>
							</p>
							<p>
								<input name="exercise" type="radio" id="type3" value="type3" />
								<label for="type3">Latihan normal (3 - 5 hari per minggu)</label>
							</p>
							<p>
								<input name="exercise" type="radio" id="type4" value="type4" />
								<label for="type4">Latihan berat (6 - 7 hari per minggu)</label>
							</p>
							<p>
								<input name="exercise" type="radio" id="type5" value="type5" />
								<label for="type5">Latihan sangat berat (2 kali per hari, latihan lebih berat)</label>
							</p>
						</div>
					</div>
				</div>
				<?php } ?>
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<?php if(isset($_SESSION['id'])){ ?>
		<button type="submit" form="calculator_form" id="btn-calculator" class="modal-action modal-close waves-effect waves-green btn-flat" formmethod="get" formaction="<?=base_url('hasil')?>">Hitung</button>
		<?php }else{ ?>
		<button type="submit" form="calculator_form" id="btn-calculator" class="modal-action modal-close waves-effect waves-green btn-flat">Hitung</button>
		<?php } ?>
		<button type="button" form="calculator_form" id="btn-cancle" class="modal-close waves-effect waves-green btn-flat">Batal</button>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(e) {
	$(".input-field input").keyup(function(e) {
		if($("#first_name").val().length !==0 && $("#last_name").val().length !==0 && $("#height").val().length !==0 && $("#weight").val().length !==0){
			$('#btn-calculator').attr('disabled', false);			
		}else{
			$('#btn-calculator').attr('disabled',true);
		}
	});
});
</script>
