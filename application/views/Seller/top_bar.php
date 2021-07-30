<style type="text/css">
  body{background: rgb(224, 227, 231)}
    nav{background: #005a87; height: 60px;line-height: 60px;}
        nav .brand-logo{font-size: 20px;font-weight: 500;}
        .collapsible-header{padding-left:30px !important; font-size: 14px;font-weight: 500;color: black }
        .collapsible-header:hover{background: pink !important; }
         #side_menu li a:hover{background: pink !important; }
         #side_menu{background: rgb(224, 227, 231)}
         #side_menu .collapsible-body{background:black;}
         #side_menu .collapsible-body li a{color: white}
         #side_menu .collapsible-body li a:hover{background: red !important} 
        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;}    
       #products_dropdown, #orders_dropdown,#coupon_dropdown, #sale_dropdown, #settings_dropdown{width: 15% !important;} 
       #products_dropdown li a, #orders_dropdown li a,#settings_dropdown li a, #coupon_dropdown li a, #sale_dropdown li a{color: grey;font-size: 16px;} 
</style>

  <div class="navbar-fixed">
    <nav class="">
      <div style="margin-left: 15px;margin-right: 15px;">
        <div class="nav-wrapper">
          <!-- <a href="#!" class="brand-logo">TravelVille</a> -->
           <a href="<?= base_url('Seller_dashboard/index'); ?>">&nbsp;
            <img src="<?= base_url('assets/images/dh.png'); ?>" style="width: 50px;border-radius: 50px; margin-top: 5px;">
              <?= $this->session->userdata('company_name'); ?>
            </a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
           
            <li>
                <a href="#!" class="dropdown-trigger" data-target="products_dropdown"> Products Master</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="orders_dropdown"> Orders Master </a>
            </li>
             <li>
                <a href="#!" class="dropdown-trigger" data-target="sale_dropdown"> Sale Reports</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="coupon_dropdown"> Coupon Master</a>
            </li>
           <li>
                <a href="#!"  class="dropdown-trigger" data-target="settings_dropdown"><span class="fa fa-tasks" ></span>&nbsp; Settings</a>
            </li>
             
            
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!---Side menu Section Start --->
<ul class="sidenav collapsible" id="side_menu" >
     <li><a href="<?= base_url('Seller_dashboard/index'); ?>">Home</a></li>
   
    <li>
        <div class="collapsible-header">Products</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Seller_dashboard/add_products'); ?>" style="font-size: 14px; border-bottom: 1px solid silver"> Add Products </a>
              </li>
              <li>
                  <a href="<?= base_url('Seller_dashboard/manage_products'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">Manage Products </a>
              </li>  
            </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Order Management <span class="new badge" style="background: green">(3)</span></div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Seller_dashboard/manage_cod_orders'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">Manage COD Orders </a>
              </li>
              <li>
                  <a href="<?= base_url('Seller_dashboard/manage_prepaid_orders'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">Manage Prepaid Orders </a>
              </li>  
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Sale Reports</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Seller_dashboard/today_sale_report'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">Today Sale Reports </a>
              </li> 
              <li>
                <a href="<?= base_url('Seller_dashboard/prepaid_sale_reports') ?>" style="font-size: 14px; border-bottom: 1px solid silver">
                   Prepaid Sale Reports
                </a>
              </li> 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Coupon Master</div>
        <div class="collapsible-body">
            <ul>
              <li>
                  <a href="<?= base_url('Seller_dashboard/create_coupon'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Create Coupon</a>
              </li> 
              <li>
                  <a href="#!" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Manage Coupon</a>
              </li> 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Seller_dashboard/account_settings'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
                     Account Settings
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('Seller/Logout'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
                     <span class="fa fa-key"></span>Logout
                  </a>
                </li> 
             </ul>
        </div>
    </li>
    
    
</ul>
<!---Side menu Section End --->


<!---------Products Dropdown ------->
<ul class="dropdown-content" id="products_dropdown">
    
    <li>
      <a href="<?= base_url('Seller_dashboard/add_products'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Add Products 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller_dashboard/manage_products'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Manage Products 
      </a>
    </li>       
</ul>
<!---------Products Dropdown ------->
<!------Orders Dropdown ------>
<ul class="dropdown-content" id="orders_dropdown">
    
    <li>
      <a href="<?= base_url('Seller_dashboard/manage_cod_orders'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Manage COD Orders
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller_dashboard/manage_prepaid_orders'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Manage Prepaid Orders 
      </a>
    </li>       
</ul>
<!------Orders Dropdown ------>
<!------Sale Dropdown ------->
<ul class="dropdown-content" id="sale_dropdown">
    
    <li>
      <a href="<?= base_url('Seller_dashboard/today_sale_report'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         COD Sale Reports
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller_dashboard/prepaid_sale_reports') ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Prepaid Sale Reports
      </a>
    </li>       
</ul>
<!------Sale Dropdown ------->
<!------Coupon Dropdown ----->
<ul class="dropdown-content" id="coupon_dropdown">
    
    <li>
      <a href="<?= base_url('Seller_dashboard/create_coupon'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Create Coupon 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller_dashboard/manage_coupon'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Manage Coupon 
      </a>
    </li>       
</ul>
<!------Coupon Dropdown ----->
<!------Settings Dropdown -------->
<ul class="dropdown-content" id="settings_dropdown">
    
    <li>
      <a href="#!" style="font-size: 14px; border-bottom: 1px solid silver">
        <?php if($this->session->userdata('seller_profile') !== ""): ?>
         <img src="<?= base_url('uploads/seller_profile/'.$this->session->userdata('seller_profile')); ?>" style="width: 50px;border-radius: 100%"> <?= $this->session->userdata('company_name'); ?>
         <?php else: ?>
            <img src="<?= base_url('uploads/images/dh.png'); ?>" style="width: 50px;border-radius: 100%">
         <?php endif; ?>
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller_dashboard/account_settings'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         Account Settings
      </a>
    </li>
    <li>
      <a href="<?= base_url('Seller/Logout'); ?>" style="font-size: 14px; border-bottom: 1px solid silver">
         <span class="fa fa-key"></span>Logout
      </a>
    </li>       
</ul>
<!------Settings Dropdown -------->

<!---Php Meassge Show --->
  <div class="container">
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
