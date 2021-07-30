<style type="text/css">
	nav{background: #13124e; height: 65px;line-height: 65px;}
		nav .brand-logo{font-size: 20px;font-weight: 500;}
		.collapsible-header{padding-left:30px !important; font-size: 14px;font-weight: 500 }
		.collapsible-header:hover{background: #ffebe5 !important; }
		 .collapsible-header:hover{background: #ffebe5 !important;}
		 #side_menu li a:hover{background: #ffebe5 !important; }
		 .collapsible-header{padding-left:30px !important; font-size: 14px;font-weight: 500;color: black }
        .collapsible-header:hover{background: pink !important; }
         #side_menu li a:hover{background: pink !important; }
         #side_menu{background: rgb(224, 227, 231)}
         #side_menu .collapsible-body{background:black;}
         #side_menu .collapsible-body li a{color: white;border-bottom: 1px solid silver}
         #side_menu .collapsible-body li a:hover{background: red !important} 
</style>
<nav>
	<div class="nav-wrapper">
		<a href="<?= base_url('Admin/dashboard'); ?>" class="brand-logo">&nbsp;Admin Panel</a>
		
		<!---right sestion -->
		<ul class="right">
			<li>
				<a href="#!" class="sidenav-trigger" data-target="side_menu" style="display: block; height: 45px;line-height: 65px;" > <span class="fa fa-bars"></span>&nbsp;Menu</a>
			</li>
		</ul>
		<!---right sestion -->
	</div>
</nav>
<!---Nav Bar sSection End --->
<!---Side menu Section Start --->
<ul class="sidenav collapsible" id="side_menu">
	<li><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
	
	<li>
		<div class="collapsible-header">Categories</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/add_category'); ?>">Add Category</a></li>
				<li><a href="<?= base_url('Admin/manage_category'); ?>">Manage Category</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Products</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/add_products'); ?>">Add Products</a></li>
				<li><a href="<?= base_url('Admin/manage_products'); ?>">Manage Products</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Order's</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/manage_orders'); ?>">Manage COD  Order's</a></li>
				<li><a href="<?= base_url('Admin/online_payment_orders'); ?>">Manage Online Payment Order's</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Sales</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/today_sales'); ?>">Today Sales</a></li>
				<li><a href="<?= base_url('Admin/all_sales'); ?>">All Time Sales</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Seller Management</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/verify_seller'); ?>">Verify Seller Account</a></li>
				<li><a href="<?= base_url('Admin/manage_Seller'); ?>">Manage Seller</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Customers</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/new_registration'); ?>">New Registration</a></li>
				<li><a href="<?= base_url('Admin/all_customer'); ?>">All Registration</a></li>
			</ul>
		</div>
	</li>
	<li>
		<div class="collapsible-header">Technical Support</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/technical_support'); ?>">Customer Message</a></li>
				
			</ul>
		</div>
	</li>

	<li>
		<div class="collapsible-header">Coupan Master</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/coupan_master');  ?>">Create Coupan Master</a></li>
				<li><a href="<?= base_url('Admin/createCoupon_view');  ?>">Create Coupan Product Wise</a></li>
				<li><a href="<?= base_url('Admin/manage_coupan');  ?>">Manage Coupan Product Wise</a></li>
			</ul>
		</div>
	</li>

	<li>
		<div class="collapsible-header">Setting's</div>
		<div class="collapsible-body">
			<ul>
				<li><a href="<?= base_url('Admin/manage_slider');  ?>">Manage Slider's</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href="<?= base_url('Admin/signout'); ?>">Sign Out</a>
	</li>
</ul>
<!---Side menu Section End --->

<!---Php Meassge Show --->

<div class="container" style="margin-top: 10px;">
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