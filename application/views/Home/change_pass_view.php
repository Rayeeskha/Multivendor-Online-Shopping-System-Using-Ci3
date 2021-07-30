<!DOCTYPE html>
<html>
<head>
	<title>Change Password - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box, #retype_password, #password{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
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
		<!--Card Section --->
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


		
		<div class="card">
			<div class="card-content">
			<?= form_open('Home/change_user_password', array('id' => 'passwordForm')); ?>
				<center>
					<h5><span class="fa fa-unlock" style="color: #13124e"></span></h5>
					<h6 style="color: black;font-weight: 500">Change Password ?</h6>
				</center>
				
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Old Password</h6>
				<input type="password" name="old_password" id="input_box" placeholder="Enter Your Old Password">

				<?php echo form_error('old_password', '<div class="error">', '</div>')?>
				
				<h6 style="font-size: 14px;color: grey;font-weight: 500" >New Password</h6>
				<input type="password" name="new_password" id="password" placeholder="xxxxx" required="" onkeyup="check_password()">
				<span style="position: absolute;
						right: 30px;
						transform: translate(0,-50%);
						top: 43%">
					<i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
				</span>

				<h6 style="font-size: 14px;color: grey;font-weight: 500">Confirm Password</h6>
				<input type="password" name="confirm_password" id="retype_password" placeholder="xxxxxxxx" onkeyup="check_password()">
				
				<button type="submit" id="btn_change_password" class="btn waves-effect" style="background: black;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px; text-transform: capitalize;">
					<span class="fa fa-key"></span>&nbsp;Change Password</button>
				<center>
					<h6 style="font-size: 14px;color: grey;font-weight: 500">I don't want to Change Password ?</h6>
				</center>
				<a href="<?= base_url('Home/user_dashboard'); ?>" class="btn waves-effect" style="background: #ff3d00;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px;text-transform: capitalize;">
					<span class="fa fa-eye"></span>&nbsp;Back to Dashboard</a>
				<h6 style="color: grey; font-size: 12px;font-weight: 500"><span style="color: #ff3d00">Notes</span>: New Password and Confirm Password both are same and more than 5 Character Other wises button will disabled ?</h6>	

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
	//Check user  password matchnig or not 
	function check_password(){
			let password          = $('#password');
			let retype_password   = $('#retype_password');
			if (password.val().length > 4) {
				if (password.val() == retype_password.val() || retype_password.val()  == password.val()) {
					$('#btn_change_password').prop('disabled',false);
				}else{
					$('#btn_change_password').prop('disabled',true);
				}
			}else{
				$('#btn_change_password').prop('disabled',true);
			}
		}
	//Check user  password matchnig or not 



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
</script>
</body>
</html>
