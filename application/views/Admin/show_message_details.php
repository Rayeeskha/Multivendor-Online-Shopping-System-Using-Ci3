<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Customer Message  - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		select{display: block;border: 1px solid silver;height: 40px;margin-bottom: 10px;box-shadow: none;outline: none;width: 40%}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}


	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Order Details Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="padding: 5px;">
			<h5 style="font-weight: 500;margin-top: 5px; padding: 5px; font-size: 20px; color: green"><span class="fa fa-comments" style="color: #ff3d00"></span>&nbsp;Customer Query Message</h5>
		</div>
	</div>
	<div class="card" style="overflow-x:auto;">
		<div class="card-content" >
			<table class="table responsive">
				<thead>
					<tr>
						<th style="text-align: center;">ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Number</th>
						<th>(Message)</th>
					</tr>
				</thead>
				<?php if(count($customer_message)):
					foreach($customer_message as $c_message):
				 ?>
				<tr>
					<td style="text-align: center;">
						<h6 style="color: grey;font-weight: 500; font-size: 16px;">#<?= $c_message->user_id; ?></h6>
					</td>
					<td >
						<h6 style="color: grey;font-weight: 500; font-size: 16px;"><?= $c_message->full_name; ?></h6>
					</td>
					<td >
						<h6 style="color: grey;font-weight: 500; font-size: 16px;">
							<a href="mailto:<?= $c_message->email; ?>"><?= $c_message->email; ?></a>
							</h6>
					</td>
					<td >
						<h6 style="color: grey;font-weight: 500; font-size: 16px;">
							<a href="tel:<?= $c_message->mobile; ?>"><?= $c_message->mobile; ?></a>
						</h6>
					</td>
					<td>
						<p style="color: grey;font-weight: 500; font-size: 12px;">
							<?= $c_message->message; ?>
						</p>
					</td>

				</tr>


			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center;font-size: 15px;color: red;font-weight: 500">Customer Message Not Found</td>
				</tr>
			<?php  endif; ?>
			</table>
		</div>
	</div>

	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;border-bottom: 1px solid silver;">
			
			<?= form_open('Admin/Replay_message/' .$user_details[0]->id); ?>
				<h6 style="font-size: 16px;font-weight: 500;color: grey;">
					<span class="fa fa-comment" style="color: #ff3d00"></span>
				Replay Customer Message</h6>

				<h6 style="font-size: 14px;color: grey;font-weight: 500"><span class="fa fa-reply-all" style="color: green"></span>&nbsp;Message</h6>
        		<textarea name="message" placeholder="Support Issue Message"></textarea>


        		<button type="submit" class="btn waves-effect waves-light" style="background: green; text-transform: capitalize;font-weight: 500;font-size: 15px; margin-top: 10px;">
        			<span class="fa fa-reply-all" style="color: white"></span>&nbsp;Send Message</button>

			<?= form_close(); ?>
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