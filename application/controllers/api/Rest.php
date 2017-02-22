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

    public function authetication_get($email , $password){
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

    // get all users 
    public function users_get()
    {
        // Users from a data store e.g. database
        $users = $this->user_model->get_all_users();

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $user = NULL;

            if (!empty($users))
            {
                foreach ($users as $key => $value)
                {
                    
                    if (isset($value['id']) && intval($value['id']) === $id)
                    {
                        $user = $value;
                    }
                }
            }

            if (!empty($user))
            {
                $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
    
    // get all patients
    public function patients_get()
    {
        // Users from a data store e.g. database
        $patients = $this->patient_model->get_all_patients();

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($patients)
            {
                // Set the response and exit
                $this->response($patients, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No patients were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $patient = NULL;

            if (!empty($patients))
            {
                foreach ($patients as $key => $value)
                {
                    
                    if (isset($value['id']) && intval($value['id']) === $id)
                    {
                        $patient = $value;
                    }
                }
            }

            if (!empty($patient))
            {
                $this->set_response($patient, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'patient could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }

    // get all doctors
    public function doctors_get()
    {
        // Users from a data store e.g. database
        $doctors = $this->doctor_model->get_all_doctors();

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($doctors)
            {
                // Set the response and exit
                $this->response($doctors, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No doctors were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0)
            {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            // Get the user from the array, using the id as key for retrieval.
            // Usually a model is to be used for this.

            $doctor = NULL;

            if (!empty($doctors))
            {
                foreach ($doctors as $key => $value)
                {
                    
                    if (isset($value['id']) && intval($value['id']) === $id)
                    {
                        $doctor = $value;
                    }
                }
            }

            if (!empty($doctor))
            {
                $this->set_response($doctor, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'doctor could not be found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
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
    // create new doctor user
    public function doctors_post() {
       $data = array(
        'fullname' => $this->post('fullname'),
        'speciality' => $this->post('speciality'),
        'email' => $this->post('email'),
        'phone' => $this->post('phone'),
        'town' => $this->post('town'),
        'country' => $this->post('country'),
        'address' => $this->post('address'),
        'password' => $this->post('password')
        );

       $user_id = $this->doctor_model->add_doctor($data);
      
       if(is_numeric($user_id) == TRUE){
              $this->response(array('id'=>$user_id,'message'=>"Successfully added new doctor"),201);
       } else {
                $message = [
                'status' => 'false',
                'message'=>$user_id
            ];
             $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
       }
    }
     // create new patient user
    public function patients_post() {
       $data = array(
        'fullname' => $this->post('fullname'),
        'email' => $this->post('email'),
        'phone' => $this->post('phone'),
        'town' => $this->post('town'),
        'country' => $this->post('country'),
        'address' => $this->post('address'),
        'password' => $this->post('password')
        );

       $user_id = $this->patient_model->add_patient($data);
      
       if(is_numeric($user_id) == TRUE){
              $this->response(array('id'=>$user_id,'message'=>"Successfully added new patient"),201);
       } else {
                $message = [
                'status' => 'false',
                'message'=>$user_id
            ];
             $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
       }
    }

    // update doctor user
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
        'password' => $this->put('password')
        );

        $doctor_id = $this->doctor_model->update_doctor($data);
           if($this->put('id') !== NULL){
                if(is_numeric($doctor_id) == TRUE){
                  $this->response(array('doctor'=>$doctor_id,'message'=>"Successfully updated doctor"),201);
                } else {
                    $message = [
                    'status' => 'false',
                    'message'=> $doctor_id
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
        'password' => $this->put('password')
        );

        $patient_id = $this->patient_model->update_patient($data);
           if($this->put('id') !== NULL){
                if(is_numeric($patient_id) == TRUE){
                  $this->response(array('doctor'=>$patient_id,'message'=>"Successfully updated patient"),201);
                } else {
                    $message = [
                    'status' => 'false',
                    'message'=> $patient_id
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
    
    // delete user patients

    public function doctors_delete($id) {
       
               // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        } else {
           $this->doctor_model->delete_doctor($id);
           
           $message = [
               'id' => $id,
               'message' => 'Deleted the resource'
           ];

           $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code    
        }
  
    }

    public function patients_delete($id) {
       
               // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        } else {
           $this->patient_model->delete_patient($id);
           
           $message = [
               'id' => $id,
               'message' => 'Deleted the resource'
           ];

           $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code    
        }
  
    }


}
