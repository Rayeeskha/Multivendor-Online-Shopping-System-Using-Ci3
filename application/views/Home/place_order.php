<!DOCTYPE html>
<html>
<head>
	<title>Place Order - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#input_box_discount{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 35px; width: 20%}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 90px;resize: none;border-radius: 3px;}
		#color{background: #ffebe5}
		.materialert.warning{
	    background-color: rgba(235, 70, 52);
		    color: #fff;
		    border-radius: 5px;
		    padding-left: 10px;
		    padding: 10px;
		}
		[type="radio"]:checked + span:after, [type="radio"].with-gap:checked + span:after{background:#13124e }
	 	[type="radio"]:checked + span:after, [type="radio"].with-gap:checked + span:after {border: 2px solid #13124e;}
	 	#cash_on_delivery_id, #online_payemnt_id{display: none;}
	 	#input_copan_code{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;height: 40px;width: 50%;margin-top: 5%}
	 	#coupan_box{display: none;}
	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->

<!---Card Section -->
<div style="margin-left: 15px; margin-right: 15px;">

	<div class="card">
		<div class="card-content" style="padding: 10px; border-bottom:  1px solid silver;">
			<center>
				<h6 style="color: black;font-weight: 700; font-size: 20px ;margin-top:   5px; margin-top: 0px;">
				<span class="fa fa-compass" style="color: green"></span>&nbsp;Complete Shipping Details Purchase Now
			</h6>
			</center>
		</div>
	</div>

	<div class="card">
		<div class="card-content" style="padding: 10px;border-bottom:  1px solid silver;">
				<h6 style="color: grey;font-weight: 700; font-size: 20px ;margin-top: 0px;">
					<span class="fa fa-eye"></span>&nbsp;Complete Purchase</h6>
		</div>
		<div class="card-content">
				<?php 
					$t_amount = 0;
				 if(count($products)):
					foreach($products as $product):
						$t_amount += ($product->quantity * $product->rate);
				?>

				<!---Discount Coupan Code --->
				<?php $this->load->helper('product');
					$coupan_items = get_coupan_products('coupons', $product->product_id);
				?>
				<?php if($coupan_items):
				count($coupan_items); ?>
					
					<h6 style="font-size: 16px;color: black;font-weight: 500;">Discount Product Coupan Code</h6>

					<input type="text" name="discount_coupan" id="input_box_discount" placeholder="Enter Coupan Code" value="">
					
					  <a href="#!" class="btn btn-waves-effect waves-light" 
						onclick="discount_coupan('<?= $coupan_items[0]->product_id; ?>');" style="background: #ff3d00;text-transform: capitalize;font-weight: 500;height: 35px;">
						<span class="fa fa-compass"></span>&nbsp;Apply Coupon
					</a>  	
			<?php endif; ?>
				<!---Discount Coupan Code --->

				<h6 style="font-size: 15px;color: black;font-weight: 500;border-bottom: 1px solid silver; padding-bottom: 5px;margin-top: 0px;"><?= $product->product_name; ?> 
					<?php if($product->couponCode != ""):  ?>
						<?php if($product->discount_type == "Percentage"): ?>
							<span style="color: red;margin-left:  70%">Discount&nbsp;<span style="color: orange">
								(<?= $product->coupon_value ?>)
							</span> % : </span> 
						<?php else: ?>
							<span style="color: green;margin-left:  80%">Save &nbsp;</span> <span class="fa fa-rupee-sign" style="color: orange"><?= $product->coupon_value ?>,</span>
						<?php endif; ?>
						
					<?php endif; ?>
				
				<span class="right">
					<b>
					<span class="fa fa-rupee-sign" style="color: green;">&nbsp;
					<?php 
						$sum_amount  = $product->rate * $product->quantity;
						echo number_format($sum_amount);
					 ?>
					 	
					 </span></b></span></h6>
			<?php endforeach; 
			else:
				$t_amount = 0;
			 ?>
				<h6 style="color: red;text-align: center; font-weight: 500">Product's Not Added in Cart</h6>
				
			<?php endif; ?>
				<h6 style="color: grey;font-weight: 600;font-size: 16px;">Grand Total : <span class="right"><b><span class="fa fa-rupee-sign" style="color: black">&nbsp;<?= number_format($t_amount); ?></span></b></span></h6>
				<hr>
			<div id="coupan_box">
				<h6 style="color: green;font-weight: 600;font-size: 15px;">Save Price: 
					<span class="fa fa-rupee-sign" id="coupan_price">&nbsp;</span>
					<span class="right"><b>Total Amount : <span class="fa fa-rupee-sign" style="color: green" id="total_discount_price">&nbsp;</span></b></span>

					Coupon Applied
				</h6>
			</div>	



			<div class="row">
				<div class="col  l4 m4 s12"></div>
				<div class="col  l4 m4 s12"></div>
				<?= $this->session->userdata('coupan_code'); ?> 
				<div class="col  l4 m4 s12">
					<input type="text" name="coupan_code" id="input_copan_code" placeholder="Enter Coupan Code">
					<button  type="button" onclick="set_coupan_code_discount();" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize; height: 40px; margin-bottom:  5px; font-weight: 500; font-size: 15px;">Apply Coupan</button>  

					<div id="coupan_res_data" style="color: red;font-weight: 500;font-size: 14px;"></div>
				</div>
			</div>

			<table class="table">
				<tr>
					<td>
						<h6 style="color: grey;">Address Type</h6>
						<p>
							<label>
								<input type="radio" name="add_type" id="add_type" value="Home(All day delivery)">
								<span>Home(All day delivery)</span>
							</label>
						</p>
					</td>
					<td >
						<p style="margin-top: 45px;">
							<label>
								<input type="radio" name="add_type" id="add_type" value="Work (Delivery between 10 AM - 5 PM)">
								<span>Work (Delivery between 10 AM - 5 PM)</span>
							</label>
						</p>
					</td>
				</tr>
			</table>	

			</div>
	</div>

	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h6 style="color: green;font-weight: 500">Choose Payment Type</h6>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<td>
						<h6 style="color: grey;font-weight: 500;font-size: 14px;">Payment Type</h6>
						<p>
							<label>
								<input type="radio" name="payment_method" id="cash_payment_check" value="Cash">
								<span  style="font-weight: 500;font-size: 13px;">Cash On Delivery</span>
							</label>
						</p>
					</td>
					<td >
						<p style="margin-top: 45px;">
							<label>
								<input type="radio" name="payment_method" id="online_payment_check" value="Online">
								<span style="font-weight: 500;font-size: 13px;">Online Payment</span>
							</label>
						</p>
					</td>
				</tr>
			</table>

			<div id="cash_on_delivery_id">
				<a href="<?= base_url('Home/complete_purchased'); ?>"  class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize; margin-top: 15px;font-weight: 500; font-size: 15px;">Cash Purchase Now</a>
			</div>

			<div id="online_payemnt_id">
				<a href="<?= base_url('Home/online_purchase_payment'); ?>"  class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize; margin-top: 15px;font-weight: 500; font-size: 15px;">Online Purchase Now</a>
			</div>

		</div>		
	</div>

</div>
<!---Card Section -->
	

<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

<script type="text/javascript">

	function set_coupan_code_discount(){
		let input_copan_code =  $('#input_copan_code').val();
		if (input_copan_code!= '') {
			$.ajax({
				type:'POST',
				url:'<?= base_url('Home/set_coupan_master_code'); ?>',
				data:'input_copan_code='+input_copan_code,
				success:function(result){
					let data = $.parseJSON(result);
					if (data.is_error == 'yes') {
						$('#coupan_box').hide();
						$('#coupan_res_data').html(data.dd);
					}
					if (data.is_error== 'no') {
						$('#coupan_box').show();
						$('#coupan_price').html(data.dd);
						$('#total_discount_price').html(data.result);
					}
				}
			});
		}
	}
	   
    $(document).ready(function(){
        $('#cash_payment_check').change(function(){
            var payment_method = $(this).val();
            if (payment_method == 'Cash') {
                $('#cash_on_delivery_id').fadeIn();
                $('#online_payemnt_id').fadeOut();
                
            }
        });
    });

    $(document).ready(function(){
        $('#online_payment_check').change(function(){
            var payment_method = $(this).val();
            if (payment_method == 'Online') {
                $('#online_payemnt_id').fadeIn();
                $('#cash_on_delivery_id').fadeOut();
                
            }
        });
    });

 
  
</script>

</body>
</html>
<?php 
	$this->session->unset_userdata('coupan_id');
	$this->session->unset_userdata('discount_price');
	$this->session->unset_userdata('coupan_value');
    $this->session->unset_userdata('coupan_code');
	
?>