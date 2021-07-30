<style type="text/css">
	#topbar{background: #ff3d00; padding: 12px;}
	#search_bar{background: #13124e;}
	#search_bar #logo{font-size: 30px; font-weight: bold;color: white;}
	#search_form{display: flex;}
	#search_form li:first-child{width: 550px;}
	#search{background: white;padding-left: 10px; padding-right: 10px; box-shadow: none; box-sizing: border-box;height: 38px; border-bottom: none; margin-bottom: 0px;}
	#my_account_dropdown li a{color: grey;font-size: 14px;}
	nav{background:black;height: 40px;line-height: 40px; box-shadow: none;}
	#my_account_dropdown{width: 12% !important; padding-top: 10px; padding-bottom: 10px;}

	#show_product_list{background: white;margin-top: 0px; position: absolute; z-index: 99;width: 550px;display: none;}
	#show_product_list a{display: block;font-size: 14px;color: grey;font-weight: bold;padding-left: 15px;line-height: 35px; }
	#show_product_list a:hover{background: rgba(0,0,0,0.05);}

	.collapsible-header{padding-left:30px !important; font-size: 14px;font-weight: 500;color: black }
    .collapsible-header:hover{background: pink !important; }
     #side_menu li a:hover{background: pink !important; }
     #side_menu{background: rgb(224, 227, 231)}
     #side_menu .collapsible-body{background:black;}
     #side_menu .collapsible-body li a{color: white}
     #side_menu .collapsible-body li a:hover{background: red !important} 

</style>

<!---Top Bar Section Start --->

<div id="topbar" class="hide-on-med-and-down">
		<h6 style="color: white;font-size: 14px;margin-top: 5px;padding-left: 15px; font-weight: 500;"><span class="fa fa-mobile"></span><a href="tel:9554540272" style="color: white;">+91 - 9554540271</a> &nbsp; <span class="fa fa-envelope"></span>&nbsp;<a href="mailto:rayeesinfotech@gmail.com" style="color: white;">rayeesinfotech@gmail.com</a>
			<span class="right" style="padding-right: 15px;"><a href="#!" class="dropdown-trigger" data-target="my_account_dropdown" style="color: white"><span class="fa fa-user"></span>&nbsp;My Account</a></span>
		</h6>
		<!----My Account Section Start --->
		<ul class="dropdown-content " id="my_account_dropdown">
			<?php if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""): ?>
			<li>
				<a href="<?= base_url('Home/user_signup'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-user" style="color: #ff3d00"></span>&nbsp;Register</a>
			</li>
			<li>
				<a href="<?= base_url('Home/user_signin'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-user" style="color: #ff3d00"></span>&nbsp;Login</a>
			</li>
			<?php else: ?>
				
				<li>
					<a href="<?= base_url('Home/user_dashboard'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-home" style="color: #ff3d00"></span>&nbsp;Dashboard</a>
				</li>
				<li>
					<a href="<?= base_url('Home/carts'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;My Carts</a>
				</li>
				<li>
					<a href="<?= base_url('Home/my_orders'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-truck" style="color: #ff3d00"></span>&nbsp;My Order's</a>
				</li>
				<li>
					<a href="<?= base_url('Home/manage_online_pay_purchase'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;Online Purchase Products</a>
				</li>
				<li>
					<a href="<?= base_url('Home/my_message'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-comments" style="color: #ff3d00"></span>&nbsp;Messaging</span></a>
				</li>
				<li>
					<a href="<?= base_url('Home/logout'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-sign-out-alt" style="color: #ff3d00"></span>&nbsp;Logout</a>
				</li>
			<?php endif; ?>
		</ul>
		<!----My Account Section End --->
	</div>

<div id="topbar" class="hide-on-med-and-up">
	<a href="#" data-target="side_menu" class="sidenav-trigger" style="color: white;font-weight: 500;margin-left: 25px;"><span class="fa fa-bars" style="color: white"></span>&nbsp;Menu</a>	
</div>

