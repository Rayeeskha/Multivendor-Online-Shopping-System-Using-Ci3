<style type="text/css">
  footer{background: #13124e!important;}
    #set_social_icons li{
      display: inline-block;
    }
    #set_social_icons li a {
      color: white; padding: 10px 15px; border: 1px solid white;

    }
    #important_link_id li a:hover{color: orange !important;text-decoration-line: underline;}

        .phonelink{
            position: fixed; /* Lock location always on the scree */
            bottom: 0; /* Set to the bottom */
            right: 0; /* Set to the right */
            margin: 30px; /* Add space around background */
        }
        .phoneicon{
            width: 40px; /* Set width of icon */
            height: 40px; /* Set height of icon */
        }
        @media screen and (max-width: 480px){
            .lgscreenphone{
                display: ;  /* On small screens make phone icon disappear */
            }
            .mbscreenphone{
                 /* On small screens make phone icon appear */
            }
        }
        @media screen and (min-width: 481px){
            .mbscreenphone{
                 /* On large screens make phone icon disappear */
            }
            .lgscreenphone{
                display: block; /* On large screens make phone icon appear */
            }
        }
  
</style>

<a href="https://chat.whatsapp.com/ILoyV1OyJQMEZpVAmt9N5a" class="lgscreenphone phonelink" data-action="share/whatsapp/share"><img class="phoneicon" src="https://freeiconshop.com/wp-content/uploads/edd/phone-flat.png"></a>
<!---Footer Section Start --->
 <footer class="page-footer">
         
            <div class="row">
            	<div class="row">
            		<div class="col l6 m6 s6" style="border-right: 1px solid white;">
            			<h6 class="right-align"><span class="fa fa-headset"></span>&nbsp;Contact Us</h6>
            			<h5 class="right-align" style="font-size: 20px;margin-top: 0px;"><a href="tel:9554540271" style="color: white">+91 123457809</a></h5>
            		</div>
            		<div class="col l6 m6 s6">
            			<h6 ><span class="fa fa-envelope"></span> &nbsp;Email Us</h6>
            			<h6 style="font-size: 20px;margin-top: 0px;"><a href="mailto:rayeesinfotech@gmail.com" style="color: white">&nbsp;rayeesinfotech@gmail.com</a></h6>
            		</div>
            	</div>
              <div class="col l4 m4 s6">
                <h5 class="white-text">Contact Information</h5>
                <p class="grey-text text-lighten-4">Khan Rayees
                	<br>
                	Lucknow 226026 <br>
                	Uttar Pradesh- India
                </p>
                <p>
                	<a href="mailto:rayeesinfotech@gmail.com" style="color: white">rayeesinfotech@gmail.com</a><br>
                	<a href="http://khanrayees.000webhostapp.com/" style="color: white">khanrayees.com</a>
                </p>

                <!--Social Media icons section start --->
			<ul id="set_social_icons">
				<li><a href="https://www.facebook.com/FullstackDeveloperKhanRayees/?ref=bookmarks" target="_blank"><span class="fab fa-facebook" style="color: blue"></span></a></li>
				<li><a href="https://www.instagram.com/rayees2696/?hl=en" target="_blank"><span class="fab fa-instagram" style="color: red"></span></a></li>
				<li><a href="https://twitter.com/KhanRay01907628" target="_blank"><span class="fab fa-twitter" style="color: blue"></span></a></li>
				
				<li><a href="https://chat.whatsapp.com/ILoyV1OyJQMEZpVAmt9N5a" target="_blank"><span class="fab fa-whatsapp" style="background: linear-gradient(green,yellow, blue)"></span></a></li>
				<li><a href="mailto:rayeesinfotech@gmail.com"><span class="fab fa-google" style="background:  linear-gradient(red, yellow, blue)"></span></a></li>
			</ul>
			<!--Social Media icons section end --->
              </div>
              <div class="col l4 m4 s4">
                <h5 class="white-text">Important Links</h5>
                <ul id="important_link_id">
                  <li><a class="grey-text text-lighten-3" href="#!">Company Profile</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Policies</a></li>
                  <li><a class="grey-text text-lighten-3" href="<?= base_url('Admin'); ?>" target="_blank">Admin Panel</a></li>
                  <li><a class="grey-text text-lighten-3" href="<?= base_url('Home/user_signin/'); ?>" target="_blank">User Login</a></li>
                  <li><a class="grey-text text-lighten-3" href="<?= base_url('Home/user_signup/'); ?>"target="_blank">User Register</a></li>
                  <li><a class="grey-text text-lighten-3" href="<?= base_url('Seller/index/'); ?>"target="_blank">Create Seller Account</a></li>
                </ul>
              </div>
              <div class="col l4 n4 s4">
			<h6>About Us</h6>
			<p style="text-align: justify;">All Online Produts Available is E-Shopper Online Shopping Website. All Products available in chepest price you can do and buy all products According to your categories available</p>
			<p style="text-align: justify;">All Online Produts Available is E-Shopper Online Shopping Website. All Products available in chepest price you can do and buy all products According to your categories available</p>
		</div>
            </div>
          
          <div class="footer-copyright" style="padding-left: 10px;padding-right: 10px; background: red;box-shadow: none;">
           <div class="container">
            © 2020 Copyright- <?php date('Y'); ?> Khan Rayees
            <a class="grey-text text-lighten-4 right" href="http://khanrayees.000webhostapp.com/" target="_blank">Developed & Maintained By : Khan Rayees</a>
            </div>
         </div>
        </footer>
<!---Footer Section End --->