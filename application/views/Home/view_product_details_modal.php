<style type="text/css">
	ul.thumb{margin: 10px; padding: 0px; margin-left: 10px;}
		ul li {display: inline; padding: 5px;}
		ul.thumb li a img{width: 80px;border: 1px solid silver;height: 60px;}
</style>
<span class="right modal-close" style="padding: 8px 12px;background: red;color: white;margin-right: 25px;"><b>X</b></span>
<!--Card Section  Start --->
<div class="modal-content">
		<div class="row">
			<div class="col l4 m12 s12 imgBox">
				<img src="<?= base_url().'uploads/product_image/'.$product[0]->image; ?>" class="responsive-img" style="border: 1px solid silver">

				<ul class="thumb">
					<li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_two; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_two; ?>" class="img-fluid img-responsive"></a></li>

		            <li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_three; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_three; ?>" class="img-fluid img-responsive"></a></li>

		            <li><a href="<?= base_url() . 'uploads/product_image/' . $product[0]->image_four; ?>" target="imgBox"><img src="<?= base_url() . 'uploads/product_image/' . $product[0]->image_four; ?>" class="img-fluid img-responsive"></a></li>
				</ul>
			</div>
			<div class="col l5 m5 s12">
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
						<button type="button" class="btn waves-effect waves-light" onclick="add_to_cart('<?= $product[0]->id; ?>');" style="background: #ff3d00;width: 100%;height: 40px;"><span class="fa fa-shopping-cart"></span> &nbsp;Add to Cart</button>
					</div>
					<div class="col l6 m6 s12">
						<button type="button" class="btn waves-effect waves-light modal-close" style="background: #13124e;width: 100%;height: 40px;"><span class="fa fa-cube"></span> &nbsp;Buy Now</button>
					</div>
				</div>
			</div>
			<div class="col l3 m3 s12">
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">Gift Card</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">Gift Card</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">Gift Card</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
				<div class="card" style="box-shadow: none; border: 1px dashed silver;">
					<div class="card-content" style="padding: 10px">
						<h6 style="font-size: 15px;font-weight: 500;margin: 0px;">Gift Card</h6>
						<p style="font-size: 14px;color: grey;line-height: 20px;">All Products available in chepest price you can do and buy all products According to your categories available</p>
					</div>
				</div>
			</div>
		</div>
</div>	

<script type="text/javascript">
	 $(document).ready(function(){
        $('.thumb a').mouseover(function(e){
            e.preventDefault();
        $('.imgBox img').attr("src", $(this).attr("href"));
        });
      });
</script>