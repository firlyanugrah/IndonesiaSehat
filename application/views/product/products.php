<!--Main-->
<main class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<?php foreach($typeProducts as $tempTypeProduct){
					if($tempTypeProduct->name == ucfirst($typeProduct)){ ?>
					<a href="<?=base_url().'products/'.$tempTypeProduct->name?>" class="list-group-item active"><?=$tempTypeProduct->name?></a>
					<?php }else{ ?>
					<a href="<?=base_url().'products/'.$tempTypeProduct->name?>" class="list-group-item"><?=$tempTypeProduct->name?></a>
				<?php }
				} ?>
			</div>
		</div>

		<div class="col-md-9">
			<!-- Carousel -->
			<div class="carousel carousel-slider" data-indicators="true" style="margin-bottom: 15px">
				<div class="carousel-fixed-item center">
					<?php foreach($typeProducts as $tempTypeProduct){
						if($tempTypeProduct->name == ucfirst($typeProduct)){
							echo "<p class='f-large'>".$tempTypeProduct->description."</p>";
						}
					}?>
				</div>
				<div class="carousel-item" href="#one!"><img src="<?=base_url('common/images/alpina-fitness-fitnes-za-vsichki.PNG')?>" alt="carousel1"></div>
				<div class="carousel-item" href="#two!"><img src="<?=base_url('common/images/Wajibotot.PNG')?>" alt="carousel1"></div>
				<div class="carousel-item" href="#three!"><img src="<?=base_url('common/images/maxresdefault.PNG')?>" alt="carousel1"></div>
			</div>
			<!-- !Carousel -->
			
			<div class="row">
			<?php
				foreach($productSpecific as $product){
			?>	
				<div class="col-sm-3 col-lg-3 col-md-3">
					<div class="thumbnail">
						<img src="<?=base_url().$product->image?>" alt="<?=$product->name?>">
						<div class="caption">
							<h4 class="f-large"><a href="<?=base_url()."products/".$typeProduct."/details-of-".$product->id?>"><?=$product->name?></a></h4>
							<h4 class="f-medium right-align">Rp.<?=$product->price?></h4>
							<p class="f-small"><?=$product->description_small?></p>
						</div>
						<div class="ratings">
							<p class="pull-right"><?=$product->review?> reviews</p>
							<p>
							<?php $rating = floor($product->rating);
							for($i = 0; $i < $rating; $i++){ ?>
								<span class="glyphicon glyphicon-star"></span>
							<?php } 
							for($i = 0; $i < 5-$rating; $i++){ ?>
								<span class="glyphicon glyphicon-star-empty"></span>
							<?php } ?>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<!-- /.row -->
</main>
<!-- /.container -->


<?php
//echo '<main class="container">';
//	echo '<div class="row">';
//		echo '<div class="col-md-3">';
//			echo '<div class="list-group">';
//				foreach($typeProducts as $tempTypeProduct){
//					if($tempTypeProduct->name == ucfirst($typeProduct)){
//					echo '<a href=" '.base_url().'products/'.$tempTypeProduct->name.'" class="list-group-item active">'.$tempTypeProduct->name.'</a>';
//					}else{
//					echo '<a href="'.base_url().'products/'.$tempTypeProduct->name.'" class="list-group-item">'.$tempTypeProduct->name.'</a>';
//					}
//				}
//			echo '</div>';
//		echo '</div>';
//
//		echo '<div class="col-md-9">';
//			//Carousel
//			
//			//!Carousel
//			
//			echo '<div class="row">';
//				foreach($productSpecific as $product){
//				echo '<div class="col-sm-3 col-lg-3 col-md-3">';
//					echo '<div class="thumbnail">';
//						echo '<img src="'.base_url().$product->image.'" alt="'.$product->name.'">';
//						echo '<div class="caption">';
//							echo '<h4 class="f-large"><a href="'.base_url().'products/'.$typeProduct.'/details-of-'.$product->id.'">'.$product->name.'</a></h4>';
//							echo '<h4 class="f-medium right-align">Rp.'.$product->price.'</h4>';
//							echo '<p class="f-small">'.$product->description_small.'</p>';
//						echo '</div>';
//						echo '<div class="ratings">';
//							echo '<p class="pull-right">'.$product->review.' reviews</p>';
//							echo '<p>';
//								$rating = floor($product->rating);
//								for($i = 0; $i < $rating; $i++){
//									echo '<span class="glyphicon glyphicon-star"></span>';
//								} 
//								for($i = 0; $i < 5-$rating; $i++){
//									echo '<span class="glyphicon glyphicon-star-empty"></span>';
//								}
//							echo '</p>';
//						echo '</div>';
//					echo '</div>';
//				echo '</div>';
//			}
//			echo '</div>';
//		echo '</div>';
//	echo '</div>';
//	//.row 
//echo '</main>';
////.container