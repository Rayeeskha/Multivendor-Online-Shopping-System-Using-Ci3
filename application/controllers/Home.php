<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Developed by Khan Rayees Software Developer
class Home extends CI_Controller {
	private $user_profile;
	public function __construct(){
		parent::__construct();
		//main model load
		$this->load->model('main','cm');
		//get users details
		$args = [
			'email'     => $this->session->userdata('email'),
			'password'  => $this->session->userdata('password')
		];
		$this->user_profile  = $this->cm->fetch_rec_by_args('ms_users',$args);
		//get users details
	}

	public function index(){
		$args = [
			'status'  => '0',
		];
		$data['categories'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
		/* Image Slider Show */
		$data['slider_image'] = $this->cm->get_slider_image(3);
		$this->load->view('Home/index', $data);
	}
	public function user_signup($page = ""){
		$this->load->view('Home/user_signup',['page' => $page]);
	}

	public function user_registered($page = ""){
		$data = [
			'fullname'      => $this->input->post('full_name'),
			'email'         => $this->input->post('email'),
			'mobile_no'     => $this->input->post('mobile'),
			'password'      => md5($this->input->post('password')),
			'address'       => $this->input->post('address'),
			'register_date' => date('Y-m-d')
		];
		$data['email']     = $this->input->post('email');
		$check_email   = $this->db->get_where('ms_users', array('email' => $data['email']))->row()->email;
		if ($check_email != null) {
                # code...
            $this->session->set_flashdata('error', 'Your EmaiID is Already Exists ..! Go to Login');
            return redirect('Home/user_signup/' .$page);
        }else{
            
            if ($data['fullname'] == "" && $data['email'] == "" && $password == "") {
				$this->session->set_flashdata('error', 'Please Enter Required Information!..');
				return redirect('Home/user_signup/' .$page);
			}else{
				$result = $this->cm->insert_data('ms_users',$data);
				if ($result == true) {
					$emailTo = $this->input->post('email');
					$this->email($emailTo);
					$user_session  = [
						'fullname' => $data['fullname'],
						'email'    => $data['email'],
						'password' => $data['password']
					];
					$this->session->set_userdata($user_session);
					
					if ($page == 'cart') {
						return redirect('Home/carts');
					}else{
						return redirect('Home/user_dashboard');
					}
				}else{
					$this->session->set_flashdata('error','Error ! Somthing Wrong User Register Failed !');
					return redirect('Home/user_signup/' .$page);
				}
			}
        }
	}

	public function email($emailTo){
		$this->load->library('email');
		$this->email->from('khanrayeesq121@gmail.com','Online Shopping Khan Rayees');
		$this->email->to($emailTo);
		$this->email->subject('Congratulation !');
		$mail_message.='<br>Welcome !';
		$mail_message.='Thanks You are Successfully Register !,<br> Your <b>Online Shopping Cart</b>';
		$mail_message.='<br>Thanks & Regards';
		$mail_message.='<br>Online Shopping Cart Developed & Maintain by Khan Rayees Software Developer';       
		$this->email->message($mail_message);
		if (! $this->email->send()) {
			show_error($this->email->print_debugger());
			$this->session->set_flashdata('error', 'Your Email Id is Not Currect message Not Send in Your Email!..');
		}else{
			$this->session->set_flashdata('success', 'Congratulation! Your Email has been Send Successfully Please Check Mail..');
		}
	}

	public function user_signin($page = ""){
		$this->load->view('Home/user_signin',['page'=> $page]);
	}

	public function user_loged_in($page = ""){
		 $args = [
		 	'email'   => $this->input->post('email'),
		 	'password'   => md5($this->input->post('password')),
		 ];
		
		$result = $this->cm->loggiedin_user_account('ms_users', $args);
		if ($result == true) {
			$user_session  = [
				'id'       => $result['id'],
				'fullname' => $result['fullname'],
				'email'    => $result['email'],
				'password' => $result['password']
			];
			$this->session->set_userdata($user_session);
			if ($page == "cart") {
				return redirect('Home/carts');
			}else{
				return redirect('Home/user_dashboard');
			}
		}else{
			$this->session->set_flashdata('error','Your Username and password is Incorrect ?.');
			return redirect('Home/user_signin/'.$page);
		}
	}

	



	public function carts(){
		$args = [
			'session_id'   => $this->session->userdata('session_id')
		];
		
		$data['products'] = $this->cm->fetch_rec_by_args('ms_carts', $args);
		$this->load->view('Home/my_carts', $data);
	}

	public function add_to_cart($product_id){
		
		//set user session  khan Rayees Software Developer
		if ($this->session->userdata('session_id') == "") {
			$user_session_id  = [
				'session_id'   => rand(9999,999999)
			];
			$this->session->set_userdata($user_session_id);
		}else{
			// $session_id  = $this->session->userdata('session_id');
		}
		//set user session  khan Rayees Software Developer
		$args = [
			'id'   => $product_id
		];
		$product_details = $this->cm->fetch_rec_by_args('ms_products', $args);

//Add one id data  already added or not check and quantity increment script Khan Rayees Software Developer
		$args = [
			'product_id'  => $product_id,
			'session_id'  => $this->session->userdata('session_id')
		];
		$check_product = $this->cm->fetch_rec_by_args('ms_carts', $args);
		if (count($check_product)) {
			# code...
			$old_qty = $check_product[0]->quantity;
			$new_qty = $old_qty + 1;
			$args = [
				'id'  => $check_product[0]->id
			];
			$data = [
				'quantity'   => $new_qty
			];
			$result = $this->cm->update_records_by_args('ms_carts',$data, $args);
			if ($result == true) {
				# code...
				echo "1";
			}else{	
				echo "0";
			}
		}else{
			$data = [
				'product_id'       => $product_details[0]->id,
				'seller_id'        => $product_details[0]->seller_id,
				'session_id'       => $this->session->userdata('session_id'),
				'product_name'     => $product_details[0]->product_title,
				'quantity'         => '1',
				'rate'             => $product_details[0]->price,
				'sku_code'         => $product_details[0]->sku_code
			];
			$result = $this->cm->insert_data('ms_carts',$data);
			if ($result == true) {
				# code...
				echo "1";
			}else{
				echo "0";
			}
		}
//Add one id data  already added or not check and quantity increment script Khan Rayees Software Developer
		
	}



	public function remove_product($product_id = 0){
		$args = [
			'product_id'  => $product_id,
			'session_id'  => $this->session->userdata('session_id')
		];
		$result = $this->cm->delete_record_by_args('ms_carts', $args);
		if ($result == true) {
			# code...
			$this->session->set_flashdata('success','Congratulation ! Product Remove Successfully..');
		}else{
			$this->session->set_flashdata('error', 'Product Fail Not Removed !');
		}
		return redirect('Home/carts');
	}

	public function update_quantity($quantity, $type,$product_id){
		if ($type == "add") {
			$new_qty = $quantity + 1;
			$args = [
				'product_id'   => $product_id
			];
			$data = [
				'quantity'  => $new_qty
			];
			$result = $this->cm->update_records_by_args('ms_carts',$data,$args);
		}else{
			if ($quantity > 1) {
				$new_qty = $quantity - 1;
				$args = [
					'product_id'   => $product_id
				];
				$data = [
					'quantity'  => $new_qty
				];
				$result = $this->cm->update_records_by_args('ms_carts',$data,$args);
			}else{
				$result = false;
			}
			
		}
		if ($result == true) {
			# code...
			echo "1";
		}else{
			echo "0";
		}
	}

	public function calculate_carts_products(){
		$args = [
			'session_id'  => $this->session->userdata('session_id')
		];
		$products = $this->cm->fetch_rec_by_args('ms_carts', $args);
		$calculate_amount = 0;
		if ($products) {
			count($products);
			foreach($products as $product){
				$calculate_amount  += ($product->rate * $product->quantity);
			}
		}else{
			$calculate_amount = 0;
		}
		$data = [
			'total_products'   => count($products),
			'total_amount'     => ($calculate_amount > 0) ? number_format($calculate_amount) : '0'
		];
		echo json_encode($data);
	}

	public function shipping_details(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{

			$this->load->view('Home/shipping_details');
		}
	}

	public function add_shipping_details($user_id = 0){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('street_house_no', 'House Number', 'required');
            $this->form_validation->set_rules('pincode', 'PinCode', 'required|exact_length[6]');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('area_code', 'Area Code', 'required');
            $this->form_validation->set_rules('address_line_two', 'Address', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|exact_length[10]');
            $this->form_validation->set_rules('country','Country','required');
            $this->form_validation->set_rules('city','City','required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if ($this->form_validation->run() == TRUE){
                $data = [
                	'first_name'       => $this->input->post('first_name'),
                	'last_name'        => $this->input->post('last_name'),
                	'mobile'           => $this->input->post('mobile'),
                	'email'            => $this->input->post('email'),
                	'street_house_no'  => $this->input->post('street_house_no'),
                	'zip_code'         => $this->input->post('pincode'),
                	'state'            => $this->input->post('state'),
                	'city'             => $this->input->post('city'),
                	'country'          => $this->input->post('country'),
                	'area_code'        => $this->input->post('area_code'),
                	'address'          => $this->input->post('address_line_two'),
                	'user_id'          => $user_id
                ];
                $result = $this->cm->insert_data('ms_temp_address', $data);
                if ($result == true) {
                	$this->session->set_flashdata('success', 'Congratulation ! Purchse Products');
					return redirect('Home/place_order');
                }else{
                	$this->session->set_flashdata('error', 'Please Fill Shipping Details Proper & Valid Details !');
					return redirect('Home/shipping_details');
                }
            }
            else{
               $this->load->view('Home/shipping_details'); 
            }
	}

	public function edit_shipping_details($user_id = 0){
		$args = [
			'user_id'  => $user_id
		];
		$data['edit_address'] = $this->cm->fetch_rec_by_args('ms_temp_address', $args);
		$this->load->view('Home/edit_shipping_details', $data);
	}

	public function update_shipping_details($user_id){
		$args = [
			'user_id'  => $user_id
		];
		$data = [
            'first_name'       => $this->input->post('first_name'),
            'last_name'        => $this->input->post('last_name'),
            'mobile'           => $this->input->post('mobile'),
            'email'            => $this->input->post('email'),
            'street_house_no'  => $this->input->post('street_house_no'),
            'zip_code'         => $this->input->post('zip_code'),
            'state'            => $this->input->post('state'),
            'city'             => $this->input->post('city'),
            'country'          => $this->input->post('country'),
            'area_code'        => $this->input->post('area_code'),
            'address'          => $this->input->post('address_line_two')
        ];
		$result = $this->cm->update_records_by_args('ms_temp_address',$data,$args);
		if ($result == true) {
			// $this->session->set_flashdata('success', 'Congratulation ! Your Shipping Adress is Forwarded Successfully !');
			return redirect('Home/place_order');
		}else{
			$this->session->set_flashdata('error', 'Fail ! Shipping Address Contact to Administrator !');
			return redirect('Home/edit_shipping_details/'.$user_id);
		}
	}


	public function place_order(){
		$args = [
			'session_id'  => $this->session->userdata('session_id')
		];
		$data['products'] = $this->cm->fetch_rec_by_args('ms_carts',$args);
		$this->session->unset_userdata('coupan_code');
		$this->session->unset_userdata('discount_price');
		$this->session->unset_userdata('coupan_value');
		$this->session->unset_userdata('coupan_mstercode');
		$this->load->view('Home/place_order', $data);
	}

	



	public function complete_purchased(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'session_id'  => $this->session->userdata('session_id')
			];
			$products = $this->cm->fetch_rec_by_args('ms_carts',$args);
			
			$user = $this->user_profile;

			//Get Shipping Address
			$args =[
				'user_id'   => $user[0]->id
			];
			$tem_address = $this->cm->fetch_rec_by_args('ms_temp_address', $args);
			//Get Shipping Address

			//Get Products
			$total_quantity = 0;
			$total_amount = 0;
			if ($products) {
				count($products);
				foreach ($products as $pro) {
					$total_quantity   += $pro->quantity;
					$total_amount     += ($pro->quantity * $pro->rate);
				}
			}else{
				$total_quantity  = 0;
			}



			if ($this->session->has_userdata('coupan_id')) {
				$coupan_id         = $this->session->userdata('coupan_id');
				$final_price       = $this->session->userdata('discount_price');
				$coupan_value      = $this->session->userdata('coupan_value');
				$coupan_mstercode  = $this->session->userdata('coupan_code');
				$this->session->unset_userdata('coupan_id');
				$this->session->unset_userdata('discount_price');
				$this->session->unset_userdata('coupan_value');
				$this->session->unset_userdata('coupan_code');
				// $this->session->sess_destroy();
			}else{
				$coupan_id  = "0";
				$final_price  = "0";
				$coupan_value  = "0";
				$coupan_mstercode  = "Not applied";
			}

			$order_id = rand(111111,999999);
			//Get Products
			$data = [
				'user_id'          => $user[0]->id,
				'username'         => $user[0]->fullname,
				'order_id'         => $order_id,
				'total_quantity'   => $total_quantity,
				'total_amount'     => $total_amount,
				'payment_mode'     => 'COD',
				'order_date'       => date('Y-m-d'),
				'shipping_address' => $tem_address[0]->address,
				'first_name'       => $tem_address[0]->first_name,
				'last_name'        => $tem_address[0]->last_name,
				'mobile'           => $tem_address[0]->mobile,
				'email'            => $tem_address[0]->email,
				'street_house_no'  => $tem_address[0]->street_house_no,
				'zip_code'         => $tem_address[0]->zip_code,
				'state'            => $tem_address[0]->state,
				'city'             => $tem_address[0]->city,
				'country'          => $tem_address[0]->country,
				'area_code'        => $tem_address[0]->area_code,
				'order_status'     => 'Pending',
				'coupan_id'        => $coupan_id,
				'final_price'      => $final_price,
				'coupan_value'     => $coupan_value,
				'coupan_mstercode' => $coupan_mstercode

			];
			$get_ord_id = $this->cm->insert_data_with_last_id('ms_orders',$data);
			$args = [
				'id'  => $get_ord_id 
			];
			$get_order_detail = $this->cm->fetch_rec_by_args('ms_orders', $args);

			//insert order products


			if ($products) {
				count($products);
				foreach ($products as $pro) {
					$result = $this->db->insert('ms_order_products', [
						'order_id'     => $get_order_detail[0]->order_id,
						'product_id'   => $pro->product_id,
						'product_name' => $pro->product_name,
						'quantity'     => $pro->quantity,
						'rate'         => $pro->rate,
						'sku_code'     => $pro->sku_code,
						'total_rate'   => $pro->total_rate,
						'couponCode'   => $pro->couponCode,
						'coupon_value' => $pro->coupon_value,
						'seller_id'    => $pro->seller_id,
						'discount_type' =>$pro->discount_type
						
					]);
				}
			}else{
				
			}

			$this->load->library('email');
            $to        = $tem_address[0]->email;
			$subject   = 'Order Shipping Details  - Online Shopping Cart';
			$message   = 'Hi ' .$tem_address[0]->first_name."
				<br>Your Order is Placed Successfully.<br>Order Quantity : ".$total_quantity. "<br><br> Order Total Amount is : <br>" .number_format($total_amount)."<br> Discount Coupan:<b>".$coupan_mstercode."<br /> Coupan Value is :" .number_format($coupan_value). "<br/> Coupan Applied Final Price :" .number_format($final_price).  "<br /> Order Date : " .date('d M, Y', strtotime(date('Y-m-d'))). "Payment Mode : <b>Cash On Delivery</b><br/> Thanks for Choosing for me <br/> Your Development Team is Here for:<br/> Khan Rayees Software Developer";
			$this->email->To($to);
			$this->email->From('khanrayeesq121@gmail.com', 'Info');
			$this->email->Subject($subject);
			$this->email->Message($message);
			$filepath = 'assets/images/khanrayees.png';
			$this->email->attach($filepath);
			$this->email->send();

			//insert order products

			$args  = [
				'session_id'   => $this->session->userdata('session_id')

			];
			$result = $this->cm->delete_record_by_args('ms_carts', $args);

			$args = [
				'user_id'  => $user[0]->id
			];
			$result = $this->cm->delete_record_by_args('ms_temp_address',$args);
			
			if ($result == true) {
				$this->session->set_flashdata('success', 'Congratulation ! Your Order Placed Successfully !..');
			}else{
				$this->session->set_flashdata('error', 'Fail ! Some technical Issue Conatct to Administrator !');
			}
			return redirect('Home/user_dashboard');

		}
	}

//Online Payment Razerpay Script Start 
	public function online_purchase_payment(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'session_id'  => $this->session->userdata('session_id')
			];
			$data['itemInfo'] = $this->cm->fetch_rec_by_args('ms_carts',$args);

			
			$user = $this->user_profile;

