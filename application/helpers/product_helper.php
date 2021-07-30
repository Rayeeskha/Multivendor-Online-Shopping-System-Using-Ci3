<?php

//Developed & Maintain by khan Rayees All right Reserved
	function get_category_products($id){
		$CI =& get_instance();
		$fetch_data = $CI->db->select('ms_categories.category_name, ms_products.*')
			->from('ms_products')
			->where('category_id', $id)
			->join('ms_categories', 'ms_products.category_id = ms_categories.id')
			->limit(6)
			->order_by('id', 'desc')
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	function get_category_details($id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where('ms_categories',['id'=>$id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

	//Cart Image Helper Function 
	function get_offer_products($id){
		$CI =& get_instance();
		$fetch_data = $CI->db->select('coupons.couponAmount,coupons.couponType,
			coupons.couponStatus,coupons.couponCode,coupons.discount_type, ms_products.*')
			->from('ms_products')
			->where('product_id', $id)
			->where('couponStatus','0')
			->join('coupons', 'ms_products.id = coupons.product_id')
			->limit(6)
			->order_by('id', 'desc')
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	function get_product_detail($id){
	 	$CI =& get_instance();
		$fetch_data = $CI->db->get_where('ms_products',['id'=>$id]);
	 	if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
	 	}else{
	 		return $fetch_data->result();
	 	}
	 }

	function get_product_detail_by_pro_id($id){
	  	$CI =& get_instance();
		 $fetch_data = $CI->db->get_where('ms_products',['id'=>$id]);
	 	if ($fetch_data->num_rows() > 0) {
		 	# code...
		 	return $fetch_data->result();
	  	}else{
			return $fetch_data->result();
	 	}
	}

	function get_seller_details($id){
	  	$CI =& get_instance();
		 $fetch_data = $CI->db->get_where('ms_seller',['id'=>$id]);
	 	if ($fetch_data->num_rows() > 0) {
		 	# code...
		 	return $fetch_data->result();
	  	}else{
			return $fetch_data->result();
	 	}
	}


	function get_review_product_details($id){
	 	$CI =& get_instance();
		$fetch_data = $CI->db->get_where('ms_feedback',['product_id'=>$id]);
	 	if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
	 	}else{
	 		return $fetch_data->result();
	 	}
	 }


	//Cart Image Helper Function 

	//get my_order details
	function get_order_products($tablename, $order_id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where($tablename,['order_id'=> $order_id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	} 
	//get my_order details


	//Get Coupan Code 
	function get_coupan_products($tablename, $order_id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where($tablename,['product_id'=> $order_id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}


	//Get Coupan Code 

	//get all customer 
	function get_all_customer($order_date){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where('ms_orders', ['order_date'=> $order_date,'order_status'=>'Delivered']);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	} 

	function get_all_prepaid_customer($order_date){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where('online_order_payment', ['order_date'=> $order_date,'order_status'=>'Delivered']);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	} 
	//get all customer  

?>