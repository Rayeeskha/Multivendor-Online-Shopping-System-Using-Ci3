<!DOCTYPE html>
<html>
<head>
	<title>Edit Coupon Master</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 0px;}
		 select{display: block;}
		 select{border: 1px solid silver;height: 35px;padding-left: 10px; box-shadow: none;}
	</style>
</head>
<body>
<!-----Include Topbar Section ------>
<?php $this->load->View('Admin/topbar'); ?>
<!-----Include Topbar Section ------>

<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500"><span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Edit Coupan</h5>
		</div>
		<div class="card-content">
			<?= form_open('Admin/update_coupan_master/'.$get_coupan[0]->id); ?>
	<div class="">
		<div class="modal-content">
			<h6>Coupan Code</h6>
				<input type="text" name="coupan_code" id="input_box" value="<?= $get_coupan[0]->coupan_code; ?>" required="">
				<h6>Coupan Value</h6>
				<input type="text" name="coupan_value" id="input_box" required="" value="<?= $get_coupan[0]->coupan_value; ?>">
				<h6>Coupan Type</h6>
				<select name="coupan_type" required="">
					<option value="<?= $get_coupan[0]->coupan_type; ?>"><?= $get_coupan[0]->coupan_type; ?></option>
					<option value="Percentage">Percentage</option>
					<option value="Rupee">Rupee</option>
				 </select>
				<h6>Cart Minimum Value</h6>
				<input type="text" name="cart_min_value" required="" id="input_box"  value="<?= $get_coupan[0]->cart_min_value; ?>">
				<h6>Expiry Date</h6>
				<input type="date" name="expiry_date" id="input_box" value="<?= $get_coupan[0]->expiry_date; ?>">
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn waves-effect waves-light"  style="background: green;color: white; text-transform: capitalize;font-weight: 500;outline: none;box-shadow: none;"><span class="fa fa-compass" style="color: #fff"></span>&nbsp;Update Coupon</button> 
			<a href="<?= base_url('Admin/coupan_master'); ?>" class="waves-effect waves-green btn-flat" style="background: red;color: white; text-transform: capitalize;font-weight: 500;outline: none;box-shadow: none;">Cancel</a>
		</div>
	</div>
<?= form_close(); ?> 
		</div>
	</div>
</div>




<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>