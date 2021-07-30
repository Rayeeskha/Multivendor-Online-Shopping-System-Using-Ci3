<!DOCTYPE html>
<html>
<head>
	<title>Online Shop | Seller Account</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!------Css File Include ----->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!------Css File Include ----->
	 <style type="text/css">
	 	body{
	 		background: rgba(0,0,0,0.05);
	 	}
	 #seller_username{ 	width: 15%; border: 1px solid white; height: 35px; border-radius: 3px; margin-left: 58%;
	 	box-shadow: none; font-size: 13px; color: white; padding-left: 2px;}	
	 #seller_password{ width: 15%; border: 1px solid white; height: 35px; border-radius: 3px; margin-left: 1px;box-shadow: none;  font-size: 13px; color: white; padding-left: 2px; }
	 #input_box,#pincode,#panno,#gstno,#state,#city,#password,#confirm_password{border: 1px solid silver; height: 35px; border-radius: 3px; box-shadow: none; padding-left: 3px; margin-bottom: 25px;}
	p{text-align: justify; width: 50%}
	 .box{width: 10%; height: 2px;background:#13124e;margin-top: 20px;margin-bottom: 20px;}
	 #mobile_username,#mobile_password{box-shadow: none;border-bottom: 1px solid #13124e; }
	 #mobile_username + label,#mobile_password + label{color:#13124e }

	 /* hide number input arrow */
	 input[type=number]::-webkit-inner-spin-button,
	 input[type=number]::-webkit-outer-spin-button{
	 	-webkit-appearance:none;
	 	-moz-appearance:none;
	 	margin: 0;
	 }
	/* mEDIA QUERY SECTION START  */
	@media only screen and(max-width: 1200px)
	{
		p{width: 100%;}
		#email{width: 100%;}
		#password{width: 100%; margin-left: -1px;}
		#mobile_number{width: 100%;}
		#pincode{width: 100%;}
		#gstno{width: 100%; margin-left: -1px;}
	}
	h6{font-size: 14px;font-weight: 500;}
	span{cursor: pointer;}


	</style>
	
</head>
<body>


<!---Body Section Start --->
	<!---Top Bar Section Start --->
		<nav style="background: #13124e;">
			<div class="nav-wrapper">
				<a href="" class="brand-logo" style="font-size: 16px; margin-left: 10px;">Seller Account</a>
				<?= form_open('Seller/login_account'); ?>
				<input type="email" name="seller_uid" id="seller_username" class="hide-on-med-and-down" placeholder="Seller Email Id" >
				<input type="password" name="seller_password" class="hide-on-med-and-down" id="seller_password" placeholder="Password">
				<button type="submit" class="btn waves-effect waves-light hide-on-med-and-down" style="background:#13124e; border: 1px solid white; height: 35px; margin-top: -5px;">Login</button>
				<?= form_close(); ?>
				
			</div>
		</nav>
	<!---Top Bar Section End --->

	<!--Mobile Screen Login Form Start --->
	
	<div class="hide-on-med-and-up" style="padding: 15px">
		<?= form_open('Seller/login_account'); ?>
		<div class="input-field">
			<label for="mobile_username">Seller Email</label>
			<input type="email" name="seller_uid" id="mobile_username" >
		</div>
		<div class="input-field">
			<label for="mobile_password">Password</label>
			<input type="password" name="seller_password" id="mobile_password" >
		</div>
		<button type="submit" class="btn waves-effect waves-light" style="background:#13124e">Login</button>
		<?= form_close(); ?>
	</div>
	
	<!--Mobile Screen Login Form End--->

	<!--Register Section Start ---->
	<div class="row" style="background: rgba(0,0,0,0.05); margin-left: 5px;margin-right: 5px">
		<div class="col l8 m12 s12"  style="padding: 15px;">
			<h5 style="margin-top: 5%;color: silver"><b>Start<span style="color: #13124e"> Selling</span> On My online <span style="color:#13124e">Shop.</span></b></h5>
			<div class="box"></div>
			<h6 style="color: grey;font-weight:500;font-size: 16px;">You Can Create Your own Account and can buy buy the all product throw my website all categories products buy in my website...</h6><br>
			<h6 style="color: grey;font-weight:500;font-size: 16px;">Create account and buy the prducts good income throw online Shopping .All products buy this website throw online good income without any issue..</h6>
		
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				It’s natural that when you commit to work with a professional or a company, you always like to know who exactly that person or company is. <br> <br> Maybe you check them on Google, find out their LinkedIn profile, or take a look at their social media accounts.
			</h6>
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				You just want to be sure about the people you are trusting with your hard-earned money. The same is the case with buyers on Fiverr. <br>
			</h6>
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				Whenever a buyer lands on your Fiverr profile, the first thing that he/she usually reads before clicking the “purchase” button is your profile description. <br>
			</h6>
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				Whenever a buyer lands on your Fiverr profile, the first thing that he/she usually reads before clicking the “purchase” button is your profile description. <br>
			</h6>
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				Whenever a buyer lands on your Fiverr profile, the first thing that he/she usually reads before clicking the “purchase” button is your profile description. <br>
			</h6>
			<h6 style="color: grey;font-size: 16px;font-weight: 500;">
				Whenever a buyer lands on your Fiverr profile, the first thing that he/she usually reads before clicking the “purchase” button is your profile description. <br>
			</h6>
			<a href="#!"class="btn waves-effect waves-light" style="background:#13124e; border-radius: 1px solid silver;text-transform: capitalize;font-weight: 500">Sell On My Shop</a>
			
		</div>
		<div class="col l4 m12 s12 white" style="padding: 15px;">
			<?= form_open("Seller/CreateAccount"); ?>
			<!---Php Meassge Show --->
				<div class="container" style="margin-top: 10px;">
					<?php if($msg = $this->session->flashdata('success')): ?>
				<div class="card">
					<div class="card-content" style="padding: 10px;padding-left:15px; ">
						<h6 style="font-size: 15px;font-weight: 500;margin-top: 5px;"><span class="fa fa-check-circle" style="color: green;"></span>&nbsp; <span style="color: green"><?= $msg; ?></span></h6>
					</div>
				</div>
				<?php endif; ?>

				<?php if($msg = $this->session->flashdata('error')): ?>
				<!---Error message --->
				<div class="card">
					<div class="card-content" style="padding: 10px;padding-left:15px; ">
						<h6 style="font-size: 15px;font-weight: 500;margin-top: 5px;"><span class="fa fa-exclamation-triangle" style="color: red;"></span>&nbsp;<span style="color: red"><?= $msg; ?></span></h6>
					</div>
				</div>
				<?php endif; ?>
				</div>
				<!---Error message --->
	
			<h6 class="center-align" style="font-weight: 500;font-size: 17px;"><span class="fa fa-users" style="color: red">&nbsp;Register Now</span></h6>

			<input type="text" name="company_name" value="<?= set_value('company_name'); ?>" id="input_box" placeholder="Company Name">
			<h6><span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('company_name'); ?></span></h6>
			<input type="text" name="email" value="<?= set_value('email'); ?>" id="input_box" placeholder="Email ID" >
			<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('email'); ?></span>
			<div class="row">
				<div class="col l6 m6 s12">

					<input type="password" name="password" id="password" value="<?= set_value('password'); ?>" placeholder="Password">
					<span style="position: absolute; left: 80%;top: 43% !important" class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></span>
			
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('password'); ?></span>
				</div>
				<div class="col l6 m6 s12">
					<input type="password" name="confirm_password" value="<?= set_value('confirm_password'); ?>" id="confirm_password" placeholder="Confirm Password ">
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('confirm_password'); ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col l6 m12 s12">
					<input type="number" name="mobile_number" id="input_box" value="<?=  set_value('mobile_number'); ?>" placeholder="Mobile Number">
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('mobile_number'); ?></span>
				</div>
				<div class="col l6 m12 s12">
					<input type="number" name="pincode" id="pincode" value="<?= set_value('pincode'); ?>" placeholder="Enter Pin Code" onkeyup="get_pincodedetails()">
					<h6 style="color: red;display: none;" id="pin_code_error">Invalid Pincode</h6>
					<h6><span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('pincode'); ?></span></h6>
				</div>
				
			</div>
			<div class="row">
				<div class="col l6 m12 s12">
					<input type="text" name="state" id="state" value="<?= set_value('state'); ?>" placeholder="Enter State" readonly>
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('state'); ?></span>
				</div>
				
				<div class="col l6 m12 s12">
					<input type="text" name="city" id="city" value="<?= set_value('city'); ?>" placeholder="Enter City" readonly>
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('city'); ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col l6 m12 s12">
					<input type="text" name="panno" id="panno" value="<?= set_value('panno'); ?>" placeholder="PAN Number" >
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('panno'); ?></span>
				</div>
				
				<div class="col l6 m12 s12">
					<input type="text" name="gstno" id="gstno" value="<?= set_value('gstno'); ?>" placeholder="GST Number" >
					<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('gstno'); ?></span>
				</div>
			</div>
			<input type="text" name="aadhar_number" value="<?= set_value('aadhar_number'); ?>" id="input_box" placeholder="Enter Aadhar Number">
			<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('aadhar_number'); ?></span>
			<center>
				<button type="submit" id="btn_submit" class="btn waves-effect waves-light" style="background:#13124e;border: 1px solid white;font-weight: 500;text-transform: capitalize; ">Create Account</button>
			</center>
			
			<?= form_close(); ?>
			
		</div>
	</div>
	<!--Register Section End ---->

	<!---Buyer and Seller Account Section Start--->
	<div class="row">
		<h3 class="center-align" style="color: silver">Buyer & Seller
			<span style="color:#13124e; margin-bottom: 30px;" >Accounts</span>
		</h3>
		<div class="box" style="margin:0 auto;"></div>
		<div class="col l6 m6 s12">
			<h1 class="center-align"><span class="fa fa-users" style="padding: 40px;border:5px solid silver; border-radius: 100%; color: #13124e"></span></h1>
			<h4 class="center-align" style="color: #13124e">&nbsp;
				<?php if($users): echo count($users); else:  echo "0"; endif; ?>
			Buyers</h4>
			<h6 class="center-align" style="color: silver;">(<?php if($users): echo count($users); else:  echo "0"; endif; ?>)&nbsp;Buyer Accounts in My Online Shop.</h6><br>
		</div>
		<div class="col l6 m6 s12">
			<h1 class="center-align"><span class="fa fa-users" style="padding: 40px;border:5px solid silver; border-radius: 100%; color: #13124e"></span></h1>
			<h4 class="center-align" style="color: #13124e">
				<?php if($sellers): echo count($sellers); else:  echo "0"; endif; ?>
			&nbsp;Sellers</h4>
			<h6 class="center-align" style="color: silver;">(<?php if($sellers): echo count($sellers); else:  echo "0"; endif; ?>)  Sellers Accounts in My Online Shop.</h6><br>
		</div>
	</div>
	<!---Buyer and Seller Account Section End--->

	<!---recent seller section start --->
<div class="container">
	<h4 class="canter-align" style="margin-top: 5%; margin-bottom: 2%; color: silver">
		<span style="color: #13124e">Recent</span>Seller Account
	</h4>
	<div class="row">
		<!--Count Seller Recent Image Query Start ---->
		<?php if($sellers):
		count($sellers);
		foreach($sellers as $sale): ?>
		<div class="col l3 m4 s12">
			<div class="card" style="border-radius: 3px;">
				<div class="card-image">
				<a href="#!"><img src="<?= base_url('uploads/seller_profile/'.$sale->seller_profile); ?>" class="responsive-img" alt="Seller name" style="height:200px;width: 100%">
				</a>
				</div>
				<div class="card-conreadonlytent">
					<h5 style="color: silver;margin-left: 10px;padding: 10px"><?= $sale->company_name; ?></h5>
					
				</div>
			</div>
		</div>
	<?php endforeach; else: ?>
	<h6 style="color: red;">Not Added Any Sellers</h6>
<?php endif; ?>
	
		<!--Count Seller Recent Image Query End ---->
	</div>
	<center>
		<a href="" class="btn waves-effect waves-light" style="background: #13124e;font-weight: 500;font-size: 16px;text-transform: capitalize;">More Sellers</a>
	</center>
</div>			

	<!---Show Seller Recent Profile Image  Section end --->
<!---Start Selling Message Section Start -->
	<div style="background:#13124e">
		<h4 class="center-align" style="color: white;padding-top: 5%; padding-bottom: 2%; font-size: 16px;">Start Your Business with My Online Shop</h4>
		<center><a href="<?= base_url('/Seller/index'); ?>" class="btn-large waves-effect waves-dark" style="margin-bottom: 5%;color:#fff; border:1px solid white; background: #13124e; font-weight: 500;text-transform: capitalize;">Start Selling&nbsp;&nbsp;&nbsp;<span class="fa fa-angel-right"></span><span class="fa fa-angel-right"></span></a></center>

		<footer>
			<div class="row">
				<div class="footer-copyright" style="background:red; color:white" >
					<div class="container">
						<div class="col l6 m12 s12">
							<a href="http://khanrayees.000webhostapp.com"><img src="<?= base_url('assets/images/dh.png') ?>" style="width: 50px !important;"></a >
							<h5 class="white-text">E-Commerce Provider</h5>
							<a href="http://khanrayees.000webhostapp.com" class="grey-text text-lighten" style="font-weight: 500;font-size: 14px;">Khan Rayees E-Shopper Online Store</a>

						</div>
						Copyright @ 2020 to <?= date('Y'); ?> Copyright All right Reserved by Khan Rayees
						<a href="http://flexionsoftware.000webhostapp.com/" class="white-text text-lighten" style="text-decoration-line: underline;"> &nbsp;&nbsp;&nbsp;Design & Developed By Khan Rayees Software Developer</a>
						<div class="col l6 m12 s12"  style="margin-top:5%">
							<a href="#!" style="color: white;font-weight: 500;font-size: 14px;">Company Privacy Policy</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
</div>
	<!---Start Selling Message Section End -->
<!---Body Section End --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
<!---Custome JS FILE INCLUDE --->
<script type="text/javascript">
	function get_pincodedetails(){
	var pincode=$('#pincode').val();
	if(pincode==''){
		$('#city').val('');
		$('#state').val('');
	}else{
		$.ajax({
			url:'<?= base_url('Home/api_get_pincode'); ?>',
			type:'post',
			data:'pincode='+pincode,
			success:function(data){
				if(data=='no'){
					$('#pin_code_error').show();
					jQuery('#city').val('');
					jQuery('#state').val('');
				}else{
					$('#pin_code_error').hide();
					var getData=$.parseJSON(data);
					jQuery('#city').val(getData.city);
					jQuery('#state').val(getData.state);
				}
			}
		});
	}
}

//Show Hide Passsword Script 
		var state= false;
		function toggle(){
			if(state){
				document.getElementById("password").setAttribute("type","password");
				document.getElementById("confirm_password").setAttribute("type","password");
				document.getElementById("eye").style.color='#7a797e';
				state = false;
			}
			else{
				document.getElementById("password").setAttribute("type","text");
				document.getElementById("confirm_password").setAttribute("type","text");
				document.getElementById("eye").style.color='#5887ef';
				state = true;
			}
		}
		//Show Hide Passsword Script 

</script>
</body>
</html>
