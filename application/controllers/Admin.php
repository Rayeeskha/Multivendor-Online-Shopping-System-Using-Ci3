<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Developed by Khan Rayees Software Developer
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//main model load
		$this->load->model('main','cm');
	}

	public function index(){

		if ($this->session->userdata('admin_id') == "") {
			# code...
			$this->load->view('Admin/login');
		}else{
			return redirect('Admin/dashboard');
		}
		
	}
	public function loggedin(){
		$args = [

			'username'  => $this->input->post('username'),
			'password'  => $this->input->post('password')
		];
		$result = $this->cm->login_auth('ms_admin', $args);
		if ($result) {
			count($result);
			$admin_session_data = [
				'admin_id'  => $result[0]->id,
				'admin_fullname'  => $result[0]->fullname,
				'admin_username'  => $result[0]->username

			];
			$this->session->set_userdata($admin_session_data);
			$response = 1;
			echo $response;
			
		}else{
			$response = 0;
			echo $response;
		}
	}

	public function dashboard(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$order  = [
				'column_name' =>'count_sales',
				'order'       => 'desc'
			];
			$data['top_sold_products'] = $this->cm->fetch_all_records_with_order('ms_products',$order, '5');
			//Order Chart Data
			$args  = [
				'order_date'   => date('Y-m-d')
			];
			$today_orders_data  = $this->cm->fetch_rec_by_args('ms_orders', $args);
			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-1 day"))
			];
			$yesterday_orders_data  = $this->cm->fetch_rec_by_args('ms_orders', $args);

			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-2 day"))
			];
			$last_3days_orders  = $this->cm->fetch_rec_by_args('ms_orders', $args);

			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-3 day"))
			];
			$last_4days_orders  = $this->cm->fetch_rec_by_args('ms_orders', $args);

			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-4 day"))
			];
			$last_5days_orders  = $this->cm->fetch_rec_by_args('ms_orders', $args);

			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-5 day"))
			];
			$last_6days_orders  = $this->cm->fetch_rec_by_args('ms_orders', $args);

			$args  = [
				'order_date'   => date('Y-m-d', strtotime("-6 day"))
			];
			$last_7days_orders  = $this->cm->fetch_rec_by_args('ms_orders', $args);


			$data['chart_data']  = [
				'ch_today_order'        => count($today_orders_data),
				'ch_yesterday_order'    => count($yesterday_orders_data),
				'ch_last_3_days_order'  => count($last_3days_orders),
				'ch_last_4_days_order'  => count($last_4days_orders),
				'ch_last_5_days_order'  => count($last_5days_orders),
				'ch_last_6_days_order'  => count($last_6days_orders),
				'ch_last_7_days_order'  => count($last_7days_orders)
			];
			//Order Chart Data

			//Prpaid Orders Details Chart Section Sctipt Start
		$args  = [
			'order_date'   => date('Y-m-d')
		];
		$today_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-1 day"))
		];
		$yest_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-2 day"))
		];
		$last3_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-3 day")),
		];
		$last4_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-4 day"))
		];
		$last5_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-5 day"))
		];
		$last6_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);
		$args  = [
			'order_date'   => date('Y-m-d', strtotime("-6 day"))
		];
		$last7_prepaid_ord_data  = $this->cm->fetch_rec_by_args('online_order_payment', $args);

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
			$this->load->view('Admin/dashboard', $data);
		}
	}

	public function signout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_fullname');
		$this->session->unset_userdata('admin_username');
		return redirect('Admin/index');
	}

	public function add_category(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('admin/index');
		}else{
			$args = [
 				'date >='  => date('Y-m-d', strtotime("-7 days"))
			];
			$data['categories'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
			$this->load->view('Admin/add_category', $data);
		}
	}
	public function upload_category(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$this->form_validation->set_rules('category_name', 'Category Name', 'required');
			if ($this->form_validation->run() == TRUE){
			 	$config = [
					'upload_path'   => './uploads/category_image',
					'allowed_types' => 'jpg|jpeg|png|gif',
					'overwrite'     => FALSE,
					'encrypt_name'  => TRUE
				]; 
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('category_image')) {
					$img = $this->upload->data('file_name');
					$data = [
						'category_name' => $this->input->post('category_name'),
						'image'         => $img,
						'status'        => '0',
						'date'          => date('Y-m-d')
					];
					$result =  $this->cm->category_data('ms_categories', $data);
					if ($result == true) {
						# code...
						$this->session->set_flashdata('success','Congratulation ! Category Inserted Successfully..');
					}else{
						$this->session->set_flashdata('error','Failed ! Category Data');
					}
					return redirect('Admin/add_Category');
				}else{
					 $upload_error = $this->upload->display_errors();  
		             $data['error'] = $upload_error; 
		             $args = [
						'date >='  => date('Y-m-d', strtotime("-7 days"))
					];
					$data['categories'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
					$this->load->view('Admin/add_Category', $data);
				}
			}else{
			 	$args = [
					'date >='  => date('Y-m-d', strtotime("-7 days"))
				];
				$data['categories'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
			 	$this->load->view('Admin/add_Category', $data);
			 }
		}
	}


	public function update_category($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$config = [
				'upload_path'   => './uploads/category_image',
				'allowed_types' => 'jpg|jpeg|png|gif',
				'overwrite'     => FALSE,
				'encrypt_name'  => TRUE
			]; 
			$this->load->library('upload', $config);
			//check image
			if ($_FILES['category_image']['name'] == "") {
				# code...

			}else{
				$args = [

					'id'  => $id
				];
				$old_data = $this->cm->fetch_rec_by_args('ms_categories', $args);
				//delete old  image
				unlink('uploads/category_image/'. $old_data[0]->image);
				//delete old  image
				$this->upload->do_upload('category_image');
				$img = $this->upload->data('file_name');
				$data['image']  = $img;
			}
			$data['category_name']  = $this->input->post('category_name');
			if ($data['category_name'] == "") {
				# code...
				$this->session->set_flashdata('error','Please Enter Category Name');
			}else{
				$args = [
					'id'  => $id
				];
				$result = $this->cm->update_records_by_args('ms_categories', $data, $args);
				if ($result == true) {
					# code...
					$this->session->set_flashdata('success','Congratulation ! Category Updated Successfully..');
				}else{
					$this->session->set_flashdata('error','Failed ! Category Data Not Updated');
				}
			
			}
			return redirect('Admin/edit_category/'.$id);

			
		}
	}


	public function manage_category(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$data['categories'] = $this->cm->fetch_all_records('ms_categories','desc','limit');
			$this->load->view('Admin/manage_category', $data);
		}
	}

	public function delete_category($id = ""){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($id == "") {
				# code...
				$this->session->set_flashdata('error', 'Please Pass Category Id');
			}else{
				$args = [

					'id' => $id
				];
				$result = $this->cm->delete_record_by_args('ms_categories', $args);
				if ($result == true) {
					# code...
					$this->session->set_flashdata('success', 'Congratulation ! Category deleted Successfully..');
				}else{
					$this->session->set_flashdata('error', 'Failed ! Category Not deleted Some thing Wrong ?');
				}
				return redirect('Admin/manage_category');
			}
		}
	}

	public function edit_category($id = ""){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($id == "") {
				# code...
				$this->session->set_flashdata('error', 'Please Pass Category Id');
			}else{
				$args = [
					'id'  => $id
				];
				$args = [
					'date >='  => date('Y-m-d', strtotime("-7 days"))
				];
				$data['categories'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
				$data['category'] = $this->cm->fetch_rec_by_args('ms_categories', $args);
				$this->load->view('Admin/edit_category', $data);
			}
		}
	}

	public function search_category(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'category_name'  => $this->input->post('category_name')
			];
			$data['categories'] = $this->cm->fetch_records_by_args_with_like('ms_categories', $args);
			$this->load->view('Admin/manage_category', $data);
		}
	}

