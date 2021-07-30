
<!DOCTYPE html>
<html>
<head>
	<title>My Orders Online Payment - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#quantity_form{display: flex;}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#quantity_form li{margin: 2px;}
		h6{font-size: 14px;font-weight:500}

	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header'); ?>
<!--TopBar Section Include --->


<div class="container">

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

	<div class="card">
		<div class="card-content" style="margin-top: 0px;padding: 5px;">
			<h4 style="padding-left: 10px; margin-top: 5px; font-size: 25px; font-weight: bold; color: orange; margin-bottom: 5px;">
				<span class="fa fa-truck" style="color: green"></span>&nbsp;
				My Online Purchase Orders (<?= count($online_pay_order); ?>)
			</h4>
		</div>
	</div>
	<?php if($online_pay_order):
		count($online_pay_order);
		foreach($online_pay_order as $order):
	 ?>
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;">
			
			<a href="#!" class="btn waves-effect waves-light" style="background: #ff3d00">Order Id - <?= $order->order_id; ?></a>
			

			<?php if($order->order_status == "Delivered"): ?>

			<?php elseif($order->order_status == "Cancel"): ?>	
				<?php else: ?>
					<a href="#!" class="btn waves-effect waves-light right" style="background: no-repeat;color: grey;border: 1px solid silver;box-shadow: none; margin-left:  40px;">Track Order</a>
					<a href="<?= base_url('Home/cancellation_resion_online_order/' .$order->order_id); ?>" class="btn waves-effect waves-light right" style="background: no-repeat;color: red;border: 1px solid silver;box-shadow: none;"> Cancel  

				<?php endif; ?>
			</a>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;">
			<?php $this->load->helper('product');
				$order_items = get_order_products('ms_order_products', $order->order_id);
			?>
			<?php if($order_items):
				count($order_items);
				foreach($order_items as $ord_item):

					//Get Image Using Helper Function According to product id
						$product_detail = get_product_detail($ord_item->product_id);
						//Get Image Using Helper Function According to product id
			 ?>
			<div class="row">
				<div class="col l2 m3 s12">

					<img src="<?= base_url(). 'uploads/product_image/' .$product_detail[0]->image; ?>" class="responsive-img">
				</div>
				<div class="col l5 m5 s12">
					<h6 style="color: grey;font-weight: 500;font-size: 14px;font-weight:500"><?= $ord_item->product_name; ?></h6>
					<h6 style="color: orange;font-weight: 500;font-size: 14px;font-weight:500">Quantity : <?= $ord_item->quantity; ?></h6>

					<?php if($ord_item->couponCode != ""): ?>
					<h6 style="color: silver;font-weight: 500;font-size: 14px;">Discount Code Apply : <span style="color: red"><?= $ord_item->couponCode; ?></span></h6>
					
					<h6 style="color: green;font-weight: 500;font-size: 14px;">Save Price : <span style="color: green" class="fa fa-rupee-sign">&nbsp;<?= number_format($ord_item->coupon_value); ?></span></h6>
					<?php endif; ?>

				</div>
				<div class="col l5 m4 s12">
					<?php if($ord_item->couponCode != ""): ?>
						<h6 style="color: orange; font-size: 16px;font-weight: 500"><span style="color: orange">Total Price :</span><span class=" fa fa-rupee-sign"></span>&nbsp; <?= number_format($ord_item->total_rate); ?></h6>
						<h6 style="color: green;font-size: 16px;font-weight: 500"><span style="color: green">Final Price :</span><span class=" fa fa-rupee-sign"></span>&nbsp;<?= number_format($ord_item->rate); ?></h6>
					<?php else: ?>
						<h6 style="color: green;font-size: 16px;font-weight: 500"><span class=" fa fa-rupee-sign"></span>&nbsp;<?= number_format($ord_item->rate); ?></h6>		
					<?php endif; ?>

					<?php if ($order->order_status == "Delivered"):

						$status = '<h6 style="color:green;font-size: 15px;font-weight: 500">Your Order is :Delivered</h6>';
						// return redirect('home/deliverd_orders');
						$status .= '<a href="'.base_url("Home/manage_prepaid_ord_rating/").$order->id.'"> &nbsp;
						<img src="'.base_url("assets/images/rating_image/gif1.gif").'" style="width:100px; height:100px;;">
						</a>';

						 ?>

						<?php elseif ($order->order_status == "Packed"):
							# code...
							$status = '<h6 style="color:rgba(212, 245, 66);font-size: 14px;font-weight:500font-weight: 500">Your Order is : Packed</h6>';
						?>
						<?php elseif ($order->order_status == "Dispatch"):
							# code...
							$status = '<h6 style="color:rgba(245, 233, 66);font-size: 14px;font-weight:500font-weight: 500">Your Order is : Dispatch</h6>';
						?>
						<?php elseif ($order->order_status == "Shipped"):
							# code...
							$status = '<h6 style="color:rgba(212, 245, 66);font-size: 15px;font-weight: 500">Your Order is Shipped</h6>';
						?>	
						<?php elseif ($order->order_status == "Cancel"):
							# code...
							$status = '<h6 style="color:red;font-size: 15px;font-weight: 500">Your Order is : Canceled</h6>';
						?> 
						<?php else: 
							$status = '<h6 style="color:rgba(245, 93, 66);font-size: 14px;font-weight:500font-weight: 500">Your Order is : Pending</h6>';
							?>
						<?php endif; ?>

					<h6 style="color: grey;font-size: 13px;font-weight: 500"><?= $status; ?></h6>
				</div>
			</div>
			<?php endforeach;
			else: ?>
				<h6 style="text-align: center;font-size: 20px;color: red;font-weight: 500">Product's Not Found</h6>
			<?php endif; ?>
		</div>
		<div class="card-content" style="padding: 10px;">
			<div class="row">
				<div class="col l6 m12 s12">
					<h6 style="margin-top: 5px;color: grey;font-size: 12px;">
						<?php if($order->coupan_id != ""): ?>
							<b>
								<center>
									<h6>Total Amount : <span class="fa fa-rupee-sign" style="color: green;">&nbsp;
										<?= number_format($order->total_amount); ?></span></h6>
									<h6>Coupon Value : <span style="color: orange"><?= number_format($order->coupan_value); ?></span></h6>
									<h6>Coupon Code : <span style="color: green;">
										<?= $order->coupan_mstercode; ?></h6>
									</span>
								</center>
							</b>
						<?php else: ?>
						<?php endif; ?>	
					</h6>
				</div>
				<div class="col l6 m12 s12">
					<h6 style="color: grey;margin-top: 5px;">
						<b>
							<center>
								<h6>Payment id :<span style="color: green">&nbsp;<?= $order->payment_id;  ?></span></h6>
								<h6>Paid Amount : <span class="fa fa-rupee-sign" style="color: green;">&nbsp;<?= number_format($order->final_price);  ?></span></h6>
								 
								<h6 style="color: green">Payment Status : <?= $order->payment_status;  ?></h6>
								<span class="fa fa-clock" style="color: green;">
									Order On : <b><?= date('D, M, d, Y',strtotime($order->order_date)); ?></b>
								</span>
								 
							</center>
						</b>
					</h6>
				</div>
			</div>
				
		</div>
	</div>
<?php endforeach;
else: ?>
	<h6 style="text-align: center; font-weight: 500;font-size: 20px;color: red;">You are Not Deleverd any Order</h6>
<?php endif; ?>
</div>



<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->


</body>
</html>
