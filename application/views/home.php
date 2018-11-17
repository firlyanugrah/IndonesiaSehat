<!--Category-->
<div id="gnav" class="col s12 hide-on-med-and-down">
	<ul class="container" id="menuHeader">
	<?php foreach($typeProducts as $typeProduct){ ?>
		<li><a href="<?=base_url().'products/'.$typeProduct->name?>" class="waves-effect waves-teal btn-flat"><?=$typeProduct->name?></a></li>
	<?php } ?>
	</ul>
</div>

<!-- Carousel -->
<div id="carousel" class="row clearfix">
	<div class="col s12 valign-wrapper">
		<div class="col s12 center-align">
			<span class="f-title">KALKULATOR GIZI<br></span> 
			<button id="btn-kalkulator" data-target="modalKalkulator" class="btn f-medium">Mulai Menghitung</button>
			<span class="f-title"><br>Ketahui status gizi dan rekomendasi produk yang cocok<br>dari kami</span>    	  	
		</div>
	</div>
</div>
<div class="container row center-align clearfix">
	<div class="col s1 arrowBrandLeft valign-wrapper" style="cursor:pointer"><i class="fa fa-chevron-circle-left fa-4x right"></i></div>
	<div class="col s10">
		<ul id="partnerBrand">
			<?php 
			foreach($brands as $brand){
				if($brand->featured == "Y"){?><li><img src="<?=base_url().$brand->image;?>" alt=""></li><?php }
			}?>
		</ul>
	</div>
	
	<div class="col s1 arrowBrandRight valign-wrapper" style="cursor:pointer"><i class="fa fa-chevron-circle-right fa-4x right"></i></div>
</div>

<!--Main-->
<main class="container row center-align clearfix">
	<div class="divider"></div>
	<h5 align="left">Terbaru</h5>
	<div class="row">
		<?php
		$terbaru = 1;
		foreach($products as $product){?>
				<div class="col-sm-2 col-lg-2 col-md-2">
					<div class="thumbnail">
						<img src="<?=base_url().$product->image?>" alt="<?=$product->name?>">
						<div class="caption">
							<h4 class="f-medium left-align"><a href="<?=base_url()."products/".$product->type."/details-of-".$product->id?>"><?=$product->name?></a></h4>
							<h4 class="f-medium right-align">Rp.<?=$product->price?></h4>
							<p class="f-small" align="justify"><?=$product->description_small?></p>
						</div>
						<div class="ratings">
							<p class="pull-right"><?=$product->review?> Review</p>
							<p class="left-align">
							<?php $rating = floor($product->rating);
							for($i = 0; $i < $rating; $i++){ ?>
								<span class="glyphicon glyphicon-star f-small"></span>
							<?php } 
							for($i = 0; $i < 5-$rating; $i++){ ?>
								<span class="glyphicon glyphicon-star-empty f-small"></span>
							<?php } ?>
							</p>
						</div>
					</div>
				</div>
		<?php $terbaru++;
		if($terbaru > 6) break;
		} ?>
	</div>
	<div class="divider"></div>
	<h5 align="left">Populer</h5>
	<div class="row">
		<?php
		$populer = 1;
		foreach($products as $product){ 
			if($product->rating > 3.9){?>
				<div class="col-sm-2 col-lg-2 col-md-2">
					<div class="thumbnail">
						<img src="<?=base_url().$product->image?>" alt="<?=$product->name?>">
						<div class="caption">
							<h4 class="f-medium left-align"><a href="<?=base_url()."products/".$product->type."/details-of-".$product->id?>"><?=$product->name?></a></h4>
							<h4 class="f-medium right-align">Rp.<?=$product->price?></h4>
							<p class="f-small" align="justify"><?=$product->description_small?></p>
						</div>
						<div class="ratings">
							<p class="pull-right"><?=$product->review?> Review</p>
							<p class="left-align">
							<?php $rating = floor($product->rating);
							for($i = 0; $i < $rating; $i++){ ?>
								<span class="glyphicon glyphicon-star f-small"></span>
							<?php } 
							for($i = 0; $i < 5-$rating; $i++){ ?>
								<span class="glyphicon glyphicon-star-empty f-small"></span>
							<?php } ?>
							</p>
						</div>
					</div>
				</div>
		<?php } 
		$populer++;
		if($populer > 6) break;
		} ?>
	</div>
</main>

<script type="text/javascript">
$(document).ready(function() {
	$("#calculator_form").submit(function(e) {
		var nama = $("#first_name").val() + " " + $("#last_name").val();
		var	height = $("#height").val();
		var weight = $("#weight").val();
		var gender = $("input[name=gender]:checked").val();
		var bbi = 0;
		var bmi = 0;
		var statusGizi = "";
		
		bmi = weight/((height/100)*(height/100));
		if(gender === 'male'){
			if(height > 160){ bbi = (90/100 * (height - 100)); }
			else{ bbi = (height - 100); }
			hasilStatusGizi(bmi);
		}else{
			if(height > 150){ bbi = (85/100 * (height - 100)); }
			else{ bbi = (height - 100); }
			hasilStatusGizi(bmi);
		}
		
		function hasilStatusGizi(bmi){
			if(bmi < 18.5){
				statusGizi = "Underweight";
			}else if(bmi > 18.5 && bmi < 24.9){
				statusGizi = "Ideal";
			}else if(bmi > 24.9 && bmi < 29.9){
				statusGizi = "Overweight";
			}else{
				statusGizi = "Obesity";
			}
		}
		
		var bbiFix = bbi.toFixed(1);
		
		<?php if(isset($_SESSION['id'])){ ?>
				
		<?php }else{ ?>
		$(".hasilGizi").text(statusGizi);
		$(".bbi").text(bbiFix);
		
		$("#modalHasil").modal("open");
		return false;		
		<?php } ?>
	});
});
</script>