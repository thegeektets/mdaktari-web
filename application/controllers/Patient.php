<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('patient_model');
       $this->load->model('doctor_model');
      // error_reporting(0);
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

	public function search_doctor()
	{
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$data['doctor_results'] = $this->patient_model->search_doctor();
			
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header', $data);
			$this->load->view('patient/search_results', $data);
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

	public function doctor_profile($doctor_id)
	{	
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$data['doctor_profile'] = 
			$this->doctor_model->get_doctor_profile($doctor_id);
			$this->load->helper(array('form', 'url'));
			$this->load->view('patient/header' , $data);
			$this->load->view('patient/doctor_profile', $data);
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

		public function post_new_appointment($doctor_id){
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$data['user_session'] = $this->session->all_userdata();
			$user_id = $data['user_session']['user_meta']['0']['id'];
			$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			$data['doctor_profile'] = 
			$this->doctor_model->get_doctor_profile($doctor_id);

			$this->form_validation->set_rules('appointment_reason', 'appointment_reason ', 'required'); 
	        $this->form_validation->set_rules('appointment_date', 'appointment_date ', 'required'); 
	        $this->form_validation->set_rules('appointment_time', 'appointment_time ', 'required'); 
	        $this->form_validation->set_rules('patient_name', 'patient_name', 'required'); 
	        $this->form_validation->set_rules('patient_email', 'patient_email', 'required|valid_email'); 
	        $this->form_validation->set_rules('patient_phone', 'patient_phone', 'required'); 
	        if ($this->form_validation->run() === FALSE) {
	        		$data['success'] = FALSE;
	        		$data['message'] =  'Validation error';
	        } else {
	        	   $value =  $this->doctor_model->add_new_appointment($doctor_id);
	        	   if($value == TRUE){
	        	   		$data['success'] = TRUE;
	        			$data['message'] =  'Appointment booked';
	        	   } else {
	        	   		$data['success'] = FALSE;
	        			$data['message'] =  'Failed to add appointment'. $value;
	        	   }
		   	}

		   	$this->load->view('patient/header' , $data);
			$this->load->view('patient/doctor_profile', $data);
			$this->load->view('patient/footer');	
			
		}
}