<!---Side menu Section Start --->
<ul class="sidenav collapsible" id="side_menu" >
     <li><a href="<?= base_url('Home/index'); ?>">Home</a></li>
     <?php if($this->session->userdata('email') == "" && $this->session->userdata('password') == ""): ?>
    <li>
        <div class="collapsible-header">Register Account</div>
        <div class="collapsible-body">
            <ul>
              <li>
					<a href="<?= base_url('Home/user_signup'); ?>" class="waves-effect"><span class="fa fa-user" style="color: #ff3d00"></span>&nbsp;Register</a>
				</li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Login Account</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/user_signin'); ?>" class="waves-effect"><span class="fa fa-user" style="color: #ff3d00"></span>&nbsp;Login</a>
				</li>
            </ul>
        </div>
    </li>
     
    <?php else: ?>
     <li>
        <div class="collapsible-header">Dashboard</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/user_dashboard'); ?>" class="waves-effect"><span class="fa fa-home" style="color: #ff3d00"></span>&nbsp;Dashboard</a>
				</li> 
            </ul>
        </div>
    </li>
 	<li>
        <div class="collapsible-header">My Carts</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/carts'); ?>" class="waves-effect"><span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;My Carts</a>
				</li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">My Orders</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/my_orders'); ?>" class="waves-effect"><span class="fa fa-truck" style="color: #ff3d00"></span>&nbsp;My Order's</a>
				</li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Online Purchase Products</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/manage_online_pay_purchase'); ?>" class="waves-effect" style="border-bottom: 1px solid silver"><span class="fa fa-shopping-cart" style="color: #ff3d00"></span>&nbsp;Online Purchase Products</a>
				</li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Message Helpdisk</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/my_message'); ?>" class="waves-effect"><span class="fa fa-comments" style="color: #ff3d00"></span>&nbsp;Messaging</span></a>
				</li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Logout</div>
        <div class="collapsible-body">
            <ul>
                <li>
					<a href="<?= base_url('Home/logout'); ?>" class="waves-effect"><span class="fa fa-sign-out-alt" style="color: #ff3d00"></span>&nbsp;Logout</a>
				</li>
			</ul>
        </div>
    </li>
    
    <?php endif; ?>
</ul>






	<!---Top Bar Section End --->
	<!---Search Bar Section Start --->
	<div id="search_bar">
	<div class="row" style="margin-bottom: 0px;">
		<div class="col l3 m3 s12">
			<h6 style="margin-top: 5px;">
				 <a href="<?= base_url("Home/index"); ?>" id="logo" class="brand-logo left">&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/images/dh.png') ?>" class="img-responsive" style="width: 200px;height: 50px;" ></a> 
				<!-- <a href="<?= base_url('index') ?>" class="brand-logo left" id="logo">My Shop</a> -->
			</h6>
		</div>
		<div class="col l6 m6 s12">
			<!---Search Produnct form Section Start ---->
			<ul id="search_form"> 
				<li>
					<input type="text" name="search" onkeyup="search_products(this.value)" id="search" placeholder="Search Your Products & Brands" autocomplete="off">

					<div id="show_product_list">
						<a href="">Product name</a>
						<a href="">Product name</a>
						<a href="">Product name</a>
						<a href="">Product name</a>
					</div>
				</li>

				
			 <!--  <li>
					<button type="submit" class="btn waves-effect waves-ligh" style="box-shadow: none;background: #ff3d00; text-transform: capitalize; height: 38px;font-weight: 500">Search Now</button>
				</li>  -->
			</ul>
			
		</div>

			<!---Search Produnct form Section End ---->
		
		<div class="col l3 m3 s12">
			<h6 style="font-size: 14px;color: white;text-align: center;line-height: 18px; font-weight: 500;margin-top: 15px;"><a href="<?= base_url('Home/carts'); ?>" style="color: white;" target="_blank"><span class="fa fa-shopping-cart"></span>&nbsp;Shopping Cart <br/>
				<span id="total_products">0 </span>&nbsp;Items - <span class="fa fa-rupee-sign">&nbsp;
				<span id="total_amount">0</span>
				</span></a>
			</h6>
		</div>
	</div>
</div>
	<!---Search Bar Section End --->
	<!---Menu Bar Section Start --->
	<nav>
		<div class="nav-wrapper">
			<!---Left side menu --->
			<ul class="left">
				<li>
					<a href="<?= base_url('Home/index'); ?>">Home</a>
				</li>
				<li>
					<a href="<?= base_url('Home/Aboutus'); ?>" target="_blank">Company Profile</a>
				</li>
				<li>
					<a href="#!">Our Policies</a>
				</li>
				<li>
					<a href="<?= base_url('Home/Offer_products'); ?>">Offer</a>
				</li>
				<li>
					<a href="<?= base_url('Home/support'); ?>">Contact us</a>
				</li>
			</ul>
			<!---Left side menu --->
		</div>
	</nav>
	<!---Menu Bar Section End --->


<!---Side menu Section End --->
<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->








	