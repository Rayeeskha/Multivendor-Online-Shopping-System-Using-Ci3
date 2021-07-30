
<!DOCTYPE html>
<html>
<head>
	<title>Product Rating - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		.btn-flat:hover{background: #ff3d00;color: white}
		#quantity_form{display: flex;}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#quantity_form li{margin: 2px;}

		/* Rating Css Section Start */
		.overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
		.rating_widget{
		    padding: 0px;
		    margin: 0px;
		    float: left;
		}
		.rating_widget li{
		    line-height: 0px;
		    width: 28px;
		    height: 28px;
		    padding: 0px;
		    margin: 0px;
		    margin-left: 2px;
		    list-style: none;
		    float: left;
		    cursor: pointer;
		}
		.rating_widget li span{
		    display: none;
		}
		/* Rating Css Section End */


	</style>
</head>
<body>

<!--TopBar Section Include --->
<?php $this->load->View('Home/header.php'); ?>
<!--TopBar Section Include --->


<div class="container">


	
	<?php if(count($rated_product)):
		foreach($rated_product as $rated_pro):
	 ?>
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;">
			
			<a href="<?= base_url("Home/my_orders"); ?>" class="btn waves-effect waves-light" style="background: #ff3d00">Order Id - <?= $rated_pro->id; ?></a>
			
			</a>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;">
			<?php $this->load->helper('product');
				$order_items = get_order_products('ms_order_products', $rated_pro->order_id);
			?>
			<?php if(count($order_items)):
				foreach($order_items as $ord_item): ?>

					
				<?php 
					$product_detail = get_product_detail_by_pro_id($ord_item->product_id);
					if(count($product_detail)):
						foreach($product_detail as $pro_details):

				?>	

					
			
			<div class="row">
				<div class="col l2 m3 s12">

					<img src="<?= base_url(). 'uploads/product_image/' .$product_detail[0]->image; ?>" class="responsive-img">
				</div>
				<div class="col l4 m4 s12">
					
					<h6 style="color: grey;font-weight: 500;font-size: 16px;"><?= $ord_item->product_name; ?></h6>
					<h6 style="color: orange;font-weight: 500;font-size: 16px;">Quantity : <?= $ord_item->quantity; ?></h6>
				</div>
				<div class="col l4 m4 s12">
					<h6 style="color: grey;font-size: 20px;font-weight: 500"><span class=" fa fa-rupee-sign"></span>&nbsp;<?= $ord_item->rate; ?></h6>

					<h6 style="color: green; font-weight: 500">Delivered</h6>
					<input name="rating" value="0" id="rating_star" type="hidden" postID="<?= $ord_item->id; ?>" / >
					<br/>	 
				</div>
				<div  class="col l2 m2 s2">
					<h6 style="color: green; font-weight: 500">FeedBack</h6>
					<a href="<?= base_url('Home/feed_back/'.$pro_details->id); ?>">Feedback</a>
					<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Feedback</a> -->
				</div>
				<?php endforeach;
		else: ?>
			<h6 style="color:red;font-size: 15px;font-weight: 500;padding-left: 15px;">Product's Not Found..</h6>
		<?php endif; ?>
			</div>

			<?php endforeach;
			else: ?>
				<h6 style="text-align: center;font-size: 20px;color: red;font-weight: 500">Product's Not Found</h6>
			<?php endif; ?>
		</div>
		<div class="card-content" style="padding: 10px;">
			<h6 style="color: grey;margin-top: 5px;">Order On : <b><?= date('D, M. d Y',strtotime($rated_pro->order_date)); ?></b>


				<span class="right">Order Total : <b><span class="fa fa-rupee-sign">&nbsp;
				<?= number_format($rated_pro->total_amount); ?></span></b></span></h6>
		</div>
	</div>
<?php endforeach;
else: ?>
	<h6 style="text-align: center; font-weight: 500;font-size: 20px;color: red;">You are Not Deleverd any Order</h6>
<?php endif; ?>
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
	$(function() {
    $("#rating_star").rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: '<?= base_url('assets/images/rating_image/'); ?>',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: '<?= base_url('Home/rating'); ?>',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
            	M.toast({html:'You have rated Rating &nbsp;'+val});
                // alert('You have rated '+val);
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>