<?php 
class Doctor_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
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
                $this->db->query($query);
            return TRUE;
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
            $this->db->query($query); 
            return TRUE;
        }

        public function add_doctor($data) {
            $password = $data['password'];
            $useremail = $data['email'];
            $usertype = 'doctor';

            // doctor details 

            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];
            $country = $data['country'];
            $address = $data['address'];
            $speciality = $data['speciality'];
            
         
            $this->db->db_debug = FALSE;
            $sql = "INSERT INTO user (email, password, user_type) " .
            " VALUES (" .$this->db->escape($useremail) .",".$this->db->escape(md5($password)) .",".$this->db->escape($usertype) .")";
                   
                    if(!$this->db->query($sql)) {
                        return $this->db->error(); 
                    } else {
                        $fquery = $this->db->query("select * from user where email = '".$useremail ."'");
                        
                        foreach ($fquery->result() as $row)
                            {
                            $queryid = $row->id;
                            }
                        $query = "INSERT INTO doctor_table (user_id,fullname,town,country,postal_address,phone,speciality)" .
                        "VALUES (" . $this->db->escape($queryid).",".$this->db->escape($fullname).",".$this->db->escape($town).",".$this->db->escape($country).",".$this->db->escape($address).",".$this->db->escape($phone).",".$this->db->escape($speciality).")";
                         $this->db->query($query);
                        return $queryid;
                    }
        }

        public function update_doctor($data) {
            $password = $data['password'];
            $useremail = $data['email'];
            $usertype = 'doctor';

            // doctor details 

            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];
            $country = $data['country'];
            $address = $data['address'];
            $speciality = $data['speciality'];
            $id = $data['id'];
            
                            
            $this->db->db_debug = FALSE;
                    $sql = "UPDATE user SET 
                    email = ".$this->db->escape($useremail).", 
                    password = ".$this->db->escape(md5($password))." WHERE id = ".$id;

                    if(!$this->db->query($sql)) {
                        return $this->db->error(); 
                    } else {
                        $fquery = $this->db->query("select * from user where email = '".$useremail ."'");
                        
                        foreach ($fquery->result() as $row)
                            {
                            $queryid = $row->id;
                            }
                        $query = "UPDATE doctor_table SET 
                        fullname = '".$this->db->escape($fullname)."', 
                        town = '".$this->db->escape($town)."',
                        country = '".$this->db->escape($country)."', 
                        address = '".$this->db->escape($address)."', 
                        phone = '".$this->db->escape($phone)."',                         
                        speciality = '".$this->db->escape($speciality)."', 
                        country = '".$this->db->escape($country)."' WHERE user_id = ".$id;    
                         $this->db->query($query);
                        return $queryid;
                    }
        }

        public function delete_doctor($id) {
            $this->db->query(" DELETE FROM doctor_table WHERE user_id = ".$this->db->escape($id)."");
            $this->db->query(" DELETE FROM user WHERE id = ".$this->db->escape($id)."");
        }
}   

?>