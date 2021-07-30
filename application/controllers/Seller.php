<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Developed by Khan Rayees Software Developer
class Seller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//main model load
		$this->load->model('main','cm');
	}

	public function index(){
        $data['users'] = $this->cm->fetch_all_rec_buyer_sell('ms_users');
         $data['sellers'] = $this->cm->fetch_all_rec_buyer_sell('ms_seller');
        $this->load->view('Seller/index', $data);
	}

	public function CreateAccount(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile_number', 'Mobile', 'required|numeric|exact_length[10]');
        $this->form_validation->set_rules('company_name','Company Name','required');
        $this->form_validation->set_rules('pincode', 'PinCode', 'required|exact_length[6]');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('panno','Pan Number','required|exact_length[10]');
        $this->form_validation->set_rules('gstno','GST Number','required|exact_length[15]');
        $this->form_validation->set_rules('aadhar_number','Aadhar Card Number','required|exact_length[12]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('confirm_password', 'ConfirmPassword', 'required|matches[password]');
        if ($this->form_validation->run() == TRUE){
            $seller_uid = rand(777777777,555555555);
            $data = [
                'seller_uid'        => $seller_uid,
                'email'             => $this->input->post('email'),
                'mobile_number'     => $this->input->post('mobile_number'),
                'company_name'      => $this->input->post('company_name'),
                'pincode'           => $this->input->post('pincode'),
                'state'             => $this->input->post('state'),
                'city'              => $this->input->post('city'),
                'panno'             => $this->input->post('panno'),
                'gstno'             => $this->input->post('gstno'),
                'password'          => md5($this->input->post('password')),
                'aadhar_number'     => $this->input->post('aadhar_number'),
                'status'            => 'InActive',
                'created_date'      => date('Y-m-d h:i:s')
            ];
            $result = $this->cm->insert_data('ms_seller', $data);
            if ($result == true) {
                $this->load->library('email');
                $to        = $this->input->post('email');
                $subject   = 'Account Activation Link  - E-Commerce Provider';
                $message   = 'Hi ' .$this->input->post('company_name',FILTER_SANITIZE_STRING).",<br><br>Thanks Your Account Created Successfully, Please Click the below Link to Activate your Account <br><br>"
                           ."<a href='".base_url()."/Seller/Activate_account/".$seller_uid."' target='_blank'>Activate  Now</a><br><br>Thanks<br>Khan Rayees Development Team"; 
                $this->email->To($to);
                $this->email->From('khanrayeesq121@gmail.com', 'Khan Rayees FlexionSoftware');
                $this->email->Subject($subject);
                $this->email->Message($message);
                $filepath = 'public/assets/images/logo3.png';
                $this->email->attach($filepath);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Account Created Successfully, Please Activate Your Account with in 1 hours');
                }else{
                    $this->session->set_flashdata('error', 'Account Created Successfully, Sorry Unable to Send Activation Link,Contact to Admin Disk <br> FlexionSoftware Solution by Khan Rayees <br> Mobile: 9554540271'); 
                }
                return redirect('Seller/index');
            }else{
                $this->session->set_flashdata('error', 'Please Fill all the Information');
				return redirect('Seller/index');
            }
        }else{
            $this->load->view('Seller/index'); 
        }
	}

    public function Activate_account($unid = null){
        $data = [];
        if (!empty($unid)) {
            $seller_data = $this->cm->verify_seller_account($unid);
            if ($seller_data) {
                $expiry_time = $this->verify_expiry_time($seller_data->created_date);
                if ($expiry_time) {
                    if ($seller_data->status === 'InActive') {
                        $status = $this->cm->update_seller_status($unid);
                        if ($status == true) {
                            $data['success'] = 'Account Activated Successfully Forword to Admin Wait some time';
                        }else{
                            $data['success'] = 'Some thing Technical Issue';
                        }

                    }else{
                        $data['success'] = 'Your Account is Already Activated';
                    }
                }else{
                    $data['error'] = 'Sorry Activation Link was Expired Try Again!';
                }
            }else{
                $data['error'] = 'Sorry Unable to Process Activate Your Account Request ?';
            }
        }else{
            $data['error'] = 'Sorry Unable to Process Your Request Your Not Elegible here Sorry';
        }
        $this->load->view('Seller/Activate_seller_account', $data);
    }

    public function verify_expiry_time($regTime){
        $ourTime = now();//load date helper he will get current time stamp
        $regTime = strtotime($regTime);
        $diffTime = $regTime - $ourTime;
        if (3600 > $diffTime) {
            return true;
        }else{
            return false;
        }
    }

    public function login_account(){
        $args = [
            'email'        => $this->input->post('seller_uid'),
            'password'     => md5($this->input->post('seller_password')),
         ];
        
        $result = $this->cm->fetch_rec_by_args('ms_seller', $args);
        if ($result) {
            if ($result[0]->status == 'Active') {
                $seller_session  = [
                    'seller_session_id' => $result[0]->id,
                    'seller_uid'        => $result[0]->seller_uid,
                    'seller_email'      => $result[0]->email,
                    'mobile_number'     => $result[0]->mobile_number,
                    'company_name'      => $result[0]->company_name,
                    'password'          => $result[0]->password,
                    'seller_profile'    => $result[0]->seller_profile,
                    'logged_in'         => TRUE
                ];
                $this->session->set_userdata($seller_session);
                return redirect('Seller_dashboard/index');
            }else{
               $this->session->set_flashdata('error','Wait Your Account is Not Verified by Admin.');
                return redirect('Seller/index'); 
            }
        }else{
            $this->session->set_flashdata('error','Your Username and password is Incorrect ?.');
            return redirect('Seller/index');
        }
    }

    public function Logout(){
        $this->session->unset_userdata('seller_session_id');
        $this->session->unset_userdata('seller_uid');
        $this->session->unset_userdata('seller_email');
        $this->session->unset_userdata('mobile_number');
        $this->session->unset_userdata('company_name');
        $this->session->unset_userdata('password');
       session_destroy();
        return redirect('Seller/index');
    }







}