    <!--Global Navigation-->
    <div id="gnav" class="col s12">
    	<div class="col s1 hide-on-med-and-down"><!--Spacer--></div>
    	<div class="col s2 hide-on-med-and-down">
        	<div class="input-field">
            	<input id="search" type="search" placeholder="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
        </div>
    	<div class="col s1 hide-on-med-and-down"><!--Spacer--></div>
        <!--for side nav mobile--><div class="col s3 valign-wrapper left-align hide-on-large-only" style="height:50px"><div class="col s12"><i class="fa fa-bars fa-2x"></i></div></div>
    	<div class="col s6 l4 center-align" id="logo"><a href="<?=base_url();?>"><img src="<?=base_url();?>/common/images/logo.png" alt="Indonesia Sehat"></a></div><!--in pc width logo 190px and sp make width logo to 100%-->
        <!--for side nav mobile--><div class="col s3 valign-wrapper right-align hide-on-large-only" style="height:50px"><div class="col s12"><i class="fa fa-shopping-basket fa-2x"></i></div></div>
    	<div class="col s3 valign-wrapper hide-on-med-and-down" style="height:60px">
			<?php if(!isset($_SESSION['id'])){
				echo '<div class="col s6"><!--Spacer--></div>';
        		echo '<div class="col s2"><a href="javascript:void(0)" data-target="modalLogin">Login</a></div>';
				echo '<div class="col s4 cart"><i class="fa fa-shopping-basket fa-2x"></i><span class="f-large">0</span></div>';
			}else{
				echo '<div class="col s2"><!--Spacer--></div>';
				echo '<div class="col s4"><a href="'.base_url('profile').'">Hello, '.$_SESSION['name'].'</a></div>';
				echo '<div class="col s2"><a href="'.base_url('doLogout').'">Logout</a></div>';
				echo '<div class="col s4 cart"><a href="'.base_url('keranjang').'"><i class="fa fa-shopping-basket fa-2x"></i><span class="f-large" style="text-decoration:none">'.$count_transactions.'</span></a></div>';
			}
			?>
        </div>
    	<div class="col s1 hide-on-med-and-down"><!--Spacer--></div>
    </div>
</header>