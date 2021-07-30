<?php 
	if(count($coupan)){

	}else{
		$this->session->set_flashdata('error', 'This Coupan Id Not Found!..');
		return redirect('Seller_dashboard/manage_coupon');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Coupan - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px; display: block;margin-bottom: 0px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block; border: 1px solid silver; outline: none;width: 40%;height: 40px;border-radius: 3px; box-shadow: none;}
		 textarea{border: 1px solid silver;outline: none;resize: none;padding: 10px;border-radius: 3px; height: 90px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 40%;margin-bottom: 15px;font-size: 14px;font-weight: 500; border-radius: 3px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Seller/top_bar'); ?>
<!---Upload products Section Start --->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">
				<span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Edit Coupan's</h6>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Seller_dashboard/update_coupan/'.$coupan[0]->id); ?>
			<h6 style="font-size: 16px; font-weight: 500">Coupan Type</h6>
			<input type="text" name="coupan_type" id="input_box" value="<?= $coupan[0]->couponType; ?>" placeholder="Enter Product Title" required="">

			<h6 style="font-weight: 500">Name</h6>
			
			<input type="text" name="coupan_name" id="input_box" value="<?= $coupan[0]->couponName; ?>" placeholder="" required="">
			
			<!-- <input type="file" name="product_image" id="input_file" required=""> -->
			<h6 style="font-size: 16px; font-weight: 500">Product Name</h6>
			<select name="product_id" required="">
				<option selected="" disabled="">Select Product</option>
				<?php if(count($product)):
					foreach($product as $pro):
				 ?>
				 <?php if($coupan[0]->product_id == $pro->id): ?>
					<option value="<?= $pro->id; ?>" selected><?= $pro->product_title; ?></option>
					<?php else: ?>
					<option value="<?= $pro->id; ?>" ><?= $pro->product_title; ?></option>
					<?php endif; ?>
				<?php endforeach;
				else: ?>
						<option value="">Product's Not Found</option>
				<?php endif; ?>
			</select>
			<h6 style="font-size: 16px; font-weight: 500">Discount Type</h6>
			<select name="discount_type">
				<option value="<?= $coupan[0]->discount_type; ?>" selected><?= $coupan[0]->discount_type; ?></option>
				<option value="Rupee">Rupee</option>
				<option value="Percentage">Percentage</option>
			</select>
			<h6 style="font-size: 16px; font-weight: 500">Discount</h6>
			
			<input type="text" name="couponAmount" id="input_box" value="<?= $coupan[0]->couponAmount; ?>" placeholder="Enter Product Color" style="width: 40%">
			<h6 style="font-size: 16px; font-weight: 500">couponCode</h6>
			<input type="text" name="couponCode" id="input_box" value="<?= $coupan[0]->couponCode; ?>" placeholder="Enter Product Color" style="width: 40%">
			<h6 style="font-size: 16px; font-weight: 500">Expiry</h6>
			<input type="text" name="Expiry"  id="input_box" value="<?= $coupan[0]->couponExpiryDate; ?>" placeholder="Enter Product Weight" style="width: 40%">
			
			<a href="<?= base_url('Admin/manage_coupan'); ?>" class="btn waves-effect waves-light" style="background: red;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Cancel</a>

			<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Update Coupan</button>

			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Upload products Section End --->



<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>