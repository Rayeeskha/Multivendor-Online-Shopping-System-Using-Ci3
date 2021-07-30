<!DOCTYPE html>
<html>
<head>
	<title>Upload Products - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px; display: block;margin-bottom: 0px;width: 100%}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500;border-radius:3px}
		 select{display: block; border: 1px solid silver; outline: none;width: 100%;height: 40px;border-radius: 3px; box-shadow: none;}
		 textarea{border: 1px solid silver;outline: none;resize: none;padding: 10px;border-radius: 3px; height: 90px;}
		</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Admin/topbar'); ?>
<!---Upload products Section Start --->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">Upload New Product's</h6>
		</div>
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

		<div class="card-content">
			<?= form_open_multipart('Admin/upload_products'); ?>
			<h6 style="font-size: 16px; font-weight: 500">Select Category</h6>
			<select name="category_id" value="<?= set_value('category_id'); ?>">
				<option selected="" disabled="">Select Category</option>
				<?php if($categories):
					count($categories);
					foreach($categories as $cate):
				 ?>
					<option value="<?= $cate->id; ?>" ><?= $cate->category_name; ?></option>

				<?php endforeach;
				else: ?>
						<option value="">Categories Not Found's</option>
				<?php endif; ?>

			</select>
			<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('category_id'); ?></span></h6>
			<h6 style="font-size: 16px; font-weight: 500">Product Title</h6>
			<input type="text" name="product_title" id="input_box" value="<?= set_value('product_title'); ?>" placeholder="Enter Product Title">
			<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('product_title'); ?></span></h6>
			<h6 style="font-size: 16px; font-weight: 500">Product Image</h6>
			<input type="file" name="product_image[]" multiple="multiple" id="input_file">
			<span style="color: red;font-size: 12px;font-weight: 500">Notes: Please Choose Four Image & Upload Image Only Jpg|Png|Jpeg File Extension</span>
			<div class="row">
				<div class="col l6 m12 s12">
					<h6 style="font-size: 16px; font-weight: 500">Color</h6>
					<input type="text" name="color" value="<?= set_value('color'); ?>" id="input_box" placeholder="Enter Product Color" >
					<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('color'); ?></span></h6>
				</div>
				<div class="col l6 m12 s12">
					<h6 style="font-size: 16px; font-weight: 500">Stock keeping unit <span style="color: red">SKU</span></h6>
					<input type="text" name="sku" value="<?= set_value('sku'); ?>"  id="input_box" placeholder="Enter Stock keeping unit Code" >
					<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('sku'); ?></span></h6>
				</div>
			</div>
			<h6 style="font-size: 16px; font-weight: 500">Product Price</h6>
			<input type="number" name="price" value="<?= set_value('price'); ?>" id="input_box" placeholder="Rs.150">
			<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('price'); ?></span></h6>
			
			<h6 style="font-size: 16px; font-weight: 500">Product Description</h6>
			<textarea name="short_desc" value="<?= set_value('short_desc'); ?>" placeholder="Product's Description"></textarea>
			<h6><span style="color: red;font-weight: 500;font-size: 13px;"><?=  form_error('short_desc'); ?></span></h6>
			<button type="reset" class="btn waves-effect waves-light" style="background: red;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Reset</button>

			<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Save Product's</button>

			<?= form_close(); ?>
		</div>
	</div>
</div>



<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->


</body>
</html>