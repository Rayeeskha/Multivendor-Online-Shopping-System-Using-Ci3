<!DOCTYPE html>
<html>
<head>
	<title>Resion Of Cancellation</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
	</style>
</head>
<body>
<!-----Topbar Section Include ------>
<?php $this->load->View('Admin/topbar'); ?>	
<!-----Topbar Section Include ------>	
<!------Body Section Start ------->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-shopping-cart" style="color: red"></span>&nbsp;Order Cancellation Resion</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver">
			<h6  style="font-size: 15px;font-weight: 500;">Resion Title : <span style="color: red;">
				<?= $can_res[0]->resion_title; ?>
			</span></h6>
			<h6 style="font-size: 15px;font-weight: 500;">Resion Title : <span style="color: orange">
				<?= $can_res[0]->cancel_res_des; ?>
			</span></h6>
			<h6 style="font-size: 15px;font-weight: 500;">Cancellation Date : 
				<span class="fa fa-clock" style="color: green">
				<?= date('d M Y',strtotime($can_res[0]->cancel_res_des)); ?>
			</span></h6>
		</div>
		<div class="card-content">
			<center>
				<a href="<?= base_url('Admin/manage_orders'); ?>" class="btn btn-waves-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500;font-size: 15px;">Back to Dashboard</a>
			</center>
		</div>
	</div>
</div>
<!------Body Section End ------->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>