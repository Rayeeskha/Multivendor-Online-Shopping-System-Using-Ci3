<?php 
	function get_customer_message($tablename, $user_id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where($tablename,['user_id'=> $user_id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

	function get_message_detail($id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where('ms_replay_message',['user_id'=>$id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}




?>