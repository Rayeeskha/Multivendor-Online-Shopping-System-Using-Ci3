<!DOCTYPE html>
<html>
<head>
	<title>About - My Shop</title>
	<!----Materialize CSS File include --->
	<?= link_tag('assets/materialize/css/materialize.css'); ?>
	<!---FontAwesome CSS FILE INCLUDE ---->
	<?= link_tag('assets/fontawesome/css/all.css'); ?>
</head>
<body>
	<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->
	<!---Body Section Start --->
	<!---Image Slider Section Start --->
	
	  <div class="carousel carousel-slider center">
	    
	    <div class="carousel-item red white-text" href="#one!">
	    	<a href="<?= base_url('index'); ?>" style="color: white;">Shop Now</a>
	    	
	        <img src="<?= base_url('assets/images/on2.jpg'); ?>" style="width: 100%;height: 100%;" class="responsive-img">

	    </div>
	    <div class="carousel-item amber white-text" href="#two!">
	      	<a href="<?= base_url('index'); ?>" style="color: white;">Shop Now</a>
	        <img src="<?= base_url('assets/images/on3.jpg'); ?>" style="width: 100%;" class="responsive-img">
	    </div>
	    <div class="carousel-item green white-text" href="#three!">
	      <a href="<?= base_url('index'); ?>" style="color: white;">Shop Now</a>
	        <img src="<?= base_url('assets/images/on4.jpg'); ?>" style="width: 100%;" class="responsive-img">
	    </div>
	    <div class="carousel-item blue white-text" href="#four!">
	      <a href="<?= base_url('index'); ?>" style="color: white;">Shop Now</a>
	        <img src="<?= base_url('assets/images/online.png'); ?>" style="width: 100%;" class="responsive-img">
	    </div>
	  </div>
  	<!---Image Slider Section End --->
	<!---Body Section Start --->
	<div class="card">
			<div class="card-content">
				<h6 style="padding-left: 15px;font-size: 22px;font-weight: 500; text-align: center;">A Decade Of Disruption</h6>
			</div>
		</div>
	<div class="row">
		
		<div class="col l4 m4 s12">
			 <div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/hl2.jpg'); ?>" style="width: 100%;height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Ladies Footwear<i class="material-icons right"></i></span>
			      <p><a href="#">Ladies Footwear Products</a></p>
			    </div>
			    
			</div>
		</div>
		<div class="col l4 m4 s12">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/hl3.jpg'); ?>" style="width: 100%; height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Ladies Footwear<i class="material-icons right"></i></span>
			      <p><a href="#">Ladies Footwear Products</a></p>
			    </div>
			    
			</div>
		</div>
		<div class="col l4 m4 s12">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/s2.jpg'); ?>" style="width: 100%;height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Ladies Footwear<i class="material-icons right"></i></span>
			      <p><a href="#">Ladies Footwear Products</a></p>
			    </div>
			    
			</div>
		</div>
	</div>

		<div class="card">
			<div class="card-content">
				<h6 style="padding-left: 15px;font-size: 22px;font-weight: 500; text-align: center;">Our Milestones</h6>
			</div>
		</div>
	<div class="row">
		
		<div class="col l4 m4 s12">
			 <div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/br - Copy.jpg'); ?>" style="width: 100%;height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Milestones<i class="material-icons right"></i></span>
			      <p><a href="#">Milestones Products</a></p>
			    </div>
			    
			</div>
		</div>
		<div class="col l4 m4 s12">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/br2 - Copy.jpg'); ?>" style="width: 100%;height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Milestones<i class="material-icons right"></i></span>
			      <p><a href="#">Milestones Products</a></p>
			    </div>
			    
			</div>
		</div>
		<div class="col l4 m4 s12">
			<div class="card">
			    <div class="card-image waves-effect waves-block waves-light">
			      <img src="<?= base_url('assets/images/eye.jpg'); ?>" style="width: 100%;height: 300px;" class="responsive-img">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">Milestones<i class="material-icons right"></i></span>
			      <p><a href="#">Milestones Products</a></p>
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
<script type="text/javascript">
	$(document).ready(function(){
    $('.carousel.carousel-slider').carousel({
	    fullWidth: true,
	    indicators: true
	  });  });
</script>