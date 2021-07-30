<!DOCTYPE html>
<html>
<head>
	<title>View Users Review</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
	</style>
</head>
<body>
<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<div class="container">
	<div class="row">
		<div class="card">
			<div class="card-content" style="border-bottom: 1px solid silver; padding: 10px;">
			   <h6 style="font-size: 18px; font-weight: 500;color: green">
				<span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;Product Review Rating</h6>
			</div>

			<div class="row">
				<div class="col l4 m4 s4">
					<div  class="card-content">
						<h6 style="color: orange;font-weight: 500;">Product Image</h6>
						<?php if(count($product)):
							foreach($product as $pro):
						 ?>
						<div class="card-image">
							<img src="<?= base_url(). 'uploads/product_image/' .$pro->image; ?>" class="responsive-img" style="width: 100%;height: 200px;">
						</div>
					</div>
				</div>
				<div class="col l4 m4 s4">
					<?php 
						$review_products = get_review_product_details($pro->id);

						if(count($review_products) == null):

						// if($review_products == null):
					 ?>
						<div class="card-content">
							<h6 style="color: red;font-weight: 500;">
								<span class="fa fa-compass"></span>&nbsp;No  Review Products</h6>
							<h6 style="color: red;font-weight: 500;">
							&#9733; <span style="color: red;font-size: 12px;">&nbsp; 0.1</span><br>
							&#9733;&#9733; <span style="color: red;font-size: 12px;">0.2</span><br>
							&#9733;&#9733;&#9733; <span style="color: red;font-size: 12px;">0.3</span><br>
							&#9733;&#9733;&#9733;&#9733; <span style="color: red;font-size: 12px;">0.4</span><br>
							&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: red;font-size: 12px;">0.5</span><br>
						  </h6>
						  <h6 style="color: green;font-weight: 500;">You Can buy that Product's It is Very Good Products ! <br> <span class="fa fa-thumbs-up"></span>&nbsp;Thanks !</h6>

						</div>

					<?php else: ?>
						<?php foreach($review_products as $rev_pro): ?>
						<div class="card-content">
							<h6 style="color: orange;font-weight: 500">Product Rating</h6>
						<?php if($rev_pro->rating == '5'): ?>
							<h6 style="color: green;font-weight: 500;">
								&#9733; <br>
								&#9733;&#9733; <br>
								&#9733;&#9733;&#9733; <br>
								&#9733;&#9733;&#9733;&#9733; <br>
								&#9733;&#9733;&#9733;&#9733;&#9733;<br>

								<h6 style="color: green;font-weight: 500;font-size: 16px;">Based on : 0.5</h6>
							  </h6>
							<?php elseif($rev_pro->rating == '4'): ?>
								<h6 style="color: green;font-weight: 500;">
								&#9733; <br>
								&#9733;&#9733; <br>
								&#9733;&#9733;&#9733; <br>
								&#9733;&#9733;&#9733;&#9733; <br>
								<h6 style="color: green;font-weight: 500;font-size: 16px;">Based on : 0.4</h6>
							</h6>
							<?php elseif($rev_pro->rating == '3'): ?>
								<h6 style="color: green;font-weight: 500;">
								&#9733; <br>
								&#9733;&#9733; <br>
								&#9733;&#9733;&#9733; <br>
								<h6 style="color: green;font-weight: 500;font-size: 16px;">Based on : 0.3</h6>
							</h6>
							<?php elseif($rev_pro->rating == '2'): ?>
							<h6 style="color: green;font-weight: 500;">
								&#9733; <br>
								&#9733;&#9733; <br>
								<h6 style="color: green;font-weight: 500;font-size: 16px;">Based on : 0.2</h6>
							</h6>
							<?php elseif($rev_pro->rating == '1'): ?>
							<h6 style="color: green;font-weight: 500;">
								&#9733; <br>
								
								<h6 style="color: green;font-weight: 500;font-size: 16px;">Based on : 0.1</h6>
							</h6>
						<?php endif; ?>
						
						</div>
					</div>
					<div class="col l4 m4 s4">
						<div class="card-content">
							<h6 style="color: orange;font-weight: 500;font-size: 16px;">Feedback</h6>
						<h6 style="color: green;font-weight: 500;"><?= $rev_pro->feedback;  ?></h6>
						</div>
						
					</div>
				</div>
				
			<div class="row">
				<div class="col l6 m6 s6">
					<div class="card-content">
						<h6 style="color: orange;font-weight: 500">
							<span class="fa fa-compass"></span>&nbsp;Review Product Image</h6>
						<div class="card-image">
							<img src="<?= base_url(). 'uploads/review_image/' .$rev_pro->image; ?>" class="responsive-img" style="width: 100%;height: 300px;">
						</div>
					</div>
				</div>
				<div class="col l6 m6 s6">
					<h6 style="color: orange;font-weight: 500">
						<span class="fa fa-compass"></span>&nbsp;Rated Customer's

						<?php 
							$user_data = get_users_details_by_user_id('ms_users',$rev_pro->user_id);
							if(count($user_data) == null):

						?>

							<h6 style="color: red;font-weight: 500">No Users Rated That Product's</h6>

						<?php else: ?>
							<?php foreach($user_data as $user_name): ?>
								<h6 style="color: green;font-weight: 500">
									<span class="fa fa-users"></span>&nbsp;<?= $user_name->fullname; ?> <br>
									
								</h6>
								<h6 style="color: green;font-weight: 500">
									<span class="fa fa-map-marker"></span> &nbsp;
									<?= $user_name->address; ?>
								</h6>

							<?php endforeach; ?>

						<?php endif; ?>

					</h6>
				</div>
			</div>		
					

			<?php endforeach; ?>
			<?php endif; ?>
				
			</div>
			
			


			<?php endforeach;
			else: ?>
			<?php endif; ?>
			</div>


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