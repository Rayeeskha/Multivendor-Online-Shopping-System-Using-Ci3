<?php 
	if($product){
		count($product);
	}else{
		$this->session->set_flashdata('error', 'This product Id Not Found!..');
		return redirect('Admin/manage_products');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Products - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px; display: block;margin-bottom: 0px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block; border: 1px solid silver; outline: none;width: 40%;height: 40px;border-radius: 3px; box-shadow: none;}
		 textarea{border: 1px solid silver;outline: none;resize: none;padding: 10px;border-radius: 3px; height: 90px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 40%;margin-bottom: 15px;font-size: 14px;font-weight: 500; border-radius: 3px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Upload products Section Start --->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
				<h6 style="font-size: 16px; font-weight: 500">Edit Product's</h6>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/update_product/'.$product[0]->id); ?>
			<h6 style="font-size: 16px; font-weight: 500">Product Title</h6>
			<input type="text" name="product_title" id="input_box" value="<?= $product[0]->product_title; ?>" placeholder="Enter Product Title" required="">

			<h6 style="font-weight: 500">Image</h6>
			<img src="<?= base_url('uploads/product_image/'.$product[0]->image); ?>" style="width: 100px;height: 100px;border: 1px dashed silver;display: block;margin-bottom: 10px;">
			<input type="file" name="product_image" id="input_file" required="">
			<h6 style="font-size: 16px; font-weight: 500">Category</h6>
			<select name="category_id" required="">
				<option selected="" disabled="">Select Category</option>
				<?php if(count($categories)):
					foreach($categories as $cate):
				 ?>
				 <?php if($product[0]->category_id == $cate->id): ?>
					<option value="<?= $cate->id; ?>" selected><?= $cate->category_name; ?></option>
					<?php else: ?>
					<option value="<?= $cate->id; ?>" ><?= $cate->category_name; ?></option>
					<?php endif; ?>
				<?php endforeach;
				else: ?>
						<option value="">Categories Not Found's</option>
				<?php endif; ?>

			</select>
			
			<h6 style="font-size: 16px; font-weight: 500">Product Description</h6>
			<textarea name="short_desc" placeholder="Product's Description" style="width: 40%">
				<?= $product[0]->short_description; ?>
			</textarea>
			<h6 style="font-size: 16px; font-weight: 500">Color</h6>
			<input type="text" name="color" id="input_box" value="<?= $product[0]->color; ?>" placeholder="Enter Product Color" style="width: 40%">
			
			<h6 style="font-size: 16px; font-weight: 500">Product Price</h6>
			<input type="number" name="price" id="input_box" value="<?= $product[0]->price; ?>" placeholder="Rs.150" style="width: 40%" required="">
			

			<a href="<?= base_url('Admin/manage_products'); ?>" class="btn waves-effect waves-light" style="background: red;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Cancel</a>

			<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">Update Product's</button>

			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Upload products Section End --->



<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>