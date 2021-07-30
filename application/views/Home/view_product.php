<!DOCTYPE html>
<html>
<head>
	<title><?= (count($product))? $product[0]->product_title : 'Products Not Found'; ?> - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		ul.thumb{margin: 10px; padding: 0px; margin-left: 10px;}
		ul li {display: inline; padding: 5px;}
		ul.thumb li a img{width: 100px;border: 1px solid silver;height: 60px;}
	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<!--Card Section  Start --->
<div class="card" style="margin-top: 10px;">
	<div class="card-content" style="padding: 10px;border-bottom: 1px solid silver;">
		<div class="row">
			<div class="col l4 m6 s12 imgBox">
				<img src="<?= base_url().'uploads/product_image/'.$product[0]->image; ?>" class="responsive-img" style="border: 1px solid silver">

				<ul class="thumb">
					<li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_two; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_two; ?>" class="img-fluid img-responsive"></a></li>

		            <li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_three; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_three; ?>" class="img-fluid img-responsive"></a></li>

		            <li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_four; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_four; ?>" class="img-fluid img-responsive"></a></li>
				</ul>
			</div>
			<div class="col l5 m6 s12">
				<h5 style="margin-top: 0px; font-weight: 500"><?= $product[0]->product_title; ?></h5>

				<?php 
					$category_detail = get_category_details($product[0]->category_id);
				?>

				<h6 style="font-size: 14px; color: silver;"><a href="<?= base_url('Home/index'); ?>">Home</a>/
					<a href="<?= base_url('Home/category_products/'.$product[0]->category_id) ?>">Category</a>/<?= $product[0]->product_title; ?></h6>
				<div class="divider" style="margin-top: 15px;margin-bottom: 15px;"></div>
				<p style="font-size: 14px;color: grey;line-height: 20px;"><?= $product[0]->short_description; ?></p>

				<?php if($product[0]->seller_id !== "0"):
					$get_Seller = get_seller_details($product[0]->seller_id);
				?>
				 <h6 style="color: grey;font-weight: 500;font-size: 13px;">Seller : <span style="color: orange">
				 	<?= $get_Seller[0]->company_name; ?>
				 </span></h6>
				<?php else: ?>
				<?php endif; ?>
				<h6 style="font-size: 14px; font-weight: 500;color: grey;">Color : <?= $product[0]->color; ?></h6>
				
				<div class="divider" style="margin-top: 15px;margin-bottom: 15px;"></div>
				<h5><span class="fa fa-rupee-sign"></span>&nbsp;<?= $product[0]->price; ?></h5>
				<div class="row">
					<div class="col l6 m6 s12">
						<button type="button" class="btn waves-effect waves-light" style="background: #ff3d00;width: 100%;height: 40px;" onclick="add_to_cart('<?= $product[0]->id; ?>')"><span class="fa fa-shopping-cart"></span> &nbsp;Add to Cart</button>
					</div>
					<div class="col l6 m6 s12">
						<button type="button" class="btn waves-effect waves-light" style="background: #13124e;width: 100%;height: 40px;"><span class="fa fa-cube"></span> &nbsp;Buy Now</button>
					</div>
				</div>
			</div>

			  
			<div class="col l3 m12 s12">
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 18px;font-weight: 500;margin: 0px;color: red">Gift Card</h6>
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">
							<a href="<?= base_url('Home/Product_review/'.$product[0]->id); ?>">
							<span class="fa fa-star" style="color: green"></span>View Product Review</a>
						</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 18px;color:red;font-weight: 500;margin: 0px;">Gift Card</h6>
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">
							<a href="<?= base_url('Home/Product_review/'.$product[0]->id); ?>">
							<span class="fa fa-star" style="color: green"></span>
						View Product Review</a>
						</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 18px;font-weight: 500;margin: 0px;color: red">Gift Card</h6>
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">
							<a href="<?= base_url('Home/Product_review/'.$product[0]->id); ?>">
							<span class="fa fa-star" style="color: green"></span>View Product Review</a>
						</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 18px;font-weight: 500;margin: 0px;color: red">Gift Card</h6>
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">
							<a href="<?= base_url('Home/Product_review/'.$product[0]->id); ?>">
								<span class="fa fa-star" style="color: green"></span>View Product Review</a>
						</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
			</div>
		</div>
		<!---Product Related Details Section --->
		<h5 style="padding-left: 15px;font-size: 22px;font-weight: 500;">Related Products
			</h5>
			<div class="row">
				<?php if(count($related_products)):
					foreach($related_products as $r_product):
				 ?>
		<div class="col l2 m4 s6">
			<!---Card Section -->
			<a href="<?= base_url('Home/product_detail/'.$r_product->id); ?>" target="_blank">
			<div class="card">
				<div class="card-image">
					<img src="<?= base_url().'uploads/product_image/'.$r_product->image; ?>" class="responsive-img" style="width: 100%; height: 100px; ">
				</div>
				<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px">
					<h6 style="color: black;font-size: 15px;font-weight: 500;margin-top: 5px"><?= $r_product->product_title; ?></h6>
					<h6 style="font-size: 15px;color: grey;margin-top: 5px">
						<?php $category_data = get_category_details($r_product->category_id); 
							echo $category_data[0]->category_name;
						?></h6>
					<h5 style="font-size: 20px; color: green; font-weight: bold; margin-bottom: 5px"><span class="fa fa-rupee-sign"></span>&nbsp;<?= $r_product->price; ?></h5>
				</div>
				<div class="card-content" style="padding: 3px">
					<center>
					<a href="#!" onclick="add_to_cart('<?= $r_product->id; ?>');" class="btn btn-flat btn-floting waves-effect">
						<span class="fa fa-shopping-cart"></span>
					</a>
					<a href="#!" onclick="view_product_details_modal('<?= $r_product->id; ?>')" class="btn btn-flat btn-floting waves-effect">
						<span class="fa fa-eye"></span>
					</a>
					</center>
				</div>
			
			</div>
			<!---Card Section -->
		</a>
		</div>
		<?php endforeach;
		else: ?>
			<h6 style="font-size: 16px;font-weight: 500;padding-left: 15px;">Related Product's Not Found</h6>
		<?php endif; ?>
	</div>
	<!---Category Product List Section End--->
			</div>

		<!---Product Related Details Section End--->
	</div>
</div>
<!--Card Section  End --->





<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->
<script type="text/javascript">
	 $(document).ready(function(){
        $('.thumb a').mouseover(function(e){
            e.preventDefault();
        $('.imgBox img').attr("src", $(this).attr("href"));
        });
      });
</script>
</body>
</html>