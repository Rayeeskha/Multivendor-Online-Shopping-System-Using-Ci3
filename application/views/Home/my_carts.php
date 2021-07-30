<!DOCTYPE html>
<html>
<head>
	<title>My Cart(<?= count($products); ?>) - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#quantity_form{display: flex;}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#quantity_form li{margin: 2px;}

	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

		<!---Carts Section Start --->
	<div class="row" style="margin-bottom: 0px;margin-top: 10px;">


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

	<div class="col l8 m7 s12">
		<!---Card Section --->
		<div class="card">
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
				<h5 style="font-size: 25px;margin-top: 5px; font-weight: 500">My Cart(<?= count($products); ?>)</h5>
			</div>
			<div class="card-content">
				<?php if(count($products)):
					foreach($products as $pro):
						//Get Image Using Helper Function According to product id
						$product_detail = get_product_detail($pro->product_id);
						//Get Image Using Helper Function According to product id
				 ?>
				<div class="row">
					<div class="col l3 m3 s12">
						<img src="<?= base_url(). 'uploads/product_image/' .$product_detail[0]->image; ?>" class="responsive-img">

						<!---Quantity Form --->
						<ul id="quantity_form">
							<li><button type="button" class="btn  btn-floating" 
								onclick="update_quantity('sub', '<?= $pro->product_id; ?>', '<?= $pro->id; ?>')" style="background: #13124e; box-shadow: none;">-</button></li>

								<input type="text" name="quantity_<?= $pro->id; ?>" id="input_box" value="<?= $pro->quantity; ?>" readonly="">
							<li>
								<button type="button" class="btn  btn-floating"
								 onclick="update_quantity('add', '<?= $pro->product_id; ?>','<?= $pro->id; ?>')" style="background: #13124e; box-shadow: none;">+</button></li>
						</ul>
						<!---Quantity Form --->
					</div>
					<div class="col l9 m9 s12">
						<h6 style="font-size: 15px;font-weight: 500"><?= $pro->product_name; ?></h6>
						<h5 style="font-size: 15px;font-weight: 500"><span class="fa fa-rupee-sign"></span>&nbsp;
							<?php $calculate = $pro->quantity * $pro->rate;
								echo number_format($calculate);
							 ?></h5>
						<h6 style="font-size: 15px;font-weight: 500;color: silver"><?= $pro->quantity; ?> Item x
						 <?= number_format($pro->rate); ?></h6>
						<a href="<?= base_url('Home/product_detail/'.$pro->product_id); ?>" class="btn btn-flat" target="_blank">View Item</a>
						<a href="<?= base_url('Home/remove_product/'.$pro->product_id); ?>" class="btn btn-flat">Remove Item</a>
					</div>
				</div>
				<?php endforeach;
				else: ?>
					<center>
						<h3><span class="fa fa-shopping-cart" style="color: #ff3d00;"></span></h3>
						<h6 style="font-size: 20px;font-weight: 500;color: red;">Your Cart is Empty ? <a href="<?= base_url('index'); ?>">Start Shopping Now</a></h6>
					</center>
				<?php endif; ?>
			</div>
		</div>
		<!---Card Section --->
	</div>
	<div class="col l4 m5 s12">
		<div class="card">
			<div class="card-content"  style="border-bottom: 1px solid silver;padding: 10px;">
				<h5 style="font-size: 25px;margin-top: 5px; font-weight: 500">Price Details</h5>
			</div>
			<div class="card-content">
				<h6 style="font-size: 15px; font-weight:bold;margin-top: 0px; border-bottom: 1px  dashed silver;padding-bottom: 15px;">Price (<?= count($products); ?>Items) <span class="right"> <span class="fa fa-rupee-sign"></span>&nbsp;
					<?php  
						if (count($products)): 
							$t_amount  = 0;
							foreach($products as $cpro):
								$t_amount += ($cpro->quantity * $cpro->rate);
							endforeach;
						else:
							$t_amount  = 0;		
						endif;
							echo ($t_amount > 0) ? number_format($t_amount) : '0';
					?>

				</span></h6>
				<h5 style="font-size: 20px;font-weight: 500;border-bottom: 1px dashed silver;padding-bottom: 15px;">Total  Amount  <span class="right"> <span class="fa fa-rupee-sign"></span>&nbsp;<?=  ($t_amount > 0) ? number_format($t_amount) : '0'; ?></span></h5>
				<!---Button Section --->
				<div class="row" style="margin-top: 18px; margin-bottom: 0px;">
					<?php if(count($products)): ?>
						<div class="col l6 m6 s6">
							<a href="<?= base_url('Home/index'); ?>" class="btn waves-effectwaves-light" style="font-size: 12px;text-transform: capitalize;font-weight: 500;width: 100%;background: #ff3d00;box-shadow: none;height: 40px;">Continue Shopping</a>
						</div>
						<div class="col l6 m6 s6">
							<a href="<?php echo base_url('Home/shipping_details'); ?>" class="btn waves-effectwaves-light" style="font-size: 12px;text-transform: capitalize;font-weight: 500;width: 100%;background: #13124e;box-shadow: none;height: 40px;">Place Order</a>
						</div>
					<?php else: ?>
						<div class="col l12 m12 s12">
							<a href="<?= base_url('Home/index'); ?>" class="btn waves-effectwaves-light" style="font-size: 12px;text-transform: capitalize;font-weight: 500;width: 100%;background: #ff3d00;box-shadow: none;height: 40px;"><span class="fa fa-shopping-cart"></span>&nbsp;Continue Shopping</a>
						</div>
					<?php endif; ?>	
				</div>
				<!---Button Section --->
			</div>
		</div>
	</div>
</div>
<!---Carts Section End --->



<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>

