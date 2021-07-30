<!DOCTYPE html>
<html>
<head>
	<title>Edit Seller Details</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		h6{font-weight: 500;font-size: 13px;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 3px;}
	</style>

</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Manage Category Section -->
<!------Body Section Start ------>
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500">Edit Seller Details</h5>
		</div>
		<div class="card-content">
			<div class="row">
				<?= form_open('Admin/update_Seller_details/'.$sellers[0]->id); ?>
				<div class="col l6 m12 s12">
					<h6>Company Name</h6>
					<input type="text" name="company_name" id="input_box" value="<?= $sellers[0]->company_name; ?>">
					<h6>PinCode</h6>
					<input type="text" name="pincode" id="input_box" value="<?= $sellers[0]->pincode; ?>">
					<h6>City</h6>
					<input type="text" name="city" id="input_box" value="<?= $sellers[0]->city; ?>">
					<h6>GST Number</h6>
					<input type="text" name="gstno" id="input_box" value="<?= $sellers[0]->gstno; ?>">
				</div>
				<div class="col l6 m12 s12">
					<h6>Mobile Number</h6>
					<input type="number" name="mobile" id="input_box" value="<?= $sellers[0]->mobile_number; ?>">
					<h6>State</h6>
					<input type="text" name="state" id="input_box" value="<?= $sellers[0]->state; ?>">
					<h6>PAN Number</h6>
					<input type="text" name="panno" id="input_box" value="<?= $sellers[0]->panno; ?>">
					<h6>Aadhar Number</h6>
					<input type="text" name="aadhar_number" id="input_box" value="<?= $sellers[0]->aadhar_number; ?>">
				</div>
				<center>
					<button type="submit" class="btn btn-waves-effect waves-light" style="background: green;font-weight: 500;font-size: 14px;text-transform: capitalize;">Update Details</button>
				</center>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!------Body Section End ------>


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>