<script  type="text/javascript">
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
		e.preventDefault();		
		<?php } ?>
	});
});
</script>