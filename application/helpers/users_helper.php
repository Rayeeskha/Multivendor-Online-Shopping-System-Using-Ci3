<?php 
	function get_users_details($username, $password){
		$CI =& get_instance();
		$fetch_record = $CI->db->get_where('ms_users',['email'=>$username,'password'=>$password]);
		if ($fetch_record->num_rows() > 0) {
			return $fetch_record->result();
		}else{
			return $fetch_record->result();
		}
	}

	function get_users_details_by_user_id($tablename, $user_id){
		$CI =& get_instance();
		$fetch_data = $CI->db->get_where($tablename,['id'=> $user_id]);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

?>