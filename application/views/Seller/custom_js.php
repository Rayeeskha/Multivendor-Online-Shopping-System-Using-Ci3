
<script type="text/javascript">
	count_seller_prepaid_inc();
		function count_seller_prepaid_inc(type = "all"){
			if (type == 'all') {
				$('#show_seller_preinc_heading').text('Life time Income');
			}else if (type == 'today') {
				$('#show_seller_preinc_heading').text('Today Income');
			}else if (type == 'yesterday') {
				$('#show_seller_preinc_heading').text('Yesterday Income');
			}else if (type == 'last_30_days') {
				$('#show_seller_preinc_heading').text('Last 30days Income');
			}else{
				$('#show_seller_preinc_heading').text('Life time Income');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Seller_dashboard/count_seller_prepaid_inc/'); ?>'+type,
					beforeSend:function(data){
						$('#show_seller_preinc').text('Loading..');	
					},
					success:function(data){
						$('#show_seller_preinc').html(data);		
					},
					error:function(){
						$('#show_seller_preinc').text('0');
					}
				});
		}



		count_seller_cod_income();
		function count_seller_cod_income(type = "all"){
			if (type == 'all') {
				$('#show_seller_codincome_heading').text('Life time Income');
			}else if (type == 'today') {
				$('#show_seller_codincome_heading').text('Today Income');
			}else if (type == 'yesterday') {
				$('#show_seller_codincome_heading').text('Yesterday Income');
			}else if (type == 'last_30_days') {
				$('#show_seller_codincome_heading').text('Last 30days Income');
			}else{
				$('#show_seller_codincome_heading').text('Life time Income');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Seller_dashboard/count_seller_cod_income/'); ?>'+type,
					beforeSend:function(data){
						$('#show_sellercod_income').text('Loading..');	
					},
					success:function(data){
						$('#show_sellercod_income').html(data);		
					},
					error:function(){
						$('#show_sellercod_income').text('0');
					}
				});
		}


	count_prepid_orders();
		function count_prepid_orders(type = "all"){
			if (type == 'all') {
				$('#show_seller_order_prepaid_heading').text('All time Orders');
			}else if (type == 'today') {
				$('#show_seller_order_prepaid_heading').text('Today Orders');
			}else if (type == 'yesterday') {
				$('#show_seller_order_prepaid_heading').text('Yesterday Orders');
			}else if (type == 'last_30_days') {
				$('#show_seller_order_prepaid_heading').text('Last 30days Orders');
			}else{
				$('#show_seller_order_prepaid_heading').text('All time Orders');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Seller_dashboard/count_prepid_orders/'); ?>'+type,
					beforeSend:function(data){
						$('#show_seller_prepaid_orders').text('Loading..');	
					},
					success:function(data){
						$('#show_seller_prepaid_orders').html(data);		
					},
					error:function(){
						$('#show_seller_prepaid_orders').text('0');
					}
				});
		}

		//Count orders script
		count_seller_orders();
		function count_seller_orders(type = "all"){
			if (type == 'all') {
				$('#show_seller_order_heading').text('All time Orders');
			}else if (type == 'today') {
				$('#show_seller_order_heading').text('Today Orders');
			}else if (type == 'yesterday') {
				$('#show_seller_order_heading').text('Yesterday Orders');
			}else if (type == 'last_30_days') {
				$('#show_seller_order_heading').text('Last 30days Orders');
			}else{
				$('#show_seller_order_heading').text('All time Orders');
			}
			$.ajax({
					type:'ajax',
					method:'GET',
					url:'<?= site_url('Seller_dashboard/count_seller_orders/'); ?>'+type,
					beforeSend:function(data){
						$('#show_seller_orders').text('Loading..');	
					},
					success:function(data){
						$('#show_seller_orders').html(data);		
					},
					error:function(){
						$('#show_seller_orders').text('0');
					}
				});
		}
//Chart Sction Script Start

var chart1 = new CanvasJS.Chart("chart_cod_order_container",{
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark1", 
    title :{
        text: "Last 7day COD Orders"
    },
    data: [{
	type: "line",
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
var chart2 = new CanvasJS.Chart("prepaid_orders_chart",{
    title :{
	text: "Last 7days Prepaid Orders"
    },
    data: [{
	  	 // type: "column", //change type to bar, line, area, pie, etc
		type: "pie",
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
 
chart1.render();
chart2.render();







//Chart Sction Script End 		
</script>	