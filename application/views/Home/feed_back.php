<!DOCTYPE html>
<html>
<head>
	<title>Product Feedback</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#select_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;width: 50%}
		select{display: block;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500;width: 50%}
	</style>
</head>
<body>
<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->
<div class="container">

<!---Php Meassge Show --->

			<div class="container-fluid" style="margin-top: 10px;">
				<?php if($msg = $this->session->flashdata('success')): ?>
			<div class="card">
				<div class="card-content" style="padding: 10px;padding-left:15px; ">
					<h6 style="font-size: 15px;font-weight: 500;margin-top: 5px;"><span class="fa fa-check-circle" style="color: green;"></span>&nbsp; <span style="color: green"><?= $msg; ?></span></h6>
				</div>
			</div>
			<?php endif; ?>

			<?php if($msg = $this->session->flashdata('error')): ?>
			<!---Error message --->
			<div class="card">
				<div class="card-content" style="padding: 10px;padding-left:15px; ">
					<h6 style="font-size: 15px;font-weight: 500;margin-top: 5px;"><span class="fa fa-exclamation-triangle" style="color: red;"></span>&nbsp;<span style="color: red"><?= $msg; ?></span></h6>
				</div>
			</div>
			<?php endif; ?>
			</div>
			<!---Error message --->
			<!---Php Meassge Show --->


	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
			<h6 style="font-size: 18px; font-weight: 500;color: green">
				<span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;Product Feedback</h6>
		</div>
		<div class="card-content">
			<?php if(count($products_feedback)):
				foreach($products_feedback as $pro):
			 ?>
			<div class="card-image">
				
				<img src="<?= base_url(). 'uploads/product_image/' .$pro->image; ?>" class="responsive-img" style="width: 100%;height: 200px;">
			</div>

		<?php endforeach;
		else: ?>
		<?php endif; ?>
		</div>

	<?= form_open_multipart('Home/upload_product_review/'.$pro->id); ?>
		<div class="card-content">
			<h6 style="font-size: 18px; font-weight: 500;color: green"><span class="fa fa-star" style="color: #ff3d00"></span>&nbsp;Product Rating</h6>
			<select name="star_rating" id="select_box">
				<option value="1">&#9733;</option>
                <option value="2">&#9733;&#9733;</option>
                <option value="3">&#9733;&#9733;&#9733;</option>
                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
			</select>

			<h6 style="font-size: 18px; font-weight: 500;color: green"><span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Product Review Image</h6>
			<input type="file" name="product_rev_image" id="input_file">

			<h6 style="font-size: 18px; font-weight: 500;color: green"><span class="fa fa-comment" style="color: #ff3d00"></span>&nbsp;Leave Yor Review</h6>
			<textarea name="review_message" placeholder="Product Review"></textarea>

			<button type="submit" class="btn waves-effect waves-light" style="background: green; text-transform: capitalize;font-weight: 500;font-size: 15px; margin-top: 10px;">
		        <span class="fa fa-reply-all" style="color: white"></span>&nbsp;Feed Back</button>
	<?= form_close(); ?>

		</div>
	</div>
</div>


<!---Footer File Include --->
<?php $this->load->View('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->	

</body>
</html>