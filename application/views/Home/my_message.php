
<!DOCTYPE html>
<html>
<head>
	<title>My Technical Support Message - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#quantity_form{display: flex;}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#quantity_form li{margin: 2px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}

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
		<div class="card-content" style="margin-top: 0px;padding: 5px;">
			<h4 style="padding-left: 10px; margin-top: 5px; font-size: 25px; font-weight: bold; color: grey; margin-bottom: 5px;">
				<span class="fa fa-comments" style="color: #ff3d00"></span>&nbsp;
				My Supported Message (<?= count($message); ?>)
			</h4>
		</div>
	</div>
	<?php if(count($message)):
		foreach($message as $msg):
	 ?>
		<div class="card">
			<div class="card-content" style="margin-top: 0px;padding: 5px;">
				<div class="col l4 m4 s12">
					
				</div>
				<div class="col l4 m4 s12" style="border: 1px solid silver">
					<h6 style="color: green;font-weight: 500;font-size: 16px; padding-left: 10px;">
						<span class="fa fa-reply-all" style="color: green"></span>&nbsp;Technical Support Replay Message
					</h6>
					<h6 style="color: grey;font-weight: 500;font-size: 16px; padding-left: 10px;">
					<span class="fa fa-comment" style="color: #ff3d00"></span>&nbsp;
					<span class="fa fa-check-circle" style="color: green;"></span>&nbsp;<?= $msg->replay_message; ?></h6></div>
				
			</div>
		</div>
		<div class="card">
			<div class="card-content" style="margin-top: 0px;padding: 5px;">
				<div class="col l4 m4 s12" style="border-bottom: 1px solid silver;">
					<h6 style="color: green;font-weight: 500;font-size: 16px; padding-left: 10px;">
						<span class="fa fa-share" style="color: green"></span>&nbsp;Your Message
						</h6>
				</div>
				<div class="col l4 m4 s12"></div>
				
		
					<?php $this->load->helper('message');
						$message_items = get_customer_message('ms_contact_us', $msg->user_id);
					?>


					<?php if(count($message_items)):
						foreach($message_items as $msg_item):

							//Get Image Using Helper Function According to product id
								$product_detail = get_message_detail($msg_item->user_id);
								//Get Image Using Helper Function According to product id
					 ?>
					
					 <div class="col l4 m4 s12" style="padding-left: 10px;">	
					<h6 style="color: grey;font-weight: 500;font-size: 16px; padding-left: 10px;">
						<span class="fa fa-comment" style="color: #ff3d00"></span>&nbsp;
						
						<?= $msg_item->message;?>
					</h6>

					 <ul class="collapsible">
					    <li>
					      <div class="collapsible-header"><i class="material-icons"></i>

					    <?= form_open('Home/send_replay_message/' .$msg_item->user_id); ?>  	
					      	<a href="#!" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize;padding-left: 5px; padding-right: 5px;">
					 	<span class="fa fa-share" style="color: white"></span> Send Message</a>
					      </div>
					      <div class="collapsible-body"><span></span>
					      	<h6 style="font-size: 16px;font-weight: 500;color: grey;">
								<span class="fa fa-comment" style="color: #ff3d00"></span>
								Type Your Message
							</h6>

						<h6 style="font-size: 14px;color: grey;font-weight: 500"><span class="fa fa-reply-all" style="color: green"></span>&nbsp;Message</h6>
		        		<textarea name="message" placeholder="Type Your Technical Issue"></textarea>


		        		<button type="submit" class="btn waves-effect waves-light" style="background: green; text-transform: capitalize;font-weight: 500;font-size: 15px; margin-top: 10px;">
		        			<span class="fa fa-reply-all" style="color: white"></span>&nbsp;Send Message</button>
					      </div>
					    </li>
					</ul>
				<?= form_close(); ?>	 	
					 	
					</div>

					
					<?php endforeach;
					else: ?>
						<h6 style="text-align: center;font-size: 20px;color: red;font-weight: 500">Message Not Found</h6>
					<?php endif; ?>
				
				<div class="col l4 m4 s12"></div>
				
			</div>
		</div>
	<?php endforeach;
	else: ?>
		<div class="card">
			<div class="card-content" style="padding-top: 10px;">
				<h6 style="text-align: center; font-weight: 500;font-size: 20px;color: red;">
					<span class="fa fa-share" style="color: green;"></span>&nbsp;
				You have not Entered any Query</h6>
			</div>
		</div>
		<div class="card">
			<div class="card-content">
				<h6 style="text-align: center; font-weight: 500;font-size: 20px;color: green; ">
				<span class="fa fa-check-circle" style="color: green;"></span>&nbsp;Technical Solution</h6>
				<a href="<?= base_url("Home/support"); ?>" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize; width: 100%">
					<span class="fa fa-share" style="color: white"></span> Send Message</a>	
				</div>
			</div>
		</div>
		
	<?php endif; ?>
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
