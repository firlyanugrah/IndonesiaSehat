// JavaScript Document

if($(window).width() < 460){
	$("#logo img").css("width", "100%");
}else{
	$("#logo img").css("width", "190px");
}

$(document).ready(function() {
	$('select').material_select();
	$('.carousel').carousel();
	window.setInterval(function(){
		$('.carousel').carousel('next');
	},8000);
	$('.carousel.carousel-slider').carousel({fullWidth: true});
	
	$(".arrowBrandLeft i").click(function() {
		$("#partnerBrand>li:first-child").clone(true).appendTo("#partnerBrand");
		$("#partnerBrand>li:first-child").remove();		
	});
	$(".arrowBrandRight i").click(function() {
		$("#partnerBrand>li:last-child").clone(true).prependTo("#partnerBrand");
		$("#partnerBrand>li:last-child").remove();		
	});
	
	$('.modal').modal({dismissible: false});
	$('#modalLogin.modal').modal({dismissible: true});
	
	$('#btn-calculator').attr('disabled',true);
	$('#btn-login').attr('disabled',true);
	//$('#btn-regist').attr('disabled',true);
	$('.input-field input').keyup(function(){
		if($('#username').val().length !== 0 && $('#password').val().length !== 0){
			$('#btn-login').attr('disabled', false);
		}else{
			$('#btn-login').attr('disabled', true);
		}
	});
	
	$(".ratingReview .glyphicon").hover(function(){
		var i = $(this).index() + 1;
		var j = $(this).index() + 2;
		$(".ratingReview .glyphicon:nth-child(-n"+i+")").removeClass("glyphicon-star-empty");
		$(".ratingReview .glyphicon:nth-child(-n"+i+")").addClass("glyphicon-star");
		$(".ratingReview .glyphicon:nth-child(n"+j+")").removeClass("glyphicon-star");
		$(".ratingReview .glyphicon:nth-child(n"+j+")").addClass("glyphicon-star-empty");
		
	});
});

$(".productBox").css({"width": 0.1415*$(".productWrap").width() + "px", "margin-right": 0.03*$(".productWrap").width() + "px"});
$(".productBox:last-child").css("margin-right", "0px");