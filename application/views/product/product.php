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
			<div class="thumbnail" style="padding: 0 15px">
				<div class="row">
					<div class="col-md-5">
						<img class="img-responsive" src="<?=base_url($product->image)?>" alt="">
					</div>
					<div class="col-md-7">
						<form id="product_form" method="post">
							<h4><?=$product->name?></h4><br>
							<div>
								<span>Quantity :&nbsp;&nbsp;</span>
								<div class="input-field inline" style="width:10%">
									<input id="quantity" name="quantity" type="text" class="validate right-align" value="1">
								</div>
								<span>&nbsp;&nbsp;&nbsp;&nbsp;dari <?=$product->quantity?></span>
								<span class="stok"></span>
							</div>
							<input type="hidden" name="brand" value="<?=$product->id?>">
							<input type="hidden" name="price" value="<?=$product->price?>">
							<h5 align="right" style="margin-top:75px">
								Rp. <?=$product->price?>
								<?php if(!isset($_SESSION['id'])){
									echo '<button id="submit_cart" type="button" class="waves-effect waves-green btn-flat" onClick="alertLogin()"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>';
								}else{
									echo '<button id="submit_cart" type="submit" class="waves-effect waves-green btn-flat"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>';
								} ?>
							</h5>
						</form>
					</div>
				</div>
				<div class="caption-full">
					<?=$product->description?>
					<img class="img-responsive" src="<?=base_url($product->nutri_fact)?>" alt="">
				</div>
				<div class="ratings" style="margin-top:20px">
					<p class="pull-right"><?=$product->review?> reviews</p>
					<p>
					<?php $rating = floor($product->rating);
					for($i = 0; $i < $rating; $i++){ ?>
						<span class="glyphicon glyphicon-star"></span>
					<?php } 
					for($i = 0; $i < 5-$rating; $i++){ ?>
						<span class="glyphicon glyphicon-star-empty"></span>
					<?php } ?>
					<?=$product->rating?> stars
					</p>
				</div>
			</div>

			<div class="well">
				<h5><b>REVIEW</b></h5>
				<?php 
				if(isset($_SESSION['id'])){ 
				?>
				<form>
					<textarea style="background-color:white; resize:none; height:150px; padding:10px; line-height: 1" placeholder="Leave a review"></textarea>
					<div class="ratingReview">
						<span class="glyphicon glyphicon-star-empty"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</div>
					<div class="text-right">
						<submit class="btn btn-success">Leave a Review</submit>
					</div>
				</form>
				<?php } ?>
				
				<?php
				foreach($reviews as $review){
					if($review->product_code = $product){
				?>
				<hr>

				<div class="row">
					<div class="col-md-12">
					<?php
					$rating = floor($review->rating);
					for($i = 0; $i < $rating; $i++){ ?>
						<span class="glyphicon glyphicon-star"></span>
					<?php } 
					for($i = 0; $i < 5-$rating; $i++){ ?>
						<span class="glyphicon glyphicon-star-empty"></span>
					<?php } ?>
						<?php
						foreach($users as $user){
							if($user->username == $review->username){
								echo $user->first_name." ".$user->last_name;
							}
						}
						?>
						<span class="pull-right">10 days ago</span>
						<p><?=$review->review?></p>
					</div>
				</div>
				<?php } } ?>
			</div>

		</div>

	</div>
	 <!-- Related Projects Row -->
	<div class="row">

		<div class="col-lg-12">
			<h3 class="page-header">Produk Terkait</h3>
		</div>
<?php
	$count = 1;
	foreach($productSpecific as $a_product){
			echo '<div class="col-sm-3 col-xs-6">';
				echo '<a href="'.base_url('products/'.$a_product->type.'/details-of-'.$a_product->id).'">';
					echo '<img class="img-responsive portfolio-item" src="'.base_url($a_product->image).'" alt="">';
				echo '</a>';
			echo '</div>';
		$count++;
		if($count > 4) break;
	}
?>
	</div>
	<!-- /.row -->

</main>
<!-- /.container -->
<script type="text/javascript">
function alertLogin(){
	$('#modal_alert').modal('open');
}

$(document).ready(function(e) {
	$("#product_form").submit(function(e) {
		$.ajax({
			type: "POST",
			url: "<?=base_url('addCart')?>",
			data: $(this).serialize(),
			success: function(res){
				switch(res){
					case 'success':
						$('#modal_success').modal('open');
						break;
				}
			}
		});
		return false;
	});
});
</script>