<!DOCTYPE html>
<html>
<head>
	<title>User Sign Up - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box, #password,#retype_password{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;}
		#color{background: #ffebe5}
		span{cursor: pointer;}

	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<!--User Signup Form Section Start  --->
<div class="row" id="color" style="margin-bottom: 0px;margin-top: 0px;">
	<div class="col l4 m4 s12"></div>
	
	<div class="col l4 m4 s12">
		<!---Php Meassge Show --->

			<div class="container-fluid" style="margin-top: 10px;">
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
			<!---Php Meassge Show --->


		
		<!--Card Section --->
		<div class="card">
			<div class="card-content">
				<?= form_open('Home/user_registered/' .$page); ?>
				<center>
					<h5><span class="fa fa-users"></span></h5>
					<h6 style="color: black;font-weight: 500">Create Account</h6>
				</center>
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Full Name</h6>
				<input type="text" name="full_name" id="input_box" placeholder="Full Name" required="">
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Email</h6>
				<input type="email" name="email" id="input_box" placeholder="Enter Email Address" required="">
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Mobile Number</h6>
				<input type="Number" name="mobile" id="input_box" placeholder="Enter Mobile Number">
				<h6 style="font-size: 14px;color: grey;font-weight: 500" >Password</h6>
				<input type="password" name="password" id="password" placeholder="xxxxx" required="" onkeyup="check_password()">
				<span style="position: absolute;
						right: 30px;
						transform: translate(0,-50%);
						top: 50%">
			<i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
		</span>
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Retype Password</h6>
				<input type="password" name="retype_password" id="retype_password" placeholder="xxxxx" required="" onkeyup="check_password()">
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Address</h6>
				<textarea name="address" placeholder="Enter Your Address"></textarea>
				<button type="submit" class="btn waves-effect" id="btn_register_now" style="background: black;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px; text-transform: capitalize;">Register Now</button>
				<center>
					<h6 style="font-size: 14px;color: grey;font-weight: 500">I have Already an Account?</h6>
				</center>
				<a href="<?= base_url('Home/user_signin'); ?>" class="btn waves-effect" style="background: #ff3d00;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px;text-transform: capitalize;">Sign In</a>

				<?= form_close(); ?>
			</div>
		</div>
		<!--Card Section --->
	</div>
	<div class="col l4 m4 s12"></div>
</div>
<!--User Signup Form Section End --->

<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<script type="text/javascript">
		function ValidateEmail(email){
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			return expr.test(email);
		}
		$('input[name="email"]').keyup(function(){
			if (!ValidateEmail($('input[name="email"]').val())) {
				$('#btn_register_now').prop('disabled',true);
			}else{
				$('#btn_register_now').prop('disabled',false);
			}
		});

		//mobile number validation start
		$('input[name="mobile"]').keyup(function(){
			var mobile_number = $('input[name="mobile"]').val();
			var mobile_number_len = $('input[name="mobile"]').val().length;

			if (mobile_number > 0) {
		
			if (mobile_number_len == 10) {
				$('#btn_register_now').prop('disabled',false);
			}else{
				$('#btn_register_now').prop('disabled',true);
			}
			}else{
				$("#btn_register_now").prop('disabled',true);

			}
		}) 
		//mobile number validation end


		//Show Hide Passsword Script 
		var state= false;
		function toggle(){
			if(state){
				document.getElementById("password").setAttribute("type","password");
				document.getElementById("eye").style.color='#7a797e';
				state = false;
			}
			else{
				document.getElementById("password").setAttribute("type","text");
				document.getElementById("eye").style.color='#5887ef';
				state = true;
			}
		}
		//Show Hide Passsword Script 
	
		//Check User Script
		function check_password(){
			let password          = $('#password');
			let retype_password   = $('#retype_password');
			if (password.val().length > 4) {
				if (password.val() == retype_password.val() || retype_password.val()  == password.val()) {
					$('#btn_register_now').prop('disabled',false);
				}else{
					$('#btn_register_now').prop('disabled',true);
				}
			}else{
				$('#btn_register_now').prop('disabled',true);
			}
		}
	
</script>
</body>
</html>