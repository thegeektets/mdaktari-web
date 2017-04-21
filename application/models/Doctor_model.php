<?php 
class Doctor_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function get_doctor_reviews($user_id) {
            $sql = $this->db->query('select * from user, patient_table, doctor_table, doctor_reviews WHERE doctor_table.user_id = '.$user_id.' AND doctor_reviews.patient_id = patient_table.user_id AND doctor_reviews.doctor_id = doctor_table.user_id AND doctor_reviews.doctor_id = user.id');
             return array_reverse($sql->result_array());
        }
        
        public function get_schedule_today($doctor_id) {
                $date = date("Y-m-d");
                $day = date("D", strtotime($date));

                $query = $this->db->query('select * from calendar_settings WHERE doctor_id = '.$doctor_id.' AND  work_day LIKE "'.$day.'%"');
                $result = $query->result_array();
                
                if(isset($result['0']['off_day'])){
                        $off_day = $result['0']['off_day'];
                } else {
                        $off_day = '';
                }
                
                
                
                if($off_day == TRUE){
                     return 0;
                } else {
                    // load personal schedule and bookings then return the results
                    $queryb = $this->db->query("select * from bookings_calendar WHERE doctor_id = ".$doctor_id." AND appointment_date = '".$date."'" );
                    $resultb = $queryb-> result_array();
               
                    $queryp = $this->db->query('select * from schedule_calendar WHERE doctor_id = '.$doctor_id.' AND date = "'.$date.'"');
                    $resultp = $queryp->result_array();

                    return array_merge($resultp,$resultb);
               }
                  
        }
        public function get_user_appointments($user_id) {
            $sql = $this->db->query('select * from user, patient_table, bookings_calendar WHERE user.id = patient_table.user_id AND patient_table.user_id = bookings_calendar.patient_id AND bookings_calendar.doctor_id = '.$user_id);
            return array_reverse($sql->result_array());

        }
        public function get_all_doctors() {
            $query = $this->db->query("select * from user, doctor_table where user.id = doctor_table.user_id AND user.user_type = 'doctor'");
            return $query->result_array();
        }

        public function get_doctor_profile($doctor_id) {
            $query = $this->db->query("select * from user, doctor_table where user.id = doctor_table.user_id AND user.id = '".$doctor_id."'");
            return $query->result_array();
        }
        
        public function add_new_appointment($doctor_id) {
            $appointment_reason = $this->input->post('appointment_reason');
            $appointment_date = $this->input->post('appointment_date');
            $appointment_time = $this->input->post('appointment_time');
            $patient_name = $this->input->post('patient_name');
            $patient_email = $this->input->post('patient_email');
            $patient_phone = $this->input->post('patient_phone');
            $patient_id = $this->input->post('patient_id');

            $query = "INSERT INTO bookings_calendar (doctor_id, appointment_reason, appointment_date, appointment_time, patient_name, patient_email, patient_phone, appointment_status, patient_id) 
                      VALUES (". $this->db-> escape($doctor_id).", ". $this->db->escape($appointment_reason).", ". $this->db->escape($appointment_date).", ". $this->db->escape($appointment_time).", ". $this->db->escape($patient_name).", ". $this->db->escape($patient_email).", ". $this->db->escape($patient_phone).", ". $this->db->escape('PENDING').", ". $this->db->escape($patient_id).")";
            return  $this->db->query($query);
        }

         // add new appointment api mirror function 

        public function api_add_new_appointment($data) {
            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'];
            $patient_name = $data['patient_name'];
            $patient_email = $data['patient_email'];
            $patient_phone = $data['patient_phone'];
            $appointment_date = $data['appointment_date'];
            $appointment_time = $data['appointment_time'];
            $appointment_reason = $data['appointment_reason'];

            $query = "INSERT INTO bookings_calendar (doctor_id, appointment_reason, appointment_date, appointment_time, patient_name, patient_email, patient_phone, appointment_status, patient_id) 
                      VALUES (". $this->db-> escape($doctor_id).", ". $this->db->escape($appointment_reason).", ". $this->db->escape($appointment_date).", ". $this->db->escape($appointment_time).", ". $this->db->escape($patient_name).", ". $this->db->escape($patient_email).", ". $this->db->escape($patient_phone).", ". $this->db->escape('PENDING').", ". $this->db->escape($patient_id).")";
                return $this->db->query($query);
        }

        // edit appointment api mirror function

        public function api_edit_appointment($data) {
            $appointment_id = $data['appointment_id'];

            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'];
            $patient_name = $data['patient_name'];
            $patient_email = $data['patient_email'];
            $patient_phone = $data['patient_phone'];
            $appointment_date = $data['appointment_date'];
            $appointment_time = $data['appointment_time'];
            $appointment_reason = $data['appointment_reason'];


            $query = "UPDATE bookings_calendar SET appointment_reason = ". $this->db->escape($appointment_reason).", appointment_date = ". $this->db->escape($appointment_date).", appointment_time = ". $this->db->escape($appointment_time).", patient_name = ". $this->db->escape($patient_name).", patient_email = ". $this->db->escape($patient_email).", patient_phone = ". $this->db->escape($patient_phone).", appointment_status =". $this->db->escape('PENDING')." WHERE appointment_id = ". $this->db->escape($appointment_id);
            return  $this->db->query($query);
        }

        // edit appointment

        public function edit_appointment($appointment_id) {
            $appointment_reason = $this->input->post('appointment_reason');
            $appointment_date = $this->input->post('appointment_date');
            $appointment_time = $this->input->post('appointment_time');
            $patient_name = $this->input->post('patient_name');
            $patient_email = $this->input->post('patient_email');
            $patient_phone = $this->input->post('patient_phone');
            $patient_id = $this->input->post('patient_id');

            $query = "UPDATE bookings_calendar SET appointment_reason = ". $this->db->escape($appointment_reason).", appointment_date = ". $this->db->escape($appointment_date).", appointment_time = ". $this->db->escape($appointment_time).", patient_name = ". $this->db->escape($patient_name).", patient_email = ". $this->db->escape($patient_email).", patient_phone = ". $this->db->escape($patient_phone).", appointment_status =". $this->db->escape('PENDING')." WHERE appointment_id = ". $this->db->escape($appointment_id);
            return  $this->db->query($query);
        }

        public function book_new_appointment($data) {
            $doctor_id = $data['doctor_id'];
            $patient_id = $data['patient_id'] = $this->post('patient_id');
            $patient_name = $data['patient_name'] = $this->post('patient_name');
            $patient_email = $data['patient_email'] = $this->post('patient_email');
            $patient_phone = $data['patient_phone'] = $this->post('patient_phone');
            $appointment_date = $data['appointment_date'] = $this->post('appointment_date');
            $appointment_time = $data['appointment_time'] = $this->post('appointment_time');
            $appointment_reason = $data['appointment_reason'] = $this->post('appointment_reason');

            $query = "INSERT INTO bookings_calendar (doctor_id, appointment_reason, appointment_date, appointment_time, patient_name, patient_email, patient_phone, appointment_status, patient_id) 
                      VALUES (". $this->db-> escape($doctor_id).", ". $this->db->escape($appointment_reason).", ". $this->db->escape($appointment_date).", ". $this->db->escape($appointment_time).", ". $this->db->escape($patient_name).", ". $this->db->escape($patient_email).", ". $this->db->escape($patient_phone).", ". $this->db->escape('PENDING').", ". $this->db->escape($patient_id).")";
                return $this->db->query($query);
        }
        public function update_appointment_status($booking_id, $status) {
            $query = "
                UPDATE bookings_calendar SET 
                        appointment_status = ".$this->db->escape($status)." WHERE appointment_id = ".$booking_id."";
            return $this->db->query($query); 

        }

        public function update_account_details($doctor_id) {
        
            // doctor details 

            $fullname = $this->input->post('doctor_fullname');
            $phone = $this->input->post('doctor_phone');
            $town = $this->input->post('doctor_town');
            $country = $this->input->post('doctor_country');
            $address = $this->input->post('doctor_address');
            $office = $this->input->post('doctor_office');
            $speciality = $this->input->post('doctor_speciality');
            $statement = $this->input->post('doctor_statement');
            $gender = $this->input->post('doctor_gender');
            $dob = $this->input->post('doctor_dob');
            $email = $this->input->post('doctor_email');
            $experience = $this->input->post('doctor_experience');
            $qualification = $this->input->post('doctor_qualification');

            $this->db->db_debug = FALSE;
            $query = "
                UPDATE doctor_table SET 
                        fullname = ".$this->db->escape($fullname).", 
                        town = ".$this->db->escape($town).", 
                        country = ".$this->db->escape($country).", 
                        phone = ".$this->db->escape($phone).", 
                        postal_address = ".$this->db->escape($address).",
                        office_address = ".$this->db->escape($office).", 
                        experience = ".$this->db->escape($experience).", 
                        qualification = ".$this->db->escape($qualification).", 
                        speciality = ".$this->db->escape($speciality).", 
                        personal_statement = ".$this->db->escape($statement).", 
                        gender = ".$this->db->escape($gender).", 
                        country = ".$this->db->escape($country).", 
                        dob = ".$this->db->escape($dob)." WHERE user_id = ".$doctor_id."";
            return $this->db->query($query); 
            
        }

        

        public function update_doctor($data) {
            // doctor details 

            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];

            $country = $data['country'];
            $address = $data['address'];
            $office = $data['office'];

            $statement = $data['statement'];
            $gender = $data['gender'];
            $dob = $data['dob'];

            $email = $data['email'];
            $experience = $data['experience'];
            $qualification = $data['qualification'];
            $speciality = $data['speciality'];
            $id = $data['id'];
            
            $this->db->db_debug = FALSE;
            $query = "
                UPDATE doctor_table SET 
                        fullname = ".$this->db->escape($fullname).", 
                        town = ".$this->db->escape($town).", 
                        country = ".$this->db->escape($country).", 
                        phone = ".$this->db->escape($phone).", 
                        postal_address = ".$this->db->escape($address).",
                        office_address = ".$this->db->escape($office).", 
                        experience = ".$this->db->escape($experience).", 
                        qualification = ".$this->db->escape($qualification).", 
                        speciality = ".$this->db->escape($speciality).", 
                        personal_statement = ".$this->db->escape($statement).", 
                        gender = ".$this->db->escape($gender).", 
                        country = ".$this->db->escape($country).", 
                        dob = ".$this->db->escape($dob)." WHERE user_id = ".$id."";
            return $this->db->query($query); 
        }

        public function delete_doctor($id) {
            $this->db->query(" DELETE FROM doctor_table WHERE user_id = ".$this->db->escape($id)."");
            $this->db->query(" DELETE FROM user WHERE id = ".$this->db->escape($id)."");
        }
}   

?>