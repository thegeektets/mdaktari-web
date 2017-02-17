<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
       $this->load->model('doctor_model');
       $this->load->model('calendar_model');
       error_reporting(0);
   	}
	
   	public function calset_form() {
   		$data['success'] = '';
   	    $this->load->helper(array('form', 'url'));
   	  	$this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$user_id = $data['user_session']['user_meta']['0']['id'];
		$this->load->view('doctor/header', $data);

       
		$value = $this->calendar_model->update_calsettings($user_id);
		$data['calendar'] = $this->calendar_model->load_calendar($user_id);
		
		if ( $value == TRUE){
			$data['success'] = TRUE;
			$data['message'] = "Calendar Settings Updated Successfully";
		} else {
			$data['success'] = FALSE;
			$data['message'] = $value['message'];
	    }
	    $this->load->view('doctor/calendar' , $data);
		$this->load->view('doctor/footer');                          
   	   
   	}

   	public function update_schedule() {
   		$data['success'] = '';
   	    $this->load->helper(array('form', 'url'));
   	    $this->load->library('session');
		$data['user_session'] = $this->session->all_userdata();
		$user_id = $data['user_session']['user_meta']['0']['id'];
		$data['user_profile'] = $this->user_model->get_user_profile($user_id);	
   	   	$this->load->view('doctor/header', $data);
		$value = $this->calendar_model->update_schedule($user_id);
		$data['calendar'] = $this->calendar_model->load_calendar();
		
		if ( $value == TRUE){
			$data['success'] = TRUE;
			$data['message'] = "Personal Schedule Updated Successfully";
	
		} else {
			$data['success'] = FALSE;
			$data['message'] = 'Failed to update schedule </br>'.$value['message'];
	    }
	    $this->load->view('doctor/update_schedule' , $data);
		$this->load->view('doctor/footer'); 
   	}
   	public function check_availability($doctor_id, $date) {
   		// return false for not available or object with time available
   		/* 1. check if day is off day on calendar settings and on the schedule - if it is then unavailable 
		   2. if date is not an off day - load bookings for that day 
		   3. see if any slots remain for that day - return remaing slots otherwise not available
   		*/
   	}




}
