<!DOCTYPE html>
<html>
<head>
	<title>Place Order Details</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#input_box_discount{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; width: 50%}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
		
		h6{font-weight: 500;font-size: 14px;}
		select{display: block;}
		select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;width: 100%}
	</style>
</head>
<body>
<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->
<div style="margin-right: 5%;margin-left: 5%">
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
		<div class="card-content" style="padding: 10px; border-bottom:  1px solid silver;">
			<center>
				<h6 style="color: black;font-weight: 700; font-size: 20px ;margin-top:   5px; margin-top: 0px;">
				<span class="fa fa-truck"></span>&nbsp;Edit Shipping Details
			</h6>
			</center>
		</div>
	
		<?= form_open('Home/update_shipping_details/'.$edit_address[0]->user_id); ?>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m12 s12">
					<h6>First Name</h6>
					<input type="text" name="first_name" value="<?= $edit_address[0]->first_name; ?>" id="input_box" placeholder="Enter Your First Name">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('first_name'); ?></span>
					<h6>Email</h6>
					<input type="text" name="email" value="<?= $edit_address[0]->last_name; ?>" id="input_box" placeholder="Enter Email">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('email'); ?></span>
					<h6>Country</h6>
					<select name="country">
						<?php if($edit_address[0]->country): ?>
						<option value="<?= $edit_address[0]->country ?>" selected ><?= $edit_address[0]->country ?></option>
						<?php else: ?>
						<option value="India">India</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="China">China</option>
						<option value="Pakistan">Pakistan</option>
						<option value="UAE">UAE</option>
						<option value="Dubai">Dubai</option>
						<?php endif; ?>
					</select>
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('country'); ?></span>
					<h6>House No and Street Address</h6>
					<input type="text" name="street_house_no" value="<?= $edit_address[0]->street_house_no; ?>" id="input_box" placeholder="Street Address">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('street_house_no'); ?></span>
					<h6>City</h6>
					<input type="text" name="city" value="<?= $edit_address[0]->city; ?>" id="input_box" placeholder="Enter City">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('city'); ?></span>
				</div>
				<div class="col l6 m12 s12">
					<h6>Last Name</h6>
					<input type="text" name="last_name" value="<?= $edit_address[0]->last_name; ?>" id="input_box" placeholder="Enter Your Last Name">
					<h6>Mobile</h6>
					<input type="number" name="mobile" value="<?= $edit_address[0]->mobile; ?>" id="input_box" placeholder="Enter Mobile Number">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('mobile'); ?></span>
					<h6>State</h6>
					<input type="text" name="state" value="<?= $edit_address[0]->state; ?>" id="input_box" placeholder="Enter State">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('state'); ?></span>
					<h6>Address Line 2</h6>
					<input type="text" name="address_line_two" value="<?= $edit_address[0]->address; ?>" id="input_box" placeholder="Enter Address Line ">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('address_line_two'); ?></span>
					<div class="row">
						<div class="col l6 m6 s6">
							<h6>Area Code</h6>
							<input type="text" name="area_code" value="<?= $edit_address[0]->area_code; ?>" id="input_box" placeholder="Enter Area Code">
							<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('area_code'); ?></span>
						</div>
						<div class="col l6 m6 s6">
							<h6>Zip Code</h6>
							<input type="text" name="zip_code" value="<?= $edit_address[0]->zip_code; ?>" id="input_box" placeholder="Enter Your Zip Code">
							<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('zip_code'); ?></span>
						</div>
					</div>
					
				</div>
			</div>
			<center>
				<button type="submit" id="btn_address_validation" class="btn btn-waves-effect waves-light" style="background: #ff3d00;text-transform: capitalize; margin-top: 15px;font-weight: 500; font-size: 15px;">
				Purchase Now
			</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>


<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>


</body>
</html>