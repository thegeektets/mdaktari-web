<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('doctor_model');
       $this->load->model('patient_model');
       $this->load->model('calendar_model');
       //error_reporting(0);
   	}
	
	public function index()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header' , $data);
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}


}
