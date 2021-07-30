<!DOCTYPE html>
<html>
<head>
	<title>Seller Account Settings</title>
	<!------Css File Include ----->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!------Css File Include ----->
	<style type="text/css">
		#input_box, #retype_password, #password{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
		#color{background: #ffebe5}
		span{cursor: pointer;}
		#input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500;border-radius:3px}
	</style>
</head>
<body>
<!-------Include Topbar File ---->
<?php $this->load->view('Seller/top_bar'); ?>	
<!-------Include Topbar File ---->	

<!---------Body Section Start ------>
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="row">
		<div class="col l6 m12 s12">
			<div class="card">
			<div class="card-content">
			<?= form_open('Seller_dashboard/change_user_password', array('id' => 'passwordForm')); ?>
				<center>
					<h5><span class="fa fa-unlock" style="color: #13124e"></span></h5>
					<h6 style="color: black;font-weight: 500">Change Password ?</h6>
				</center>
				
				<h6 style="font-size: 14px;color: grey;font-weight: 500">Old Password</h6>
				<input type="password" name="old_password" value="<?= set_value('old_password'); ?>" id="input_box" placeholder="Enter Your Old Password" required>

				<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('old_password'); ?></span>
				
				<h6 style="font-size: 14px;color: grey;font-weight: 500" >New Password</h6>
				<input type="password" name="new_password"  value="<?= set_value('new_password'); ?>" id="password" placeholder="xxxxx" required>
				<span style="position: absolute;
						right: 30px;
						transform: translate(0,-50%);
						top: 43%">
					<i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
				</span>
				<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('new_password'); ?></span>

				<h6 style="font-size: 14px;color: grey;font-weight: 500">Confirm Password</h6>
				<input type="password" name="confirm_password" value="<?= set_value('confirm_password'); ?>" id="retype_password" placeholder="xxxxxxxx">
				<span style="color: red;font-weight: 500;font-size: 12px;"><?=  form_error('confirm_password'); ?></span>
				<button type="submit" id="btn_change_password" class="btn waves-effect" style="background: black;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px; text-transform: capitalize;">
					<span class="fa fa-key"></span>&nbsp;Change Password</button>
				<center>
					<h6 style="font-size: 14px;color: grey;font-weight: 500">I don't want to Change Password ?</h6>
				</center>
				<a href="<?= base_url('Seller_dashboard/index'); ?>" class="btn waves-effect" style="background: #ff3d00;width: 100%;margin-top: 10px;box-shadow: none;border-radius: 3px;text-transform: capitalize;">
					<span class="fa fa-eye"></span>&nbsp;Back to Dashboard</a>
				<h6 style="color: grey; font-size: 12px;font-weight: 500"><span style="color: #ff3d00">Notes</span>: New Password and Confirm Password both are same and more than 5 Character Other wises button will disabled ?</h6>	

			<?= form_close(); ?>
			</div>
		</div>
		</div>
		<div class="col l6 m12 s12">
			<?= form_open_multipart('Seller_dashboard/upload_seller_pic'); ?>
			<div class="card">
				<div class="card-content" style="border-bottom: 1px solid silver">
					<center>
						<h6 style="color: black;font-weight: 500"><span class="fa fa-images" style="color: orange"></span>Upload Profile Image</h6>
					</center>
				</div>
					<?php if(isset($success)): ?>
						<div class="card" style="background-color: black">
						    <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: green;color: white;font-weight: 500">
						            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= $success; ?>
						    </div>
						</div>
					<?php endif; ?>
					<?php if(isset($error)): ?>
						<div class="card" style="background-color: black">
						    <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
						            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= $error; ?>
						    </div>
						</div>
					<?php endif; ?>
				<div class="card-content">
					<h6 style="color: grey;font-weight: 500;font-size: 15px;">Upload Profile Image</h6>
					<?php if($seller_data[0]->seller_profile !== ""): ?>
						<img src="<?= base_url('uploads/seller_profile/'.$seller_data[0]->seller_profile); ?>" style="width: 100px;height: 100px;border: 1px solid silver;display: block;margin-bottom: 10px;">
					<?php else: ?>
					<?php endif; ?>
				   <input type="file" name="seller_profile" id="input_file">
 					<center>
						<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Upload Image</button>
					</center>
					<h6 style="color: red;font-weight:500;font-size: 13px;">Notes: File Should be Valid Jpg|png|Jeg Max Size Shuold be 10MB</h6>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---------Body Section Start ------>

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
<script type="text/javascript">
	var state= false;
		function toggle(){
			if(state){
				document.getElementById("password").setAttribute("type","password");
				document.getElementById("retype_password").setAttribute("type","password");
				document.getElementById("eye").style.color='#7a797e';
				state = false;
			}
			else{
				document.getElementById("password").setAttribute("type","text");
				document.getElementById("retype_password").setAttribute("type","text");
				document.getElementById("eye").style.color='#5887ef';
				state = true;
			}
		}
		//Show Hide Passsword Script 
</script>
</body>
</html>