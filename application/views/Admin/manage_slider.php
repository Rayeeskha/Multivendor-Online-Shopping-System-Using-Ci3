<!DOCTYPE html>
<html>
<head>
	<title>Manage Slider - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px; display: block;margin-bottom: 0px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 
		 textarea{border: 1px solid silver;outline: none;resize: none;padding: 10px;border-radius: 3px; height: 90px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 40%;margin-bottom: 15px;font-size: 14px;font-weight: 500; border-radius: 3px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Admin/topbar'); ?>
<!---Upload products Section Start --->
<!---Main Section Start --->
<!---Php Meassge Show --->

<div style="margin-left: 15px; margin-right: 15px;margin-top: 10px">
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


<div class="container" style="margin-top: 15px;">

	<?= form_open_multipart("Admin/Publish_Slider_Image"); ?>
	<div class="row">
		<div class="col l7 m7 s12">
			<div class="card">
				<div class="card-content">
					<h5 style="color: grey; font-weight: bolder; margin-bottom: 25px; margin-top: 5px;"><span class="fa fa-certificate"></span> &nbsp;Post New Slide </h5>
					<h6 style="color: grey;">Select Image Slide</h6>
					<input type="file" name="Slide" id="Slide" required="">
					<h6 style="color: grey;">Image Slider Link</h6>
					<textarea name="slide_link" id="slide_link" placeholder="Paste Your Link/ URL">
						
					</textarea>
					<button type="submit" class="btn waves-effect waves-light" style="background: #13124e; margin-top: 5px;">Publish Slide</button>

					<?= form_close(); ?>
				</div>
			</div>

		</div>
		<div class="col l5 m5 s12">
			
			<div class="card">
				<div class="card-content">
					<h6 style="color: grey; font-weight: bolder; margin-bottom: 20px;">Upload Image Guideline</h6>
					<h6 style="color: grey; margin-bottom: 25px;"><span class="fa fa-image" style="color: orange"></span>&nbsp;File Types <span class="right" style="color: red">JPG-PNG-JPEG</span></h6>
					<h6 style="color: grey; margin-bottom: 25px;"><span class="fa fa-text-width" style="color: orange"></span>&nbsp;Image Size<span class="right" style="color: red">500px(W) X 250px(H)</span></h6>
					<h6 style="color: grey;"><span class="fa fa-link" style="color: orange"></span>&nbsp;Image Link<span class="right" style="color: red">with http/https://</span></h6>
				</div>
			</div>
		</div>
	</div>
</div>

<!---Main Section End --->



<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>