//Developed by Khan Rayees Software Developer
	public function filter_category($filter){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($filter == 'new_category') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_category') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'highest_products') {
				# code...
				$order = [
					'column_name'  => 'count_products',
					'order'        => 'desc'
				];
			}else if ($filter == 'lowest_products') {
				# code...
				$order = [
					'column_name'  => 'count_products',
					'order'        => 'asc'
				];
			}else{
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}

			$data['categories'] = $this->cm->fetch_records_by_order('ms_categories', $order);
			$this->load->view('Admin/manage_category', $data);
		}
	}

	public function add_products(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('admin/index');
		}else{
			$data['categories'] = $this->cm->fetch_all_records('ms_categories', 'desc','limit');
			$this->load->view('Admin/upload_products', $data);
		}
	}

	public function upload_products(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
						 	return redirect('Admin/add_products');
						}

					}
					// $seller_id =  $this->session->userdata('seller_session_id');
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
						'seller_id'           => '0',
						'status'              => '0',
						'upload_date'         => date('Y-m-d')
					];
					$result = $this->cm->inser_data('ms_products',$file_data);
					if ($result == true) {
						$this->session->set_flashdata('success', 'Congratulation! Products Uploaded Successfully..');
					}else{
						$this->session->set_flashdata('error', 'Something wrong Products Not Uploaded');
					}
					return redirect('Admin/add_products');

			}else{
			 	$data['categories'] = $this->cm->fetch_all_records('ms_categories','desc','limit');
				$this->load->view('Admin/upload_products', $data);
			}
		}
	}

	public function change_category_status($id, $status){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'   => $id
			];
			$data = [
				'status'  => $status
			];
			$result = $this->cm->update_records_by_args('ms_categories', $data,$args);
			if ($result == true) {
				$this->session->set_flashdata('success', 'Congratulation! Category Status Updated Successfully..');
			}else{
				$this->session->set_flashdata('error', 'Fail Category Status Update');
			}
		}
		return redirect('Admin/manage_category');
	}

	public function manage_products(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/manage_products');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_products');
			$this->load->library('pagination',$config);
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			$data['products'] = $this->cm->fetch_all_records_with_pagination('ms_products',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_products',$data);
		}
	}
	public function delete_product($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/manage_products');
		}
	}
	public function change_product_status($id,$status){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/manage_products');
		}
	}
	public function filter_products($filter){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($filter == 'new_products') {
				# code...
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
			$config['base_url']  = base_url('Admin/filter_products/'.$filter);
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_products');
			$this->load->library('pagination',$config);
			//create pagination
			$data['products'] = $this->cm->fetch_all_records_with_pagination('ms_products',$order,$config['per_page'],$this->uri->segment(4));
			$this->load->view('Admin/manage_products',$data);
		}
	}

	public function search_products(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'product_title'  => $this->input->post('product_name')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_products/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_products',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['products'] = $this->cm->fetch_records_by_like_with_pagination('ms_products',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_products',$data);
		}
	}

	public function search_customer(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'fullname'  => $this->input->post('customer_name')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_customer/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_users',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['new_registration'] = $this->cm->fetch_records_by_like_with_pagination('ms_users',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/new_registration',$data);
		}
	}




	public function edit_product($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'  => $id
			];
			$data['product'] = $this->cm->fetch_rec_by_args('ms_products',$args);
			$data['categories'] = $this->cm->fetch_all_records('ms_categories', 'desc','limit');
			$this->load->view('Admin/edit_product',$data);
		}
	}
	public function update_product($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/edit_product/'.$id);

			
		}
	}

	public function manage_orders(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/manage_orders');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_orders');
			$this->load->library('pagination',$config);
			$order = [
				'column_name'  => 'order_date',
				'order'        => 'desc'
			];
			$data['orders'] = $this->cm->fetch_all_records_with_pagination('ms_orders',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_orders', $data);
		}
	}

	public function resion_of_cancellation($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['can_res'] = $this->cm->fetch_rec_by_args('ms_cancel_ord_resion', $args);
			$this->load->view('Admin/resion_of_cancellation', $data);
		}
	}

	public function cancellation_resion($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['can_res'] = $this->cm->fetch_rec_by_args('ms_cancel_ord_resion', $args);
			$this->load->view('Admin/resion_of_cancellation', $data);
		}
	}





	public function online_payment_orders(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_status!='   => 'Delivered' 
			];
			//create pagination
			$config['base_url']  = base_url('Admin/online_payment_orders');
			$config['per_page']  = 4;
			$config['total_rows'] = count($this->cm->fetch_rec_by_args('online_order_payment', $args));
			$this->load->library('pagination',$config);

			$order = [
				'column_name'  => 'order_date',
				'order'        => 'desc'
			];
			
			$data['orders'] = $this->cm->fetch_all_records_by_args_with_pagination('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/online_payment_orders', $data);
		}
	}

	public function filter_online_order($filter){
		if ($filter == 'pending_order') {
			$args = [
				'order_status'   => 'Pending'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
		}else if ($filter == 'processing_order') {
			$args = [
				'order_status'   => 'Processing'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'shipped_order') {
			$args = [
				'order_status'   => 'Shipped'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'packed_order') {
			$args = [
				'order_status'   => 'Packed'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'dispatch_order') {
			$args = [
				'order_status'   => 'Dispatch'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'cancel_order') {
			$args = [
				'order_status'   => 'Cancel'
			];
			$order = [
				'column_name'  => 'id',
				'order'        => 'asc'
			];
		}else if ($filter == 'delivered_order') {
			$args = [
				'order_status'   => 'Delivered'
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
		$config['base_url']  = base_url('Admin/filter_online_order/'.$filter);
		$config['per_page']  = 4;
		$config['total_rows'] = $this->db->count_all('online_order_payment');
		$this->load->library('pagination',$config);
		//create pagination
		$data['orders'] = $this->cm->fetch_records_by_like_with_pagination('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(4));
		$this->load->view('Admin/online_payment_orders', $data);
	}



	
	public function filter_cod_order($filter){
		if ($filter == 'pending_order') {
				$args = [
					'order_status'   => 'Pending'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'processing_order') {
				$args = [
					'order_status'   => 'Processing'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'shipped_order') {
				$args = [
					'order_status'   => 'Shipped'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'packed_order') {
				$args = [
					'order_status'   => 'Packed'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'dispatch_order') {
				$args = [
					'order_status'   => 'Dispatch'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'cancel_order') {
				$args = [
					'order_status'   => 'Cancel'
				];
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'delivered_order') {
				$args = [
					'order_status'   => 'Delivered'
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
			$config['base_url']  = base_url('Admin/filter_cod_order/'.$filter);
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_orders');
			$this->load->library('pagination',$config);
			//create pagination
			$data['orders'] = $this->cm->fetch_records_by_like_with_pagination('ms_orders',$args,$order,$config['per_page'],$this->uri->segment(4));
			$this->load->view('Admin/manage_orders', $data);
	}	




	public function search_online_orders(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('admin/index');
		}else{
			$args = [
				'order_id'  => $this->input->post('order_id')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_online_orders/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('online_order_payment',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['orders'] = $this->cm->fetch_records_by_like_with_pagination('online_order_payment',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/online_payment_orders', $data);
		}	
	}



	public function order_delete($order_id = 0){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/manage_orders');
		}
	}


	public function delete_users($user_id = 0){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'  => $user_id
			];
			$result =  $this->cm->delete_record_by_args('ms_users', $args);
			
			if ($result == true) {
				$this->session->set_flashdata('success','Congratulation ! Customer deleted Successfully ! ');
			}else{
				$this->session->set_flashdata('error','Fail ! Some technical Issue Contact to Administrator !');
			}
			return redirect('Admin/new_registration');
		}
	}

	public function search_orders(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('admin/index');
		}else{
			$args = [
				'order_id'  => $this->input->post('order_id')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_orders/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_orders',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['orders'] = $this->cm->fetch_records_by_like_with_pagination('ms_orders',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_orders', $data);
		}	
	}

	public function view_online_orders($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['order_details'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			$args = [
				'order_id' => $order_id
			];
			$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
			$this->load->view('Admin/view_online_orders', $data);
		}
	}


	public function search_customer_message(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'full_name'  => $this->input->post('customer_name')
			];
			$order = [
				'column_name' => 'user_id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_customer_message/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_contact_us',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['customer_message'] = $this->cm->fetch_records_by_like_with_pagination('ms_contact_us',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/customer_message',$data);
		}
	}


	public function delete_message($user_id = 0){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'user_id'  => $user_id
			];
			$result =  $this->cm->delete_record_by_args('ms_contact_us', $args);
			
			if ($result == true) {
				$this->session->set_flashdata('success','Congratulation ! Customer deleted Successfully ! ');
			}else{
				$this->session->set_flashdata('error','Fail ! Some technical Issue Contact to Administrator !');
			}
			return redirect('Admin/technical_support');
		}
	}

	public function view_order($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['order_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
			if ($data['order_details'][0]->order_id != $order_id) {
				return redirect('Admin/index');
			}
			$args = [
				'order_id' => $order_id
			];
			$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
			$this->load->view('Admin/order_details', $data);
		}
	}
	public function print_label($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['order_details'] = $this->cm->fetch_rec_by_args('ms_orders', $args);
			$args = [
				'order_id' => $order_id
			];
			$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
			$this->load->view('Admin/print_label', $data);
		}
	}

	public function print_label_prepaid($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_id'  => $order_id
			];
			$data['order_details'] = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			$args = [
				'order_id' => $order_id
			];
			$data['product_list']  = $this->cm->fetch_rec_by_args('ms_order_products', $args);
			$this->load->view('Admin/print_label_prepaid', $data);
		}
	}

	public function change_order_status($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
				if (count($check_products)) {
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
	}

	public function change_online_pay_ord_status($order_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
		  // return redirect('Admin/view_online_orders/' .$order_id);
			
		}
	}




	public function all_sales(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_status'  => 'Delivered'
			];
			$data['sales'] = $this->cm->fetch_all_sales($args);
			$this->load->view('Admin/all_sales_report', $data);
		}
	}

	public function search_sales(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_status'  => 'Delivered',
				'order_date>='  => $this->input->post('start_date'),
				'order_date<='  => $this->input->post('last_date'),
			];
			$data['sales'] = $this->cm->fetch_all_sales($args);
			$this->load->view('Admin/all_sales_report', $data);
		}
	}

	public function today_sales(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'order_status'  => 'Delivered',
				'order_date>='  => date('Y-m-d')
			];
			$data['sales'] = $this->cm->fetch_all_sales($args);
			$this->load->view('Admin/all_sales_report', $data);
		}
	}

	public function new_registration(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/new_registration');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_users');
			$this->load->library('pagination',$config);

			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			
			$data['new_registration'] = $this->cm->fetch_all_records_with_pagination('ms_users',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/new_registration',$data);
		}
	}

	public function all_customer(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{

			//create pagination
			$config['base_url']  = base_url('Admin/all_customer');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_users');
			$this->load->library('pagination',$config);

			$order = [
				'column_name'  => 'register_date',
				'order'        => 'asc'
			];
			
			$data['all_customer'] = $this->cm->fetch_all_records_with_pagination('ms_users',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/all_customer', $data);
		}
	}





	public function count_orders($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$orders = $this->cm->fetch_all_records('ms_orders','desc','limit');
				
			}else if ($type == 'today') {
				$args = [
					'order_date'  => date('Y-m-d')
				];
				$orders = $this->cm->fetch_rec_by_args('ms_orders', $args);
			}else if ($type == 'yesterday') {
				$args = [
					'order_date'  => date('Y-m-d',strtotime("-1 day"))
				];
				$orders = $this->cm->fetch_rec_by_args('ms_orders', $args);
			}else if ($type == 'last_30_days') {
				$args = [
					'order_date>='  => date('Y-m-d',strtotime("-30 day")),
					'order_date<='   => date('Y-m-d') 
				];
				$orders = $this->cm->fetch_rec_by_args('ms_orders', $args);
			}else{
				$orders = $this->cm->fetch_all_records('ms_orders','desc','limit');
			}
			$cod_orders =  count($orders);
			echo number_format($cod_orders);
		}
	}


	public function count_prepaid_orders($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$orders = $this->cm->fetch_all_records('online_order_payment','desc','limit');
				
			}else if ($type == 'today') {
				$args = [
					'order_date'  => date('Y-m-d')
				];
				$orders = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			}else if ($type == 'yesterday') {
				$args = [
					'order_date'  => date('Y-m-d',strtotime("-1 day"))
				];
				$orders = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			}else if ($type == 'last_30_days') {
				$args = [
					'order_date>='  => date('Y-m-d',strtotime("-30 day")),
					'order_date<='   => date('Y-m-d') 
				];
				$orders = $this->cm->fetch_rec_by_args('online_order_payment', $args);
			}else{
				$orders = $this->cm->fetch_all_records('online_order_payment','desc','limit');
			}
			echo count($orders);
		}
	}

	





	public function count_product($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$orders = $this->cm->fetch_all_records('ms_products','desc','limit');
				
			}else if ($type == 'today') {
				$args = [
					'upload_date'  => date('Y-m-d')
				];
				$orders = $this->cm->fetch_rec_by_args('ms_products', $args);
			}else if ($type == 'yesterday') {
				$args = [
					'upload_date'  => date('Y-m-d',strtotime("-1 day"))
				];
				$orders = $this->cm->fetch_rec_by_args('ms_products', $args);
			}else if ($type == 'last_30_days') {
				$args = [
					'upload_date>='  => date('Y-m-d',strtotime("-30 day")),
					'upload_date<='   => date('Y-m-d') 
				];
				$orders = $this->cm->fetch_rec_by_args('ms_products', $args);
			}else{
				$orders = $this->cm->fetch_all_records('ms_products','desc','limit');
			}
			echo count($orders);
		}
	}


	public function count_customer($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$orders = $this->cm->fetch_all_records('ms_users','desc','limit');
				
			}else if ($type == 'today') {
				$args = [
					'register_date'  => date('Y-m-d')
				];
				$orders = $this->cm->fetch_rec_by_args('ms_users', $args);
			}else if ($type == 'yesterday') {
				$args = [
					'register_date'  => date('Y-m-d',strtotime("-1 day"))
				];
				$orders = $this->cm->fetch_rec_by_args('ms_users', $args);
			}else if ($type == 'last_30_days') {
				$args = [
					'register_date>='  => date('Y-m-d',strtotime("-30 day")),
					'register_date<='   => date('Y-m-d') 
				];
				$orders = $this->cm->fetch_rec_by_args('ms_users', $args);
			}else{
				$orders = $this->cm->fetch_all_records('ms_users','desc','limit');
			}
			echo count($orders);
		}
	}

	public function manage_slider(){
		$this->load->view('Admin/manage_slider');
	}

	public function Publish_Slider_Image(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
				$config = [
					'upload_path'   => './uploads/image_slider',
					'allowed_types'	=> 'jpg|jpeg|png|gif'
				];
				$this->load->library('upload', $config);
				/* input field variable name */
				$this->upload->do_upload('Slide');
				$img  = $this->upload->data('file_name');

				$slide_link  = $this->input->post('slide_link');

				$result = $this->cm->Publish_Slider_Image($img, $slide_link);
				if ($result) {
					# code...
					$this->session->set_flashdata('success', 'Your Slider Image Published Successfully..');
					
				}else{
					$this->session->set_flashdata('error', 'Failed ! Something Wrong Please Contact to Administrator !');
					
				}
				return redirect('Admin/manage_slider');
			}
	}

	public function count_incomes($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$args = [
					'order_status'   => 'Delivered' 

				];
				$orders = $this->cm->fetch_all_sale_income($args);
				
				
			}else if ($type == 'today') {
				$args = [
					'order_date'  => date('Y-m-d'),
					'order_status'   => 'Delivered' 
					
				];
				$orders = $this->cm->fetch_all_sale_income($args);
				
				
			}else if ($type == 'yesterday') {
				$args = [
					'order_date'  => date('Y-m-d',strtotime("-1 day")),
					'order_status'   => 'Delivered' 
				];
				$orders = $this->cm->fetch_all_sale_income($args);
			}else if ($type == 'last_30_days') {
				$args = [
					'order_date>='  => date('Y-m-d',strtotime("-30 day")),
					'order_date<='   => date('Y-m-d'),
					'order_status'   => 'Delivered'  
				];
				$orders = $this->cm->fetch_all_sale_income($args);
			}else{
				$orders = $this->cm->fetch_all_records('ms_orders','desc','limit');
			}
			
			$total_income = 0;
			if(count($orders)){
				foreach($orders as $order){
					$total_income += $order->total_amount;
					
				}
			}
			else{
				$total_income = 0;
			}
			$cod_income = json_encode($total_income);
			echo number_format($cod_income);
		}
	}


	public function count_prepaid_income($type = 'all'){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($type == 'all') {
				$args = [
					'payment_status' => 'Success', 

				];
				$orders = $this->cm->fetch_all_prepaid_sale_income($args);
			}else if ($type == 'today') {
				$args = [
					'order_date'  => date('Y-m-d'),
					'payment_status' => 'Success' 
					
				];
				$orders = $this->cm->fetch_all_prepaid_sale_income($args);
			}else if ($type == 'yesterday') {
				$args = [
					'order_date'  => date('Y-m-d',strtotime("-1 day")),
					'payment_status' => 'Success'
				];
				$orders = $this->cm->fetch_all_prepaid_sale_income($args);
			}else if ($type == 'last_30_days') {
				$args = [
					'order_date>='  => date('Y-m-d',strtotime("-30 day")),
					'order_date<='   => date('Y-m-d'),
					'payment_status' => 'Success'  
				];
				$orders = $this->cm->fetch_all_prepaid_sale_income($args);
			}else{
				$orders = $this->cm->fetch_all_records('ms_orders','desc','limit');
			}
			$total_income = 0;
			if(count($orders)){
				foreach($orders as $order){
					$total_income += $order->total_amount;
				}
			}
			else{
				$total_income = 0;
			}
			$cod_income = json_encode($total_income);
			echo number_format($cod_income);
		}
	}

	public function technical_support(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/technical_support');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_contact_us');
			$this->load->library('pagination',$config);

			$order = [
				'column_name'  => 'user_id',
				'order'        => 'desc'
			];
			
			$data['customer_message'] = $this->cm->fetch_all_records_with_pagination('ms_contact_us',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/customer_message',$data);
		}

	}

	public function show_message($message_id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'user_id'  => $message_id
			];
			$data['customer_message'] = $this->cm->fetch_rec_by_args('ms_contact_us', $args);
			$args = [
				'id' => $message_id
			];
			$data['user_details']  = $this->cm->fetch_rec_by_args('ms_users', $args);

			$this->load->view('Admin/show_message_details', $data);
		}
	}


	//replay Message Section Query Start 
	
		public function Replay_message($message_id){
			if ($this->session->userdata('admin_id') == "") {
				# code...
				return redirect('Admin/index');
			}else{
				$data = [
					'user_id'         => $message_id,
					'replay_message'   => $this->input->post('message')
				];
				$result = $this->cm->inser_data('ms_replay_message',$data);
				if ($result == true) {
					$this->session->set_flashdata('success','Congratulation ! Your Message Replay Successfully ! ');
				}else{
					$this->session->set_flashdata('error','Fail ! Message technical Issue Contact to Administrator ! ');
				}
				return redirect('Admin/show_message/' .$message_id);
		
			}
		}

	//replay Message Section Query End


	//Coupan Query Start 

	public function coupan_master(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/coupan_master');
			$config['per_page']  = 4;
			$config['total_rows'] = $this->db->count_all('coupan_master');
			$this->load->library('pagination',$config);
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			$data['coupan_master'] = $this->cm->fetch_all_records_with_pagination('coupan_master',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/coupan_master', $data);
		}
	}

	public function change_coupn_master_status($id, $status){
		$args = [
			'id'  => $id
		];
		$data = [
			'status'  => $status
		];  
		$result = $this->cm->update_records_by_args('coupan_master', $data, $args);
		if ($result) {
			$this->session->set_flashdata('success','Congratulation ! Coupon Status Change Succefully ! ');
		}else{
			$this->session->set_flashdata('error','Fail ! Something went Wrong ! ');
		}
		return redirect('Admin/coupan_master');
	}

	public function add_coupan_master(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$data = [
				'coupan_code'  => $this->input->post('coupan_code'),
				'coupan_type'  => $this->input->post('coupan_type'),
				'coupan_value'  => $this->input->post('coupan_value'),
				'cart_min_value'  => $this->input->post('cart_min_value'),
				'expiry_date'  => $this->input->post('expiry_date'),
				'create_date'  => date('Y-m-d h:i:s'),
				'status'       => '0'
			];
			$result = $this->cm->inser_data('coupan_master', $data);
			if ($result) {
				$this->session->set_flashdata('success','Congratulation ! Your Discount Coupan Generated Succefully ');
			}else{
				$this->session->set_flashdata('error','Fail ! Message technical Issue Contact to Administrator ! ');
			}
			return redirect('Admin/coupan_master');
		}
	}

	public function edit_coupon_master($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'  => $id
			];
			$data['get_coupan'] = $this->cm->fetch_rec_by_args('coupan_master', $args);
			$this->load->view('Admin/edit_coupan_master', $data);
		}
	}

	public function update_coupan_master($id){
		$args = [
			'id'  => $id
		];
		$data = [
			'coupan_code'   => $this->input->post('coupan_code'),
			'coupan_type'   => $this->input->post('coupan_type'),
			'coupan_value'  => $this->input->post('coupan_value'),
			'cart_min_value'=> $this->input->post('cart_min_value'),
			'expiry_date'   => $this->input->post('expiry_date')
		];
		$result = $this->cm->update_records_by_args('coupan_master', $data, $args);
		if ($result) {
			$this->session->set_flashdata('success','Congratulation ! Your Discount Coupan Updated Succefully ');
		}else{
			$this->session->set_flashdata('error','Fail ! Message technical Issue Contact to Administrator ! ');
		}
		return redirect('Admin/coupan_master');
	}

	public function delete_coupan_mster_rec($id){
		$args = [
			'id'  => $id
		];
		$result = $this->cm->delete_record_by_args('coupan_master', $args);
		if ($result) {
			$this->session->set_flashdata('success','Congratulation ! Your Discount Coupan deleted Succefully ');
		}else{
			$this->session->set_flashdata('error','Fail ! Message technical Issue Contact to Administrator ! ');
		}
		return redirect('Admin/coupan_master/'.$id);
	}

	public function  createCoupon_view(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$data['categories'] = $this->cm->fetch_all_records('ms_products', 'desc','limit');
			$this->load->view('Admin/createCoupon_view', $data);
		}	
	}
	//Coupan Query Start 


	public function createCoupon(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$data = [
				  'couponName'         => $this->input->post('coupan_name'),
		          'couponCode'         => $this->input->post('couponCode'),
		          'couponType'         => $this->input->post('couponType'),
		          'couponStartDate'    => $this->input->post('couponStartDate'),
		          'couponExpiryDate'   => $this->input->post('couponExpiryDate'),
		          'couponAmount'       => $this->input->post('couponAmount'),
		          'product_id'         => $this->input->post('product_id'),
		          'discount_type'      => $this->input->post('discount_type'),
		          'createdBy'          => 'Admin',
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
				return redirect('Admin/createCoupon_view');
		}
	}



	public function manage_coupan(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/manage_coupan');
			$config['per_page']  = 5;
			$config['total_rows'] = $this->db->count_all('coupons');
			$this->load->library('pagination',$config);

			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			
			$data['manage_coupan'] = $this->cm->fetch_all_records_with_pagination('coupons',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_coupan',$data);
		}
	}


	public function delete_coupan($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/manage_coupan');
		}
	}


	public function change_coupan_status($id,$status){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			return redirect('Admin/manage_coupan');
		}
	}

	public function edit_coupan($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'  => $id
			];
			$data['coupan'] = $this->cm->fetch_rec_by_args('coupons',$args);
			$data['product'] = $this->cm->fetch_all_records('ms_products', 'desc','limit');
			$this->load->view('Admin/edit_coupan',$data);
		}
	}



	public function update_coupan($id){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
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
			$data['createdBy']          = 'Admin';
			$data['couponStatus']       = '0';

			if ($data['couponType'] == "" && $data['product_id'] == "" && $data['couponAmount'] == "" ) {
				# code...
				$this->session->set_flashdata('error','Please Enter Required Details');
			}else{
				
				$args = [
					'id'  => $id
				];
				$result = $this->cm->update_records_by_args('coupons', $data, $args);
				if ($result == true) {
					# code...
					$this->session->set_flashdata('success','Congratulation ! Coupan Updated Successfully..');
				}else{
					$this->session->set_flashdata('error','Failed ! Coupan Data Not Updated');
				}
			
			}
			return redirect('Admin/edit_coupan/'.$id);

			
		}
	}



	public function filter_coupans($filter){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($filter == 'new_coupans') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_coupans') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'asc'
				];
			}else if ($filter == 'highest_price') {
				# code...
				$order = [
					'column_name'  => 'couponAmount',
					'order'        => 'desc'
				];
			}else if ($filter == 'lowest_price') {
				# code...
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
			$config['base_url']  = base_url('Admin/filter_coupans/'.$filter);
			$config['per_page']  = 5;
			$config['total_rows'] = $this->db->count_all('coupons');
			$this->load->library('pagination',$config);
			//create pagination
			$data['manage_coupan'] = $this->cm->fetch_all_records_with_pagination('coupons',$order,$config['per_page'],$this->uri->segment(4));
			$this->load->view('Admin/manage_coupan',$data);
		}
	}


	public function search_coupans(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'couponName'  => $this->input->post('coupan_name')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_coupans/');
			$config['per_page']  = 5;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('coupons',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['manage_coupan'] = $this->cm->fetch_records_by_like_with_pagination('coupons',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_coupan',$data);
		}
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



	public function placeshiprocket_order($token, $order_id){
		$args = [
			'order_id'  => $order_id
		];
		$cus_details = $this->cm->fetch_rec_by_args('ms_orders', $args);
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

//Shiprocket Api Section End

	//Seller Script Start 
	public function verify_seller(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'status'  => 'AdminVerification'
			];
			$data['sellers'] = $this->cm->fetch_rec_by_args('ms_seller', $args);
			$this->load->view('Admin/Seller/verify_seller', $data);
		}
	}

	public function Verify_seller_Account($id, $status){
		$args = [
			'id'   => $id
		];
		$data = [
			'status'  => $status
		];
		$status = $this->cm->update_records_by_args('ms_seller', $data, $args);
		if ($status) {
			$args = [
				'id'  => $id
			];
			$get_seller = $this->cm->fetch_rec_by_args('ms_seller', $args);
			$this->load->library('email');
			$to        = $get_seller[0]->email;
			$subject   = 'Congratulation - Welcome';
			$message   = 'Hi ' .$get_seller[0]->company_name."
				<br>Your Account is  Successfully Verified.<br>Your Seller UID is : ".$get_seller[0]->seller_uid. "<br><br> Your Mobile Number  is : <br>" .$get_seller[0]->mobile_number."<br> Your GST Number is:<b>".$get_seller[0]->gstno."<br /> Your State is :" .$get_seller[0]->state. "<br/> Your City is :" .$get_seller[0]->city.  "<br /> Verified Date : " .date('d M, Y', strtotime(date('Y-m-d h:i:s'))). " : <b>Go to Login Your Account & Sale Your Products</b><br/> Thanks for Choosing for me <br/> Hope you are enjoy:<br/> Khan Rayees Software Developer E-Commerce Provider";
			$this->email->To($to);
			$this->email->From('khanrayeesq121@gmail.com', 'Welcome');
			$this->email->Subject($subject);
			$this->email->Message($message);
			$filepath = 'assets/images/khanrayees.png';
			$this->email->attach($filepath);
			$this->email->send();
			$this->session->set_flashdata('success','Congratulation ! Seller Account Verified Successfully..');
			return redirect('Admin/verify_seller');
		}else{
			$this->session->set_flashdata('error','Fail ! Seller Account Verified Successfully..');
			return redirect('Admin/verify_seller');
		}
	}


	public function manage_Seller(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			//create pagination
			$config['base_url']  = base_url('Admin/manage_Seller');
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_seller');
			$this->load->library('pagination',$config);
			$order = [
				'column_name'  => 'id',
				'order'        => 'desc'
			];
			$data['sellers'] = $this->cm->fetch_all_records_with_pagination('ms_seller',$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_Seller',$data);
		}
	}

	public function change_seller_status($id, $status){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'id'   => $id
			];
			$data = [
				'status'  => $status
			];
			$result = $this->cm->update_records_by_args('ms_seller', $data,$args);
			if ($result == true) {
				$this->session->set_flashdata('success', 'Congratulation!Seller Status Updated Successfully..');
			}else{
				$this->session->set_flashdata('error', 'Fail Seller Status Update');
			}
			return redirect('Admin/manage_Seller');
		}
	}

	public function edit_seller_details($id){
		$args = [
			'id'  => $id 
		];
		$data['sellers'] = $this->cm->fetch_rec_by_args('ms_seller', $args);
		$this->load->view('Admin/edit_seller_details', $data);
	}

	public function update_Seller_details($id){
		$args = [
			'id'  => $id
		];
		$data = [
			'company_name'   => $this->input->post('company_name'),
			'pincode'        => $this->input->post('pincode'),
			'city'           => $this->input->post('city'),
			'gstno'          => $this->input->post('gstno'),
			'mobile_number'  => $this->input->post('mobile'),
			'state'          => $this->input->post('state'),
			'panno'          => $this->input->post('panno'),
			'aadhar_number'  => $this->input->post('aadhar_number'),
		];

		$status = $this->cm->update_records_by_args('ms_seller', $data, $args);
		if ($status == true) {
			$this->session->set_flashdata('success','Congratulation ! Seller Details Updated Successfully..');
		}else{
			$this->session->set_flashdata('error','Failed ! Seller Details Updated');
		}

		return redirect('Admin/edit_seller_details/'.$id);
	}

	public function delete_seller_rec($id){
		$args = [
			'id'  => $id
		];
		$status = $this->cm->delete_record_by_args('ms_seller', $args);
		if ($status == true) {
			$this->session->set_flashdata('success','Congratulation ! Seller deleted Successfully..');
		}else{
			$this->session->set_flashdata('error','Failed ! Seller Details deleted');
		}
		return redirect('Admin/manage_Seller');
	}

	public function filter_sellers_Details($filter){
			if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			if ($filter == 'new_sellers') {
				# code...
				$order = [
					'column_name'  => 'id',
					'order'        => 'desc'
				];
			}else if ($filter == 'old_sellers') {
				# code...
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
			$config['base_url']  = base_url('Admin/filter_sellers_Details/'.$filter);
			$config['per_page']  = 10;
			$config['total_rows'] = $this->db->count_all('ms_seller');
			$this->load->library('pagination',$config);
			//create pagination
			$data['sellers'] = $this->cm->fetch_all_records_with_pagination('ms_seller',$order,$config['per_page'],$this->uri->segment(4));
			$this->load->view('Admin/manage_Seller',$data);
		}
	}

	public function search_sellers(){
		if ($this->session->userdata('admin_id') == "") {
			# code...
			return redirect('Admin/index');
		}else{
			$args = [
				'company_name'  => $this->input->post('company_name')
			];
			$order = [
				'column_name' => 'id',
				'order'       => 'desc'
			];
			//create pagination
			$config['base_url']  = base_url('Admin/search_sellers/');
			$config['per_page']  = 10;
			$config['total_rows'] = count($this->cm->fetch_records_by_args_with_like('ms_seller',$args));
			$this->load->library('pagination',$config);
			//create pagination
			$data['sellers'] = $this->cm->fetch_records_by_like_with_pagination('ms_seller',$args,$order,$config['per_page'],$this->uri->segment(3));
			$this->load->view('Admin/manage_Seller',$data);
		}
	}
	
	//Seller Script Start 







}

?>