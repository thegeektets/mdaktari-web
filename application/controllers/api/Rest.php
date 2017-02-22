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

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
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
  

}
