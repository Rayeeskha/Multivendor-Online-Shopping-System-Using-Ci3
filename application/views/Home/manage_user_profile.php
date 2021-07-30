<!DOCTYPE html>
<html>
<head>
	<title>Manage User Profile</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<!---Body Section Start --->
<div class="container">
	<div class="card" style="padding-top: 0px;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 2px;">
			<h4 style="padding-left: 10px; font-size: 20px; font-weight: 700;color: grey;">
				<span class="fa fa-users" style="color: #ff3d00"></span>&nbsp;Manage Your Profile</h5>
		</div>
	</div>
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 2px;">
			<h6 style="padding-left: 10px; font-size: 15px; font-weight: 700;color: grey;">
				<span class="fa fa-key" style="color: #ff3d00"></span>&nbsp;Change Password Section</h6>
				<a href="<?= base_url("Home/Change_password_view"); ?>" style="padding-left: 10px; font-size: 15px; font-weight: 700; color: #ff3d00">
					<span class="fa fa-eye" style="color: #13124e"></span> &nbsp;&nbsp;Change  Your Password ?</a>
		</div>
	</div>
</div>
<!---Body Section End --->







<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>