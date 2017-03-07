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
	public function update_account_details(){
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$user_id = $data['user_session']['user_meta']['0']['id'];
		$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');

        $this->form_validation->set_rules('doctor_fullname', 'doctor_fullname ', 'required'); 
        $this->form_validation->set_rules('doctor_speciality', 'doctor_speciality ', 'required'); 
        $this->form_validation->set_rules('doctor_gender', 'doctor_gender ', 'required'); 
        $this->form_validation->set_rules('doctor_dob', 'doctor_dob', 'required'); 
        $this->form_validation->set_rules('doctor_statement', 'doctor_statement', 'required'); 
        $this->form_validation->set_rules('doctor_phone', 'doctor_phone', 'required'); 
       
        if ($this->form_validation->run() === FALSE) {
        		$data['success'] = FALSE;
        		$data['message'] =  'Validation error';
        } else {
               
        	   if(strlen($_FILES['useravatar']['name']) > 0) {
        	   		 
        	   		 $config['upload_path'] = './assets/uploads/';
    	   			 $config['allowed_types'] = 'gif|jpg|png';
    	   			 $config['max_size'] = '100000';
    	   			 $config['max_width']  = '102400';
    	   			 $config['max_height']  = '76800';
    	   			 $config['overwrite'] = TRUE;
    	   			 $this->load->library('upload', $config);
					 $this->upload->initialize($config);

				     $useravatar = 'useravatar';
        	   		
        	   		 if (!$this->upload->do_upload($useravatar)) {
			               $error = array('error' => $this->upload->display_errors());
			           	   $data['success'] = FALSE;
			               $data['message'] = $this->upload->display_errors();
			               $this->load->view('doctor/header', $data);
			               $this->load->view('doctor/account', $data);
			               $this->load->view('doctor/footer', $data);
			               return FALSE;
			         } else {
			            $this->user_model->update_user_avatar($user_id);
			        }	   
        	   }
        	   $value =  $this->doctor_model->update_account_details($user_id);
        	   if($value == TRUE){
        	   		$data['success'] = TRUE;
        			$data['message'] =  'Updated account details successfully';
        	   } else {
        	   		$data['success'] = FALSE;
        			$data['message'] =  'Failed to update details'. $value;
        	   }
	   	}

	   	$this->load->view('doctor/header', $data);
	   	$this->load->view('doctor/account', $data);
	   	$this->load->view('doctor/footer', $data);
				
	}
	public function post_new_appointment(){
		$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$user_id = $data['user_session']['user_meta']['0']['id'];
		$data['user_profile'] = $this->user_model->get_user_profile($user_id);
			
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
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
        	   $value =  $this->doctor_model->add_new_appointment($user_id);
        	   if($value == TRUE){
        	   		$data['success'] = TRUE;
        			$data['message'] =  'Added new appointment';
        	   } else {
        	   		$data['success'] = FALSE;
        			$data['message'] =  'Failed to add appointment'. $value;
        	   }
	   	}

	   	$this->load->view('doctor/header', $data);
	   	$this->load->view('doctor/new_appointment', $data);
	   	$this->load->view('doctor/footer', $data);
		
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
			$data['user_appointments'] = $this->doctor_model->get_user_appointments($user_id);
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
    
    // confirm appointment
    public function confirm_appointment($booking_id) {
    	$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
				$status = 'CONFIRMED';
				$return = $this->doctor_model->update_appointment_status($booking_id, $status);

				if($return == TRUE) {
				    $data['status'] = TRUE;
				    $data['message'] = 'Appointment confirmed successfully';	
				} else {
					$data['status'] = FALSE;
				    $data['message'] = 'Failed to update appointment status'.$return;
				} 
				$user_id = $data['user_session']['user_meta']['0']['id'];
				$data['user_profile'] = $this->user_model->get_user_profile($user_id);
				$data['user_appointments'] = $this->doctor_model->get_user_appointments($user_id);
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

    // decline appointment
    public function decline_appointment($booking_id) {
    	$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		if(isset($data['user_session']['logged_in']) && $data['user_session']['logged_in'] == 'TRUE'){
				$status = 'DECLINED';
				$return = $this->doctor_model->update_appointment_status($booking_id, $status);

				if($return == TRUE) {
				    $data['status'] = TRUE;
				    $data['message'] = 'Appointment confirmed successfully';	
				} else {
					$data['status'] = FALSE;
				    $data['message'] = 'Failed to update appointment status'.$return;
				} 
				$user_id = $data['user_session']['user_meta']['0']['id'];
				$data['user_profile'] = $this->user_model->get_user_profile($user_id);
				$data['user_appointments'] = $this->doctor_model->get_user_appointments($user_id);
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
