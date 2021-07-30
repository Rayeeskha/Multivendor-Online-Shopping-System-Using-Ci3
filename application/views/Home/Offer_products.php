<?php $this->load->helper('product_helper'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Summery Discount Offer</title>
	<!---Include CSS File --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!---Include CSS File --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
	</style>
</head>
<body>

<!---Include  Header Section --->
<?php $this->load->view('Home/header.php'); ?>
<!---Include  Header Section --->
<!------Coupon Master Script Start  Flate Coupon--------->
<div class="row">
	<?php if($coupon_master):
	count($coupon_master); 
	foreach($coupon_master as $cop_ms): 
		if($cop_ms->coupan_type == "Percentage"):
	?>
	<div class="col l2 m4 s6">
		<div class="card">
			<div class="card-image">
				<img src="<?= base_url('assets/images/per.jpg'); ?>" class="responsive-img" style="width: 100%; height: 100px;">
			</div>
			<div class="card-content" style="">
				<h6 style="font-weight: 500;font-size: 14px;"><span style="color: red; font-size: 18px;">&nbsp;Flat 
					<?= $cop_ms->coupan_value; ?>%
				</span> OFF On </h6>
				<h6 style="font-weight: 500;font-size: 14px;color: grey">Purchase above:<span class="fa fa-rupee-sign" style="color: green;padding: 5px;"><?= number_format($cop_ms->cart_min_value); ?></span></h6>
				<h6 style="font-weight: 500;font-size: 14px;color: grey">Use Code : <span style="color: orange"> <?= $cop_ms->coupan_code; ?></span></h6>
				<h6 style="font-weight: 500;font-size: 14px; color: grey">Valid Till : 
					<span style="color: green"><?= date('d M Y',strtotime($cop_ms->expiry_date)); ?></span></h6>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="col l2 m4 s6">
		<div class="card">
			<div class="card-image">
				<img src="<?= base_url('assets/images/sale.png'); ?>" class="responsive-img" style="width: 100%; height: 100px;">
			</div>
			<div class="card-content">
				<h6 style="font-weight: 500;font-size: 14px;"><span style="font-size: 18px; color: red">&nbsp;Flat 
					<span class="fa fa-rupee-sign" style="color: red">&nbsp;<?= $cop_ms->coupan_value; ?></span>
				</span> OFF On </h6>
				<h6 style="font-weight: 500;font-size: 14px; color: grey">Purchase above:<span class="fa fa-rupee-sign" style="color: green;padding: 5px;"><?= number_format($cop_ms->cart_min_value); ?></span></h6>
				<h6 style="font-weight: 500;font-size: 14px; color: grey">Use Code : <span style="color: orange"><?= $cop_ms->coupan_code; ?></span></h6>
				<h6 style="font-weight: 500;font-size: 14px; color: grey">Valid Till : 
					<span style="color: green"><?= date('d M Y',strtotime($cop_ms->expiry_date)); ?></span></h6>
			</div>
		</div>
	</div>

	<?php endif; ?>
	<?php endforeach; ?>
	<?php else: ?>
	<?php endif; ?>
</div>
<!------Coupon Master Script End  Flate Coupon--------->


<!----------Product wise discount Coupon Script ------>
<?php if($discount_offer):
	count($discount_offer);
	foreach($discount_offer as $discount):
		$discount_offer = get_offer_products($discount->product_id);
?>
<div class="row">


	<?php
	
	if ($discount_offer):
		count($discount_offer);
		foreach($discount_offer as $offer_coupan):
	?>
	
	
	<div class="col l2 m4 s6">
		<h5 style="padding-left: 15px;font-size: 16px;font-weight: 500;color: blue"><?= $offer_coupan->couponType; ?> </h5>
		<a href="<?= base_url('Home/product_detail/'.$offer_coupan->id); ?>" target="_blank">
			<div class="card">
				<div class="card-image">
					<img src="<?= base_url().'uploads/product_image/'.$offer_coupan->image; ?>" class="responsive-img" style="width: 100%; height: 100px;">
				</div>
				<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px">
					<h6 style="color: black;font-size: 13px;font-weight: 500;margin-top: 5px"><?= $offer_coupan->product_title; ?></h6>
					<h6 style="color: black;font-size: 15px;font-weight: 500;margin-top: 5px">
						<?php if($offer_coupan->discount_type == "Percentage"): ?>
							<span style="color: grey">Discount : </span><span style="color: orange"><?= $offer_coupan->couponAmount; ?> %</span>
						<?php else: ?>
							<span style="color: grey;">Cashback :</span>
							<span style="color: orange" class="fa fa-rupee-sign"><?= number_format($offer_coupan->couponAmount); ?></span> 
						<?php endif; ?>
						
					</h6>
					<h6 style="color: black;font-size: 13px;font-weight: 500;margin-top: 5px">
						<span style="color: grey">Coupan Code </span>: <span style="color: red"><?= $offer_coupan->couponCode; ?></span>
					</h6>	
					
					<h5 style="font-size: 16px; color: green; font-weight: bold; margin-bottom: 5px"><span class="fa fa-rupee-sign"></span>&nbsp;<?= number_format($offer_coupan->price); ?></h5>
				</div>
				<div class="card-content" style="padding: 3px">
					<center>
					<a href="#!" class="btn btn-flat btn-floting waves-effect" 
						onclick="add_to_cart('<?= $offer_coupan->id; ?>');">
						<span class="fa fa-shopping-cart"></span>
					</a>
					<a href="#!" class="btn btn-flat btn-floting waves-effect"
					 onclick="view_product_details_modal('<?= $offer_coupan->id; ?>')">
						<span class="fa fa-eye"></span>
					</a>
					</center>
				</div>
		</div>
		</a>
	</div>
	<?php endforeach;
	else: ?>
		<h5 style="padding-left: 15px;font-size: 22px;font-weight: 500;color: red">Currwntly Not any Product Offer Not Available</h5>
	<?php endif; ?>
		<?php endforeach; ?>
<?php endif; ?>
</div>





<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->
<!---Body Section End ---->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>