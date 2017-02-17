<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('patient_model');
       error_reporting(0);
   	}
	
	public function index()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header', $data);
			$this->load->view('patient/index', $data);
			$this->load->view('patient/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}

	public function my_account()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header' , $data);
			$this->load->view('patient/account', $data);
			$this->load->view('patient/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}

		
	}

	public function my_appointments()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header', $data);
			$this->load->view('patient/appointments', $data);
			$this->load->view('patient/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}	
	}

	public function my_reviews()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header', $data);
			$this->load->view('patient/reviews', $data);
			$this->load->view('patient/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}
}
