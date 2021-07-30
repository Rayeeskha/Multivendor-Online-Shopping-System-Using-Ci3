<!DOCTYPE html>
<html>
<head>
	<title>Forget Password ?</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
		#color{background: #ffebe5}
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
			<?= form_open('Home/ForgotPassword'); ?>
				<center>
					<h5><span class="fa fa-key" style="color: #13124e"></span></h5>
					<h6 style="color: black;font-weight: 500">Forget Password ?</h6>
				</center>
				
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Email</h6>
				<input type="email" name="email" id="input_box" placeholder="Enter Email Address" required="">
				
				<button type="submit" class="btn waves-effect" style="background: black;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px; text-transform: capitalize;">
					<span class="fa fa-key"></span>&nbsp;Forget Password ?
				</button>
				

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
</body>
</html>