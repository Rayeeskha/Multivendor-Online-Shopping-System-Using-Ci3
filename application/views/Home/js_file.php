<style type="text/css">
	#preloader{width: 25%;margin-top: 10%;}
	#product_detail_modal{width: 80%}
</style>
<!---View Products Modal Section --->
<div class="modal" id="product_detail_modal">
	
	<!---Load view_product_details_modal using ajax --->	
	
</div>
<!---View Products Modal Section --->


<!---Preloader Section --->
<div class="modal" id="preloader">
	<div class="modal-content" style="padding: 0px;">
		<h5 style="padding: 5px;font-size: 22px;font-weight: 500">Please Wait...</h5>
		<!--Preloader -->
		<div class="progress" style="background: #ffebe5">
			<div class="indeterminate" style="background: #ff3d00"></div>
		</div>
		<!--Preloader -->
	</div>
	<div class="modal-content" style="padding: 10px;">
		<h6 id="preloader_heading" style="margin-top: 0px;font-weight: 500">Login Your Account</h6>
		
	</div>
</div>
<!---Preloader Section --->

<!---Materialize js file include --->
<script type="text/javascript" src="<?= base_url('assets/jquery/jquery.js'); ?>"></script>
<!--Ajax js file include ---->

<script type="text/javascript" src="<?= base_url('assets/materialize/js/materialize.js'); ?>"></script>
<!--Chart js file --->
<script type="text/javascript" src="<?= base_url('assets/chart/chart.js'); ?>"></script>

<!---Rating Js file Include --->
<script type="text/javascript" src="<?= base_url('assets/RatingJs/rating.js'); ?>"></script>
<!---Rating Js file Include --->
<!---custome js file include -->
<script type="text/javascript">
	$(document).ready(function(){
		//modal script
		$('.modal').modal();
		// $('#product_detail_modal').modal('open');
		//modal script
		//sidenav script 
		$('.sidenav').sidenav();
		//sidenav script 
		//collapsible 
		$('.collapsible').collapsible();
		//collapsible 
		//dropdown script show start
		$('.dropdown-trigger').dropdown({
			coverTrigger:false
		});

	  $('.carousel.carousel-slider').carousel({
	    fullWidth: true,
	    indicators: true
	  });	

		
	})
</script>

<!---Custom ajax script view product show cript --->
<script type="text/javascript">
	function view_product_details_modal(product_id){
		//alert(product_id);
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Home/get_product_details/'); ?>'+product_id,
			beforeSend:function(data){
				$('#preloader').modal('open');
				$('#preloader_heading').text('Fetch Products Details');
			},
			success:function(data){
				$('#product_detail_modal').modal('open');
				$('#product_detail_modal').html(data);
				$('#preloader').modal('close');
			},
			error:function(){
				alert('Error! Fetch Products Details');
			}
		});
	}
//Custom ajax script view product show cript //

	//Add to cart Script Section Start //
	function add_to_cart(product_id){
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Home/add_to_cart/'); ?>'+product_id,
			beforeSend:function(data){
				$('#preloader').modal('open');
				$('#preloader_heading').text('Product Add in Your Cart..!');
			},
			success:function(data){
				$('#preloader').modal('close');
				if (data == "1") {
					M.toast({html:'Product Successfully Add in Your Cart..'});
					calculate_carts_product();
				}else{
					M.toast({html:'Product Not Added'});
				}
			},
			error:function(){
				alert('Error! Technical Issue Contact with Administrator');
			}
		});
	}

	//Add to cart Script Section Start //

	//Update Quantity Script Start 
	function update_quantity(type,product_id,id){
		let qname   = "quantity_" +id;
		let quantity  = $('input[name="'+qname+'"]').val();
		// alert(quantity);
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Home/update_quantity/'); ?>'+quantity+'/'+type+ '/'+product_id+'/'+id,
			beforeSend:function(data){
				$('#preloader').modal('open');
				$('#preloader_heading').text('Update Product Quantity!');
			},
			success:function(data){
				$('#preloader').modal('close');
				if (data == "1") {
					M.toast({html:'Product Quantity Update Successfully!'});
					location.reload();
				}else{
					M.toast({html:'Fail ! Product Quantity Not Descrease It Must be Greater than 1 !'});
				}
				
			},
			error:function(){
				alert('Error! Technical Issue Contact with Administrator');
			}

		});
	}
	//Update Quantity Script Start 


	//Calculate Carts Product Script
	calculate_carts_product(); 
	function calculate_carts_product(){
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Home/calculate_carts_products/'); ?>',
			success:function(data){
				var json_data = JSON.parse(data);
				$('#total_products').html(json_data.total_products);
				$('#total_amount').html(json_data.total_amount);
				
			},
			error:function(){
				alert('Error! Technical Issue Contact with Administrator');
			}

		});
	}
	//Calculate Carts Product Script


	//search products script
	$('body').click(function(){
		$('#show_product_list').hide();
	});
	function search_products(val){
		if (val.length > 1) {
				$.ajax({
				type:'ajax',
				method:'GET',
				url:'<?= base_url('Home/search_products/'); ?>'+val,
				beforeSend:function(data){
					
				},
				success:function(data){
					$('#show_product_list').show();
					$('#show_product_list').html(data);
				},
				error:function(){
					alert('Error! Please Enter Product Name');
				}
			});
		}
		
	} 
	//search products script 


	//Discount Coupan Script
	function discount_coupan(product_id){
		let discount_coupan  = $('input[name="discount_coupan"]').val();
		$.ajax({
			type:'ajax',
			method:'GET',
			url:'<?= base_url('Home/Coupan_Offer_Code/'); ?>'+product_id+'/'+discount_coupan,
			beforeSend:function(data){
				$('#preloader').modal('open');
				$('#preloader_heading').text(' Discount Your Product Price!');
			},
			success:function(data){
				$('#preloader').modal('close');
				if (data == "1") {
					M.toast({html:'Product Discount Successfully '});
					// calculate_carts_product();
				}else if(data == "0"){
					M.toast({html:'Fail ! Product  Not Discount'});
				}else if(data == "price_not"){
					M.toast({html:'Fail ! Coupan Price is Greater than Product Amount  '});
				}else if(data == "used"){
					M.toast({html:'Already Used ! Coupan is Already Used'});
				} else{
					M.toast({html:'Invalid Coupon'});
				}
			},
			error:function(){
				alert('Error! Technical Issue Contact with Administrator');
			}
		});
	}
	//Discount Coupan Script

$(document).ready(function(){
    $('.tooltipped').tooltip();
  });

	



	
</script>


