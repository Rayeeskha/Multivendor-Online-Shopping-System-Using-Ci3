<!DOCTYPE html>
<html>
<head>
	<title>Payment Successfully</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
</head>
<body>

<div class="container">
	<div class="card" style="background: green">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<div class="card-content" style="padding: 10px;padding-left:15px; ">
				<h6 style="font-size: 15px;font-weight: 500;margin-top: 5px;"><span class="fa fa-check-circle" style="color: white;"></span>&nbsp; <span style="color: white">Payment Successfully</span></h6>
			</div>
		</div>
		<div class="card-content">
			<div class="container">
				<h6 style="font-weight: 500;font-size: 16px;color:white;">Your Tansiction ID : <?= $payment_id; ?></h6>
				<h6 style="font-weight: 500;font-size: 16px;color:white;">Your Order ID : <?= $order_id; ?></h6>
				<h6 style="font-weight: 500;font-size: 16px;color:white;"><span class="fa fa-rupee-sign" style="color: white"></span>&nbsp;Paid Amount : <?= number_format($total_amount); ?></h6>
			</div>
		</div>
		<div>
			<center>
				<a href="<?= base_url('Home/index'); ?>" class="btn btn-waves-effect waves-light" style="background: orange;text-transform: capitalize;font-weight: 500;margin-bottom: 10px;"><span class="fa fa-share"></span>Back to Home</a>
			</center>
		</div>
	</div>
</div>



<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>