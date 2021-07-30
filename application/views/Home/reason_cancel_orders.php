<!DOCTYPE html>
<html>
<head>
	<title>Cancellation Resion Page</title>
	<!-------Include CSS Page ------>
	<?php $this->load->view('Home/css_file.php'); ?>
	<!-------Include CSS Page ------>
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
		h6{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!--------Include Topbar Section ------->
<?php $this->load->view('Home/header'); ?>	
<!--------Include Topbar Section ------->

<!--------Body Section Start ------->	
<div class="container">
	<div class="card" style="margin-top: 5px; margin-left: 10px;margin-right: 10px;padding: 0px;">
		<div class="card-content" style="border-bottom: 1px solid silver">
			<center>
				<h5 style="font-size: 16px;font-weight: 500;color: orange">Cancellation Reasion</h5>
			</center>
		</div>
	<?= form_open('Home/cancel_orders/'.$ord_details[0]->order_id); ?>	
	<div class="card-content">
		
		<h6>Reasion Title</h6>
		<input type="text" name="reasion_title" value="<?= set_value('reasion_title'); ?>" id="input_box" placeholder="Enter Reasion Title">
		<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('reasion_title'); ?></span>
		<h6>Cancellation Reasion </h6>
		<textarea name="canc_reasion" placeholder="Enter Cancellation Reasion"><?= set_value('canc_reasion'); ?></textarea>
		<span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('canc_reasion'); ?></span>
	</div>
	<center>
		<a href="<?= base_url('Home/my_orders'); ?>" class="btn btn-waves-effect waves-light" style="background: black;font-weight: 500;font-size: 15px;text-transform: capitalize;">Back to Home </a>
		<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;font-size: 15px;text-transform: capitalize;">Cancel Order</button><br><br>
	</center>
	<?= form_close(); ?>
</div>
</div>
<!--------Body Section End ------->	

<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>