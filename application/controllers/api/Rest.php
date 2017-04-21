<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Rest extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('patient_model');
        $this->load->model('doctor_model');
        $this->load->model('calendar_model');
    }

    //get authetication

    public function authentication_post(){
        $email = $this->post('email');
        $password = $this->post('password');
        $user_pass = $this->user_model->get_user_pass($email);
        $user_meta = $this->user_model-> get_user_meta($email);
        if($user_pass !== NULL || $user_pass !== ''){
            if($user_pass === md5($password)){
                $message = $user_meta;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
            } else {
                // CREATED (201) being the HTTP response code
                $this->response([
                    'status' => FALSE,
                    'message' => 'Authetication failed'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }

        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Authetication failed , the email provided is incorrect'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    

    // get user profile
    public function profile_get($id)
    {   
        $profile = $this->user_model->get_user_profile($id);
        
        if($profile !== NULL || $profile !== ''){
                $message = $profile;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Profile not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    // update doctor account details
    public function doctors_put() {
       $data = array(
        'id' => $this->put('id'),
        'fullname' => $this->put('fullname'),
        'speciality' => $this->put('speciality'),

        'email' => $this->put('email'),
        'phone' => $this->put('phone'),
        'town' => $this->put('town'),

        'country' => $this->put('country'),
        'address' => $this->put('address'),
        'office' => $this->put('office'),

        'qualification' => $this->put('qualification'),
        'experience' => $this->put('experience'),
        'statement' => $this->put('statement'),
        'dob' => $this->put('dob'),
        'gender' => $this->put('gender')

        );

        $result = $this->doctor_model->update_doctor($data);
           if($this->put('id') !== NULL){
                if($result == TRUE){
                  $this->response(array('doctor'=>$data,'message'=>"Successfully updated doctor"),201);
                } else {
                    $message = [
                    'status' => 'false',
                    'message'=> $result
                    ];
                 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
                }
           } else {
                $message = [
                    'status' => 'false',
                    'message'=> 'id is required'
                    ];
                $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
           }
       
    }
    
    // update patient user
    public function patients_put() {
       $data = array(
        'id' => $this->put('id'),
        'fullname' => $this->put('fullname'),
        'email' => $this->put('email'),
        'phone' => $this->put('phone'),
        'town' => $this->put('town'),
        'country' => $this->put('country'),
        'address' => $this->put('address'),
        'occupation' => $this->put('occupation'),
        'gender' => $this->put('gender'),
        'dob' => $this->put('dob')
        );

        $result = $this->patient_model->update_patient($data);
           if($this->put('id') !== NULL){
                if($result == TRUE){
                  $this->response(array('patient'=>$data,'message'=>"Successfully updated patient"),201);
                
                } else {
                    $message = [
                    'status' => 'false',
                    'message'=> $result
                    ];
                 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
                }
           } else {
                $message = [
                    'status' => 'false',
                    'message'=> 'id is required'
                    ];
                $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
           }
      
    }

    // search doctors 

    public function search_post() {
        $search_input = $this->post('search_input');
        $result = $this->patient_model->search_doctor($search_input);

        $this->response(array('status'=>'success','message'=>"results found: ".count($result),'doctor_results'=>$result),201);
    }
  
    // check doctor availability

    public function availability_post() {
        $doctor_id = $this->post('doctor_id');
        $date = $this->post('date');
        $appointment_date = date('d-m-Y', strtotime($date));
        $today = date('d-m-Y');
        // compare date with now
        
        if(strtotime($appointment_date) < strtotime($today)){
               $message = [
               'status' => 'false',
               'message'=> 'date '.$appointment_date.' is invalid , date should not be in the past '
               ];
            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $result = $this->calendar_model->check_doctor_availability($doctor_id, $appointment_date);
            if(count($result) > 0 && $result !== 0){
                $this-> response(array('status'=>'success','available_time'=>$result),201);
            } else {
                   $message = [
                   'status' => 'false',
                   'message'=> 'doctor is not available on date '.$appointment_date
                   ];
                $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
            }
            
        }
    }

    // appointments

    public function patientappointments_post(){
        $data['doctor_id'] = $this->post('doctor_id');
        $data['patient_id'] = $this->post('patient_id');
        $data['patient_name'] = $this->post('patient_name');
        $data['patient_email'] = $this->post('patient_email');
        $data['patient_phone'] = $this->post('patient_phone');
        $data['appointment_date'] = $this->post('appointment_date');
        $data['appointment_time'] = $this->post('appointment_time');
        $data['appointment_reason'] = $this->post('appointment_reason');
        
        if($data['doctor_id'] == NULL || $data['doctor_id'] == ''){
            $message = [
                'status' => 'false',
                'message'=> 'doctor id is required'
                ];
            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);

        } else {
                $value =  $this->doctor_model->api_add_new_appointment($data);
                if($value == TRUE){
                
                     $this->response(array('status'=>'success', 'appointment'=>$data,'message'=>"appointment placed successfully"),201);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'failed to place appointment '.$value
                    ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
                }
        }
    }

    // get patient appointments

    public function patientappointments_get($user_id)
    {   
        $appointments = $this->patient_model->get_user_appointments($user_id);
        
        if($appointments !== NULL || $appointments !== ''){
                $message = $appointments;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Appointments not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }


    // get doctor appointments

    public function doctorappointments_get($user_id)
    {   
        $appointments = $this->doctor_model->get_user_appointments($user_id);
        
        if($appointments !== NULL || $appointments !== ''){
                $message = $appointments;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Appointments not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    // get doctor reviews

    public function doctorreviews_get($user_id)
    {
        $reviews = $this->doctor_model->get_doctor_reviews($user_id);
        
        if($reviews !== NULL || $reviews !== ''){
                $message = $reviews;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Reviews not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    // get patient reviews

     public function patientreviews_get($user_id)
    {
        $reviews = $this->patient_model->get_doctor_reviews($user_id);
        
        if($reviews !== NULL || $reviews !== ''){
                $message = $reviews;
                $this->set_response($message, REST_Controller::HTTP_CREATED); 
        } else {
            // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Reviews not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    // reviews post

    public function doctorreviews_post()
    {
        $data['doctor_id'] = $this->post('doctor_id');
        $data['patient_id'] = $this->post('patient_id');
        $data['doctor_rating'] = $this->post('doctor_rating');
        $data['doctor_review'] = $this->post('doctor_review');
        
        if($data['doctor_id'] == NULL || $data['doctor_id'] == ''){
            $message = [
                'status' => 'false',
                'message'=> 'doctor id is required'
                ];
            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);

        } else {
                
                $value = $this->patient_model->api_review_doctor($data);
                
                if($value == TRUE){
                
                    $this->response(array('status'=>'success', 'review'=>$data,'message'=>"doctor review placed successfully"),201);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'failed to place review '.$value
                    ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
                }
        }
    }

    // booking post
    public function bookings_post(){
        $data['doctor_id'] = $this->post('doctor_id');
        $data['patient_id'] = $this->post('patient_id');
        $data['patient_name'] = $this->post('patient_name');
        $data['patient_email'] = $this->post('patient_email');
        $data['patient_phone'] = $this->post('patient_phone');
        $data['appointment_date'] = $this->post('appointment_date');
        $data['appointment_time'] = $this->post('appointment_time');
        $data['appointment_reason'] = $this->post('appointment_reason');
        
        if($data['doctor_id'] == NULL || $data['doctor_id'] == ''){
            $message = [
                'status' => 'false',
                'message'=> 'doctor id is required'
                ];
            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);

        } else {
                $value =  $this->doctor_model->add_new_appointment($data);
                if($value == TRUE){
                
                     $this->response(array('status'=>'success', 'booking'=>$data,'message'=>"booking placed successfully"),201);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'failed to place booking'.$value
                    ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
                }
        }
    }
}
