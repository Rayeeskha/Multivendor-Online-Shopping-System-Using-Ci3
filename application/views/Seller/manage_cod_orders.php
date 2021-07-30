<!DOCTYPE html>
<html>
<head>
	<title>Manage Order's - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 .btn-flat:hover{background: #13124e;color: white}
		 .action_dropdown li a{color: grey;font-size: 14px;font-weight: 500}
		 .action_dropdown{width: 120px !important;}
		  #category_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
		 #category_filter li a{color: grey;font-size: 14px;font-weight: 500;}
		 #search_category{display: flex;}
		 #search_category li:first-child{width: 250px;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 0px;}
		 #pagination a{color: black; font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px;border-radius: 3px;}
		 #pagination strong{font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px; background: black;color: white;border-radius: 3px;}
		 table tr td{font-size: 14px;font-weight: bold;padding: 5px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Seller/top_bar'); ?>
<!---Order Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-shopping-cart" style="color: green"></span>&nbsp;Manage COD Order's</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Seller_dashboard/search_orders'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="customer_name" id="input_box" value="<?= set_value('customer_name'); ?>" placeholder="Enter Customer Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="category_filter" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Order's</span>
						</button>
					</span>
					<!---Category filter -->
					<ul class="dropdown-content" id="category_filter">
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/pending_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver;">Pending Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/processing_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver;">Processing Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/shipped_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver;">Shipped Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/packed_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver;">Packed Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/dispatch_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver;">Dispatch Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/cancel_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver; color: red" >Cancel Orders </a></li>
						<li><a href="<?= base_url('Seller_dashboard/filter_cod_order/delivered_order'); ?>" class="waves-effect" style="border-bottom:1px dashed silver; color: green">Delivered Orders </a></li>
					</ul>
					<!---Category filter -->
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					
					<th style="text-align: center;">Order ID</th>
					<th>Customer Name</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th>Coupon Value</th>
					<th>Total Amount</th>
					<th>Payment Mode</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Shipment Details</th>
					<th style="text-align: center;">ACTION</th>
				</tr>
				<?php if(count($orders)):
					foreach($orders as $order):
				?>
				<tr>
					<td style="text-align: center;">
						<a href="#!" onclick="view_order_details_modal('<?= $order->order_id; ?>')"><?= $order->order_id; ?></a>
					</td>
					<td>
						<?= $order->first_name; ?>&nbsp;<?= $order->last_name; ?>
					</td>
					<td><?= $order->total_quantity; ?></td>
					<td style="color: red"><span class="fa fa-rupee-sign"></span>&nbsp;
						<?= number_format($order->total_amount); ?>
					</td>
					<?php if($order->coupan_value != ""): ?>
					<td>
						<span class="fa fa-rupee-sign" style="color: orange">&nbsp;
							<?= number_format($order->coupan_value); ?></span>
					</td>
					<td>
						<span class="fa fa-rupee-sign" style="color: green">&nbsp;
							<?= number_format($order->final_price); ?></span>
					<?php endif; ?>	
					</td>

					<td style="color: green">
						<?= $order->payment_mode; ?>
					</td>
					<td><?= date('d M Y',strtotime($order->order_date)); ?></td>
					<td>
						<?php if ($order->order_status == "Delivered"): 
						$status = '<h6 style="color:green;font-size: 15px;font-weight: 500">Delivered</h6>';
						 ?>
						<?php elseif ($order->order_status == "Processing"):
							# code...
							$status = '<h6 style="color:orange;font-size: 15px;font-weight: 500">Processing</h6>';
						?>
						
						<?php elseif ($order->order_status == "Shipped"):
							# code...
							$status = '<h6 style="color:rgba(212, 245, 66);font-size: 15px;font-weight: 500">Shipped</h6>';
						?>
						
						<?php elseif ($order->order_status == "Packed"):
							# code...
							$status = '<h6 style="color:rgba(212, 245, 66);font-size: 15px;font-weight: 500">Packed</h6>';
						?>
						<?php elseif ($order->order_status == "Dispatch"):
							# code...
							$status = '<h6 style="color:rgba(245, 233, 66);font-size: 15px;font-weight: 500">Dispatch</h6>';
						?>	
						<?php elseif ($order->order_status == "Cancel"):
							# code...
							$status = '<h6 style="color:red;font-size: 15px;font-weight: 500">Canceled</h6>';
						?> 
						<?php else: 
							$status = '<h6 style="color:rgba(245, 93, 66);font-size: 15px;font-weight: 500">Pending</h6>';
							?>
						<?php endif; ?>

					<h6 style="color: grey;font-size: 13px;font-weight: 500"><?= $status; ?></h6>	
					</td>
					<td>
						<h6 style="color: grey;font-size: 13px;font-weight: 500">Order id: <?= $order->ship_order_id; ?> <br>
						Shippment id : <?= $order->shipment_id; ?>
					</h6>
					</td>
					<td>
						<center>
							<button type="button" class="btn btn-flat btn-floating dropdown-trigger" 
							data-target="order_Action_<?= $order->order_id; ?>">
							<span class="fa fa-ellipsis-v"></span>
						</button>
						</center>

						<!--Order Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="order_Action_<?= $order->order_id; ?>">
							<li><a href="<?= base_url('Seller_dashboard/delete_orders/' .$order->order_id); ?>"
							 onclick="return confirm('Confirmation ! Are You Sure You want to Delete this Order ?')" class="waves-effect" style="border-bottom: 1px solid silver">Delete Order </a></li>
							<li><a href="<?= base_url('Seller_dashboard/view_order/' .$order->order_id); ?>" target="_blank" class="waves-effect" style="border-bottom: 1px solid silver">View Order </a></li>

							<?php if($order->order_status == 'Cancel'): ?>
								<li><a href="<?= base_url('Seller_dashboard/resion_of_cancellation/' .$order->order_id); ?>"  class="waves-effect">Resion of Cancellation</a></li>
							<?php endif; ?>
							
						</ul>
						<!--Order Action Dropdown --->
					</td>
				</tr>
			
				<?php endforeach;
				else: ?>
					<tr>
						<td colspan="7" style="text-align: center;color: red;font-weight: 500;font-size: 18px;">Order's Not Found</td>
					</tr>
				<?php endif; ?>
				<tr>
				<td colspan="7" style="padding: 15px;">
					<div id="pagination">
						<?= $this->pagination->create_links(); ?>
					</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<!---Manage Category Section -->
<div class="modal" id="order_detail_modal">
	<!---Load get_order__details_modal using ajax --->	
	
</div>
<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

<script type="text/javascript">
	function view_order_details_modal(order_id){
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Seller_dashboard/get_order_details/'); ?>'+order_id,
			beforeSend:function(data){
				$('#preloader').modal('open');
				$('#preloader_heading').text('Fetch Orders Details');
			},
			success:function(data){
				$('#order_detail_modal').modal('open');
				$('#order_detail_modal').html(data);
				$('#preloader').modal('close');
			},
			error:function(){
				alert('Error! Fetch Products Details');
			}

		});
	}
</script>
</body>
</html>