			//Get Shipping Address
			$args =[
				'user_id'   => $user[0]->id
			];
			$data['tem_address'] = $this->cm->fetch_rec_by_args('ms_temp_address', $args);
			//Get Shipping Address
			$data['return_url'] = base_url().'Home/callback';
        	$data['surl'] = base_url().'Home/success';
        	$data['furl'] = base_url().'Home/failed';
        	$data['currency_code'] = 'INR';
        	$this->load->view('Home/razorpay/checkout', $data);
		}
	}

	    // initialized cURL Request
    private function curl_handler($payment_id, $amount)  {
        $url            = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id         = "rzp_test_NghPbYQxThULdj";
        $key_secret     = "LzKZWjZhW9NpjUWJr2YBqvFt";
        $fields_string  = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }

    // callback method
    public function callback() {   
        print_r($this->input->post());     
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $this->session->set_flashdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_flashdata('merchant_order_id', $this->input->post('merchant_order_id'));
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $this->session->set_flashdata('total_amount', $this->input->post('merchant_total'));
            $quantity = $this->input->post('merchant_quantity');
            $success = false;
            $error = '';
            try {                
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    // die();
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;

                            $args = [
								'session_id'  => $this->session->userdata('session_id')
							];
							$products = $this->cm->fetch_rec_by_args('ms_carts',$args);

							$total_quantity = 0;
							$total_amount = 0;
							if ($products) {
								count($products);
								foreach ($products as $pro) {
									$total_quantity   += $pro->quantity;
									$total_amount     += ($pro->quantity * $pro->rate);
								}
							}else{
								$total_quantity  = 0;
							}
							
							$user = $this->user_profile;

                            //Get Shipping Address
							$args =[
								'user_id'   => $user[0]->id
							];
							$tem_address = $this->cm->fetch_rec_by_args('ms_temp_address', $args);

							if ($this->session->has_userdata('coupan_id')) {
								$coupan_id         = $this->session->userdata('coupan_id');
								// $final_price       = $this->session->userdata('discount_price');
								$coupan_value      = $this->session->userdata('coupan_value');
								$coupan_mstercode  = $this->session->userdata('coupan_code');
								$this->session->unset_userdata('coupan_id');
								$this->session->unset_userdata('discount_price');
								$this->session->unset_userdata('coupan_value');
								$this->session->unset_userdata('coupan_code');
								// $this->session->sess_destroy();
							}else{
								$coupan_id  = "0";
								$coupan_value  = "0";
								$coupan_mstercode  = "Not applied";
							}
							//Get Shipping Address
							$order_id = rand(11111,99999);
                            $data = [
                            	'order_id'         => $this->input->post('merchant_order_id'),
                            	'payment_id'       =>  $this->input->post('razorpay_payment_id'),
                            	'total_amount'     =>  $total_amount,
                            	'total_quantity'   => $this->input->post('merchant_quantity'),
                            	'user_id'          => $user[0]->id,
                            	'payment_mode'     => 'Prepaid',
                            	'shipping_address' => $tem_address[0]->address,
								'first_name'       => $tem_address[0]->first_name,
								'last_name'        => $tem_address[0]->last_name,
								'mobile'           => $tem_address[0]->mobile,
								'email'            => $tem_address[0]->email,
								'street_house_no'  => $tem_address[0]->street_house_no,
								'zip_code'         => $tem_address[0]->zip_code,
								'state'            => $tem_address[0]->state,
								'city'             => $tem_address[0]->city,
								'country'          => $tem_address[0]->country,
								'area_code'        => $tem_address[0]->area_code,
								'order_status'     => 'Pending',
								'order_date'       => date('Y-m-d h:i:s'),
								'payment_status'   => 'Success',
								'coupan_id'        => $coupan_id,
								'final_price'      =>$this->input->post('merchant_total'),
								'coupan_value'     => $coupan_value,
								'coupan_mstercode' => $coupan_mstercode
                            ];
                            $get_order = $this->cm->insert_data_with_last_id('online_order_payment',$data);

                            $args = [
                            	'id'  => $get_order
                            ];
                            $get_order_detail = $this->cm->fetch_rec_by_args('online_order_payment', $args);


							//insert order products
							if ($products) {
								count($products);
								foreach ($products as $pro) {
									$result = $this->db->insert('ms_order_products', [
										'order_id'     => $get_order_detail[0]->order_id,
										'product_id'   => $pro->product_id,
										'product_name' => $pro->product_name,
										'quantity'     => $pro->quantity,
										'rate'         => $pro->rate,
										'sku_code'     => $pro->sku_code,
										'total_rate'   => $pro->total_rate,
										'couponCode'   => $pro->couponCode,
										'coupon_value' => $pro->coupon_value,
										'seller_id'    => $pro->seller_id,
										'discount_type' =>$pro->discount_type
									]);
								}
							}else{
								
							}

							//insert order products
							$this->load->library('email');
				            $to        = $tem_address[0]->email;
							$subject   = 'Order Shipping Details  - Online Shopping Cart';
							$message   = 'Hi ' .$tem_address[0]->first_name. "".$tem_address[0]->last_name."
								<br>Your Order is Placed Successfully.<br>Order Quantity : ".$this->input->post('merchant_quantity'). "<br><br> Order Total Amount is : <br>" .number_format($total_amount)."<br> Discount Coupan:<b>".$coupan_mstercode."<br /> Coupan Value is :" .number_format($coupan_value). "<br/> Coupan Applied Final Price :" .number_format($this->input->post('merchant_total')). "<br /> Order Date : " .date('d M, Y', strtotime(date('Y-m-d'))). "<br>Order id :".$this->input->post('merchant_order_id'). "<br> Transiction Id :" .$this->input->post('razorpay_payment_id'). "<br> Paymet Status : <b>Success</b><br/> Thanks for Choosing for me <br/> Your Development Team is Here for:<br/> Khan Rayees Software Developer";
							$this->email->To($to);
							$this->email->From('khanrayeesq121@gmail.com', 'Info');
							$this->email->Subject($subject);
							$this->email->Message($message);
							$filepath = 'assets/images/khanrayees.png';
							$this->email->attach($filepath);
							$this->email->send();

							$args  = [
								'session_id'   => $this->session->userdata('session_id')

							];
							$result = $this->cm->delete_record_by_args('ms_carts', $args);

							$args = [
								'user_id'  => $user[0]->id
							];
							$result = $this->cm->delete_record_by_args('ms_temp_address',$args);

							return redirect('Home/success_payment');

							} else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }
            
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
    public function success_payment() {
        $data['title'] = 'Razorpay Success | Khan Rayees';
       	$data['payment_id'] = $this->session->flashdata('razorpay_payment_id');
      	$data['order_id']   = $this->session->flashdata('merchant_order_id');
      	$data['total_amount']   = $this->session->flashdata('total_amount');
        $this->load->view('Home/razorpay/success_payment', $data);
    }  
    public function failed() {
        $data['title'] = 'Razorpay Failed | Khan Rayees';
       	$data['payment_id'] = $this->session->flashdata('razorpay_payment_id');
      	$data['order_id']   = $this->session->flashdata('merchant_order_id');
      	$data['total_amount']   = $this->session->flashdata('total_amount');
        $this->load->view('Home/razorpay/failed_amount', $data);
    }





