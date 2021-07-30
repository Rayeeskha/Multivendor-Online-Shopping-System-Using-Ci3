<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Developed by Khan Rayees Software Developer
class Seller_dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//main model load
		$this->load->model('main','cm');
		if($this->session->userdata('logged_in') !== TRUE) {
			redirect('Seller/index');
		}
	}
	public function index(){
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$data['products'] = $this->cm->fetch_rec_by_args('ms_products', $args);
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$data['coupons'] = $this->cm->fetch_rec_by_args('coupons', $args);
		$args  = [
			'order_date'   => date('Y-m-d'),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$today_orders_data  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-1 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$yesterday_orders_data  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-2 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last_3days_orders  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-3 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last_4days_orders  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-4 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last_5days_orders  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-5 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last_6days_orders  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-6 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last_7days_orders  = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		$data['chart_data']  = [
			'ch_today_order'        => count($today_orders_data),
			'ch_yesterday_order'    => count($yesterday_orders_data),
			'ch_last_3_days_order'  => count($last_3days_orders),
			'ch_last_4_days_order'  => count($last_4days_orders),
			'ch_last_5_days_order'  => count($last_5days_orders),
			'ch_last_6_days_order'  => count($last_6days_orders),
			'ch_last_7_days_order'  => count($last_7days_orders)
		];
		$args = [
			'order_date'   => date('Y-m-d'),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$data['recent_order'] = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);


		//Prpaid Orders Details Chart Section Sctipt Start
		$args  = [
			'order_date'   => date('Y-m-d'),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$today_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-1 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$yest_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-2 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last3_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-3 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last4_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-4 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last5_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-5 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last6_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-6 day")),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$last7_prepaid_ord_data  = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);

		$data['prepaid_chart_data']  = [
			'ch_today_pre_orders'    => count($today_prepaid_ord_data),
			'ch_yes_pre_orders'      => count($yest_prepaid_ord_data),
			'ch_lst_3days_pre_ord'   => count($last3_prepaid_ord_data),
			'ch_lst_4days_pre_ord'  => count($last4_prepaid_ord_data),
			'ch_lst_5days_pre_ord'  => count($last5_prepaid_ord_data),
			'ch_lst_6days_pre_ord'  => count($last6_prepaid_ord_data),
			'ch_lst_7days_pre_ord'  => count($last7_prepaid_ord_data)
		];
		//Prpaid Orders Details Chart Section Sctipt End 
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$order  = [
			'column_name' =>'count_sales',
			'order'       => 'desc',
		];
		$data['top_sold_products'] = $this->cm->fetch_all_records_with_order_args('ms_products',$args,$order, '5');
		$this->load->view('Seller/dashboard',$data);
	}

	public function add_products(){
		$data['categories'] = $this->cm->fetch_all_records('ms_categories','desc','limit');
		$this->load->view('Seller/add_products', $data);
	}

	public function upload_products(){
		$this->form_validation->set_rules('category_id','Category Name','required');
		$this->form_validation->set_rules('product_title','Product Title','required');
		$this->form_validation->set_rules('color','Product Color','required');
		$this->form_validation->set_rules('sku','Product SKU','required');
		$this->form_validation->set_rules('price','Product Price','required');
		$this->form_validation->set_rules('short_desc','Product Discriptio','required');
		if ($this->form_validation->run() == TRUE){
			 	$this->load->library('upload');
				$dataInfo = array();
				$files = $_FILES;
				$cpt = count($_FILES['product_image']['name']);
				for($i=0; $i<$cpt; $i++){           
					$_FILES['product_image']['name']= $files['product_image']['name'][$i];
					$_FILES['product_image']['type']= $files['product_image']['type'][$i];
					$_FILES['product_image']['tmp_name']= $files['product_image']['tmp_name'][$i];
					$_FILES['product_image']['error']= $files['product_image']['error'][$i];
					$_FILES['product_image']['size']= $files['product_image']['size'][$i];    
		            $config = [
						'upload_path'   => './uploads/product_image',
						'allowed_types' => 'jpg|jpeg|png|gif',
						'overwrite'     => FALSE,
						'encrypt_name'  => TRUE
					]; 
					$this->upload->initialize($config);
					// $this->load->library('upload', $config);
					$this->upload->do_upload('product_image');
					if ($this->upload->do_upload('product_image')) {
						$dataInfo[] = $this->upload->data();
					}else{
						$upload_error = $this->upload->display_errors();  
						$error       = $upload_error; 
					 	$this->session->set_flashdata('error', "Failed : $error");
					 	return redirect('Seller_dashboard/add_products');
					}

				}
				$seller_id =  $this->session->userdata('seller_session_id');
				$file_data = [
					'product_title'       => $this->input->post('product_title'),
					'image'               => $dataInfo[0]['file_name'],
					'image_two'           => $dataInfo[1]['file_name'],
					'image_three'         => $dataInfo[2]['file_name'],
					'image_four'          => $dataInfo[3]['file_name'],
					'category_id'         => $this->input->post('category_id'),
					'short_description'   => $this->input->post('short_desc'),
					'color'               => $this->input->post('color'),
					'price'               => $this->input->post('price'),
					'sku_code'            => $this->input->post('sku'),
					'seller_id'           => $seller_id,
					'status'              => '0',
					'upload_date'         => date('Y-m-d')
				];
				$result = $this->cm->inser_data('ms_products',$file_data);
				if ($result == true) {
					$this->session->set_flashdata('success', 'Congratulation! Products Uploaded Successfully..');
				}else{
					$this->session->set_flashdata('error', 'Something wrong Products Not Uploaded');
				}
				return redirect('Seller_dashboard/add_products');

		}else{
		 	$data['categories'] = $this->cm->fetch_all_records('ms_categories','desc','limit');
			$this->load->view('Seller/add_products', $data);
		}
  		
	}

	public function manage_products(){
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/manage_products');
		$config['per_page']  = 10;
		$config['total_rows'] = $this->db->count_all('ms_products');
		$this->load->library('pagination',$config);
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name'  => 'id',
			'order'        => 'desc'
		];
			
		$data['products'] = $this->cm->fetch_all_records_with_pag_with_args('ms_products',$args, $order,$config['per_page'],$this->uri->segment(3));
		$this->load->view('Seller/manage_products', $data);
	}

	public function edit_product($id){
		$args = [
			'id'  => $id
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_products',$args);
		$data['categories'] = $this->cm->fetch_all_records('ms_categories', 'desc','limit');
		$this->load->view('Seller/edit_product', $data);
	}

	public function update_product($id){
			$config = [
				'upload_path'   => './uploads/product_image',
				'allowed_types' => 'jpg|jpeg|png|gif'

			]; 
			$this->load->library('upload', $config);
			//check image
			if ($_FILES['product_image']['name'] == "") {
			}else{
				$args = [
					'id'  => $id
				];
				$old_data = $this->cm->fetch_rec_by_args('ms_products', $args);
				//delete old  image
				unlink('uploads/product_image/'. $old_data[0]->image);
				//delete old  image
				$this->upload->do_upload('product_image');
				$img = $this->upload->data('file_name');
				$data['image']  = $img;
			}
			$data['product_title']      = $this->input->post('product_title');
			$data['category_id']        = $this->input->post('category_id');
			$data['short_description']  = $this->input->post('short_desc');
			$data['color']              = $this->input->post('color');
			$data['price']              = $this->input->post('price');
			if ($data['product_title'] == "" && $data['category_id'] == "" && $data['price'] == "" ) {
				# code...
				$this->session->set_flashdata('error','Please Enter Required Details');
			}else{
				
				$args = [
					'id'  => $id
				];
				$result = $this->cm->update_records_by_args('ms_products', $data, $args);
				if ($result == true) {
					# code...
					$this->session->set_flashdata('success','Congratulation ! Products Updated Successfully..');
				}else{
					$this->session->set_flashdata('error','Failed ! Products Data Not Updated');
				}
			
			}
			return redirect('Seller_dashboard/edit_product/'.$id);
	}

	public function delete_product($id){
		$args = [
			'id'  => $id
		];
		$product = $this->cm->fetch_rec_by_args('ms_products',$args);
			//delete image in folder
		unlink('uploads/product_image/' .$product[0]->image);
			//delete image in folder
		$result  = $this->cm->delete_record_by_args('ms_products', $args);
		if ($result == true) {
			$this->session->set_flashdata('success', 'Congratulation! Products deleted Successfully..');
		}else{
			$this->session->set_flashdata('error', 'Fail ! Products Not deleted');
		}
		return redirect('Seller_dashboard/manage_products');
	}

	public function change_product_status($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status' => $status
		];
		$result = $this->cm->update_records_by_args('ms_products',$data,$args);
		if ($result == true) {
			$this->session->set_flashdata('success', 'Congratulation! Products Status Updated Successfully..');
		}else{
			$this->session->set_flashdata('error', 'Fail ! Products Status Not Updated');
		}
		return redirect('Seller_dashboard/manage_products');
	}

	public function search_products(){
		$args = [
			'product_title'  => $this->input->post('product_name'),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name' => 'id',
			'order'       => 'desc'
		];
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/search_products/');
		$config['per_page']  = 10;
		$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_products',$args));
		$this->load->library('pagination',$config);
		//create pagination
		$data['products'] = $this->cm->fetch_records_by_like_with_pagination('ms_products',$args,$order,$config['per_page'],$this->uri->segment(3));
		
		$this->load->view('Seller/manage_products', $data);
	}

	public function filter_products($filter){
		if ($filter == 'new_products') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			}else if ($filter == 'old_products') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'highest_price') {
				# code...
				$order = [
					'column_name'  => 'price',
					'order'        => 'desc'
				];
			}else if ($filter == 'lowest_price') {
				# code...
				$order = [
					'column_name'  => 'price',
					'order'        => 'asc'
				];
			}else{
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
		}
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/filter_products/'.$filter);
		$config['per_page']  = 10;
		$config['total_rows'] = $this->db->count_all('ms_products');
		$this->load->library('pagination',$config);
		//create pagination
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$data['products'] = $this->cm->fetch_all_records_with_pag_with_args('ms_products',$args, $order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Seller/manage_products', $data);
		
	}

	public function manage_cod_orders(){
		//create pagination
		$args = [
			'order_status!='   => 'Delivered' 
		];
		$config['base_url']  = base_url('Seller_dashboard/manage_cod_orders');
		$config['per_page']  = 10;
		$config['total_rows'] = count($this->cm->fetch_rec_by_args('ms_orders', $args));
		$this->load->library('pagination',$config);
		$args = [
			'seller_id'   => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name'  => 'order_date',
			'order'        => 'desc'
		];
		$data['orders'] = $this->cm->fetch_rec_join_pagination_with_args('ms_orders',$args,$order,$config['per_page'],$this->uri->segment(3));
		$this->load->view('Seller/manage_cod_orders', $data);
	}


	public function filter_cod_order($filter){
		
		if ($filter == 'pending_order') {
			
			$args = [
				'order_status'   => 'Pending',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'processing_order') {
			
			$args = [
				'order_status'   => 'Processing',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'shipped_order') {
			
			$args = [
				'order_status'   => 'Shipped',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'packed_order') {
			
			$args = [
				'order_status'   => 'Packed',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'dispatch_order') {
			
			$args = [
				'order_status'   => 'Dispatch',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'cancel_order') {
			
			$args = [
				'order_status'   => 'Cancel',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'delivered_order') {
			
			$args = [
				'order_status'   => 'Delivered',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/filter_cod_order/'.$filter);
		$config['per_page']  = 10;
		$config['total_rows'] = $this->db->count_all('ms_orders');
		$this->load->library('pagination',$config);
		//create pagination
		$data['orders'] = $this->cm->fetch_rec_by_args_joing_with_pagination('ms_orders',$args,$order,$config['per_page'],$this->uri->segment(4));
			
		$this->load->view('Seller/manage_cod_orders', $data);
	}

	public function search_orders(){
		$args = [
			'first_name'  => $this->input->post('customer_name'),
			'seller_id'   => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name'  => 'order_date',
			'order'        => 'desc'
		];
		//create pagination
		$config['base_url']   = base_url('Seller_dashboard/search_orders/');
		$config['per_page']   = 10;
		$config['total_rows'] = count($this->cm->fetch_rec_by_args_like('ms_orders',$args));
		$this->load->library('pagination',$config);
		//create pagination
		$data['orders'] = $this->cm->fetch_rec_by_args_joing_with_pagination('ms_orders',$args,$order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Seller/manage_cod_orders', $data);
	}

	public function delete_orders($order_id){
		$args = [
			'order_id'  => $order_id
		];
		$result =  $this->cm->delete_record_by_args('ms_order_products', $args);
		$args = [
			'order_id'  => $order_id
		];
		$result =  $this->cm->delete_record_by_args('ms_orders', $args);
		if ($result == true) {
			$this->session->set_flashdata('success','Congratulation ! Order deleted Successfully ! ');
		}else{
			$this->session->set_flashdata('error','Fail ! Some technical Issue Contact to Administrator !');
		}
		return redirect('Seller_dashboard/manage_cod_orders');
	}

	public function view_order($order_id){
		$args = [
			'order_id'  => $order_id
		];
		$data['order_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
		if ($data['order_details'][0]->order_id != $order_id) {
			return redirect('Seller_dashboard/manage_cod_orders');
		}
		$args = [
			'order_id' => $order_id
		];
		$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
		$this->load->view('Seller/order_details', $data);
	}

	public function change_order_status($order_id){
		//Count sold products Developed & Maintain by  Khan Rayees Software Developer
		if ($this->input->post('status') == "Cancel") {
				$args = [
					'order_id'  => $order_id
				];
				$order_ship = $this->cm->fetch_rec_by_args('ms_orders', $args);
				if ($order_ship[0]->ship_order_id > 0) {
					$token = $this->validshiprockettokent_Onpayment();
					$this->Cancel_prepaid_shiprocket_order_details($token, $order_ship[0]->ship_order_id);
				}
			}
			if ($this->input->post('status') == "Shipped") {
				$args = [
					'order_id'  => $order_id
				];
				$data = [
					'length'  => $this->input->post('length'),
					'weight'  => $this->input->post('weight'),
					'height'  => $this->input->post('height'),
					'breadth'  => $this->input->post('Breadth')
				];

				$this->cm->update_records_by_args('ms_order_products', $data, $args);
				$token = $this->validshiprockettokent_Onpayment();
				$this->placeshiprocket_order($token, $order_id);

				$args = [
					'order_id'  => $order_id
				];
				$check_products = $this->cm->fetch_rec_by_args('ms_order_products',$args);
				//$product_ids = "";
				if ($check_products) {
					count($check_products);
					foreach($check_products as $check_pro){
						$product_ids[] = $check_pro->product_id;
						$this->db->insert('ms_sold_products',['product_id' => $check_pro->product_id]);
					}
					//fetch products 
						$sold_products = $this->db->select('product_id, COUNT(product_id)')
										->from('ms_sold_products')
										->where_in('product_id', $product_ids)
										->group_by('product_id')
										->get()->result_array();

							for($i= 0; $i<count($sold_products); $i++){
							$result = $this->db->where('id', $sold_products[$i]['product_id'])
									       ->update('ms_products',['count_sales'=>$sold_products[$i]['COUNT(product_id)']
										]);
						}				
						//fetch products 
				}else{

				}
			}else{

			}
			//Count sold products Developed & Maintain by  Khan Rayees Software Developer

			$args = [
				'order_id'  => $order_id
			];
			$data = [
				'order_status'   => $this->input->post('status')
			];
			$result = $this->cm->update_records_by_args('ms_orders', $data,$args);
			if ($result == true) {
				$this->session->set_flashdata('success','Congratulation ! Order Status Updated Successfully ! ');
			}else{
				$this->session->set_flashdata('error','Fail ! Order Status Update technical Issue Contact to Administrator ! ');
			}
			// return redirect('Admin/view_order/' .$order_id);
		
	}

	public function manage_prepaid_orders(){
	   //create pagination
		$args = [
			'order_status!='   => 'Delivered',
		];
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/online_payment_orders');
		$config['per_page']  = 4;
		$config['total_rows'] = count($this->cm->fetch_rec_by_args('online_order_payment', $args));
		$this->load->library('pagination',$config);
		$args = [
			'seller_id'   => $this->session->userdata('seller_session_id')
		];
		
		$order = [
			'column_name'  => 'order_date',
			'order'        => 'desc'
		];
		$data['orders'] = $this->cm->fetch_rec_join_pagination_with_args('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(3));
		$this->load->view('Seller/manage_prepaid_orders', $data);
	}

	public function filter_online_order($filter){
		
		if ($filter == 'pending_order') {
			$args = [
				'order_status'   => 'Pending',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'processing_order') {
			$args = [
				'order_status'   => 'Processing',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'shipped_order') {
			$args = [
				'order_status'   => 'Shipped',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'packed_order') {
			$args = [
				'order_status'   => 'Packed',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'dispatch_order') {
			$args = [
				'order_status'   => 'Dispatch',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'cancel_order') {
			$args = [
				'order_status'   => 'Cancel',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'delivered_order') {
			$args = [
				'order_status'   => 'Delivered',
				'seller_id'   => $this->session->userdata('seller_session_id')
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/filter_online_order/'.$filter);
		$config['per_page']  = 10;
		$config['total_rows'] = $this->db->count_all('online_order_payment');
		$this->load->library('pagination',$config);
		//create pagination
		$data['orders'] = $this->cm->fetch_rec_by_args_joing_with_pagination('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Seller/manage_prepaid_orders', $data);
	}

	public function search_online_orders(){
		$args = [
			'first_name'  => $this->input->post('customer_name'),
			'seller_id'   => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name' => 'id',
			'order'       => 'desc'
		];
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/search_online_orders/');
		$config['per_page']  = 10;
		$config['total_rows'] = count($this->cm->fetch_rec_by_args_like('online_order_payment',$args));
		$this->load->library('pagination',$config);
		//create pagination
		$data['orders'] = $this->cm->fetch_rec_by_args_joing_with_pagination('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Seller/manage_prepaid_orders', $data);
	}

	public function get_order_details($order_id = 0){
		$args = [
			'order_id'          => $order_id,
			'seller_id'   => $this->session->userdata('seller_session_id')
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_order_products',$args);
		$this->load->view('Seller/get_order_details_modal',$data);
	}


	public function view_online_orders($order_id){
		$args = [
			'order_id'  => $order_id
		];
		$data['order_details'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args = [
			'order_id' => $order_id
		];
		$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
		$this->load->view('Seller/view_online_orders', $data);
	}

	public function change_online_pay_ord_status($order_id){
		//Count sold products Developed & Maintain by  Khan Rayees Software Developer
			if ($this->input->post('status') == "Cancel") {
				$args = [
					'order_id'  => $order_id
				];
				$order_ship = $this->cm->fetch_rec_by_args('online_order_payment', $args);
				if ($order_ship[0]->ship_order_id > 0) {

					$token = $this->validshiprockettokent_Onpayment();
					$this->Cancel_prepaid_shiprocket_order_details($token, $order_ship[0]->ship_order_id);
				}
			}
			if ($this->input->post('status') == "Shipped") {
				$args = [
					'order_id'  => $order_id
				];
				$data = [
					'length'  => $this->input->post('length'),
					'weight'  => $this->input->post('weight'),
					'height'  => $this->input->post('height'),
					'breadth'  => $this->input->post('Breadth')
				];

				$this->cm->update_records_by_args('ms_order_products', $data, $args);
				$token = $this->validshiprockettokent_Onpayment();
				$this->placeshiprocket_online_pay_order($token, $order_id);

				$args = [
					'order_id'  => $order_id
				];
				$check_products = $this->cm->fetch_rec_by_args('ms_order_products',$args);
				//$product_ids = "";
				if ($check_products) {
					count($check_products);
					foreach($check_products as $check_pro){
						$product_ids[] = $check_pro->product_id;
						$this->db->insert('ms_sold_products',['product_id' => $check_pro->product_id]);
					}
					//fetch products 
						$sold_products = $this->db->select('product_id, COUNT(product_id)')
										->from('ms_sold_products')
										->where_in('product_id', $product_ids)
										->group_by('product_id')
										->get()->result_array();


						for($i= 0; $i<count($sold_products); $i++){
							$result = $this->db->where('id', $sold_products[$i]['product_id'])
									       ->update('ms_products',['count_sales'=>$sold_products[$i]['COUNT(product_id)']
										]);
						}				
						//fetch products 
				}else{

				}
			}else{

			}
			//Count sold products Developed & Maintain by  Khan Rayees Software Developer

			$args = [
				'order_id'  => $order_id
			];
			$data = [
				'order_status'   => $this->input->post('status')
			];
			$result = $this->cm->update_records_by_args('online_order_payment', $data,$args);
			if ($result == true) {
				$this->session->set_flashdata('success','Congratulation ! Order Status Updated Successfully ! ');
			}else{
				$this->session->set_flashdata('error','Fail ! Order Status Update technical Issue Contact to Administrator ! ');
			}
		  return redirect('Admin/view_online_orders/' .$order_id);
	}


		//Shiprocket Api Section Start
	public function validshiprockettokent_Onpayment(){
		$result = $this->cm->fetch_shiprocket_token('shiprocket_token');
		$res_added_on = $result['added_on'];
		$added_on = strtotime($res_added_on);
		$current_time = strtotime(date('Y-m-d h:i:s'));
		$diff_time = $current_time - $added_on;
		if ($diff_time > 86400) {
			$token = $this->generate_ship_rocket_tocken();
		}else{
			$token = $result['token'];
			
		}
		return $token;
	}

	public function generate_ship_rocket_tocken(){
		$curl = curl_init();
		  curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 0,
		    CURLOPT_FOLLOWLOCATION => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS =>"{\n    \"email\": \"flexionsoftwaresolution@gmail.com\",\n    \"password\": \"Ray786ees92\"\n}",
		    CURLOPT_HTTPHEADER => array(
		      "Content-Type: application/json"
		    ),
		  ));
		  $SR_login_Response = curl_exec($curl);
		  curl_close($curl);
		  $SR_login_Response_out = json_decode($SR_login_Response);
		 $token = $SR_login_Response_out->{'token'};

		 $args = [
		 	'id'  => 1
		 ];
		  $data = [
		  	'token'     => $token,
		  	'added_on'  => date('Y-m-d h:i:s')
		  ];
		  $this->cm->update_records_by_args('shiprocket_token', $data, $args);
		return $token;
	}	

	public function Cancel_prepaid_shiprocket_order_details($token, $ship_order_id){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\n  \"ids\": [".$ship_order_id."]\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer $token"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}


	public function placeshiprocket_order($token, $order_id){
		$args = [
			'order_id'  => $order_id
		];
		$cus_details = $this->cm->fetch_rec_by_args('ms_orders', $args);
		$f_name              = $cus_details[0]->first_name;
		$l_name              = $cus_details[0]->last_name;
		$shipping_address    = $cus_details[0]->shipping_address;
		$mobile              = $cus_details[0]->mobile;
		$city                = $cus_details[0]->city;
		$pin_code            = $cus_details[0]->zip_code;
		$state               = $cus_details[0]->state;
		$country             = $cus_details[0]->country;
		$email               = $cus_details[0]->email;
		$order_str_to_time   = $cus_details[0]->delivered_date;
		$order_str_time      = strtotime($order_str_to_time);
		$order_dates         = date('Y-m-d h:i', $order_str_time);
		$payment_method      = $cus_details[0]->payment_mode;
		$total_amount        = $cus_details[0]->total_amount;
		$discount            = $cus_details[0]->coupan_value;
		
		$args = [
			'order_id' => $order_id
		];
		$pro_detials = $this->cm->fetch_rec_by_args('ms_order_products', $args);
		$length = $pro_detials[0]->length;
		$weight = $pro_detials[0]->weight;
		$height = $pro_detials[0]->height;
		$breadth = $pro_detials[0]->breadth;
		$html = '';
		foreach ($pro_detials as $product) {
			 // $sku = rand(99999999,88888888);
			$html .= '{
			      "name": "'.$product->product_name.'",
			      "sku": "'.$product->sku_code.'",
			      "units": "'.$product->quantity.'",
			      "selling_price": "'.$product->rate.'",
			      "discount": "'.$product->coupon_value.'",
			      "tax": "",
			      "hsn": ""
			    },';
		}
	    $html = rtrim($html,","); 

		$curl = curl_init();
		  curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 0,
		    CURLOPT_FOLLOWLOCATION => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS =>'{"order_id": "'.$order_id.'",
			  "order_date": "'.$order_dates.'",
			  "pickup_location": "Lucknow",
			  "billing_customer_name": "'.$f_name.'",
			  "billing_last_name": "'.$l_name.'",
			  "billing_address": "'.$shipping_address.'",
			  "billing_address_2": "'.$shipping_address.'",
			  "billing_city": "'.$city.'",
			  "billing_pincode": "'.$pin_code.'",
			  "billing_state": "'.$state.'",
			  "billing_country": "'.$country.'",
			  "billing_email": "'.$email.'",
			  "billing_phone": "'.$mobile.'",
			  "shipping_is_billing": true,
			  "shipping_customer_name": "",
			  "shipping_last_name": "",
			  "shipping_address": "",
			  "shipping_address_2": "",
			  "shipping_city": "",
			  "shipping_pincode": "",
			  "shipping_country": "",
			  "shipping_state": "",
			  "shipping_email": "",
			  "shipping_phone": "",
			  "order_items": [
			    	'.$html.'
			  ],
			  "payment_method": "'.$payment_method.'",
			  "shipping_charges": 0,
			  "giftwrap_charges": 0,
			  "transaction_charges": 0,
			  "total_discount": "'.$discount.'",
			  "sub_total": "'.$total_amount.'",
			  "length": "'.$length.'",
			  "breadth": "'.$breadth.'",
			  "height": "'.$height.'",
			  "weight": "'.$weight.'"
			}',
		    CURLOPT_HTTPHEADER => array(
		      "Content-Type: application/json",
			   "Authorization: Bearer $token"
		    ),
		  ));
		  $SR_login_Response = curl_exec($curl);
		  curl_close($curl);
		 $SR_login_Response_out = json_decode($SR_login_Response);

		 //UPdate Order Records Shipment Details
		 $ship_order_id = $SR_login_Response_out->order_id;
		 $shipment_id = $SR_login_Response_out->shipment_id;

		 $args = [
		 	'order_id'  => $order_id
		 ];	

		 $data = [
		 	'ship_order_id'  => $ship_order_id,
		 	'shipment_id'    =>  $shipment_id
		 ];
		$this->cm->update_records_by_args('ms_orders', $data, $args);

		 echo "Order Id:-".$ship_order_id.'<br />';
		 echo "Shipment Id:-".$shipment_id.'<br />';

		  // echo '<pre>';
		  // echo "<br>";
		 print_r($SR_login_Response);
	}



	public function placeshiprocket_online_pay_order($token, $order_id){
		$args = [
			'order_id'  => $order_id
		];
		$cus_details = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$f_name              = $cus_details[0]->first_name;
		$l_name              = $cus_details[0]->last_name;
		$l_name              = $cus_details[0]->last_name;
		$shipping_address    = $cus_details[0]->shipping_address;
		$mobile              = $cus_details[0]->mobile;
		$city                = $cus_details[0]->city;
		$pin_code            = $cus_details[0]->zip_code;
		$state               = $cus_details[0]->state;
		$country             = $cus_details[0]->country;
		$email               = $cus_details[0]->email;
		$order_str_to_time   = $cus_details[0]->order_date;
		$order_str_time      = strtotime($order_str_to_time);
		$order_dates         = date('Y-m-d h:i', $order_str_time);
		$payment_method      = $cus_details[0]->payment_mode;
		$total_amount        = $cus_details[0]->total_amount;
		$discount            = $cus_details[0]->coupan_value;

		$args = [
			'order_id' => $order_id
		];
		$pro_detials = $this->cm->fetch_rec_by_args('ms_order_products', $args);
		$length = $pro_detials[0]->length;
		$weight = $pro_detials[0]->weight;
		$height = $pro_detials[0]->height;
		$breadth = $pro_detials[0]->breadth;
		$html = '';
		foreach ($pro_detials as $product) {
			 //$sku = rand(99999999,88888888);
			$html .= '{
			      "name": "'.$product->product_name.'",
			      "sku": "'.$product->sku_code.'",
			      "units": "'.$product->quantity.'",
			      "selling_price": "'.$product->rate.'",
			      "discount": "",
			      "tax": "",
			      "hsn": ""
			    },';
		}
	    $html = rtrim($html,","); 

		$curl = curl_init();
		  curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 0,
		    CURLOPT_FOLLOWLOCATION => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS =>'{"order_id": "'.$order_id.'",
			  "order_date": "'.$order_dates.'",
			  "pickup_location": "Lucknow",
			  "billing_customer_name": "'.$f_name.'",
			  "billing_last_name": "'.$l_name.'",
			  "billing_address": "'.$shipping_address.'",
			  "billing_address_2": "'.$shipping_address.'",
			  "billing_city": "'.$city.'",
			  "billing_pincode": "'.$pin_code.'",
			  "billing_state": "'.$state.'",
			  "billing_country": "'.$country.'",
			  "billing_email": "'.$email.'",
			  "billing_phone": "'.$mobile.'",
			  "shipping_is_billing": true,
			  "shipping_customer_name": "",
			  "shipping_last_name": "",
			  "shipping_address": "",
			  "shipping_address_2": "",
			  "shipping_city": "",
			  "shipping_pincode": "",
			  "shipping_country": "",
			  "shipping_state": "",
			  "shipping_email": "",
			  "shipping_phone": "",
			  "order_items": [
			    	'.$html.'
			  ],
			  "payment_method": "'.$payment_method.'",
			  "shipping_charges": 0,
			  "giftwrap_charges": 0,
			  "transaction_charges": 0,
			  "total_discount": "'.$discount.'",
			  "sub_total": "'.$total_amount.'",
			  "length": "'.$length.'",
			  "breadth": "'.$breadth.'",
			  "height": "'.$height.'",
			  "weight": "'.$weight.'"
			}',
		    CURLOPT_HTTPHEADER => array(
		      "Content-Type: application/json",
			   "Authorization: Bearer $token"
		    ),
		  ));
		  $SR_login_Response = curl_exec($curl);
		  curl_close($curl);
		 $SR_login_Response_out = json_decode($SR_login_Response);

		 //UPdate Order Records Shipment Details
		 $ship_order_id = $SR_login_Response_out->order_id;
		 $shipment_id = $SR_login_Response_out->shipment_id;

		 $args = [
		 	'order_id'  => $order_id
		 ];	

		 $data = [
		 	'ship_order_id'  => $ship_order_id,
		 	'shipment_id'    =>  $shipment_id
		 ];
		 
		 $this->cm->update_records_by_args('online_order_payment', $data, $args);

		 echo "Order Id:-".$ship_order_id.'<br />';
		 echo "Shipment Id:-".$shipment_id.'<br />';

		  // echo '<pre>';
		  // echo "<br>";
		 print_r($SR_login_Response);
	}

	public function print_label($order_id){
		$args = [
			'order_id'  => $order_id
		];
		$data['order_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
		$args = [
			'order_id' => $order_id
		];
		$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
		$this->load->view('Seller/print_label', $data);
	}

	public function today_sale_report(){
		$args = [
			'order_status'  => 'Delivered',
			'order_date>='  => date('Y-m-d'),
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('ms_orders',$args);
		$this->load->view('Seller/all_cod_sales_report', $data);
	}

	public function search_cod_sales_reports(){
		$args = [
			'order_status'  => 'Delivered',
			'order_date>='  => $this->input->post('start_date'),
			'order_date<='  => $this->input->post('last_date'),
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('ms_orders',$args);
		$this->load->view('Seller/all_cod_sales_report', $data);
	}

	public function all_cod_sales(){
		$args = [
			'order_status'  => 'Delivered',
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('ms_orders',$args);
		$this->load->view('Seller/all_cod_sales_report', $data);
	}

	public function prepaid_sale_reports(){
		$args = [
			'order_status'  => 'Delivered',
			'order_date>='  => date('Y-m-d'),
			'seller_id'     => $this->session->userdata('seller_session_id'),
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('online_order_payment',$args);
		$this->load->view('Seller/all_prepaid_sale_reports', $data);
	}

	public function search_prepaid_sales_reports(){
		$args = [
			'order_status'  => 'Delivered',
			'order_date>='  => $this->input->post('start_date'),
			'order_date<='  => $this->input->post('last_date'),
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('online_order_payment',$args);
		$this->load->view('Seller/all_prepaid_sale_reports', $data);
	}

	public function all_prepaid_sales(){
		$args = [
			'order_status'  => 'Delivered',
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['sales'] = $this->cm->fetch_all_sales_reports('online_order_payment',$args);
		$this->load->view('Seller/all_prepaid_sale_reports', $data);
	}

	public function create_coupon(){
		$args = [
			'seller_id'     => $this->session->userdata('seller_session_id')
		];
		$data['categories'] = $this->cm->fetch_rec_by_args('ms_products',$args);
		$this->load->view('Seller/create_coupon', $data);
	}

	public function upload_coupons(){
		$data = [
			'couponName'         => $this->input->post('coupan_name'),
		    'couponCode'         => $this->input->post('couponCode'),
		    'couponType'         => $this->input->post('couponType'),
		    'couponStartDate'    => $this->input->post('couponStartDate'),
		    'couponExpiryDate'   => $this->input->post('couponExpiryDate'),
		    'couponAmount'       => $this->input->post('couponAmount'),
		    'product_id'         => $this->input->post('product_id'),
		    'discount_type'      => $this->input->post('discount_type'),
		    'createdBy'          => $this->session->userdata('company_name'),
		    'seller_id'          => $this->session->userdata('seller_session_id'),
		    'couponStatus'       => '0'
		];
		$result = $this->cm->inser_data('coupons',$data);
		if ($result == true) {
			$args =  [
				'id'   => $this->input->post('product_id')
			];
			$data = [
				'discouponType'   => $this->input->post('discount_type')
			];
			$this->cm->update_records_by_args('ms_products', $data,$args);
			$this->session->set_flashdata('success','Congratulation ! Your Discount Coupan Generated Succefully ');
		}else{
			$this->session->set_flashdata('error','Fail ! Message technical Issue Contact to Administrator ! ');
		}
		return redirect('Seller_dashboard/create_coupon');
	}

	public function manage_coupon(){
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/manage_coupon');
		$config['per_page']  = 5;
		$config['total_rows'] = $this->db->count_all('coupons');
		$this->load->library('pagination',$config);
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name'  => 'id',
			'order'        => 'desc'
		];
		$data['manage_coupan'] = $this->cm->fetch_all_records_with_pag_with_args('coupons',$args, $order,$config['per_page'],$this->uri->segment(3));
		$this->load->view('Seller/manage_coupan',$data);
	}

	public function filter_coupans($filter){
		if ($filter == 'new_coupans') {
		$order = [
			'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'old_coupans') {
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'highest_price') {
			$order = [
				'column_name'  => 'couponAmount',
				'order'        => 'desc'
			];
		}else if ($filter == 'lowest_price') {
			$order = [
				'column_name'  => 'couponAmount',
				'order'        => 'asc'
			];
		}else{
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/filter_coupans/'.$filter);
		$config['per_page']  = 5;
		$config['total_rows'] = $this->db->count_all('coupons');
		$this->load->library('pagination',$config);
			//create pagination
		$args = [
				'seller_id'  => $this->session->userdata('seller_session_id')
			];
		$data['manage_coupan'] = $this->cm->fetch_all_records_with_pag_with_args('coupons',$args,$order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Seller/manage_coupan',$data);
	}

	public function edit_coupan($id){
		$args = [
			'id'  => $id
		];
		$data['coupan'] = $this->cm->fetch_rec_by_args('coupons',$args);
		$args = [
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$data['product'] = $this->cm->fetch_rec_by_args('ms_products', $args);
		$this->load->view('Seller/edit_coupan', $data);
	}

	public function update_coupan($id){
		$args = [
			'id'  => $id
		];
		$data['couponType']         = $this->input->post('coupan_type');
		$data['couponName']         = $this->input->post('coupan_name');
		$data['product_id']         = $this->input->post('product_id');
		$data['couponAmount']       = $this->input->post('couponAmount');
		$data['couponCode']         = $this->input->post('couponCode');
		$data['couponExpiryDate']   = $this->input->post('Expiry');
		$data['discount_type']      = $this->input->post('discount_type');
		$data['createdBy']          = $this->session->userdata('company_name');
		$data['seller_id']          = $this->session->userdata('seller_session_id');
		$data['couponStatus']       = '0';
		if ($data['couponType'] == "" && $data['product_id'] == "" && $data['couponAmount'] == "" ) {
			$this->session->set_flashdata('error','Please Enter Required Details');
		}else{
			$args = [
				'id'  => $id
			];
			$result = $this->cm->update_records_by_args('coupons', $data, $args);
			if ($result == true) {
				$this->session->set_flashdata('success','Congratulation ! Coupan Updated Successfully..');
			}else{
				$this->session->set_flashdata('error','Failed ! Coupan Data Not Updated');
			}
		}
		return redirect('Seller_dashboard/edit_coupan/'.$id);
	}

	public function delete_coupan($id){
		$args = [
			'id'  => $id
		];
		$coupan = $this->cm->fetch_rec_by_args('coupons',$args);
		//delete image in folder
		unlink('uploads/product_image/' .$coupan[0]->image);
		//delete image in folder
		$result  = $this->cm->delete_record_by_args('coupons', $args);
		if ($result == true) {
			$this->session->set_flashdata('success', 'Congratulation! Coupan deleted Successfully..');
		}else{
			$this->session->set_flashdata('error', 'Fail ! Coupan Not deleted');
		}
		return redirect('Seller_dashboard/manage_coupan');
	}

	public function change_coupan_status($id,$status){
		$args = [
			'id'  => $id
		];
		$data = [
			'couponStatus' => $status
		];
		$result = $this->cm->update_records_by_args('coupons',$data,$args);
		if ($result == true) {
			$this->session->set_flashdata('success', 'Congratulation! Coupan Status Updated Successfully..');
		}else{
			$this->session->set_flashdata('error', 'Fail ! Coupan Status Not Updated');
		}
		return redirect('Seller_dashboard/manage_coupan');
	}

	public function search_coupans(){
		$args = [
			'couponName'  => $this->input->post('coupan_name'),
			'seller_id'  => $this->session->userdata('seller_session_id')
		];
		$order = [
			'column_name' => 'id',
			'order'       => 'desc'
		];
		//create pagination
		$config['base_url']  = base_url('Seller_dashboard/search_coupans/');
		$config['per_page']  = 5;
		$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('coupons',$args));
		$this->load->library('pagination',$config);
		//create pagination
		$data['manage_coupan'] = $this->cm->fetch_records_by_like_with_pagination('coupons',$args,$order,$config['per_page'],$this->uri->segment(3));
		$this->load->view('Seller/manage_coupan',$data);
	}

	public function account_settings(){
		$args =  [
			'id'   => $this->session->userdata('seller_session_id')
		];
		$data['seller_data'] = $this->cm->fetch_rec_by_args('ms_seller', $args);

		$this->load->view('Seller/account_settings', $data);
	}

	public function change_user_password(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_password', 'old password', 'required|callback_password_check');
		$this->form_validation->set_rules('new_password','New Password','required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('confirm_password', 'Confirm  Password', 'required|matches[new_password]');
	    if($this->form_validation->run() == TRUE) {
        	$args = [
	           'id'   => $this->session->userdata('seller_session_id')
	        ];
	        $data = [
	            'password' => md5($this->input->post('new_password'))
			];
			$result = $this->cm->update_records_by_args('ms_seller',$data, $args);
			if ($result == true) {
	            $this->session->set_flashdata('success', 'Congratulation ! Password Changed  Successfully !');
					return redirect('Seller_dashboard/account_settings');
	        }else{
	            $this->session->set_flashdata('error', 'Failed ! Password Changed   !');
				return redirect('Seller_dashboard/account_settings');
	        }
	    }else{
	    	$args =  [
				'id'   => $this->session->userdata('seller_session_id')
			];
			$data['seller_data'] = $this->cm->fetch_rec_by_args('ms_seller', $args);
			$this->load->view('Seller/account_settings', $data); 	
	    }
	}

	public function password_check($oldpass){
		$seller_id = $this->session->userdata('seller_session_id');
        $selller_details = $this->cm->get_old_password_details('ms_seller',$seller_id);
        if($selller_details->password !== md5($oldpass)) {
            $this->session->set_flashdata('error', 'Failed ! Password does not match   !');
				return redirect('Seller_dashboard/account_settings');
            // return false;
        }else{
   		    return true;
        }
	}

	public function upload_seller_pic(){
		$config = [
			'upload_path'   => './uploads/seller_profile',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'overwrite'     => FALSE,
			'encrypt_name'  => TRUE
		]; 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('seller_profile')) {
			$seller_profile = $this->upload->data('file_name');
			$data = [
				'seller_profile'  => $seller_profile,
			];
			$args = [
				'id'   => $this->session->userdata('seller_session_id')
			];
			$result = $this->cm->update_records_by_args('ms_seller', $data, $args);
			if ($result == true) {
	            $this->session->set_flashdata('success', 'Congratulation ! Profile Uploded  Successfully !');
					return redirect('Seller_dashboard/account_settings');
	        }else{
	            $this->session->set_flashdata('error', 'Failed ! Profile Upload !');
				return redirect('Seller_dashboard/account_settings');
	        }
		}else{
			$upload_error = $this->upload->display_errors();  
		    $data['error'] = $upload_error; 
		    $this->load->view('Seller/account_settings', $data); 
		}
	}

	public function count_seller_orders($type = 'all'){
		if ($type == 'all') {
			$args=[
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}else if ($type == 'today') {
			$args = [
				'order_date'  => date('Y-m-d'),
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		}else if ($type == 'yesterday') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d',strtotime("-1 day"))
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		}else if ($type == 'last_30_days') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date>='  => date('Y-m-d',strtotime("-30 day")),
				'order_date<='   => date('Y-m-d') 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders', $args);
		}else{
			$args=[
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}
		echo count($orders);
	}

	public function count_prepid_orders($type = 'all'){
		if ($type == 'all') {
			$args=[
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}else if ($type == 'today') {
			$args = [
				'order_date'  => date('Y-m-d'),
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		}else if ($type == 'yesterday') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d',strtotime("-1 day"))
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		}else if ($type == 'last_30_days') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date>='  => date('Y-m-d',strtotime("-30 day")),
				'order_date<='   => date('Y-m-d') 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment', $args);
		}else{
			$args=[
				'seller_id' => $this->session->userdata('seller_session_id')
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}
		echo count($orders);
	}

	public function count_seller_cod_income($type = 'all'){
		if ($type == 'all') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}else if ($type == 'today') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}else if ($type == 'yesterday') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d',strtotime("-1 day")),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}else if ($type == 'last_30_days') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date>='  => date('Y-m-d',strtotime("-30 day")),
				'order_date<='   => date('Y-m-d'),
				'order_status'   => 'Delivered'  
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
		}else{
			$args = [
				'seller_id'      => $this->session->userdata('seller_session_id'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('ms_orders',$args);
	}
		$total_income = 0;
		if(count($orders)){
			foreach($orders as $order){
				$total_income += $order->rate;
			}
		}else{
			$total_income = 0;
		}
		$num = json_encode($total_income);
		echo number_format($num);
	}


	public function count_seller_prepaid_inc($type = 'all'){
		if ($type == 'all') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}else if ($type == 'today') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}else if ($type == 'yesterday') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date'  => date('Y-m-d',strtotime("-1 day")),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}else if ($type == 'last_30_days') {
			$args = [
				'seller_id' => $this->session->userdata('seller_session_id'),
				'order_date>='  => date('Y-m-d',strtotime("-30 day")),
				'order_date<='   => date('Y-m-d'),
				'order_status'   => 'Delivered'  
			];
			$orders = $this->cm->fetch_rec_by_args_with_join('online_order_payment',$args);
		}else{
			$args = [
				'seller_id'      => $this->session->userdata('seller_session_id'),
				'order_status'   => 'Delivered' 
			];
			$orders = $this->cm->fetch_rec_by_args_with_join($args);
	}
			
		$total_income = 0;
		if(count($orders)){
			foreach($orders as $order){
				$total_income += $order->rate;
			}
		}else{
			$total_income = 0;
		}
		$num = json_encode($total_income);
		echo number_format($num);
	}





}