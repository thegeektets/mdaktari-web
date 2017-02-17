<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('doctor_model');
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
			$this->load->view('doctor/header', $data);
			$this->load->view('doctor/index', $data);
			$this->load->view('doctor/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header' , $data);
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
			$this->load->view('doctor/header', $data);
			$this->load->view('doctor/account', $data);
			$this->load->view('doctor/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}
	public function my_calendar()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['calendar'] = $this->calendar_model->load_calendar($user_id);
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('doctor/header' , $data);
			$this->load->view('doctor/calendar', $data);
			$this->load->view('doctor/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}

	public function add_appointment()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('doctor/header' , $data);
			$this->load->view('doctor/new_appointment', $data);
			$this->load->view('doctor/footer');	
		} else {
	 	    $data['success'] = FALSE;
		    $data['message'] =  'login is required';
			$this->load->helper(array('form', 'url'));
			$this->load->view('registration/header');
			$this->load->view('registration/index', $data);
			$this->load->view('registration/footer');	
		}
	}
	public function update_schedule()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$data['schedule'] = $this->calendar_model->load_personalschedule($user_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('doctor/header' , $data);
			$this->load->view('doctor/update_schedule', $data);
			$this->load->view('doctor/footer');	
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
			$this->load->view('doctor/header' , $data);
			$this->load->view('doctor/appointments', $data);
			$this->load->view('doctor/footer');	
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
			$this->load->view('doctor/header' , $data);
			$this->load->view('doctor/reviews', $data);
			$this->load->view('doctor/footer');	
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
