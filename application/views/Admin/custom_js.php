<style type="text/css">
	#preloader{width: 25%;margin-top: 10%;}
</style>
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

<script type="text/javascript">
	
	$(function(){
		$('.modal').modal({
			dismissible:false
		});
		//$('#preloader').modal('open');
		//Admin Login Script
		$('#btn_sign_in').click(function(){
			let username  = $('input[name="username"]').val();
			let password  = $('input[name="password"]').val();
			if (username == "") {
				M.toast({html:'Please Enter Username'});
				$('input[name="username"]').css({'border':'1px solid red'});

			}
			else if (password == "") {
				M.toast({html:'Please Enter Password'});
				$('input[name="password"]').css({'border':'1px solid red'});
			}
			else{
				$.ajax({
					type:'ajax',
					method:'post',
					url:'<?= site_url('Admin/loggedin'); ?>',
					data:{username:username,password:password},
					beforeSend:function(data){
						$('#preloader').modal('open');
					},
					success:function(data){
						$('#preloader').modal('close');
						if (data == '1') {
							window.location.href = '<?= base_url('Admin/dashboard'); ?>';
						}else{
							M.toast({html:'Your Username & Password Don Not Match'});
						}
					},
					error:function(){
						$('#preloader').modal('close');
						alert('Error! Admin Login Account');
					}
				});
			}
		});
		//Admin Login Script

	});
</script>


<script type="text/javascript">
	
		//Count orders script
		count_orders();
		function count_orders(type = "all"){
			if (type == 'all') {
				$('#show_order_heading').text('Life time Orders');
			}else if (type == 'today') {
				$('#show_order_heading').text('Today Orders');
			}else if (type == 'yesterday') {
				$('#show_order_heading').text('Yesterday Orders');
			}else if (type == 'last_30_days') {
				$('#show_order_heading').text('Last 30days Orders');
			}else{
				$('#show_order_heading').text('Life time Orders');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_orders/'); ?>'+type,
					beforeSend:function(data){
						$('#show_orders').text('Loading..');	
					},
					success:function(data){
						$('#show_orders').html(data);		
					},
					error:function(){
						$('#show_orders').text('0');
					}
				});
		}
		//Count orders script

		//count all income

		count_income();
		function count_income(type = "all"){
			if (type == 'all') {
				$('#show_income_heading').text('Life time Income');
			}else if (type == 'today') {
				$('#show_income_heading').text('Today Income');
			}else if (type == 'yesterday') {
				$('#show_income_heading').text('Yesterday Income');
			}else if (type == 'last_30_days') {
				$('#show_income_heading').text('Last 30days Income');
			}else{
				$('#show_income_heading').text('Life time Income');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_incomes/'); ?>'+type,
					beforeSend:function(data){
						$('#show_income').text('Loading..');	
					},
					success:function(data){
						$('#show_income').html(data);		
					},
					error:function(){
						$('#show_income').text('0');
					}
				});
		}

		//count all income


		//count all products Script
		count_product();
		function count_product(type = "all"){
			if (type == 'all') {
				$('#show_product_heading').text('All Products');
			}else if (type == 'today') {
				$('#show_product_heading').text('Today Products');
			}else if (type == 'yesterday') {
				$('#show_product_heading').text('Yesterday Products');
			}else if (type == 'last_30_days') {
				$('#show_product_heading').text('Last 30days Products');
			}else{
				$('#show_product_heading').text('All Products');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_product/'); ?>'+type,
					beforeSend:function(data){
						$('#show_product').text('Loading..');	
					},
					success:function(data){
						$('#show_product').html(data);		
					},
					error:function(){
						$('#show_product').text('0');
					}
				});
		}

		//count all products Script

		//count customer Script

		count_customer();
		function count_customer(type = "all"){
			if (type == 'all') {
				$('#show_customer_heading').text('All Customers');
			}else if (type == 'today') {
				$('#show_customer_heading').text('Today Customers');
			}else if (type == 'yesterday') {
				$('#show_customer_heading').text('Yesterday Customers');
			}else if (type == 'last_30_days') {
				$('#show_customer_heading').text('Last 30days Customers');
			}else{
				$('#show_customer_heading').text('All Customers');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_customer/'); ?>'+type,
					beforeSend:function(data){
						$('#show_customer').text('Loading..');	
					},
					success:function(data){
						$('#show_customer').html(data);		
					},
					error:function(){
						$('#show_customer').text('0');
					}
				});
		}

		//count customer Script