//Online Payment Razerpay Script End

    public function reason_cancel_orders($order_id){
    	if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'order_id'   => $order_id
			];
			$data['ord_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
			$this->load->view('Home/reason_cancel_orders', $data);
		}
    }


	public function cancel_orders($order_id){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->form_validation->set_rules('reasion_title', 'Resion Title', 'required');
            $this->form_validation->set_rules('canc_reasion', 'Cancellation Resion', 'required|min_length[5]');
          	if ($this->form_validation->run() == TRUE){
            	$user_id = $this->user_profile;

            	$data = [
            		'user_id'        => $user_id[0]->id,
            		'order_id'       => $order_id,
            		'resion_title'   => $this->input->post('reasion_title'),
            		'cancel_res_des' =>$this->input->post('canc_reasion'),
            		'cancel_date'    => date('Y-m-d h:i:s') 
            	];
            	$result = $this->cm->insert_data('ms_cancel_ord_resion', $data);
            	if ($result) {
		            $args = [
						'order_id'     => $order_id
					];
					// //Get Products
					$data = [
						'order_date'      => date('Y-m-d'),
						'order_status'     => 'Cancel'
					];
					$result = $this->cm->update_records_by_args('ms_orders',$data, $args);
					if ($result) {
						$this->session->set_flashdata('success', 'Congratulation ! Your Order Cancel Successfully !..');
						return redirect('Home/my_orders');
					}else{
						$this->session->set_flashdata('error', 'Fail ! Some technical Issue Conatct to Administrator !');
						return redirect('Home/reason_cancel_orders');
					}

            	}else{
            		$this->session->set_flashdata('error', 'Fail ! Order is Not Cancel !');
            		return redirect('Home/reason_cancel_orders');
            	}
		 	 }else{
            	$args = [
					'order_id'   => $order_id
				];
				$data['ord_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
            	$this->load->view('Home/reason_cancel_orders', $data);
            }

		}
	}






	public function product_detail($id = ""){
		$args = [
			'id' => $id
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_products', $args);
		$args = [
			'id!='   => $id,
			'category_id' => $data['product'][0]->category_id
		];
		$data['related_products'] = $this->cm->fetch_rec_by_args_with_limit('ms_products',$args,'6');
		$this->load->view('Home/view_product', $data);
	}


	public function user_dashboard(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$user = $this->session->userdata('id');

			// $user = $this->user_profile;
			// $args = [
			// 	'user_id'   => $user[0]->id
			// ];
			$data['orders']  = $this->cm->fetch_rec_by_args('ms_orders', $user);
			
			$args  = [
				'session_id'  => $this->session->userdata('session_id')

			];
			$data['cart_products'] = $this->cm->fetch_rec_by_args('ms_carts',$args);

			$args = [
				'user_id'       => $this->session->userdata('id'),
				'order_status'  => 'Delivered'
			];
			$data['Delivered_orders']  = $this->cm->fetch_rec_by_args('ms_orders', $args);


			$args = [
				'user_id'   => $this->session->userdata('id')
			];
			$data['replayed_message']  = $this->cm->fetch_rec_by_args('ms_replay_message', $args);

			//Online Payment Orders
			$user_details = $this->user_profile;
			$args = [
				'user_id'      => $user_details[0]->id,
				'order_status' => 'Pending'
			];
			$data['online_pay_order'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			//Online Payment Orders
			$this->load->view('Home/user_dashboard', $data);
		}
	}

	public function manage_online_pay_purchase(){
		if ($this->session->userdata('email') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$user = $this->user_profile;
			$args = [
				'user_id'  => $user[0]->id
			];
			$data['online_pay_order'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			$this->load->view('Home/manage_online_pay_purchase', $data);
		}
	}

	public function cancellation_resion_online_order($order_id){
		if ($this->session->userdata('email') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['ord_details'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			$this->load->view('Home/reason_cancel_orders_prepaid', $data);
		}
	}


	public function cancel_Online_orders($order_id){
		if ($this->session->userdata('email') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->form_validation->set_rules('reasion_title', 'Resion Title', 'required');
            $this->form_validation->set_rules('canc_reasion', 'Cancellation Resion', 'required|min_length[5]');
          	if ($this->form_validation->run() == TRUE){
            	$user_id = $this->user_profile;

            	$data = [
            		'user_id'        => $user_id[0]->id,
            		'order_id'       => $order_id,
            		'resion_title'   => $this->input->post('reasion_title'),
            		'cancel_res_des' =>$this->input->post('canc_reasion'),
            		'cancel_date'    => date('Y-m-d h:i:s') 
            	];
            	$result = $this->cm->insert_data('ms_cancel_ord_resion', $data);
            	if ($result) {
		            $args = [
						'order_id'     => $order_id
					];
					// //Get Products
					$data = [
						'order_date'      => date('Y-m-d h:i:s'),
						'order_status'     => 'Cancel'
					];
					$result = $this->cm->update_records_by_args('online_order_payment',$data, $args);
					if ($result) {
						$this->session->set_flashdata('success', 'Congratulation ! Your Order Cancel Successfully ! Your Amount Will be Creadit 3 to 5 working days..');
					}else{
						$this->session->set_flashdata('error', 'Fail ! Some technical Issue Conatct to Administrator !');
						return redirect('Home/cancellation_resion_online_order');
					}
					return redirect('Home/manage_online_pay_purchase');

            	}else{
            		$this->session->set_flashdata('error', 'Fail ! Order is Not Cancel !');
            		return redirect('Home/manage_online_pay_purchase');
            	}
		 	 }else{
            	$args = [
					'order_id'   => $order_id
				];
				$data['ord_details'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
            	$this->load->view('Home/reason_cancel_orders_prepaid', $data);
            }
		}

		
	}




	public function my_orders(){
		$user = $this->user_profile;
		$args = [
			'user_id'  => $user[0]->id
		];
		$data['orders'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
		$this->load->view('Home/my_orders', $data);
	}



	public function get_product_details($product_id = 0){
		$args = [
			'id'  => $product_id
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_products',$args);
		$this->load->view('Home/view_product_details_modal',$data);
	}



	public function category_products($id = ""){
		$args = [
			'category_id'  => $id
		];
		$data['products'] = $this->cm->fetch_rec_by_args('ms_products', $args);
		$args = [
			'id' => $id
		];
		$data['category_detail'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
		
		$this->load->view('Home/view_category', $data);
	}



	public function product_filter($id,$order){
		if ($order == 'default') {
			# code...
			$order_format = [
				'column_name'   => 'id',
				'order'         => 'desc'
			];
		}else if ($order == 'best_metch') {
			# code...
			$order_format = [
				'column_name'   => 'count_sales',
				'order'         => 'desc'
			];
		}else if ($order == 'lowest_price') {
			# code...
			$order_format = [
				'column_name'   => 'price',
				'order'         => 'asc'
			];
		}else if ($order == 'highest_price') {
			# code...
			$order_format = [
				'column_name'   => 'price',
				'order'         => 'desc'
			];
		}else{
			$order_format = [
				'column_name'   => 'id',
				'order'         => 'desc'
			];
		}

		$args = [
				'category_id'  => $id
			];

		$data['products'] = $this->cm->fetch_rec_by_args_with_order('ms_products',$args,$order_format);
		$args = [
			'id' => $id
		];

		$data['category_detail'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
		$this->load->view('Home/view_category', $data);
	}

	public function search_products($val){
		$args = [
			'product_title'  => $val
		];
		$products = $this->cm->fetch_records_by_args_with_like('ms_products',$args);
		
		$output = '';
		if (count($products)) {
			$i=  0;
			foreach($products as $pro){
				$i++;
				$output .= '<a href="'.base_url("Home/product_detail/").$pro->id.'">'.$pro->product_title.'</a>';

				if ($i>13): break;
				endif;
			}
		}else{
			$output = '<a href="#!" style="color:red;">Products Not Available</a>';
		}
		echo $output;
	}




	public function manage_rating($order_id){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			
			$args = [
				'id'               => $order_id,
				'order_status'     => 'Delivered'
				
			];
			//Get Products
			$data['rated_product'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
			$this->load->view('Home/manage_rating', $data);
		}
	}

	public function manage_prepaid_ord_rating($order_id){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			
			$args = [
				'id'               => $order_id,
				'order_status'     => 'Delivered'
				
			];
			//Get Products
			$data['rated_product'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			$this->load->view('Home/manage_rating', $data);
		}
	}


	//Rating Query Start //
	public function rating(){
		if(!empty($_POST['ratingPoints'])){
		    $postID = $_POST['postID'];
		    $ratingNum = 1;
		    $ratingPoints = $_POST['ratingPoints'];
		    
		    //Check the rating row with same post ID
		    $prevRatingQuery = "SELECT * FROM post_rating WHERE id = ".$postID;
		    $prevRatingResult = $this->db->query($prevRatingQuery);
		    if($prevRatingResult->num_rows > 0):
		        $prevRatingRow = $prevRatingResult->row();
		        $ratingNum = $prevRatingRow['rating_number'] + $ratingNum;
		        $ratingPoints = $prevRatingRow['total_points'] + $ratingPoints;
		        //Update rating data into the database
		        $query = "UPDATE post_rating SET rating_number = '".$ratingNum."', total_points = '".$ratingPoints."', modified = '".date("Y-m-d H:i:s")."' WHERE id = ".$postID;
		        $update = $this->db->query($query);
		    else:
		        //Insert rating data into the database
		        $query = "INSERT INTO post_rating (id,rating_number,total_points,created,modified) VALUES(".$postID.",'".$ratingNum."','".$ratingPoints."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
		        $insert = $this->db->query($query);
		    endif;
		    
		    //Fetch rating deatails from database
		    $query2 = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE id = ".$postID." AND status = 1";
		    $result = $this->db->query($query2);
		    $ratingRow = $result->row();
		    // var_dump($ratingRow);
		    // exit();
		    
		    if($ratingRow){
		        $ratingRow->status = 'ok';
		    }else{
		        $ratingRow->status = 'err';
		    }
		    
		    //Return json formatted rating data
		    echo json_encode($ratingRow);
		}
	}
	//Rating Query End //


	public function  Aboutus(){
		$this->load->view('Home/Aboutus_page');
	}

	public function support(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->load->view('Home/contact_us');
		}
		
		
		
		
	}

	public function technical_support(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$user = $this->user_profile;
			$data = [
				'user_id'      => $user[0]->id,
				'full_name'    => $this->input->post('full_name'),
				'mobile'       => $this->input->post('mobile'),
				'message'      => $this->input->post('message'),
				'email'        => $this->input->post('email'),
				'message_date' => date('Y-m-d')

			];
			$result =  $this->cm->insert_data("ms_contact_us", $data);
			if ($result == true) {
				 $this->session->set_flashdata('success', 'Congratulation ! Your Message Send Successfully !');
					return redirect('Home/support');
			}else{
				$this->session->set_flashdata('error', 'Fail ! Message Contact to Administrator !');
				return redirect('Home/support');
			}

		}
	}

	public function my_message(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$user = $this->user_profile;
			$args = [
				'user_id'        => $user[0]->id,
				
			];
			$data['message'] = $this->cm->fetch_rec_by_args('ms_replay_message', $args);
			$this->load->view('Home/my_message', $data);
		}
		
	}

	public function send_replay_message($user_id){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'id' => $user_id
			];
			$result = $this->cm->fetch_rec_by_args('ms_users', $args);
			if ($result == true) {
				$data =[
					'user_id'      => $result[0]->id,
					'full_name'    => $result[0]->fullname,
					'mobile'       => $result[0]->mobile_no,
					'email'        => $result[0]->email,
					'message'      => $this->input->post('message'),
					'message_date' => date('Y-m-d')

				];
				$result =  $this->cm->insert_data("ms_contact_us", $data);
				if ($result == true) {
					$this->session->set_flashdata('success', 'Congratulation ! Your Message Send Successfully !');
						return redirect('Home/my_message');
				}else{
					$this->session->set_flashdata('error', 'Fail ! Message Contact to Administrator !');
						return redirect('Home/my_message');
				}
				
			}else{
				$this->session->set_flashdata('error', 'Fail ! Data is Not properly working !');
				return redirect('Home/my_message');
			}
		}
		
		

		
	}


	public function manage_user_profile(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->load->view('Home/manage_user_profile');
		}
	}

	public function Change_password_view(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->load->view('Home/change_pass_view');
		}
	}

	public function change_user_password(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('old_password', 'old password', 'callback_password_check');
	        $this->form_validation->set_rules('new_password', 'new password', 'required');
	        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == false) {

	        }else{
	        	$args = [
	            	'email'   => $this->session->userdata('email')
	            ];
	            $data = [
	            	'password' => md5($this->input->post('new_password'))

	            ];
				$result = $this->cm->update_records_by_args('ms_users',$data, $args);

	           if ($result == true) {
	            	$this->session->set_flashdata('success', 'Congratulation ! Password Changed  Successfully !');
						return redirect('Home/Change_password_view');
	            }else{
	            	$this->session->set_flashdata('error', 'Failed ! Password Changed   !');
						return redirect('Home/Change_password_view');
	            }
	        }

			
			
		}
	}

	 public function password_check($oldpass)
    {
        $id = $this->session->userdata('email');
        $user = $this->cm->get_user($id);
        if($user->password !== md5($oldpass)) {
            $this->session->set_flashdata('error', 'Failed ! Password does not match   !');
						return redirect('Home/Change_password_view');
            // return false;
        }else{
   		 
        	return true;
        }

        // 
    }

    public function forget_view(){
    	$this->load->view('Home/forget_password');
    }

    public function ForgotPassword(){
    	$email = $this->input->post('email');
	    $findemail = $this->cm->ForgotPassword($email);
	    if ($findemail) {
	        $this->cm->sendpassword($findemail);
	    } else {
	    	$this->session->set_flashdata('error', 'Failed ! Email id is  not found, please enter correct email id !');
	        
	        return redirect('Home/forget_view');
	    }
    }

    ////Coupan Code Script Start 
    public function set_coupan_master_code(){
    	$args = [
    		'coupan_code'  => $this->input->post('input_copan_code')
    	];
    	$coupan_valid = $this->cm->fetch_rec_by_args('coupan_master', $args);
    		$jsonArr = array();
				$cup_mast_sess = $this->session->userdata('coupan_code');
		    	if($cup_mast_sess){
		    		$this->session->unset_userdata('coupan_id');
					$this->session->unset_userdata('discount_price');
					$this->session->unset_userdata('coupan_value');
					$this->session->unset_userdata('coupan_code');
				}

		    	//Get  Session Products
		    	$args = [
					'session_id'  => $this->session->userdata('session_id')
				];
				$products = $this->cm->fetch_rec_by_args('ms_carts',$args);
				//Get Products
				$total_quantity = 0;
				$carttotal_amount = 0;
				foreach ($products as $pro) {
					$total_quantity   += $pro->quantity;
					$carttotal_amount     += ($pro->quantity * $pro->rate);
				}
				//Get  Session Product Logic Algo By ( Khan Rayees Software Developer)
		    	if ($coupan_valid) {
		    		if ($coupan_valid[0]->expiry_date > date('Y-m-d')) {
		    			if ($coupan_valid[0]->status == '0') {
		    				$coupan_id       = $coupan_valid[0]->id;
							$coupan_code     = $coupan_valid[0]->coupan_code;
							$coupan_value    = $coupan_valid[0]->coupan_value;
				    		$coupan_type     = $coupan_valid[0]->coupan_type;
				    		$cart_min_value  = $coupan_valid[0]->cart_min_value;

							if ($cart_min_value> $carttotal_amount) {
								$jsonArr = array('is_error' => 'yes', 'result'=>$carttotal_amount, 'dd'=> 'Cart Value Must be Greater than : '.$cart_min_value);
							}else{
								if ($coupan_type == 'Rupee') {
									$fnl_prc  = $carttotal_amount - $coupan_value;
									$final_price = ceil($fnl_prc);

								}else{
									$fnl_prc =$carttotal_amount - (($carttotal_amount * $coupan_value)/100);
									$final_price = ceil($fnl_prc);
								}
								$disc = $carttotal_amount - $final_price; 
								$discount = ceil($disc);
								$coupan_session_id  = [
									'coupan_id'        => $coupan_id,
									'discount_price'   => $final_price,
									'coupan_value'     => $discount,
									'coupan_code'      => $coupan_code
								];
								$this->session->set_userdata($coupan_session_id);
								$jsonArr = array('is_error' => 'no', 'result' => $final_price, 'dd'=>$discount);
							}
		    			}else{
		    				$jsonArr = array('is_error' => 'yes', 'result'=>$carttotal_amount, 'dd' => 'Deactivated Coupon');
		    			}
		    			
		    		}else{
		    			$jsonArr = array('is_error' => 'yes', 'result'=>$carttotal_amount, 'dd' => 'Coupon is Expired');
		    		}
					
		    	}else{
		    		$jsonArr = array('is_error' => 'yes', 'result'=>$carttotal_amount, 'dd' => 'Invalid Coupan details');
				}

    	echo json_encode($jsonArr);

    }

    public function Coupan_Offer_Code($product_id, $coupan){
    	if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'product_id'  => $product_id,
				'session_id'  => $this->session->userdata('session_id'),
				'couponCode'  => $coupan
			];
			$coupan_used = $this->cm->fetch_rec_carts($args);
			if (!$coupan_used) {
				$args = [
					// 'id'  => $this->session->userdata('id'),
					'product_id'  => $product_id,
					'session_id'  => $this->session->userdata('session_id')
				];
				$carts = $this->cm->fetch_rec_carts($args);
				$args = [
				 	'couponCode'   => $coupan
				];
				$coupons    = $this->cm->fetch_rec_coupan($args);
				if (!empty($carts) && (!empty($coupons))) {
					if ($carts[0]->rate > $coupons[0]->couponAmount) {
						if ($coupons[0]->discount_type == 'Percentage') {
							$fnl_prc =$carts[0]->rate - (($carts[0]->rate * $coupons[0]->couponAmount)/100);
							$final_price = ceil($fnl_prc);
						}else{
							$fnl_prc =$carts[0]->rate - $coupons[0]->couponAmount;
							$final_price = ceil($fnl_prc);
						}
						$disc = $carts[0]->rate - $final_price; 
						$discount = ceil($disc);
						$data = [
							'rate'          => $discount,
							'total_rate'    => $carts[0]->rate,
							'coupon_value'  => $coupons[0]->couponAmount,
							'session_id'    => $this->session->userdata('session_id'),
							'discount_type' => $coupons[0]->discount_type,
							'couponCode'    => $coupan
						];
						$args = [
							'product_id'  =>  $product_id,
							'session_id'  => $this->session->userdata('session_id')
						];

						$this->db->where($args);
		               $result = $this->db->update('ms_carts',$data);
		              //   echo $this->db->last_query();
				       	    // die();
						if ($result == true) {
						# code...
							echo "1";
						}else{	
							echo "0";
						}
					}else{
						echo "price_not";
					}
					
				}
			}else{
				echo "used";
			}

   		}
	}

	public function Offer_products(){
		if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$args = [
				'couponStatus'  => '0',
				'couponExpiryDate>='  => date('Y-m-d')
			];
			$data['discount_offer'] = $this->cm->fetch_rec_by_args('coupons', $args);

			$args = [
				'status'         => '0',
				'expiry_date>='  => date('Y-m-d')
			];
			$data['coupon_master'] = $this->cm->fetch_rec_by_args('coupan_master', $args);
	    	$this->load->view('Home/Offer_products',$data);
		}
	}

    public function feed_back($id){
    	if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{

			$args = [
				'id'   => $id
			];
			$data['products_feedback']  = $this->cm->fetch_rec_by_args('ms_products', $args);
			$this->load->view('Home/feed_back', $data);
		}
    }


    public function upload_product_review($id){
    	if ($this->session->userdata('email') == "" && $this->session->userdata('password') == "") {
			# code...
			return redirect('Home/user_signin');
		}else{
			$user = $this->user_profile;
			$args = [
				'user_id'     => $user[0]->id,
				'product_id'  => $id
			];

			$result = $this->cm->fetch_rec_by_args('ms_feedback', $args);
			
			if ($result) {
				$args =  [
					'product_id'  => $id,
					'user_id'     => $user[0]->id
				];
				$config = [
				'upload_path'   => './uploads/review_image',
				'allowed_types' => 'jpg|jpeg|png|gif'

				]; 
				$this->load->library('upload', $config);
				$this->upload->do_upload('product_rev_image');
				$img = $this->upload->data('file_name');

				$data  = [
					'user_id'     => $user[0]->id,
					'product_id'  => $id,
					'rating'      => $this->input->post('star_rating'),
					'feedback'      => $this->input->post('review_message'),
					'image'       => $img,
					'status'      => '0',
					'feedback_date' => date('Y-m-d')
				];
				$result = $this->cm->update_records_by_args('ms_feedback', $data, $args);
				if ($result == true) {
					 $this->session->set_flashdata('success', 'Congratulation ! Thanks for Your Feedback  !');
					return redirect('Home/feed_back/'.$id);
				}else{
					$this->session->set_flashdata('error', 'Fail ! Fail Feedback !');
					return redirect('Home/feed_back/'.$id);
				}
				// var_dump($result);
				// exit();
				// echo $this->db->last_query();
		  //       die();
			}else{
				$config = [
				'upload_path'   => './uploads/review_image',
				'allowed_types' => 'jpg|jpeg|png|gif'

				]; 
				$this->load->library('upload', $config);
				$this->upload->do_upload('product_rev_image');
				$img = $this->upload->data('file_name');

				$data  = [
					'user_id'     => $user[0]->id,
					'product_id'  => $id,
					'rating'      => $this->input->post('star_rating'),
					'feedback'      => $this->input->post('review_message'),
					'image'       => $img,
					'status'      => '0',
					'feedback_date' => date('Y-m-d')
				];
				$result = $this->cm->insert_data('ms_feedback',$data);

				if ($result == true) {
					 $this->session->set_flashdata('success', 'Congratulation ! Thanks for Your Feedback  !');
					return redirect('Home/feed_back/'.$id);
				}else{
					$this->session->set_flashdata('error', 'Fail ! Fail Feedback !');
					return redirect('Home/feed_back/'.$id);
				}

			}
		}
    }


    public function Product_review($id){
		$args = [
			'id'   => $id
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_products', $args);
		$this->load->view('Home/Product_review', $data);

	}

	public function api_get_pincode(){
		$pincode=$_POST['pincode'];
		$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
		$data=json_decode($data);
		if(isset($data->PostOffice['0'])){
			$arr['city']=$data->PostOffice['0']->Taluk;
			$arr['state']=$data->PostOffice['0']->State;
			echo json_encode($arr);
		}else{
			echo 'no';
		}
	}







	//User Shipping Email Template Query End -----






	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		return redirect('Home/user_signin');
	}



	










}



?>