<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#quantity_form{display: flex;}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#quantity_form li{margin: 2px;}

	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->
<div class="card" style="margin-right: 10px;margin-left: 10px">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h4 style="padding-left: 10px; font-size: 25px; font-weight: 700;color: #13124e;">
				<span class="fa fa-users" style="color: #ff3d00"></span>&nbsp;
				Welcome: <span style="color: green"><?php echo $this->session->userdata('fullname'); ?></span></h4>
				
		</div>
	</div>

<div class="row">

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
			<!---Php Meassge Show Section End--->

	

	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-shopping-cart" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 14px; font-weight: 600">My Cart</h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
							<?= count($cart_products); ?></h4>
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/carts'); ?>" style="text-transform: capitalize;font-weight: bold;">View Cart</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>
	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-shopping-cart" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 14px; font-weight: 600">My Order's</h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
							<?= count($orders); ?>
						</h4>
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/my_orders'); ?>" style="text-transform: capitalize;font-weight: bold;">View Order's</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>
	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-truck" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 14px; font-weight: 600">Delivered Orders</h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
							<?= count($Delivered_orders); ?></h4>
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/my_orders'); ?>" style="text-transform: capitalize;font-weight: bold;">View Delivered Order's</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>


	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-rupee-sign" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 16px; font-weight: 600">
							Online Purchase Products</h6>
							<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
								<span class="fa fa-rupee-sign" style="color: #13124e;"></span>&nbsp; 
								<?php if($online_pay_order):
								echo count($online_pay_order); ?>
								<?php else: echo "0"; ?>
								<?php endif; ?>
							</h4>
						
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/manage_online_pay_purchase'); ?>" style="text-transform: capitalize;font-weight: bold;">Manage Orders</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>


	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-comments" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 14px; font-weight: 600">Support Message</h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
							<?= count($replayed_message); ?></h4>
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/my_message'); ?>" style="text-transform: capitalize;font-weight: bold;">View Support Message</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>

	<div class="col l4 m4 s12">
		<!--Card Section -->
		<div class="card" >
			<div class="card-content" >
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
						<h4><span class="fa fa-cogs" style="color: #ff3d00"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: grey; font-size: 16px; font-weight: 600">
							Manage Profile</h6>
							<h4 class="right-align" style="margin-top: 0px; font-weight: 500">
								<span class="fa fa-users" style="color: #13124e;"></span>&nbsp;
							</h4>
						
					</div>
				</div>
			</div>
			<div class="card-action">
				<a href="<?= base_url('Home/manage_user_profile'); ?>" style="text-transform: capitalize;font-weight: bold;">Manage Profile Settings</a>
			</div> 
		</div> 
		<!--Card Section -->
	</div>
	
	
</div>
<div class="container">
<p style="text-align: center; font-size: 14px;color: grey;font-weight: 500">All Online Produts Available is Medisoft Online Medical Website. All Products available in chepest price you can do and buy all products According to your Company Brand  available</p>
</div>



<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>