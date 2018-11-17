<?php
$name = $_REQUEST['first_name']." ".$_REQUEST['last_name'];
$height = $_REQUEST['height'];
$weight = $_REQUEST['weight'];
$age = $_REQUEST['age'];
$gender = $_REQUEST['gender'];
$execise = $_REQUEST['exercise'];
$bmr;
$calori;
$bbi;
$statusGizi = "";
$bmi = $weight/(($height/100)*($height/100));

if($gender == 'male'){
	if($height > 160){ $bbi = (90/100 * ($height - 100)); }
	else{ $bbi = ($height - 100); }
}else{
	if($height > 150){ $bbi = (85/100 * ($height - 100)); }
	else{ $bbi = ($height - 100); }
}

if($bmi < 18.5){
	$statusGizi = "Underweight";
	$calori = ($bbi * 30) * 1.2;
}else if($bmi > 18.5 && $bmi < 24.9){
	$statusGizi = "Ideal";
	$calori = ($bbi * 30);
}else if($bmi > 24.9 && $bmi < 29.9){
	$statusGizi = "Overweight";
	$calori = ($bbi * 30) * 0.95;
}else{
	$statusGizi = "Obesity";
	$calori = ($bbi * 30) * 0.9;
}

if($gender == "male"){
	$bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age);
}else{
	$bmr = 655.1 + (9.563  * $weight) + (1.850  * $height) - (4.676  * $age);	
}

/*switch($execise){
	case "type1" : $calori = $bmr * 1.2; break;
	case "type2" : $calori = $bmr * 1.375; break;
	case "type3" : $calori = $bmr * 1.55; break;
	case "type4" : $calori = $bmr * 1.725; break;
	case "type5" : $calori = $bmr * 1.9; break;
}*/

$bbiFix = number_format((float)$bbi, 2, '.', '');
$caloriFix = number_format((float)$calori, 2, '.', '');
?>

<div class="container row">
	<div class="col s8">
		<h5>Berikut informasi tentang tubuh kamu</h5>
		<div class="divider"></div>
		<ul class="f-large" style="padding:10px 75px">
			<li style="list-style-type:circle; padding:5px 0">Berat badan ideal kamu adalah <?=$bbi?> Kg</li>
			<li style="list-style-type:circle; padding:5px 0">Status gizi kamu <?=$statusGizi?></li>
			<li style="list-style-type:circle; padding:5px 0">Kebutuhan kalori kamu per-hari <?=$caloriFix?> Kalori</li>
		</ul>
		<h5 style="margin-top:20px">Saran dari kami, anda melakukan latihan</h5>
		<div class="divider"></div>
		<ul class="f-large" style="padding:10px 75px">
			<li style="list-style-type:circle; padding:5px 0">Cardio:
				<ul style="padding:5px 20px">
					<li style="list-style-type:square; padding:5px 0">Cycling selama 30 menit per hari</li>
					<li style="list-style-type:square; padding:5px 0">Treadmill selama 1 jam per hari</li>
				</ul>
			</li>
		</ul>
		<h5 style="margin-top:20px">Kami punya rekomendasi produk sesuai hasil anda diatas</h5>
		<div class="divider"></div>
		<div class="col s12" style="margin-top:10px">
			<div class="col s3">
				<a href="#"><img src="<?=base_url('common\images\product_img\SYNTHA-6.PNG')?>" alt="Syntha 6 isolate" style="width:100%"></a>
				<div class="caption" style="height:auto !important">
					<h4 class="f-large center-align"><a href="#">Syntha 6 Isolate</a></h4>
				</div>
			</div>
			<div class="col s3">
				<a href="#"><img src="<?=base_url('common\images\product_img\Neurocore Rio.PNG')?>" alt="Neurocore pre-workout" style="width:100%"></a>
				<div class="caption" style="height:auto !important">
					<h4 class="f-large center-align"><a href="#">Neurocore Pre-workout</a></h4>
				</div>
			</div>
			<div class="col s3">
				<a href="#"><img src="<?=base_url('common\images\product_img\EVL BCAA.PNG')?>" alt="bcaa energy" style="width:100%"></a>
				<div class="caption" style="height:auto !important">
					<h4 class="f-large center-align"><a href="#">BCAA Energy</a></h4>
				</div>
			</div>
		</div>
	</div>
	<div class="col s10"></div>
	<div class="col s1 right-align">
		<a href="<?=base_url();?>"><button class="btn waves-effect waves-light" type="button">Kembali</button></a>
	</div>
</div>

