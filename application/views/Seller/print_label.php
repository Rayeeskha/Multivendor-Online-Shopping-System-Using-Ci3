<!DOCTYPE html>
<html>
<head>
	<title>Shipping Label - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		/*body{background: #ffebe5}*/
		table tr th{font-size: 14px;font-weight: bold;}
		
	</style>
</head>

<body onload="window.print();">
	<!---Body Section --->
<div class="container-fluid">


<h6 style="margin-top: 5px;text-align: center;">
	 <a href="#!" id="logo" class="brand-logo ">&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/images/dh.png') ?>" class="img-responsive" style="width: 200px;height: 50px;" ></a> 
</h6>

<table class="table">
	<tr>
		<td>
			<h6 style="font-size: 25px;"><b>SHIP TO</b></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Username : <?= $order_details[0]->first_name; ?>&nbsp;<?= $order_details[0]->last_name; ?></h6>
			<h6 style="font-size: 14px;font-weight: 500">Full Address : <?= $order_details[0]->shipping_address; ?></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Mobile : &nbsp;<a href="tel:<?= $order_details[0]->mobile; ?>"><?= $order_details[0]->mobile; ?></a></h6>
				<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Email : &nbsp;<a href="mailto:<?= $order_details[0]->email; ?>"><?= $order_details[0]->email; ?></a></h6>
			<h6 style="font-size: 15px;font-weight: 500;">Order Date : <?= date('d M, Y', strtotime($order_details[0]->order_date)); ?></h6>
		</td>
		<td>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">User Address / Details</h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Country:&nbsp;<?= $order_details[0]->country; ?></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">State : &nbsp;<?= $order_details[0]->state; ?></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">City : &nbsp;<?= $order_details[0]->city; ?></h6>
		</td>
		<td>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">User Home Address / Details</h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Stret House No:&nbsp;<?= $order_details[0]->street_house_no; ?></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Zip Code : &nbsp;<?= $order_details[0]->zip_code; ?></h6>
			<h6 style="line-height: 20px; font-size: 14px; font-weight: 500;">Area Code : &nbsp;<?= $order_details[0]->area_code; ?></h6>
		</td>
		<td>
			<h6 style="font-size: 15px; text-align: right; font-weight: 500;">Khan Rayees E-Commerce Provider</h6>
			<h6 style="font-size: 14px; text-align: right;font-weight: 500;">Lucknow Uttar Pradesh</h6>
		</td>
	</tr>
</table>
<table class="table">
	<tr>
		<th>Product Name</th>
		<th style="text-align: right;">Product Quantity</th>
		<th style="text-align: right;">Rate</th>
		<th style="text-align: right;">Total Amount</th>
	</tr>
	<?php 
		$grand_total = 0;
	if(count($product_list)):
		foreach($product_list as $pro_list):
			$grand_total  += $pro_list->quantity * $pro_list->rate;
	?>
	<tr>
		<td style="font-size: 14px;font-weight: 500;"><?= $pro_list->product_name; ?></td>
		<td style="text-align: right;font-size: 14px;font-weight: 500;"><?= $pro_list->quantity; ?></td>
		<td style="text-align: right;font-size: 14px;font-weight: 500;">
			<?php if($pro_list->couponCode != ""): ?>
				<span class="fa fa-rupee-sign"></span>&nbsp;
				<?= number_format($pro_list->total_rate); ?> <br>
				Save Price : <span class="fa fa-rupee-sign"></span>&nbsp;
				<?= number_format($pro_list->coupon_value); ?> <br>
				Final Price : <span class="fa fa-rupee-sign"></span>&nbsp;
				<?= number_format($pro_list->rate); ?> <br>
			<?php else: ?>
				<span class="fa fa-rupee-sign"></span>&nbsp;
				<?= number_format($pro_list->rate); ?>
			<?php endif; ?>
			
		</td>
		<td style="text-align: right;font-size: 14px;font-weight: 500;">
			<?php $total_amount =  $pro_list->quantity * $pro_list->rate;
				echo number_format($total_amount);
			 ?>
				
		</td>
	</tr>
	<?php endforeach; 
	else:
		$grand_total = 0;
	?>

<?php endif; ?>
	<tr>
		<th colspan="3">Grand Total :</th>
		<th style="text-align: right;"><?= number_format($grand_total); ?></th>
	</tr>
	<tr>
		<th colspan="3">Discount Price :   <span class="fa fa-rupee-sign"></span>&nbsp;
			<?= number_format($order_details[0]->coupan_value); ?></th>
		<th style="text-align: right;">
			Final Price : <span class="fa fa-rupee-sign">&nbsp;<?= number_format($order_details[0]->final_price); ?></span>
				
		</th>
	</tr>

</table>
<table class="table">
	<tr>
		<td>
			<h6 style="font-size: 15px;"><b>NOTES :</b></h6>
			<p style="font-size: 14px;line-height: 20px;font-weight: 500;">
			(Khan Rayees Software Engineer)	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</td>
	</tr>
	<tr>
		<td>
			<h6 style="font-size: 15px;"><b>TERMS AND CONDITION :</b></h6>
			<P style="font-size: 14px;line-height: 20px;font-weight: 500;">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</P>
		</td>
	</tr>
</table>
</div>

<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->


</body>
</html>