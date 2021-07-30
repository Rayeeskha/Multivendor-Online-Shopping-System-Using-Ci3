
<!DOCTYPE html>
<html>
<head>
	<title>Home My Online Shop</title>
	<?php $this->load->view('Home/css_file.php'); ?>
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
	</style>
</head>
<body>
<!---Body Section Start ---->
	<?php $this->load->view('Home/header.php'); ?>

	<!---Image Slider Section Start --->
	<div class="carousel carousel-slider center">

		<?php if(count($slider_image)): ?>
			<?php foreach($slider_image as $slider_img): ?>
				 <div class="carousel-item red white-text" href="#one!">
			      <img src="<?= base_url() . './uploads/image_slider/' .$slider_img->slider_image; ?>" class="responsive-img" style="height: 200px;width: 100%">
			    </div>
			<?php endforeach; ?>
			<?php else: ?>		
	   
		    <div class="carousel-item red white-text" href="#one!">
		      <img src="<?= base_url('assets/images/medi.jpg') ?>" class="responsive-img" style="height: 70%;">
		    </div>
	    <?php endif; ?>
	   
    
  	</div>
	<!---Image Slider Section End --->
	<!---Category Section Start  --->
	<div class="row" style="margin-top: 15px;">
		<?php if(count($categories)):
			foreach($categories as $cate):
		 ?>
		<div class="col l3 m6 s12">
			<!---Cart Section Start -->
			<div class="card waves-effect" style="box-shadow: none;"><!---style="box-shadow: none;" -->
				<div class="card-content"  style="padding: 5px; padding-left: 10px;">
					<div class="row" style="margin-bottom: 0px;">
						<div class="col l7 m7 s7">
							<h6 style="color: black;font-size: 14px;font-weight: 500;margin-top: 5px"><?= $cate->category_name;  ?></h6>

							<?php $count_products = get_category_products($cate->id); ?>
							<h6 style="font-size: 14px;color: grey;margin-top: 5px"><?= count($count_products); ?>&nbsp;- Products</h6>
							<a href="<?= base_url('Home/category_products/'.$cate->id); ?>" class="btn waves-effect waves-light" style="background: #ff3d00; box-shadow: none;margin-top: 10px;text-transform: capitalize;font-weight: 500" target="_blank">View More</a>
						</div>
						<div class="col l5 m5 s5">
							<img src="<?= base_url().'uploads/category_image/'.$cate->image; ?>" class="responsive-img" 
							style="width: 100%; height: 100px; margin-top: 5px;">
						</div>
					</div>
				</div>

			</div>
			<!---Cart Section End -->
		</div>
		<?php endforeach; 
			else: ?>
				<h6>Category Not Found</h6>
		<?php endif; ?>
	</div>
	<!---Category Section End --->

	<?php if($categories):
		count($categories);
		foreach($categories as $cate):
	 ?>
	<!---Category Product List Section Start--->
	<div class="row">
		<h5 style="padding-left: 15px;font-size: 22px;font-weight: 500;"><?= $cate->category_name; ?>
			<span class="right"><a href="<?= base_url('Home/category_products/'.$cate->id); ?>" class="btn waves-effect" style="margin-right: 12px; background: #13124e">View More</a></span>
		</h5>
		<?php 
			$products = get_category_products($cate->id);
			if ($products) :
				count($products);
				foreach($products as $pro):
		?>
		<div class="col l2 m4 s6">
			<!---Card Section -->
			<a href="<?= base_url('Home/product_detail/'.$pro->id); ?>" target="_blank">
			<div class="card">
				<div class="card-image">
					
					<img src="<?= base_url().'uploads/product_image/'.$pro->image; ?>" class="responsive-img" style="width: 100%; height: 100px;">
					
				</div>
				<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px">
					<h6 style="color: black;font-size: 15px;font-weight: 500;margin-top: 5px"><?= $pro->product_title; ?></h6>
					<h6 style="font-size: 15px;color: grey;margin-top: 5px"><?= $cate->category_name; ?></h6>
					<h5 style="font-size: 20px; color: green; font-weight: bold; margin-bottom: 5px"><span class="fa fa-rupee-sign"></span>&nbsp;<?= number_format($pro->price); ?></h5>
				</div>
				<div class="card-content" style="padding: 3px">
					<center>
					<a href="#!" class="btn btn-flat btn-floting waves-effect" 
						onclick="add_to_cart('<?= $pro->id; ?>');">
						<span class="fa fa-shopping-cart"></span>
					</a>
					<a href="#!" class="btn btn-flat btn-floting waves-effect"
					 onclick="view_product_details_modal('<?= $pro->id; ?>')">
						<span class="fa fa-eye"></span>
					</a>
					</center>
				</div>
			
			</div>
			</a>
			<!---Card Section -->
		</div>
		<?php endforeach;
		else: ?>
			<h6 style="color:red;font-size: 15px;font-weight: 500;padding-left: 15px;">Product's Not Found..</h6>
		<?php endif; ?>
		
	</div>
	<!---Category Product List Section End--->
<?php endforeach;
else: ?>
	<h6 style="color: red;font-size: 15px;font-weight: 500">Product's Not Found</h6>
	<?php endif; 
?> 

<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->
<!---Body Section End ---->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>

