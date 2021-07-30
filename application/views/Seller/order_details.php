<!DOCTYPE html>
<html>
<head>
	<title>Order's Details - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		select{display: block;border: 1px solid silver;height: 40px;margin-bottom: 10px;box-shadow: none;outline: none;width: 40%}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Seller/top_bar'); ?>
<!---Order Details Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px;border-bottom: 1px solid silver; padding: 5px; font-size: 20px;"><span class="fa fa-truck" style="color: #ff3d00"></span>&nbsp;Shipping Address</h5>
			<div class="row">
				<div class="col l4 m12 s12">
					
				<h6 style="border-bottom: 1px solid silver;padding: 3px; font-size: 16px;font-weight: 500;color: grey;">User Persional / Details</h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px; color: grey;font-size: 14px;font-weight: bolder;">Name:&nbsp;<?= $order_details[0]->first_name; ?>&nbsp;<?= $order_details[0]->last_name; ?></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">Mobile : &nbsp;<a href="tel:<?= $order_details[0]->mobile; ?>"><?= $order_details[0]->mobile; ?></a></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">Email : &nbsp;<a href="mailto:<?= $order_details[0]->email; ?>"><?= $order_details[0]->email; ?></a></h6>
				</div>
				<div class="col l4 m12 s12">
					<h6 style="border-bottom: 1px solid silver;padding: 3px; font-size: 16px;font-weight: 500;color: grey;">User Address / Details</h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px; color: grey;font-size: 14px;font-weight: bolder;">Country:&nbsp;<?= $order_details[0]->country; ?></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">State : &nbsp;<?= $order_details[0]->state; ?></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">City : &nbsp;<?= $order_details[0]->city; ?></h6>
				</div>
				<div class="col l4 m12 s12">
					<h6 style="border-bottom: 1px solid silver;padding: 3px; font-size: 16px;font-weight: 500;color: grey;">User Home Address / Details</h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px; color: grey;font-size: 14px;font-weight: bolder;">Stret House No:&nbsp;<?= $order_details[0]->street_house_no; ?></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">Zip Code : &nbsp;<?= $order_details[0]->zip_code; ?></h6>
				<h6 style="border-bottom: 1px dashed silver;padding: 3px;color: grey;font-size: 14px;font-weight: bolder;">Area Code : &nbsp;<?= $order_details[0]->area_code; ?></h6>
				</div>
			</div>
			
		</div>
	</div>
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;border-bottom: 1px solid silver;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-shopping-cart" style="color: #ff3d00"></span >&nbsp;Product List</h5>
		</div>
		<div class="card-content" style="padding: 0px;">
			<table class="table">
				<tr>
					<th style="text-align: center;">order Id</th>
					<th>Product Name</th>
					<th style="text-align: right;">Quantity</th>
					<th style="text-align: right;">Total Rate</th>
					<th style="text-align: right;">Save Price</th>
					<th style="text-align: right;">Discount Final</th>
					<th style="text-align: right;">Total Amount</th>
				</tr>
				<?php if($product_list):
					count($product_list);
					foreach($product_list as $pro_list):
				 ?>
				<tr>
					<td style="text-align: center; font-size: 14px;color: grey;font-weight: 500;">#<?= $pro_list->order_id; ?></td>
					<td><a href="<?= base_url('Home/product_detail/' .$pro_list->product_id); ?>" target="_blank"><?= $pro_list->product_name; ?></a></td>
					<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><?= $pro_list->quantity; ?></td>
					<?php if($pro_list->couponCode != ""): ?>
					<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><span class="fa fa-rupee-sign">&nbsp;<?= number_format($pro_list->total_rate); ?></span></td>
					<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><span class="fa fa-rupee-sign">&nbsp;<?= number_format($pro_list->coupon_value); ?></span></td>
					<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><span class="fa fa-rupee-sign">&nbsp;<?= number_format($pro_list->rate); ?></span></td>

					<?php else: ?>
						<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><span class="fa fa-rupee-sign">&nbsp;<?= number_format($pro_list->rate); ?></span></td>
						<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;">0</td>
						<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;">0</td>

					<?php endif; ?>
					

					<td style="text-align: right;font-size: 14px;color: grey;font-weight: 500;"><span class="fa fa-rupee-sign">&nbsp;
						<?php
						 	$total_amount =  $pro_list->quantity * $pro_list->rate;
							echo number_format($total_amount);
						 ?>
							
						</span>
					</td>
					
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center;font-size: 15px;color: red;font-weight: 500">Product's Not Found's</td>
				</tr>
			<?php  endif; ?>
			</table>
		</div>
		
	</div>
	<div class="card">
			<div class="card-content">
				<table class="table">
					<tr>
						<td></td>
						<td></td>
						<td style="text-align: right;font-weight: 500;">
							Total Amount : <span class="fa fa-rupee-sign" style="color: red">&nbsp;<?= number_format($order_details[0]->total_amount); ?></span>
						</td>
					</tr>
					<tr>
						<?php if($order_details[0]->coupan_value != ""): ?>
						<td style="text-align:left;font-weight: 500">
							<h6 style="font-weight: 500;font-size: 15px;">Coupon Code : <span style="color: orange"><?= $order_details[0]->coupan_mstercode; ?></span></h6>
						</td>
						<td style="text-align: center;font-weight: 500">Coupan Value : 
							<span class="fa fa-rupee-sign" style="color: green">&nbsp;<?= $order_details[0]->coupan_value; ?></span>
						</td>
						
						<td style="text-align: right;font-weight: 500">
							Final Total Amount : <span class="fa fa-rupee-sign" style="color: green">&nbsp;
								<?= number_format($order_details[0]->final_price); ?>
							</span>
						</td>
						
						<?php else: ?>
							<td style="text-align: center;font-weight: 500">Coupan Value : 
								<span class="fa fa-rupee-sign" style="color: red">&nbsp;0</span>
							</td>
							<td style="text-align: right;font-weight: 500;color: red">
								Total Amount : Not Used any Coupan
							</td>
						<?php endif; ?>
					</tr>
				</table>
			</div>
		</div>
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;border-bottom: 1px solid silver;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-truck" style="color: #ff3d00"></span>&nbsp;Order Status</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;border-bottom: 1px solid silver;">
		<?= form_open('Seller_dashboard/change_order_status/' .$order_details[0]->order_id); ?>
			<h6 style="font-size: 14px;font-weight: 500;color: grey;">Order Status</h6>
			<select name="status" required="" id="update_status" onchange="select_file_ord_details()">
				 <?php if($order_details[0]->order_status == 'Pending'): ?>
				 		<option selected="">Pending</option>
						<option value="Processing">Processing</option>
						<option value="Shipped">Shipped</option>
						<option value="Packed">Packed</option>
						<option value="Dispatch">Dispatch</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancel">Cancel</option>
					<?php elseif($order_details[0]->order_status == 'Processing'): ?>
				 		<option selected="">Processing</option>
				 		<option value="Shipped">Shipped</option>
						<option value="Packed">Packed</option>
						<option value="Dispatch">Dispatch</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancel">Cancel</option>
				 	<?php elseif($order_details[0]->order_status == 'Shipped'): ?>
				 		<option selected="">Shipped</option>
						<option value="Packed">Packed</option>
						<option value="Dispatch">Dispatch</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancel">Cancel</option>
					<?php elseif($order_details[0]->order_status == 'Packed'): ?>
				 		<option selected="">Packed</option>
						<option value="Dispatch">Dispatch</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancel">Cancel</option>
				 	<?php elseif($order_details[0]->order_status == 'Dispatch'): ?>
				 		<option selected="">Dispatch</option>
						<option value="Delivered">Delivered</option>
						<option value="Cancel">Cancel</option>
				 	<?php else: ?>
				 		<option selected="">Delivered</option>
				 		<option value="Cancel">Cancel</option>
				 	<?php endif; ?>
				
			</select>
			<div style="width: 40%;display: none;" id="shippment_details">
				<table class="table">
					<tr>
						<td>
							<input type="text" name="length" id="input_box" placeholder="Enter Length">
						</td>
						<td>
							<input type="text" name="Breadth" id="input_box" placeholder="Enter Breadth">
						</td>
						<td>
							<input type="text" name="height" id="input_box" placeholder="Enter Height">
						</td>
						<td>
							<input type="text" name="weight" id="input_box" placeholder="Enter Weight">
						</td>
					</tr>
				</table>
			</div>
			<button type="submit" class="btn waves-effect waves-light" style="background: black; text-transform: capitalize;font-weight: 500;font-size: 15px;">Update Status</button>
			<a href="<?= base_url('Seller_dashboard/print_label/'.$order_details[0]->order_id); ?>" target="_blank" class="btn waves-effect waves-light" style="background: red;text-transform: capitalize;font-weight: 500;font-size: 15px;">Print Slip</a>
		<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Manage Category Section -->

<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

<script type="text/javascript">
	function select_file_ord_details(){
		let update_status = $('#update_status').val();
		if (update_status == 'Shipped') {
			$('#shippment_details').show();
		}
	}
</script>
</body>
</html>