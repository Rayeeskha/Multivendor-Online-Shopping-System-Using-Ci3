<!DOCTYPE html>
<html>
<head>
	<title>Edit Category - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #order_dropdown,#income_dropdown,#product_dropdown,#customer_dropdown{width: 200px !important; padding-top: 8px;padding-bottom: 8px;}
		 #order_dropdown a,#income_dropdown a,#product_dropdown a,#customer_dropdown a{color: grey; font-size: 16px;font-weight: 500}
		 #top_sold_products li{border-bottom: 1px dashed silver;padding: 10px;}
		 #top_sold_products li:hover{background: rgba(0,0,0,0.1);}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 #category_image{width: 50px;height: 50px;border-radius: 100%;border: 1px  solid silver}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Category Section Start --->
<div class="row" style="margin-top: 10px;">
	<div class="col l5 m5 s12">
		<!---add category --->
		<?= form_open_multipart('Admin/update_category/'.$category[0]->id); ?>
		<div class="card">
			<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">Edit Category</h6>
			</div>
			<div class="card-content">
				<h6 style="font-size: 16px; font-weight: 500">Category Name</h6>
				<input type="text" name="category_name" id="input_box" placeholder="Enter Category Name" required="" title="Category Name" value="<?= $category[0]->category_name; ?>">

				<h6 style="font-weight: 500">Image</h6>
				<img src="<?= base_url('uploads/category_image/'.$category[0]->image); ?>" style="width: 100px;height: 100px;border: 1px solid silver;">
				<input type="file" name="category_image" id="input_file" placeholder="Upload Category File"title="Category Image">
				<small><span class="red-text" style="font-weight:500; font-size: 15px;">Max. Image Size : 2MB | 100px X 100px</span></small>

				<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;display: block; margin-top: 10px;text-transform: capitalize;">Update Category</button>
			</div>
		</div>
		<!---add category --->
		<?= form_close(); ?>
	</div>
	<div class="col l7 m7 s12">
		<!---recent category ---->
		<div class="card">
			<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">Recent Upload Category <span class="red-text">(Last 7 Days)</span></h6>
			</div>
			<div class="card-content" style="padding: 0px;">
				<table>
					<tr>
						<th class="center-align">Image</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
					<?php if (count($categories)):
						foreach($categories as $cate):
					?>
					<tr>
						<td>
							<center>
								<img src="<?= base_url().'uploads/category_image/'.$cate->image; ?>"class="responsive-img" id="category_image">
							</center>
						</td>
						<td style="font-size: 15px;font-weight: 500"><?= $cate->category_name; ?></td>
						<td>
							<a href="<?= base_url('Admin/edit_category/'.$cate->id); ?>"><span class="fa fa-edit" style="color: blue;"></span></a> - <a href="<?= base_url('Admin/delete_category/'.$cate->id); ?>" onclick="return confirm('Are you sure you want to  delete this category ?..');"><span class="fa fa-trash" style="color: red"></span></a>
						</td>
					</tr>
				<?php endforeach;
					else:
					endif;
				 ?>
				</table>
			</div>
		</div>
		<!---recent category ---->
	</div>
</div>
<!---Category Section End --->



<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>