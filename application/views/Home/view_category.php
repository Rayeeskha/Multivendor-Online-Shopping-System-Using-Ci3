<!DOCTYPE html>
<html>
<head>
	<title><?= (count($products))? $products[0]->product_title : 'Products Not Found'; ?> - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#category_filter{padding-top: 10px; padding-bottom: 10px}
		#category_filter li a{color: grey;font-size: 15px; border-bottom: 1px solid silver}
	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<!--Card Section  Start --->
<div class="card" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
	<div class="card-content" style="padding: 10px;border-bottom: 1px solid silver;">
		<h5 style="margin-top: 5px;"><?= (count($category_detail)) ? $category_detail[0]->category_name :  'Category Not Found..'; ?> <span class="right">
			<button type="button" class="btn btn-flat waves-effect waves-light  dropdown-trigger" data-target="category_filter" style="text-transform: capitalize;font-weight: 500"><span class="fa fa-filter"></span>&nbsp;Product Filter</button>
		</span></h5>
		<?php $cate_id = (count($category_detail)) ? $category_detail[0]->id : '0'; ?>
		<!---Category filter dropdown start --->
		<ul class="dropdown-content" id="category_filter">
			<li><a href="<?= base_url('Home/product_filter/'.$cate_id.'/default'); ?>" class="waves-effect">Default Products</a></li>
			<li><a href="<?= base_url('Home/product_filter/'.$cate_id.'/best_metch'); ?>" class="waves-effect">Best Metch</a></li>
			<li><a href="<?= base_url('Home/product_filter/'.$cate_id.'/lowest_price'); ?>" class="waves-effect">Lowest Price</a></li>
			<li><a href="<?= base_url('Home/product_filter/'.$cate_id.'/highest_price'); ?>" class="waves-effect">Highest Price</a></li>
		</ul>

		<!---Category filter dropdown end --->
	</div>
	<div class="card-content" style="padding:0px;margin-top: 10px;">
		
	<div class="row" style="margin-bottom: 0px;">
		
		<?php if(count($products)):
			foreach($products as $product):
		 ?>
		<div class="col l2 m4 s6">
			<!---Card Section -->
			<a href="<?= base_url('Home/product_detail/'.$product->id); ?>" target="_blank">
			<div class="card">
				<div class="card-image">
					
					<img src="<?= base_url().'uploads/product_image/'.$product->image; ?>" class="responsive-img" style="width: 100%;height: 100px;">
					
				</div>
				<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px">
					<h6 style="color: black;font-size: 15px;font-weight: 500;margin-top: 5px"><?= $product->product_title; ?></h6>
					<h6 style="font-size: 15px;color: grey;margin-top: 5px">
						<?php
							$category_data = get_category_details($product->category_id);
							echo (count($category_data)) ? $category_data[0]->category_name : 'No Category Available'
						?>
					</h6>
					<h5 style="font-size: 20px; color: green; font-weight: bold; margin-bottom: 5px"><span class="fa fa-rupee-sign"></span>&nbsp;<?= $product->price; ?></h5>
				</div>
				<div class="card-content" style="padding: 3px">
					<center>
					<a href="#!" class="btn btn-flat btn-floting waves-effect">
						<span class="fa fa-shopping-cart" onclick="add_to_cart('<?= $product->id; ?>');"></span>
					</a>
					<a href="#!" class="btn btn-flat btn-floting waves-effect" onclick="view_product_details_modal('<?= $product->id; ?>')">
						<span class="fa fa-eye"></span>
					</a>
					</center>
				</div>
			
			</div>
			<!---Card Section -->
		</div>
		<?php endforeach; 
		else: ?>
			<h6 style="color: red;font-weight: 500;padding: 10px;">Product's Not Available </h6>
		<?php endif; ?>

	</div>
	<!---Category Product List Section End--->

	</div>
</div>
<!--Card Section  End --->





<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>