<!DOCTYPE html>
<html>
<head>
	<title>Online Paymeny </title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!--TopBar Section Include --->
<?php $this->load->view('Home/header.php'); ?>
<!--TopBar Section Include --->

<?php 
	$total_quantity = 0;
	$total_amount = 0;
	if ($itemInfo) {
		count($itemInfo);
		foreach ($itemInfo as $pro) {
			$total_quantity   += $pro->quantity;
			$total_amount     += ($pro->quantity * $pro->rate);
		}
	}else{
		$total_quantity  = 0;
	}
?>



<?php
$order_id = rand(11111,99999);
$productinfo = $pro->session_id;
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = "rzp_test_NghPbYQxThULdj";
$currency_code = $currency_code;            
$total_quantity = $total_quantity; 
if($this->session->userdata('coupan_id') != ""){
 	$total_amount = $this->session->userdata('discount_price');
}else{
	$total_amount = $total_amount;
}

$merchant_order_id = $order_id;
$card_holder_name = $tem_address[0]->first_name;
$email = $tem_address[0]->email;
$phone = $tem_address[0]->mobile;


$name = 'Khan Rayees E-Commerce Services';
$return_url = base_url().'Home/callback';
?>


<!-------Body Section Start   ------------>
<div style="margin-right: 15px;margin-left: 15px;">
	 <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
	  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
	  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
	  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
	  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
	  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
	  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
	  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
	  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total_amount; ?>"/>
	 <input type="hidden" name="merchant_quantity" id="merchant_quantity" value="<?php echo $total_quantity; ?>"/>
	</form>

	<div class="container">
		<div class="card">
			<div class="card-content" style="padding: 10px; border-bottom:  1px solid silver;">
				<center>
					<h6 style="color: black;font-weight: 700; font-size: 20px ;margin-top:   5px; margin-top: 0px;">
					<span class="fa fa-rupee-sign" style="color: green"></span>&nbsp;Pay & Purchase Now
				</h6>
				</center>
			</div>
			<div class="card-content">
				<table class="table">
					<thead>
						<th>Name </th>
						<th>Quantity</th>
						<th>Price</th>
					</thead>
					<?php if($itemInfo):
					count($itemInfo);
					foreach($itemInfo as $product): ?>
					<tbody>
						<tr>
							<td><?= $product->product_name; ?></td>
							<td><?= $product->quantity; ?></td>
							<?php 
								$total_price = ($product->quantity * $product->rate);
							?>
							<td><?= number_format($total_price); ?></td>
						</tr>
						
					</tbody>
				<?php endforeach; ?>
					<tr>
						<td>Total Amount</td>
						<td></td>
						<td> <span class="fa fa-rupee-sign"></span>&nbsp;
							<?= number_format($total_amount); ?><br>
							<?php if($this->session->userdata('coupan_id') != ""): ?>
							<h6 style="font-weight: 500;font-size: 14px;">
								Final Price : <span class="fa fa-rupee-sign" style="color: green">&nbsp;<?= number_format($this->session->userdata('discount_price')); ?></span></h6>
								
							<?php endif; ?>
					</td>
					</tr>
				<?php  else: ?>
				<h6 style="color: red">Product Not Added</h6>
			<?php endif; ?>

				</table>
			</div>


			<div class="row">
		        <div class="col l12 m4 s12">
		            <center>
		            	<a href="<?php print site_url('Home/place_order');?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;margin-bottom:25px;"><i class="fa fa-reply"></i> Back</a>
		            	<input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-waves-effect waves-light" style="background: green;font-weight: 500;text-transform: capitalize;margin-bottom:25px;" />
		            </center>
		        </div>
		    </div>
		</div>
	</div>




</div>
<!-------Body Section End   ------------>

<!---Footer File Include --->
<?php $this->load->view('Home/footer.php'); ?>
<!---Footer File Include --->

<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: "<?php echo $total_amount; ?>",
    total_quantity: "<?php echo $total_quantity; ?>",
    name: "<?php echo $name; ?>",
    description: "Order Id# <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
            location.reload()
        }
    }
  };
  var razorpay_submit_btn, razorpay_instance;

  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>
</body>
</html>