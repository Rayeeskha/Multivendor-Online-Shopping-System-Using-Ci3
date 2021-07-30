<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
	<!------Css File Include ----->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!------Css File Include ----->
	<style type="text/css">
			 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 #category_image{width: 50px;height: 50px;border-radius: 100%;border: 1px  solid silver}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Category Section Start --->	
<!------Body Section Start  ----->
<div class="row" style="margin-top: 10px;">
	<div class="col l5 m5 s12">
		<!---add category --->
		<?= form_open_multipart('Admin/upload_category'); ?>
		<div class="card">
			<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">Add Category</h6>
			</div>
			<div class="card-content">
				<?php if(isset($success)): ?>
				<div class="card" style="background-color: black">
				    <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: green;color: white;font-weight: 500">
				            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= $success; ?>
				    </div>
				</div>
				
			<?php endif; ?>
			<?php if(isset($error)): ?>
				<div class="card" style="background-color: black">
				    <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
				            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= $error; ?>
				    </div>
				</div>
			<?php endif; ?>
				<h6 style="font-size: 16px; font-weight: 500">Category Name</h6>
				<input type="text" name="category_name" id="input_box" value="<?= set_value('category_name'); ?>" placeholder="Enter Category Name" title="Category Name">
				<h6><span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('category_name'); ?></span></h6>

				<h6 style="font-weight: 500">Image</h6>
				<input type="file" name="category_image" id="input_file" placeholder="Upload Category File" title="Category Image">
				<h6><span style="color: red;font-weight: 500;font-size: 14px;"><?=  form_error('category_image'); ?></span></h6>
				<small><span class="red-text" style="font-weight:500; font-size: 15px;">Max. Image Size : 2MB | 100px X 100px</span></small>

				<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;display: block; margin-top: 10px;text-transform: capitalize;">Save Category</button>
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
					<?php if ($categories):
						count($categories);
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
<!------Body Section Start  ----->



<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>