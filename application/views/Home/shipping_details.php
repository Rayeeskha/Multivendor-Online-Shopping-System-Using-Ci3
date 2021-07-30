<!DOCTYPE html>
<html>
<head>
	<title>Place Order Details</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box, #pincode,#state, #city{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
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



	
	<?php if($this->session->userdata('email') == ""): ?>
		<div class="card-content">
			<!---Button Section --->
				<div class="row" style="margin-top: 10px; margin-bottom: 0px;">
					<div class="col l6 m6 s6">
						<a href="<?= base_url('Home/user_signup/cart'); ?>" class="btn waves-effectwaves-light" style="font-size: 12px;text-transform: capitalize;font-weight: 500;width: 100%;background: #ff3d00;box-shadow: none;height: 40px;">Register Account</a>
					</div>
					<div class="col l6 m6 s6">
						<a href="<?= base_url('Home/user_signin/cart'); ?>" class="btn waves-effectwaves-light" style="font-size: 12px;text-transform: capitalize;font-weight: 500;width: 100%;background: #13124e;box-shadow: none;height: 40px;">Login Account</a>
					</div>
				</div>
				<!---Button Section --->
		</div>
	<?php endif; ?>

	<div class="card">
		<div class="card-content" style="padding: 10px; border-bottom:  1px solid silver;">
			<center>
				<h6 style="color: black;font-weight: 700; font-size: 20px ;margin-top:   5px; margin-top: 0px;">
				<span class="fa fa-truck"></span>&nbsp;Shipping Details
			</h6>
			</center>
		</div>
		<?php
			$user_detail = get_users_details($this->session->userdata('email'), $this->session->userdata('password'));
			$check_address = $this->db->get_where('ms_temp_address', ['user_id'=> $user_detail[0]->id])->result();
		if ($check_address): 
			count($check_address); ?>
		<div class="container">
			<div class="card" style="box-shadow: none;border: 1px solid silver">
				<div class="card-content" style="font-weight: 500;font-size: 15px;">
					<span class="fa fa-truck" style="color: red"></span>&nbsp;Shipping Address
				</div>
				<div class="card-content">
					<div class="row">
					<div class="col l4 m12 s12">
						<h6>First Name : <?= $check_address[0]->first_name; ?></h6>
						<h6>Last Name : <?= $check_address[0]->last_name; ?></h6>
						<h6>Mobile Number : <?= $check_address[0]->mobile; ?></h6>
						<h6>Email : <?= $check_address[0]->email; ?></h6>
						<h6>Country : <?= $check_address[0]->country; ?></h6>
						<h6>State : <?= $check_address[0]->state; ?></h6>
						<h6>City : <?= $check_address[0]->city; ?></h6>
						<h6>Street House No : <?= $check_address[0]->street_house_no; ?></h6>
						<h6>Zip Code : <?= $check_address[0]->zip_code; ?></h6>
						<h6>Area Code : <?= $check_address[0]->area_code; ?></h6>
					</div>
					<div class="col l4 m12 s12">
						<a href="<?= base_url('Home/edit_shipping_details/'.$user_detail[0]->id); ?>" class="btn btn-waves-effect waves-light" style="background: #ff3d00;text-transform: capitalize;font-weight: 500">Edit Details</a>
					</div>
					<div class="col l4 m12 s12">
						<a href="<?= base_url('Home/place_order'); ?>" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize;font-weight: 500">Place Order</a>
					</div>
				</div>

				</div>
			</div><br><br>
		</div>	

		<?php else: ?>
		<?= form_open('Home/add_shipping_details/'.$user_detail[0]->id); ?>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m12 s12">
					<div class="row">
						<div class="col l6 m12 s12">
							<h6>First Name</h6>
								<input type="text" name="first_name" value="<?= set_value('first_name'); ?>" id="input_box" placeholder="Enter Your First Name">
								<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('first_name'); ?></span>
						</div>
						<div class="col l6 m12 s12">
							<h6>Last Name</h6>
							<input type="text" name="last_name" value="<?= set_value('last_name'); ?>" id="input_box" placeholder="Enter Your Last Name">
						</div>
					</div>
					
					<h6>Email</h6>
					<input type="text" name="email" value="<?= set_value('email'); ?>" id="input_box" placeholder="Enter Email">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('email'); ?></span>
					<h6>Country</h6>
					<select name="country">
						<option selected="" disabled="">Select Country</option>
						<option value="India">India</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="China">China</option>
						<option value="Pakistan">Pakistan</option>
						<option value="UAE">UAE</option>
						<option value="Dubai">Dubai</option>
					</select>
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('country'); ?></span>
					<div class="row">
						<div class="col l6 m12 s6">
							<h6>Area Code</h6>
							<input type="text" name="area_code" value="<?= set_value('area_code'); ?>" id="input_box" placeholder="Enter Area Code">
							<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('area_code'); ?></span>
						</div>
						<div class="col l6 m12 s6">
							<h6>Pin Code</h6>
								<input type="text" name="pincode" value="<?= set_value('pincode'); ?>" id="pincode" onkeyup="get_details()" placeholder="Enter Your Pin Code">
								<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('pincode'); ?></span>
								<h6 style="color: red;display: none;" id="pin_code_error">Invalid Pincode</h6>
						</div>
					</div>
					
					
				</div>
				<div class="col l6 m12 s12">
					
					<h6>Mobile</h6>
					<input type="number" name="mobile" value="<?= set_value('mobile'); ?>" id="input_box" placeholder="Enter Mobile Number">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('mobile'); ?></span>
					<h6>House No and Street Address</h6>
					<input type="text" name="street_house_no" value="<?= set_value('street_house_no'); ?>" id="input_box" placeholder="Street Address">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('street_house_no'); ?></span>

					<h6>Address Line 2</h6>
					<input type="text" name="address_line_two" value="<?= set_value('address_line_two'); ?>" id="input_box" placeholder="Enter Address Line ">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('address_line_two'); ?></span>

					
					<div class="row">
						<div class="col l6 m12 s12">
							<h6>City</h6>
							<input type="text" name="city" value="<?= set_value('city'); ?>" id="city" placeholder="Enter City" readonly>
							<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('city'); ?></span>
							
						</div>
						<div class="col l6 m12 s12">
							<h6>State</h6>
					<input type="text" name="state" value="<?= set_value('state'); ?>" id="state" placeholder="Enter State" readonly>
					<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('state'); ?></span>
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

	<?php endif; ?>
	</div>
</div>


<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>

<script type="text/javascript">
function get_details(){
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
</script>

</body>
</html>