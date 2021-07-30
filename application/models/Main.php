<?php 


class Main extends CI_Model
{
	
	public function login_auth($tablename, $args){
		$fetch_recordes = $this->db->get_where($tablename, $args);

//check query is working or not 
		// echo $this->db->last_query();
		// die();
		
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}
	}

	

	public function multiple_images_products($image = array()){
			return $this->db->insert_batch('testing_image',$image);
    }

	

	public function category_data($tablename, $data){
		$insert_rec  = $this->db->insert($tablename, $data);
		if ($this->db->affected_rows() > 0) {
			# code...
			return true;
		}else{
			return false;
		}

	}

	public function fetch_rec_by_args($tablename, $args){
		$this->db->order_by('id','desc');
		$fetch_data = $this->db->get_where($tablename, $args);
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

	public function loggiedin_user_account($tablename, $args){
		$this->db->select('id, fullname,email,mobile_no,password,address');
		$this->db->from($tablename);
	    $this->db->where($args);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
	        return $row;
		}
	}

	public function fetch_shiprocket_token($tablename){
		$this->db->select('*');
		$this->db->from($tablename);
		$query = $this->db->get();
		if ($query->num_rows() > 0 )
	    {
	        $row = $query->row_array();
	        return $row;
	    }	
	}

	public function fetch_all_rec_buyer_sell($tablename){
		$fetch_data =$this->db->select('*')
			->from($tablename)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

	public function fetch_all_records($tablename,$order,$limit){
		if ($limit == "limit") {
			# code...
		}else{
			$this->db->limit($limit);
		}
		$fetch_data =$this->db->select()
			->from($tablename)
			->order_by('id', $order)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}
	public function delete_record_by_args($tablename, $args){
		$delete_rec  = $this->db->delete($tablename, $args);
		if ($this->db->affected_rows() > 0) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function update_records_by_args($tablename, $data, $args){
		$update_records = $this->db->where($args)
			->update($tablename, $data);
		if ($this->db->affected_rows() > 0) {
			# code...
			return true;
		}else{
			return false;
		}	
	}

	public function fetch_records_by_args_with_like($tablename,$args){
		$fetch_recordes = $this->db->select()
			->from($tablename)
			->like($args)
			->get();
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}	
	}

	//get data higest lowest price data 
	public function fetch_records_by_order($tablename, $order_filter){
		extract($order_filter);
		$fetch_recordes = $this->db->select()
			->from($tablename)
			->order_by($order_filter['column_name'], $order_filter['order'])
			->get();
			// echo $this->db->last_query();
			// die();
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}	
	}

	public function inser_data($tablename, $data){
		$insert_rec  = $this->db->insert($tablename, $data);
		if ($this->db->affected_rows() > 0) {
			# code...
			return true;
		}else{
			return false;
		}
	}

	public function fetch_rec_by_args_with_order($tablename, $args, $order_format){
		extract($order_format);
		$fetch_recordes = $this->db->select()
			->from($tablename)
			->where($args)
			->order_by($order_format['column_name'], $order_format['order'])
			->get();
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}	
	}

	public function fetch_rec_by_args_with_limit($tablename,$args,$limit){
		$this->db->limit($limit);
		$fetch_recordes = $this->db->get_where($tablename,$args);
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}
	}
	public function fetch_all_records_with_pag_with_args($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select()
			->from($tablename)
			->where($args)
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}
	public function fetch_all_records_with_pagination($tablename,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select()
			->from($tablename)
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	public function fetch_rec_join_pagination_with_args($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select("ms_order_products.order_id,ms_order_products.seller_id,
			$tablename.*")
			->from("$tablename")
			->where($args)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}
	}

	public function fetch_rec_by_args_with_join($tablename,$args){
		$fetch_recordes = $this->db->select("ms_order_products.order_id,
			ms_order_products.rate,ms_order_products.couponCode,ms_order_products.seller_id,
			$tablename.*")
			->from($tablename)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->where($args)
			->get();
		if ($fetch_recordes->num_rows() > 0) {
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}	
	}


	public function fetch_all_sales_reports($tablename, $args){
		$fetch_data = $this->db->select("ms_order_products.order_id,ms_order_products.seller_id,
			$tablename.*, order_date,COUNT(order_date),SUM(total_quantity),SUM(total_amount)")
			->from($tablename)
			->where($args)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->group_by('order_date')
			->get();
			// echo $this->db->last_query($fetch_data);
		 if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result_array();
		}else{
			return $fetch_data->result_array();
		}	
	}

	public function fetch_rec_by_args_like($tablename,$args){
		$fetch_recordes = $this->db->select("ms_order_products.order_id,ms_order_products.seller_id,
			$tablename.*")
			->from($tablename)
			->like($args)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->get();
		if ($fetch_recordes->num_rows() > 0) {
			# code...
			return $fetch_recordes->result();
		}else{
			return $fetch_recordes->result();
		}	
	}




	public function fetch_rec_by_args_joing_with_pagination($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select("ms_order_products.order_id,ms_order_products.seller_id,
			$tablename.*")
			->from($tablename)
			->like($args)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	public function fetch_rec_by_like_with_join_with_page($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select("ms_order_products.order_id,ms_order_products.seller_id,
			$tablename.*")
			->from($tablename)
			->like($args)
			->join('ms_order_products', "$tablename.order_id = ms_order_products.order_id")
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}



	public function fetch_records_by_like_with_pagination($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select()
			->from($tablename)
			->like($args)
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}
	public function insert_data($tablename, $data){
		$insert_rec  = $this->db->insert($tablename, $data);
		if ($this->db->affected_rows() > 0) {
			# code...
			return true;
		}else{
			return false;
		}

	}

	public function insert_data_with_last_id($tablename, $data){
		$insert_rec = $this->db->insert($tablename,$data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		}else{
			return 0;
		}
	}

	public function fetch_all_records_with_order($tablename, $order_format, $limit){
		extract($order_format);
		if ($limit == 'limit') {
			# code...
		}else{
			$this->db->limit($limit);
		}
		$fetch_data = $this->db->select()
			->from($tablename)
			->order_by($order_format['column_name'], $order_format['order'])
			->get();
		if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	public function fetch_all_records_with_order_args($tablename,$args, $order_format, $limit){
		extract($order_format);
		if ($limit == 'limit') {
			# code...
		}else{
			$this->db->limit($limit);
		}
		$fetch_data = $this->db->select()
			->from($tablename)
			->where($args)
			->order_by($order_format['column_name'], $order_format['order'])
			->get();
		if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}
	public function fetch_all_sales($args){
		$fetch_data = $this->db->select('order_date,COUNT(order_date),SUM(total_quantity),SUM(total_amount)')
			->from('ms_orders')
			->where($args)
			->group_by('order_date')
			->get();
		if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result_array();
		}else{
			return $fetch_data->result_array();
		}	
	}


	public function fetch_all_sale_income($args){
		$fetch_data = $this->db->select()
				->from('ms_orders')
				->where($args)
				->get();
		
		if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}
	public function fetch_all_prepaid_sale_income($args){
		$fetch_data = $this->db->select()
				->from('online_order_payment')
				->where($args)
				->get();
		
		if ($fetch_data->num_rows() > 0) {
			
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}

	



	public function fetch_all_records_by_args_with_pagination($tablename,$args,$order_format,$limit,$offeset){
		extract($order_format);
		$fetch_data =$this->db->select()
			->from($tablename)
			->where($args)
			->order_by($order_format['column_name'],$order_format['order'])
			->limit($limit,$offeset)
			->get();
		if ($fetch_data->num_rows() > 0) {
			# code...
			return $fetch_data->result();
		}else{
			return $fetch_data->result();
		}	
	}





		public function Publish_Slider_Image($img, $slide_link){
			$insert_slider = $this->db->insert('image_slider', ['slider_image'=>$img, 'slider_link'=> $slide_link]);
			if ($insert_slider) {
				# code...
				return true;
			}else{
				return false;
			}
		}


		public function get_slider_image($limit){
			$get_slider_image = $this->db->select()
				->from('image_slider')
				->order_by('id', 'desc')
				->limit($limit)
				->get();
			if ($get_slider_image->num_rows() > 0) {
				# code... (Developer Khan Rayees)
				return $get_slider_image->result();
			}else{
				return $get_slider_image->result();
			}	
		}


		//Change User Password Query start

		public function get_user($id)
	    {
	        $this->db->where('email', $id);
	        $query = $this->db->get('ms_users');
	        return $query->row();
	    }

	    public function get_old_password_details($tablename, $id) {
	        $this->db->where('id', $id);
	        $query = $this->db->get($tablename);
	        return $query->row();
	    }
	//Change User Password Query End

	    //Forget Password Query
	    public function ForgotPassword($email){
	    	$this->db->select('email');
		    $this->db->from('ms_users');
		    $this->db->where('email', $email);
		    $query=$this->db->get();
		    return $query->row_array();
	    }




	    public function sendpassword($email)
			{
			$email = $email['email'];
			$query1=$this->db->query("SELECT *  from ms_users where email = '".$email."' ");
			$row=$query1->result_array();

			if ($query1->num_rows()>0)
			     
			{

			$passwordplain = "";
			$passwordplain  = rand(999999999,9999999999);
			$newpass['password'] = md5($passwordplain);
			$this->db->where('email', $email);
			$this->db->update('ms_users', $newpass); 
			$this->email->from('khanrayeesq121@gmail.com','Multivendor Online Shopping');
			$this->email->to($email);
			 $this->email->subject('Forgot Password !');
			    $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
			$mail_message.='<br>Please Update your password.';
			$mail_message.='<br>Thanks & Regards';
			$mail_message.='<br>Multivendor Online Shopping Cart Khan Rayees';       
			$this->email->message($mail_message);
			if (! $this->email->send()) {
				$this->session->set_flashdata('error','Failed to send password, please try again!');
			} else {
				$this->session->set_flashdata('success','Password sent to your email!');
				return redirect('Home/user_signin'); 
			}
				return redirect('Home/forget_view');        
		}else{  
			$this->session->set_flashdata('msg','Email not found try again!');
				return redirect('Home/forget_view');
		}
	}


	  
	    //Forget Password Query


		public function fetch_rec_coupan($args){
			$fetch_data = $this->db->select('couponAmount,discount_type')
					->from('coupons')
					->where($args)
					->get();
			
			if ($fetch_data->num_rows() > 0) {
				
				return $fetch_data->result();
			}else{
				return $fetch_data->result();
			}	
		}


		public function fetch_rec_carts($args){
			$fetch_data = $this->db->select('rate')
					->from('ms_carts')
					->where($args)
					->get();
			
			if ($fetch_data->num_rows() > 0) {
				
				return $fetch_data->result();
			}else{
				return $fetch_data->result();
			}	
		}
//	Seller Section Script Start 
		public function verify_seller_account($unid){
		  	$fetch_data = $this->db->select('created_date,seller_uid,status')
						->from('ms_seller')
						->where('seller_uid', $unid)
						->get();
			if (count($fetch_data->result_array()) == 1) {
				return $fetch_data->row();
			}else{
				return false;
			}				
		}

		public function update_seller_status($unid){
			$update_records = $this->db->where('seller_uid',$unid)
							->update('ms_seller', ['status'=>'AdminVerification']);
			if ($this->db->affected_rows() > 0) {
				# code...
				return true;
			}else{
				return false;
			}				
		}
//	Seller Section Script Start 
				

		


	






}


?>