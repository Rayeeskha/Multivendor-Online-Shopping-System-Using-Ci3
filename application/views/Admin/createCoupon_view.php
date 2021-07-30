<!DOCTYPE html>
<html>
<head>
	<title>Create Coupan - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		h6{font-weight: 500;margin-top: 5px; font-size: 15px; padding: 20px;}
		#input_box, #couponCode{border: 1px solid silver;height: 35px;padding-left: 10px; box-shadow: none; }
		select{display: block;}
		#select{border: 1px solid silver;height: 35px;padding-left: 10px; box-shadow: none;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>

<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;">
				<span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Create Discount Coupan</h5>
		</div>
	</div>
	<?= form_open('Admin/createCoupon'); ?>
		<div  class="card">
			<div class="row">
			<div class="card-content">
				
				<div class="col l6 m6 s12" >
					<h6>Coupan Name</h6>
					<h6>Coupan Code</h6>
					<h6>Coupan Type</h6>
					<h6>Coupan Category</h6>
					<h6>Discount Type</h6>
					<h6>Start Date</h6>
					<h6>Expiry Date</h6>
					<h6>Amount</h6>
				</div>
				<div class="col l6 m6 s12" style="padding: 15px;">
					<input type="text" name="coupan_name"  id="input_box" placeholder="Coupan  Name" required>
					<input type="text" name="couponCode" id="couponCode" placeholder="Coupan Code">
					<button type="button" onclick="createCreateCodes()" class="btn waves-effect waves-light" style="background: #ff3d00;color: white;font-size: 16px;font-weight: 500;text-transform: capitalize;" >Create Dynamic Code</button><br><br>

					<select class="form-control"   name="couponType" id="select" required>
						<option selected="" disabled="">Coupon Type</option>
						<option value="specialCoupon">Special Coupon</option>
						<option value="deluxeCoupon">Deluxe Coupon</option>
						<option value="premiumCoupon">Premium Coupon</option>
						<option value="luxuryCoupon">Luxury Coupon</option>
					</select><br>

					<select name="product_id" required="" id="select">
						<option selected="" disabled="">Select Category</option>
						<?php if(count($categories)):
							foreach($categories as $cate):
						 ?>
							<option value="<?= $cate->id; ?>" ><?= $cate->product_title; ?></option>

						<?php endforeach;
						else: ?>
								<option value="">Categories Not Found's</option>
						<?php endif; ?>

					</select><br>

					<select name="discount_type" required="">
						<option selected="" disabled="">Select Coupon Type</option>
						<option value="Rupee">Rupee</option>
						<option value="Percentage">Percentage</option>
					</select><br>

					<input type="date" name="couponStartDate" id="input_box" required><br>
					<input type="date" required  class="form-control" name="couponExpiryDate" placeholder="dd-mm-YY" id="input_box" /><br>

					<input type="text" required  class="form-control" name="couponAmount" id="input_box" placeholder="Coupon Amount" /><br>
					 <button type="submit" name="createCoupon" class="btn waves-effect waves-light"  style="background: #ff3d00;color: white; text-transform: capitalize;font-weight: 500;outline: none;box-shadow: none;"><span class="fa fa-compass" style="color: #fff"></span>&nbsp;createCoupon</button> 

					<!-- <input type="submit" class="btn btn-primary" name="createCoupon" value="createCoupon" / style="background: #ff3d00;color: white; text-transform: capitalize;font-weight: 500"> -->
			      
				</div>
			</div>
		</div>

		<?= form_close(); ?>
	</div>
</div>





<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->

<script>
 function createCreateCodes(){
   var couponCode = Math.random().toString(36).substring(2, 4) + Math.random().toString(10).substring(2, 4);
   document.getElementById('couponCode').value = couponCode.toUpperCase();
   console.log(couponCode);
 }
</script>
</body>
</html>