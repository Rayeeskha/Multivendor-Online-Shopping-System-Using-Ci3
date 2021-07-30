<!DOCTYPE html>
<html>
<head>
	<title>Manage Coupan - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		#category_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
		 .btn-flat:hover{background: #13124e;color: white}
		 .action_dropdown li a{color: grey;font-size: 14px;font-weight: 500}
		 .action_dropdown{width: 120px !important;}
		 #category_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
		 #category_filter li a{color: grey;font-size: 14px;font-weight: 500;}
		 #search_category{display: flex;}
		 #search_category li:first-child{width: 250px;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 0px;}
		 #pagination a{color: black; font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px;border-radius: 3px;}
		 #pagination strong{font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px; background: black;color: white;border-radius: 3px;}
		 #category_filter  li a{border-bottom: 1px solid silver}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Admin/topbar'); ?>
<!---Manage Category Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500"><span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Manage Coupan</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Seller_dashboard/search_coupans'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="coupan_name" id="input_box" value="<?= set_value('product_name'); ?>" placeholder="Enter Coupans  Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="category_filter" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Coupon</span>
						</button>
					</span>
					<!---Category filter -->
					<ul class="dropdown-content" id="category_filter">
						<li><a href="<?= base_url('Admin/filter_coupans/new_coupans'); ?>" class="waves-effect">New Coupans </a></li>
						<li><a href="<?= base_url('Admin/filter_coupans/old_coupans'); ?>" class="waves-effect">Old Coupans </a></li>
						<li><a href="<?= base_url('Admin/filter_coupans/highest_price'); ?>" class="waves-effect">Highest Price </a></li>
						<li><a href="<?= base_url('Admin/filter_coupans/lowest_price'); ?>" class="waves-effect">Lowest Price </a></li>
					</ul>
					<!---Category filter -->
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					<th style="text-align: center;">Coupan Type</th>
					<th>Name</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Product Price</th>
					<th>Discount</th>
					<th>couponCode</th>
					<th>Seller Name</th>
					<th>Expiry</th>
					<th>STATUS</th>
					<th style="text-align: center;">ACTION</th>
				</tr>
				<?php if(count($manage_coupan)):
					foreach($manage_coupan as $coupan):
				 ?>
				<tr>
					<td style="text-align: center;">
						<?= $coupan->couponType; ?><br>
					</td>
					<td>
						<?= $coupan->couponName; ?><br>
					</td>
					<td>
						<?php
							$coupan_data = get_product_detail($coupan->product_id);
								echo $coupan_data[0]->product_title;
						?>
						<td>
							<center>
								<a href="<?= base_url('Home/product_detail/' .$coupan_data[0]->id); ?>" class="tooltipped" data-position="top" data-tooltip="<?= $coupan_data[0]->product_title; ?>" target="_blank">
							<img src="<?= base_url().'uploads/product_image/'.$coupan_data[0]->image; ?>" class="responsive-img" id="category_image">
						
							</a>
							</center>
						</td>
						<td>
							<?= $coupan_data[0]->price; ?>
							
						</td>

					<td>
						<?php if($coupan->discount_type == "Percentage"): ?>
							<h6 style="color: orange;font-weight: 500;font-size: 12px;">Percent : <?= $coupan->couponAmount; ?> %</h6>
							<?php elseif($coupan->discount_type == "Rupee"): ?>
								<h6 style="color: orange;font-weight: 500;font-size: 12px;"> 
								<span class="fa fa-rupee-sign" style="color: red">&nbsp;<?= number_format($coupan->couponAmount); ?></span> 
							<?php else: ?>
						<?php endif; ?>
					</td>
				
					<td><?= $coupan->couponCode; ?></td>
					<td><a href="#!"><?= $coupan->createdBy; ?></a></td>
					<td style="color: green"><span class="fa fa-clock"></span>
						<?= date('d M Y',strtotime($coupan->couponExpiryDate)); ?>
					</td>
					<td><?= ($coupan->couponStatus == "0")? '<span style="color: green">Active</span>': '<span style="color: red">Expire</span>'; ?></td>
					<td>
						<center>
							<a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $coupan->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $coupan->id; ?>">
							<li><a href="<?= base_url('Admin/edit_coupan/'.$coupan->id); ?>"><span class="fa fa-edit" style="color: blue;"></span>&nbsp;Edit</a></li>
							<li><a href="<?= base_url('Admin/delete_coupan/'.$coupan->id); ?>" onclick="return confirm('Are you sure you want to  delete this Coupan ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
							<?php if ($coupan->couponStatus == "0"):  ?>
							<li><a href="<?= base_url('Admin/change_coupan_status/'.$coupan->id.'/1'); ?>">
								<span class="fa  fa-eye-slash"></span>&nbsp;
							Expire</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_coupan_status/'.$coupan->id.'/0'); ?>"><span class="fa fa-eye"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center; font-weight: 500;color: red;">Coupan  Not Found</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td colspan="7">
					<div id="pagination">
						<?= $this->pagination->create_links(); ?>
					</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<!---Manage Category Section -->

<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>