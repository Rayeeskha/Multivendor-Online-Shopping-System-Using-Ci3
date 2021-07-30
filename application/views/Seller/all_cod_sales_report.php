<!DOCTYPE html>
<html>
<head>
	<title>Manage Sales - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		#input_box{border: 1px solid silver;height: 35px;padding-left: 10px; box-shadow: none; }
		#customize_sale_modal{width: 40%;box-sizing: border-box;}
	</style>
</head>
<body ><!--- onload="window.print();"--->
<!---Body Section --->
<?php $this->load->view('Seller/top_bar'); ?>
<!---Order Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-truck" style="color: red"></span>&nbsp;Manage COD Sales Reports<span class="right"><a href="#!" class="modal-trigger" data-target="customize_sale_modal" style="font-size: 15px;font-weight: 500;">
				<span class="fa fa-filter"></span>&nbsp;Customize Sales</a></span></h5>
			<h6 style="color: grey;font-size: 15px; font-weight: 500;"> Date : 4-Jul-2020 To <?= date('d-M-Y'); ?> 
				<span class="right">
					<a href="<?= base_url('Seller_dashboard/all_cod_sales'); ?>" style="font-size: 15px;color: red;">
						Reset</a>
				</span>
			</h6>

			<!--Customize Sale Modal Section Start --->
			<div class="modal" id="customize_sale_modal">
				<div class="modal-content" style="padding: 10px;border-bottom: 1px solid silver;">
					<h6 style="font-size: 15px;color: grey;font-weight: 500;"><span class="fa fa-filter"></span>&nbsp;Customize Sales Report</h6>
				</div>
				<div class="modal-content" style="padding: 10px;">
				<?= form_open('Seller_dashboard/search_cod_sales_reports'); ?>
					<div  class="row" style="margin-bottom: 0px;margin-top: 10px;">
						<div class="col l6 m6 s12">
							<input type="date" name="start_date" id="input_box" required>
						</div>
						<div class="col l6 m6 s12">
							<input type="date" name="last_date" id="input_box" required>
						</div>
						<div class="col l12 m12 s12">
							<button type="submit" class="btn waves-effect waves-light" style="background: black; text-transform: capitalize;font-weight: 500;font-size: 14px;  margin-top: 10px;">
								Search Reports
							</button>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<!--Customize Sale Modal Section End --->
		</div>
			<div class="card-content" style="padding: 0px;padding-right: 10px;">
				<table class="table">
					<tr>
						<th style="text-align: center;">DATE</th>
						<th>CUSTOMER</th>
						<th style="text-align: right;">UNIT SALES</th>
						<th style="text-align: right;">TOTAL AMOUNT</th>
					</tr>
					<?php if(count($sales)):
					foreach($sales as $sale):
					 ?>
					<tr>
						<td style="text-align: center; font-size: 14px;color: black;font-weight: 500;">
							<?= date('d M Y', strtotime($sale['order_date'])); ?></td>
						<td style="font-size: 14px;font-weight: 500;color: black;">(<?= $sale['COUNT(order_date)']; ?>) Customers <br/>
							<?php $total_customer  = get_all_customer($sale['order_date']); ?>
							 <?php
							 	$i = 0;
							  if($total_customer):
							  	count($total_customer);
							 	foreach($total_customer as $total_cus):
							 		$i++;
							  ?>
							<i><span style="color: grey;">Sold By : <?=  $total_cus->first_name; ?> &nbsp;<?=  $total_cus->last_name; ?></span></i> <br/>
						<?php endforeach;
						else: ?>
							<i>Customer Not Found's</i>
						<?php endif; ?>
						</td>
						<td  style="text-align: right;font-size: 14px;font-weight: 500;color: black;">
							<?= $sale['SUM(total_quantity)']; ?><br/>
							<?php $total_customer  = get_all_customer($sale['order_date']);  ?>
							 <?php if($total_customer):
							 	count($total_customer);
							 	foreach($total_customer as $total_cus):
							 		$i++;
							  ?>
							<i><span style="color: grey;">Unit : <?= $total_cus->total_quantity; ?></span></i> <br/>
							<?php endforeach;
							else: ?>
								<i style="color: red;">Quantity Not Found's</i>
							<?php endif; ?>
						</td>
						<td style="text-align: right;font-size: 14px;font-weight: 500;color: black;">
							<span class="fa fa-rupee-sign"></span>&nbsp;
							<?php if($total_cus->coupan_value !== ""): ?>
								<h6 style="color: grey;font-weight: 500;font-size: 12px;">
									<span style="color: red">Total Product Price : <?= number_format($sale['SUM(total_amount)'],2, '.',','); ?>/</span>-<br/>
									<span style="color: green">Save Price : <?= number_format($total_cus->coupan_value); ?>/</span>-<br/>
									<span style="color: green">Final Paid Amount : <?= number_format($total_cus->final_price,2, '.',',') ?></span>
								</h6>
							<?php else: ?>
								<?= number_format($sale['SUM(total_amount)'],2, '.',','); ?> /-<br/>
							<?php endif; ?>
							

							<?php 
								$total_customer  = get_all_customer($sale['order_date']);

							 ?>
							 <?php if($total_customer):
							 	count($total_customer);
							 	$total_amonut_paid = 0;
							 	foreach($total_customer as $total_cus):
							 		if($total_cus->coupan_value !== ""){
							 			$total_amonut_paid += $total_cus->final_price;
							 		}else{
							 			$total_amonut_paid += $total_cus->total_amount;
							 		}
							 		$i++;
							  ?>
							<i><span style="color: grey;"><span class="fa fa-rupee-sign"></span>&nbsp;
							 <?= number_format($total_amonut_paid,2, '.',','); ?> /-</span></i> <br/>
							 
							<?php endforeach;
							else: ?>
								<i style="color: red;">Amount Not Found's</i>
							<?php endif; ?>

						</td>
					</tr>
					
				<?php endforeach;
				else: ?>
					<tr>
						<td style="color: red;text-align: center;font-weight: 500; font-size: 16px;" colspan="4">
							Sale's Not Found
						</td>
					</tr>
				<?php endif; ?>
				</table>
			</div>
		
</div>
<!---Manage Category Section -->

<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->


</body>
</html>