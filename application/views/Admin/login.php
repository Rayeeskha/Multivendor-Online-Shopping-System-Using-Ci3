<!DOCTYPE html>
<html>
<head>
	<title>Admin  Login - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		
		body{background: #13124e}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
	</style>
</head>
<body>
<!---Body Section --->
<!---Login Form --->
<div class="row" style="margin-top: 3%;">
	<div class="col l4 m4 s12"></div>
	<div class="col l4 m4 s12">
		<!---card Section --->
		<div class="card" style="border-radius: 3px;">
			<div class="card-content">
				<h4 class="center-align" style="margin-bottom: 0px;"><span class="fa fa-users"></span></h4>
				<h5 class="center-align" style="margin-top: 0px;">Admin Login</h5>
				<h6 style="font-size: 14px; font-weight: 500;color: grey;">Username</h6>
				<input type="text" name="username" id="input_box" placeholder="Username"> 
				<h6 style="font-size: 14px; font-weight: 500;color: grey;">Password</h6>
				<input type="password" name="password" id="input_box" placeholder="xxxxxxx">
				<button type="button" class="btn waves-effect waves-light" id="btn_sign_in" style="background: black;text-transform: capitalize;width: 100%;font-weight: 500;margin-top: 10px;height: 40px;border-radius: 3px;">Sign In <span class="fa fa-sign-in-alt" ></span>	</button>
				<h6 style="margin-top: 20px;font-size: 14px; font-weight: 500;color: grey;">Notes:</h6>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Admin Login Panel Online Store </p>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Admin will Manage All Products and Users Activity </p>
				<p style="font-size: 14px; font-weight: 500;color: grey;">And also Admin will Manage Orders , Admin Panel have all Access of that Online Store !</p>

			</div>
		</div>
		<!---card Section --->
	</div>
	<div class="col l4 m4 s12"></div>
</div>
<!---Login Form --->
<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>