//Dashboard Chart Script

var chartdata1 = new CanvasJS.Chart("chartContainer",{
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
    title :{
        text: "Last 7days COD Orders",
    },
    data: [{
	// type: "column", //change type to bar, line, area, pie, etc
		type: "area",
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
      	indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
      dataPoints: [
			{ label : 'Today',     y: <?= $chart_data['ch_today_order']; ?> },
			{ label : 'Yesterday', y: <?= $chart_data['ch_yesterday_order']; ?> },
			{ label : '3rd Days',  y: <?= $chart_data['ch_last_3_days_order']; ?> },
			{ label : '4rd Days',  y: <?= $chart_data['ch_last_4_days_order']; ?> },
			{ label : '5rd Days',  y: <?= $chart_data['ch_last_5_days_order']; ?> },
			{ label : '6rd Days',  y: <?= $chart_data['ch_last_6_days_order']; ?> },
			{ label : '7rd Days',  y: <?= $chart_data['ch_last_7_days_order']; ?> },
			
		]   
	}]
});
var chartdata2 = new CanvasJS.Chart("prepaid_orders_chart",{
    title :{
	text: "Last 7days Prepaid Orders"
    },
    data: [{
	  	 // type: "column", //change type to bar, line, area, pie, etc
		type: "bar",
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
      	indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
	 dataPoints: [
        { label : 'Today Orders',     y: <?= $prepaid_chart_data['ch_today_pre_orders']; ?> },
        { label : 'Yesterday Orders',  y: <?= $prepaid_chart_data['ch_yes_pre_orders']; ?> },
         { label : 'Last 3days Orders', y: <?= $prepaid_chart_data['ch_lst_3days_pre_ord']; ?> },
         { label : 'Last 4days Orders',  y: <?= $prepaid_chart_data['ch_lst_4days_pre_ord']; ?> },
        { label : 'Last 5days Orders',  y: <?= $prepaid_chart_data['ch_lst_5days_pre_ord']; ?> },
         { label : 'Last 6days Orders',  y: <?= $prepaid_chart_data['ch_lst_6days_pre_ord']; ?> },
         { label : 'Last 7days Orders',  y: <?= $prepaid_chart_data['ch_lst_7days_pre_ord']; ?> },
        ]
    }]
});
 
chartdata1.render();
chartdata2.render();

	//Count Prepaid Income 
	count_prepaid_income();
		function count_prepaid_income(type = "all"){
			if (type == 'all') {
				$('#show_prepaid_income_heading').text('Life time Orders');
			}else if (type == 'today') {
				$('#show_prepaid_income_heading').text('Today Orders');
			}else if (type == 'yesterday') {
				$('#show_prepaid_income_heading').text('Yesterday Orders');
			}else if (type == 'last_30_days') {
				$('#show_prepaid_income_heading').text('Last 30days Orders');
			}else{
				$('#show_prepaid_income_heading').text('Life time Orders');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_prepaid_income/'); ?>'+type,
					beforeSend:function(data){
						$('#show_prepaid_income').text('Loading..');	
					},
					success:function(data){
						$('#show_prepaid_income').html(data);		
					},
					error:function(){
						$('#show_prepaid_income').text('0');
					}
				});
		}
	//Count Prepaid Income 
	//count prepaid Orders
		count_prepaid_orders();
		function count_prepaid_orders(type = "all"){
			if (type == 'all') {
				$('#show_prepaid_order_heading').text('Life time Orders');
			}else if (type == 'today') {
				$('#show_prepaid_order_heading').text('Today Orders');
			}else if (type == 'yesterday') {
				$('#show_prepaid_order_heading').text('Yesterday Orders');
			}else if (type == 'last_30_days') {
				$('#show_prepaid_order_heading').text('Last 30days Orders');
			}else{
				$('#show_prepaid_order_heading').text('Life time Orders');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Admin/count_prepaid_orders/'); ?>'+type,
					beforeSend:function(data){
						$('#show_prepaid_orders').text('Loading..');	
					},
					success:function(data){
						$('#show_prepaid_orders').html(data);		
					},
					error:function(){
						$('#show_prepaid_orders').text('0');
					}
				});
		}
	//count prepaid Orders
//Dashboard Chart Script

</script>