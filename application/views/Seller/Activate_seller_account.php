<!DOCTYPE html>
<html>
<head>
	<title>Activate Account</title>
	<!------Css File Include ----->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!------Css File Include ----->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
	<div class="container">
		<div class="card" style="background: black;margin-top: 5%;">
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div style="margin-left: 20px;margin-right: 10px">
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
	</div>
		<div class="card">
			<div class="card-content">
				<center>
					<a href="<?= base_url('Seller/index'); ?>" class="btn btn-waves-effect waves-light" style="background: #005a87;text-transform: capitalize;font-weight: 500;border-radius: 5px;"><span class="fa  fa-key"></span>&nbsp;Login Account</a>
				</center>
			</div>
		</div>
	</div>


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
</body>
</html>