<!DOCTYPE html>
<html>
<head>
	<title>Seller Dashboard</title>
	<!------Css File Include ----->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!------Css File Include ----->
	<style type="text/css">
		#sellerorder_dropdown, #seller_income_dropdown, #sellerprepaid_dropdown, #seller_prepaid_inc_drop{width: 200px !important; padding-top: 8px;padding-bottom: 8px;}
		 #sellerorder_dropdown a, #seller_income_dropdown a, #sellerprepaid_dropdown a, #seller_prepaid_inc_drop a{color: grey; font-size: 16px;font-weight: 500}
		 #sellerorder_dropdown li a, #seller_income_dropdown li a, #sellerprepaid_dropdown li a, #seller_prepaid_inc_drop li a{border-bottom: 1px solid silver}
		  #top_sold_products li{border-bottom: 1px solid silver;padding: 10px;}
		 #top_sold_products :hover{background: red;}

	</style>
</head>
<body>
<!--------Topbar Section Include ------->
<?php $this->load->view('Seller/top_bar'); ?>
<!--------Topbar Section Include ------->
<!--------------Body Section Start --------->
<div class="row">
	<div class="col l2 m12 s12">
		<div class="card" style="background: green">
			<div class="card-content" id="card_income_image">
				<h6 style="font-size: 19px;color: white;font-weight: 550">COD Order's <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="sellerorder_dropdown" style="cursor: pointer;color: white"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: #ff3d00;"><b>
					<span id="show_seller_orders">0</span>
				</b> <span class="right"><span class="fa fa-shopping-cart " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_seller_order_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Prepaid Order's <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="sellerprepaid_dropdown" style="cursor: pointer;color: white"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: #ff3d00;"><b>
					<span id="show_seller_prepaid_orders">0</span>
				</b> <span class="right"><span class="fa fa-shopping-cart " style="color: white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_seller_order_prepaid_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: orange">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">COD Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="seller_income_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span id="show_sellercod_income">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_seller_codincome_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: #44f213">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Prepaid Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="seller_prepaid_inc_drop" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span id="show_seller_preinc">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:white"></span></span></h5>
				<h6 style="font-size: 14px;color: white;font-weight: 500">
					<span id="show_seller_preinc_heading"></span>
				</h6>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: #eb4034">
			<div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Total Products
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span><?php if($products): echo count($products); else: echo "0"; endif; ?></span>
				</b> <span class="right"><span class="fa fa-cubes" style="color:white"></span></span></h5>
				<br>
			</div>
		</div>
	</div>
	<div class="col l2 m12 s12">
		<div class="card" style="background: #f213a8">
			<div class="card-content">
				<h6 style="font-size: 13px;color: white;font-weight: 550">Total Discount Products
				</h6>
				<h5 style="margin-top: 20px; color:white"><b>
					<span>
						<span><?php if($coupons): echo count($coupons); else: echo "0"; endif; ?></span>
					</span>
				</b> <span class="right"><span class="fa fa-cubes" style="color:white"></span></span></h5>
				<br>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col l6 m12 s12">
		<div class="card" style="background:#f213a8 ">
			<div class="card-content">
				<div id="chart_cod_order_container" style="height: 300px; width: 100%;"></div>
			</div>
		</div>
	</div>
	<div class="col l6 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content" style="padding: 8px;border-bottom: 1px solid silver">
				<h6 style="color: white;font-weight: 500;margin-left: 10px;">
					<span class="fa fa-shopping-cart"></span>&nbsp;Recent COD Orders </h6>
			</div>
			<div class="card-content">
				<table class="table">
					<tr>
						<th style="color: white;border-bottom: 1px solid silver">Order Id</th>
						<th style="color: white;border-bottom: 1px solid silver">Name</th>
						<th style="color: white;border-bottom: 1px solid silver">Quantity</th>
						<th style="color: white;border-bottom: 1px solid silver">Amount</th>
					</tr>
					<tbody>
					<?php if($recent_order): 
						count($recent_order);
						foreach($recent_order as $rec_orders): ?>
							<tr>
								<td style="font-weight: 500;font-size: 14px;color: white;border-bottom: 1px solid silver"><?= $rec_orders->order_id; ?></td>
								<td style="font-weight: 500;font-size: 14px;color: white;border-bottom: 1px solid silver"><?= $rec_orders->first_name; ?> <?= $rec_orders->last_name; ?></td>
								<td style="font-weight: 500;font-size: 14px;color: white;border-bottom: 1px solid silver"><?= $rec_orders->total_quantity; ?></td>
								<td style="font-weight: 500;font-size: 14px;color: white;border-bottom: 1px solid silver"><?= $rec_orders->total_amount; ?></td>
							</tr>
					<?php endforeach; else: ?>
						<h6 style="color: red;font-weight: 500;">Today Not any Orders</h6>
					<?php endif; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col l6 m12 s12">
		<div class="card" style="background: orange">
			<div class="card-content">
				<div id="prepaid_orders_chart" style="height: 300px; width: 100%;"></div>
			</div>
		</div>
	</div>
	<div class="col l6 m12 s12">
		<div class="card" style="background: black">
			<div class="card-content">
				<h6 style="color: white; font-weight: bold;">Top Products Sold</h6>
				<ul id="top_sold_products">
					<?php if($top_sold_products):
						count($top_sold_products);
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

<!-------Dropsown Section Start  ----->
<ul class="dropdown-content" id="sellerorder_dropdown">
	<li><a href="#!" onclick="count_seller_orders('today')">Today Order</a></li>
	<li><a href="#!" onclick="count_seller_orders('yesterday')">Privious Day Order</a></li>
	<li><a href="#!" onclick="count_seller_orders('last_30_days')">Last 30 Days Orders</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_seller_orders('all')">All Orders</a></li>
</ul>
<ul class="dropdown-content" id="sellerprepaid_dropdown">
	<li><a href="#!" onclick="count_prepid_orders('today')">Today Order</a></li>
	<li><a href="#!" onclick="count_prepid_orders('yesterday')">Privious Day Order</a></li>
	<li><a href="#!" onclick="count_prepid_orders('last_30_days')">Last 30 Days Orders</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_prepid_orders('all')">All Orders</a></li>
</ul>
<ul class="dropdown-content" id="seller_income_dropdown">
	<li><a href="#!" onclick="count_seller_cod_income('today')">Today Income</a></li>
	<li><a href="#!" onclick="count_seller_cod_income('yesterday')">Privious Day Income</a></li>
	<li><a href="#!" onclick="count_seller_cod_income('last_30_days')">Last 30 Days Incomes</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_seller_cod_income('all')">All Incomes</a></li>
</ul>
<ul class="dropdown-content" id="seller_prepaid_inc_drop">
	<li><a href="#!" onclick="count_seller_prepaid_inc('today')">Today Income</a></li>
	<li><a href="#!" onclick="count_seller_prepaid_inc('yesterday')">Privious Day Income</a></li>
	<li><a href="#!" onclick="count_seller_prepaid_inc('last_30_days')">Last 30 Days Incomes</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_seller_prepaid_inc('all')">All Incomes</a></li>
</ul>
<!-------Dropsown Section End  ----->
<!--------------Body Section End --  --------->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
<!------Custome Js file Include ----->
<?php $this->load->view('Seller/custom_js.php'); ?>
<!------Custome Js file Include ----->

</body>
</html>