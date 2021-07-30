<style type="text/css">
	ul.thumb{margin: 10px; padding: 0px; margin-left: 10px;}
		ul li {display: inline; padding: 5px;}
		ul.thumb li a img{width: 80px;border: 1px solid silver;height: 60px;}
		h6{font-weight: 500;font-size: 13px;color: grey}
</style>
<span class="right modal-close" style="padding: 8px 12px;background: red;color: white;margin-right: 25px;"><b>X</b></span>
<!--Card Section  Start --->
<div class="modal-content">
	<h6 style="color: grey;">Order Id : #<span style="color: orange">&nbsp;<?= $product[0]->order_id; ?></span></h6>
		<table class="table">
			<tr>
				<th>Product Image</th>
				<th>Product Title</th>
				<th>Product Price</th>
				<th>Product Quantity</th>
			</tr>
		 <tbody>
			 	<tr>
		   <?php 
		   		$total_quantity = 0;
		   		$total_amount   = 0;
		   		$final_price = 0;
				if($product):
					count($product);
					foreach($product as $order_id):
						$final_price += $order_id->rate;
						if ($order_id->couponCode !== "") {
							$total_amount += $order_id->total_rate; 
						}else{
							$total_amount += $order_id->rate;
						}
						$total_quantity += $order_id->quantity;
						$order_details = get_product_detail($order_id->product_id);
						if($order_details):
							count($order_details);
							foreach($order_details as $get_pro):
			?>
			
			 		<td>
			 			<img src="<?= base_url() . 'uploads/product_image/' . $get_pro->image; ?>" class="img-fluid img-responsive"  style="width: 90px;height: 50px">
			 			
			 		</td>
			 		<td>
			 			<?= $get_pro->product_title; ?>
			 		</td>
			 		<td>
			 			<span class="fa fa-rupee-sign" style="color: red">&nbsp;</span><?= number_format($order_id->rate); ?>
			 			<?php if($order_id->couponCode !== ""):  ?>
			 				<h6 style="color: red;font-weight: 500;font-size: 12px;">Product Total Price  : <?= number_format($order_id->total_rate); ?></h6>
			 				<?php if($order_id->discount_type == 'Percentage'): ?>
			 					<h6 style="color: orange;font-weight: 500;font-size: 12px;">Percent : <?= number_format($order_id->coupon_value); ?>%</h6>
			 					<?php elseif($order_id->discount_type == 'Rupee'): ?>
			 						<h6 style="color: green;font-weight: 500;font-size: 12px;">Save Price : 
			 							<span class="fa fa-rupee-sign" style="color: orange"></span><?= number_format($order_id->coupon_value); ?> :</h6>
			 						
			 					<?php else: ?>
			 					<?php endif; ?>
			 				<h6 style="color: grey;font-weight: 500;font-size: 12px;">Applied Coupon : <span style="color: orange"><?= $order_id->couponCode; ?></span> </h6>
			 			<?php else: ?>
			 				
			 			<?php endif; ?>
			 		</td>
			 		<td>
			 			<?= $order_id->quantity; ?>
			 		</td>
		<?php endforeach; endif; ?>
			</tr>
			
		<?php endforeach; endif; ?>
			<tr>
				<td style="color: grey;">Total Quantity: <?= $total_quantity; ?></td>
				<td style="text-align: center;color: grey;">Total Price: <span class="fa fa-rupee-sign" style="color: green"></span>&nbsp;<?= number_format($total_amount); ?></td>
				<td></td>
				<td>Final Price :<span class="fa fa-rupee-sign" style="color: orange">&nbsp;<?= number_format($final_price); ?></span></td>
			</tr>

			 </tbody>
		</table>
</div>	

<script type="text/javascript">
	 $(document).ready(function(){
        $('.thumb a').mouseover(function(e){
            e.preventDefault();
        $('.imgBox img').attr("src", $(this).attr("href"));
        });
      });
</script>