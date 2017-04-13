<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
   	}
	
	public function index()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('registration/header');
		$this->load->view('registration/index');
		$this->load->view('registration/footer');
	}

	public function forgot()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('registration/header');
		$this->load->view('registration/forgot');
		$this->load->view('registration/footer');
	}

	public function forgot_password() {
      $data['success']=("") ;
  	  $this->load->helper(array('form', 'url'));
	  $user_meta = $this->user_model-> get_user_meta();
	  
	  if(sizeof($user_meta)> 0){
	  		$this->send_reset_email();
	  		$data['success'] = TRUE;
	  	    $data['message'] =  'A recovery email has been sent to your email';
	  		$this->load->view('registration/header', $data);
	  		$this->load->view('registration/forgot',$data);
	  		$this->load->view('registration/footer');   
	  } else {
	  	   $data['success'] = FALSE;
	 	   $data['message'] =  'email does not exist please check and try again';
	 	   $this->load->view('registration/header', $data);
	       $this->load->view('registration/forgot',$data);
	       $this->load->view('registration/footer');   
	  }
   	}

	public function patient_registration() {
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('registration/header');
		$this->load->view('registration/patient_reg');
		$this->load->view('registration/footer');
	}

	public function patient_reg() {
		$data['success'] = '';
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('patient_fullname', 'patient_fullname ', 'required'); 
        $this->form_validation->set_rules('patient_email', 'patient_email ', 'required|valid_email'); 
        $this->form_validation->set_rules('patient_phone', 'patient_phone ', 'required'); 
        $this->form_validation->set_rules('patient_town', 'patient_town ', 'required'); 
        $this->form_validation->set_rules('patient_country', 'patient_country ', 'required'); 
        $this->form_validation->set_rules('patient_address', 'patient_address ', 'required'); 
        $this->form_validation->set_rules('patient_password', 'patient_password  ', 'required'); 
		$this->form_validation->set_rules('patient_cpassword', 'patient_cpassword  ', 'required'); 
	    
	   	$this->load->view('registration/header', $data);

        if ($this->form_validation->run() === FALSE) {
	    		$data['success'] = FALSE;
	    		$data['message'] =  'Validation error';
	    		$this->load->view('registration/patient_reg', $data);
	    } else {
	    		if (set_value('patient_password') === set_value('patient_cpassword')) {
	    			
	    			$value = $this->user_model->insert_new_patient();
    				
    				if ( $value === TRUE){
    					$data['success'] = TRUE;
    					$result = $this->send_welcome_email(set_value('patient_email'),set_value('patient_fullname'));
    					
    					if(strlen($result) == 13 ){
    						$data['message'] = 	'Registration Successfull <br/>
    											 An email has been sent to your email address please confirm your email before you can proceed';
    					} else {
    					  $data['message'] = 	'Registration Successfull <br/>
    											 Failed to send email <br/>';
    					}
    					$this->load->view('registration/index' , $data);
    				} else {
	    				$data['success'] = FALSE;
	    				$data['message'] = $value['message'];
	    				$this->load->view('registration/patient_reg' , $data);
    			    }
    			
	    			
	    		} else {
	    			$data['success'] = FALSE;
	    			$data['message'] =  'Password does not match Confirmation password';
					$this->load->view('registration/patient_reg' , $data);
	    		}
	    }
	    $this->load->view('registration/footer');                          
	   
	}
	public function doctor_registration() {
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('registration/header');
		$this->load->view('registration/doctor_reg');
		$this->load->view('registration/footer');
	}

	public function doctor_reg() {
	$data['success'] = '';
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('doctor_fullname', 'doctor_fullname ', 'required'); 
    $this->form_validation->set_rules('doctor_email', 'doctor_email ', 'required|valid_email'); 
    $this->form_validation->set_rules('doctor_phone', 'doctor_phone ', 'required');
    $this->form_validation->set_rules('doctor_speciality', 'doctor_speciality ', 'required');
    $this->form_validation->set_rules('doctor_town', 'doctor_town ', 'required'); 
    $this->form_validation->set_rules('doctor_country', 'doctor_country ', 'required'); 
    $this->form_validation->set_rules('doctor_address', 'doctor_address ', 'required'); 
    $this->form_validation->set_rules('doctor_password', 'doctor_password  ', 'required'); 
	$this->form_validation->set_rules('doctor_cpassword', 'doctor_cpassword  ', 'required'); 
    
   	$this->load->view('registration/header', $data);

    if ($this->form_validation->run() === FALSE) {
    		$data['success'] = FALSE;
    		$data['message'] =  'Validation error';
    		$this->load->view('registration/doctor_reg', $data);
    } else {
    		if (set_value('doctor_password') === set_value('doctor_cpassword')) {
    			
    			$value = $this->user_model->insert_new_doctor();
				
				if ( $value === TRUE){
					$data['success'] = TRUE;
					$result = $this->send_welcome_email(set_value('doctor_email'),set_value('doctor_fullname'));
					
					if(strlen($result) == 13 ){
						$data['message'] = 	'Registration Successfull <br/>
											 An email has been sent to your email address please confirm your email before you can proceed';
					} else {
					  $data['message'] = 	'Registration Successfull <br/>
											 Failed to send email <br/>';
					}
					$this->load->view('registration/index' , $data);
				} else {
    				$data['success'] = FALSE;
    				$data['message'] = $value['message'];
    				$this->load->view('registration/doctor_reg' , $data);
			    }
			
    			
    		} else {
    			$data['success'] = FALSE;
    			$data['message'] =  'Password does not match Confirmation password';
				$this->load->view('registration/doctor_reg' , $data);
    		}
    }
    $this->load->view('registration/footer');                          
   
}
	public function login_user() {
      
      $this->load->library('session');
      $data['success']=("") ;
  	  $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('login_email', 'login_email', 'required'); 
      $this->form_validation->set_rules('login_password', 'login_password', 'required');
      $result = ""; 
                      
	    if ($this->form_validation->run() == FALSE) {
	 	   $data['success'] = FALSE;
	 	   $data['message'] =  'Validation error all fields are required';
	 	   $this->load->view('registration/header', $data);
	       $this->load->view('registration/index',$data);
	       $this->load->view('registration/footer');   
	     
	    } else {
	       $email = $this->input->post("login_email");	
	       $user_pass = $this->user_model->get_user_pass($email);
	       $user_meta = $this->user_model-> get_user_meta($email);
	   
	          if(md5($this->input->post("login_password")) === $user_pass) {
			       	
		       		$newdata = array(
		       		        'user_meta'  => $user_meta,
		       		        'logged_in' => TRUE,
		       		        );
		       		$this->session->set_userdata($newdata);
		       		$user_session = $this->session->all_userdata();
		   			$this->dashboard();
			     
		        
		        } else {
			 	   $data['success'] = FALSE;
			 	   $data['message'] =  'Login failed , email or password is incorrect';
			 	   $this->load->view('registration/header', $data);
			       $this->load->view('registration/index',$data);
			       $this->load->view('registration/footer');   
			    }
    	}

	}
	public function dashboard()
	{
		$this->load->library('session');
		$user_session = $this->session->all_userdata();

		if( isset($user_session) && ($user_session['logged_in'] === FALSE )) {
		
			   $data['success'] = FALSE;
		 	   $data['message'] =  'Login is required';
		 	   $this->load->view('registration/header', $data);
		       $this->load->view('registration/index',$data);
		       $this->load->view('registration/footer');
		
		} else {
			if($user_session['user_meta']['0']['user_type'] == 'patient') {

				$this->open_patient_dashboard();
			
			} else if ( $user_session['user_meta']['0']['user_type'] == 'doctor' ) {

				$this->open_doctor_dashboard();
			
			} else {
				$this->open_admin_dashboard();
			}
		}
	}

	public function open_patient_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
	    $user_session=$this->session->all_userdata();
	   	$result = "";
	   	header('Location:'.base_url('index.php/patient'));
	}

	public function open_doctor_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
	    $user_session=$this->session->all_userdata();
	   	$result = "";
	   	header('Location:'.base_url('index.php/doctor'));
	}
	public function open_admin_dashboard(){
	    $this->load->library('session');
	    $this->load->helper('url');
		$user_session=$this->session->all_userdata();
		header('Location:'.base_url('index.php/admin'));
	}

	public function initializemail() {
	    $this->load->library('email');
		 $config['useragent'] = 'CodeIgniter';
		 $config['mailpath']  = "/usr/bin/sendmail";
		 $config['protocol'] = "smtp"; 
		 $config['smtp_host'] = "ssl://smtp.googlemail.com"; 
		 $config['smtp_port'] = "465"; 
		 $config['smtp_user'] = "suraimagesbackend@gmail.com"; 
		 $config['smtp_pass'] = "Sura@Images"; 
		 $config['smtp_timeout'] = 5;
		 $config['wordwrap'] = TRUE;
		 $config['wrapchars'] = 76;
		 $config['mailtype'] = 'html';
		 $config['charset'] = 'utf-8';
		 $config['validate'] = FALSE;
		 $config['priority'] = 3;
		 $config['crlf'] = "\r\n";
		 $config['newline'] = "\r\n";
		 $config['bcc_batch_mode'] = FALSE;
		 $config['bcc_batch_size'] = 200;
	     $this->email->initialize($config);
	 } 
	public function send_reset_email(){
	     $email = $this->input->post("login_email");
	     $password = $this->generate_random_password();
	     $this->user_model->update_user_password($password);

	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@mdaktari.com', 'mDaktari Support');
	     $this->email->to($email); 
	     $this->email->subject('mDaktari Password');
	     $this->email->message('Your Password has been reset to '. $password ); 
	     $this->email->send();
	 }

	public function send_welcome_email($email , $username) {
		 $code = $this->generate_random_password();
		 $this->user_model->update_approve_code($code,$email);

	     $this->load->helper(array('form', 'url'));
	     $name = $username;
	     $html = "";
	     $this->initializemail();
	     $this->load->helper('url');
	     $this->load->library('email');
	     $this->email->from('support@suraimages.com', 'SuraImages Support');
	     $this->email->to($email); 
	     $this->email->subject('You have successfully registered with Sura Images');
	     $this->email->message(''.$html); 
	     
	     if($this->email->send()){
	        return $this->email->print_debugger();
	     }else{
	        return $this->email->print_debugger();
	     }

	 }

	public function generate_random_password() {
	     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	     $pass = array(); //remember to declare $pass as an array
	     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	     for ($i = 0; $i < 8; $i++) {
	         $n = rand(0, $alphaLength);
	         $pass[] = $alphabet[$n];
	     }
	     return implode($pass); //turn the array into a string
	}

	public function logout() 
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->session->sess_destroy();
        $data['success']= 'TRUE';
        $data['message'] = 	'you have been logged out successfully';
		$this->load->view('registration/header', $data);
		$this->load->view('registration/index' , $data);
		$this->load->view('registration/footer');
	}
	
}
