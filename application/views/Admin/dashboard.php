<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #order_dropdown,#income_dropdown,#product_dropdown,#customer_dropdown, #prepaid_order_dropdown, #prepaid_income_dropdown{width: 200px !important; padding-top: 8px;padding-bottom: 8px;}
		 #order_dropdown a,#income_dropdown a,#product_dropdown a,#customer_dropdown a, #prepaid_order_dropdown a, #prepaid_income_dropdown a{color: grey; font-size: 16px;font-weight: 500}
		 #top_sold_products li{border-bottom: 1px solid silver;padding: 10px;}
		 #top_sold_products :hover{background: red;}
		
		#order_dropdown li a, #income_dropdown li a,#product_dropdown li a,#customer_dropdown li a, #prepaid_order_dropdown li a, #prepaid_income_dropdown li a{border-bottom: 1px solid silver}
	</style>
</head>
<body>
<!---Body Section --->
<!---Nav Bar sSection Start --->
<?php $this->load->View('Admin/topbar'); ?>

<!---4Cards Section Start -->
<div class="row" style="margin-top: 10px; margin-bottom: 0px;">
	<div class="col l2 m12 s12">
		<div class="card" style="background: green">
			<div class="card-content" id="card_income_image">
				<h6 style="font-size: 19px;color: white;font-weight: 550">COD Order's <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="order_dropdown" style="cursor: pointer;color: white"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: #ff3d00;"><b>
					<span id="show_orders">0</span>
				</b> <span class="right"><span class="fa fa-shopping-cart " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_order_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background:  #44f213">
			<div class="card-content" id="card_income_image">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Prepaid Order's <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="prepaid_order_dropdown" style="cursor: pointer;color: white"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: #ff3d00;"><b>
					<span id="show_prepaid_orders">0</span>
				</b> <span class="right"><span class="fa fa-shopping-cart " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_prepaid_order_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: orange">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">COD Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="income_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span id="show_income">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_income_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: #f213a8">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Prepaid Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="prepaid_income_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span id="show_prepaid_income">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_prepaid_income_heading"></span>
				</h6>
			</div>
		</div>
	</div>

	<div class="col l2 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Product's<span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="product_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: white;"><b>
					<span id="show_product">0</span>
				</b> <span class="right"><span class="fa fa-cubes " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_product_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: red">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Customers <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="customer_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: white"><b>
					<span id="show_customer">0</span>
				</b> <span class="right"><span class="fa fa-users " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_customer_heading"></span>
				</h6>
			</div>
		</div>
	</div>

</div>

<!--order_dropdown Section Start  --->
<ul class="dropdown-content" id="order_dropdown">
	<li><a href="#!" onclick="count_orders('today')">Today Order</a></li>
	<li><a href="#!" onclick="count_orders('yesterday')">Privious Day Order</a></li>
	<li><a href="#!" onclick="count_orders('last_30_days')">Last 30 Days Orders</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_orders('all')">All Orders</a></li>
</ul>
<ul class="dropdown-content" id="prepaid_order_dropdown">
	<li><a href="#!" onclick="count_prepaid_orders('today')">Today Order</a></li>
	<li><a href="#!" onclick="count_prepaid_orders('yesterday')">Privious Day Order</a></li>
	<li><a href="#!" onclick="count_prepaid_orders('last_30_days')">Last 30 Days Orders</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_prepaid_orders('all')">All Orders</a></li>
</ul>
<ul class="dropdown-content" id="income_dropdown">
	<li><a href="#!" onclick="count_income('today')">Today Income</a></li>
	<li><a href="#!" onclick="count_income('yesterday')">Privious Day Income</a></li>
	<li><a href="#!" onclick="count_income('last_30_days')">Last 30 Days Income</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_income('last_30_days')">All Income</a></li>
</ul>
<ul class="dropdown-content" id="prepaid_income_dropdown">
	<li><a href="#!" onclick="count_prepaid_income('today')">Today Income</a></li>
	<li><a href="#!" onclick="count_prepaid_income('yesterday')">Privious Day Income</a></li>
	<li><a href="#!" onclick="count_prepaid_income('last_30_days')">Last 30 Days Income</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_prepaid_income('last_30_days')">All Income</a></li>
</ul>
<ul class="dropdown-content" id="product_dropdown">
	<li><a href="#!" onclick="count_product('today')">Today Product</a></li>
	<li><a href="#!" onclick="count_product('yesterday')">Privious Day Product</a></li>
	<li><a href="#!" onclick="count_product('last_30_days')">Last 30 Days Product</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_product('last_30_days')">All Products</a></li>
</ul>
<ul class="dropdown-content" id="customer_dropdown">
	<li><a href="#!" onclick="count_customer('today')">Today Customer</a></li>
	<li><a href="#!" onclick="count_customer('yesterday')">Privious Day Customer</a></li>
	<li><a href="#!" onclick="count_customer('last_30_days')">Last 30 Days Customer</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_customer('last_30_days')">All Customers</a></li>
</ul>
<!--order_dropdown Section End --->
<!---4Cards Section End -->

<!---2Card Section Start --->
<div class="row">
	<div class="col l7 m7 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<div id="chartContainer" style="height: 300px; width: 100%;"></div>
			</div>
		</div>

		<div class="card" style="background: #f213a8">
			<div class="card-content">
				<div id="prepaid_orders_chart" style="height: 300px; width: 100%;"></div>
			</div>
		</div>
	</div>
	<div class="col l5 m5 s12">
		<div class="card" style="background: black">
			<div class="card-content">
				<h6 style="color: white; font-weight: bold;">Top Products Sold</h6>
				<ul id="top_sold_products">
					<?php if(count($top_sold_products)):
					foreach($top_sold_products as $t_s_p): ?>
					<li><h6 style="font-size: 15px;  font-weight: 500"><a href="<?= base_url('home/product_detail/'.$t_s_p->id); ?>" target="_blank" style="color: white;"><?= $t_s_p->product_title; ?></a></h6>
						<h6 style="font-size: 16px;color: white;font-weight: 500;"><span class="fa fa-rupee-sign"></span>&nbsp;
							<?= number_format($t_s_p->price); ?>
							<span class="right"><b>Units- <?= $t_s_p->count_sales; ?></b></span>
						</h6>
					</li>
				<?php endforeach;
				else: ?>
				<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!---2Card Section End --->

<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->view('Admin/custom_js'); ?>
<!---Custom Js file --->


</body>
</html>