<!DOCTYPE html>
<html>
<head>
	<title>Manage Products - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
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
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Manage Category Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500">Manage Products</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_products'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="product_name" id="input_box" value="<?= set_value('product_name'); ?>" placeholder="Enter Product's  Name" required="">
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
							<span class="fa fa-filter">&nbsp;Filter</span>
						</button>
					</span>
					<!---Category filter -->
					<ul class="dropdown-content" id="category_filter">
						<li><a href="<?= base_url('Admin/filter_products/new_products'); ?>" class="waves-effect">New Products </a></li>
						<li><a href="<?= base_url('Admin/filter_products/old_products'); ?>" class="waves-effect">Old Products </a></li>
						<li><a href="<?= base_url('Admin/filter_products/highest_price'); ?>" class="waves-effect">Highest Price </a></li>
						<li><a href="<?= base_url('Admin/filter_products/lowest_price'); ?>" class="waves-effect">Lowest Price </a></li>
					</ul>
					<!---Category filter -->
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					<th style="text-align: center;">IMAGE</th>
					<th>NAME</th>
					<th>CATEGORY</th>
					<th>PRICE</th>
					<th>Seller Name</th>
					<th>COUNT SOLD</th>
					<th>STATUS</th>
					<th style="text-align: center;">ACTION</th>
				</tr>
				<?php if(count($products)):
					foreach($products as $pro):
				 ?>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $pro->product_title; ?>">
							<img src="<?= base_url().'uploads/product_image/'.$pro->image; ?>" class="responsive-img" id="category_image"></a>
						</center>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->product_title; ?><br>
						<a href="<?= base_url('Home/product_detail/' .$pro->id); ?>" target="_blank">View on Home</a>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500"><a href="#!">
						<?php
							$category_data = get_category_details($pro->category_id);
							echo $category_data[0]->category_name;
						?>
					</a></td>
					<td style="font-size: 14px;color: grey;font-weight: 500"><span class="fa fa-rupee-sign"></span>&nbsp;<?= number_format($pro->price); ?></td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						
						<?php 
							$get_seller = get_seller_details($pro->seller_id); 
							if($get_seller): 
						?>
								<h6 style="color: orange;font-size: 14px;font-weight: 500">
									<?= $get_seller[0]->company_name; ?>
								</h6>
						<?php else: ?>
							<h6 style="color: grey;font-size: 14px;font-weight: 500">
								Admin Products
							</h6>
								
						<?php endif; ?>
							
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->count_sales; ?>
						<?php if ($pro->count_sales):
							echo $pro->count_sales;
						 ?>
						<?php else: echo "0"; ?>
						<?php endif; ?>
					</td>
					<td style="font-size: 14px;color: green;font-weight: 500"><?= ($pro->status == "0")? 'Active': 'InActive'; ?></td>
					<td>
						<center>
							<a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $pro->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $pro->id; ?>">
							<li><a href="<?= base_url('Admin/edit_product/'.$pro->id); ?>"><span class="fa fa-edit" style="color: blue;"></span>&nbsp;Edit</a></li>
							<li><a href="<?= base_url('Admin/delete_product/'.$pro->id); ?>" onclick="return confirm('Are you sure you want to  delete this Product ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
							<?php if ($pro->status == "0"):  ?>
							<li><a href="<?= base_url('Admin/change_product_status/'.$pro->id.'/1'); ?>">
								<span class="fa  fa-eye-slash"></span>&nbsp;
							Inactive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_product_status/'.$pro->id.'/0'); ?>"><span class="fa fa-eye"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center; font-weight: 500;color: red;">Product's  Not Found</td>
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