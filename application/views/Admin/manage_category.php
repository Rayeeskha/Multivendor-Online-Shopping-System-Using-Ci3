<!DOCTYPE html>
<html>
<head>
	<title>Manage Categories - My Shop</title>
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
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Manage Category Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500">Manage Categories</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_category'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="category_name" id="input_box" value="<?= set_value('category_name'); ?>" placeholder="Enter Product's Category Name" required="">
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
						<li><a href="<?= base_url('Admin/filter_category/new_category'); ?>" class="waves-effect">New Category </a></li>
						<li><a href="<?= base_url('Admin/filter_category/old_category'); ?>" class="waves-effect">Old Category </a></li>
						<li><a href="<?= base_url('Admin/filter_category/highest_products'); ?>" class="waves-effect">Highest Category </a></li>
						<li><a href="<?= base_url('Admin/filter_category/lowest_products'); ?>" class="waves-effect">Lowest Category </a></li>
					</ul>
					<!---Category filter -->
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					<th style="text-align: center;">Image</th>
					<th>NAME</th>
					<th>PRODUCTS</th>
					<th>STATUS</th>
					<th style="text-align: center;">ACTION</th>
				</tr>
				<?php if(count($categories)):
					foreach($categories as $cate):
				 ?>
				<tr>
					<td>
						<center>
							<img src="<?= base_url().'uploads/category_image/'.$cate->image; ?>" class="responsive-img" id="category_image">
						</center>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $cate->category_name; ?><br>
						<a href="#!">View on Home</a>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500"><a href="#!">0 Products</a></td>
					<td style="font-size: 14px;color: grey;font-weight: 500"><?= ($cate->status == "0")? 'Active': 'InActive'; ?></td>
					<td>
						<center>
							<a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $cate->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $cate->id; ?>">
							<li><a href="<?= base_url('Admin/edit_category/'.$cate->id); ?>"><span class="fa fa-edit" style="color: blue;"></span>&nbsp;Edit</a></li>
							<li><a href="<?= base_url('Admin/delete_category/'.$cate->id); ?>" onclick="return confirm('Are you sure you want to  delete this category ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
							<?php if ($cate->status == "0"):  ?>
							<li><a href="<?= base_url('Admin/change_category_status/'.$cate->id.'/1'); ?>">
								<span class="fa  fa-eye-slash"></span>&nbsp;
							Inactive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_category_status/'.$cate->id.'/0'); ?>"><span class="fa fa-eye"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center; font-weight: 500;color: red;">Product's Categories Not Found</td>
				</tr>
			<?php endif; ?>
			</table>
		</div>
	</div>
</div>
<!---Manage Category Section -->

<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>