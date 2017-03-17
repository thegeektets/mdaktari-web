<?php 
class Patient_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function get_today_patient_appointments($user_id){
            $date = date("Y-m-d");
            $sql = $this->db->query('select * from user, doctor_table, bookings_calendar WHERE user.id = doctor_table.user_id AND doctor_table.user_id = bookings_calendar.doctor_id AND bookings_calendar.patient_id = '.$user_id.' AND bookings_calendar.appointment_date = " '.$date.' " GROUP BY bookings_calendar.appointment_id');
            return array_reverse($sql->result_array());
        }
        public function get_user_appointments($user_id) {
            $sql = $this->db->query('select * from user, doctor_table, bookings_calendar WHERE user.id = doctor_table.user_id AND doctor_table.user_id = bookings_calendar.doctor_id AND bookings_calendar.patient_id = '.$user_id.' GROUP BY bookings_calendar.appointment_id');
            return array_reverse($sql->result_array());

        }
        public function search_doctor($search_input) {
                if($search_input == '' || $search_input == null){

                    $query = $this->db->query('select * from user, doctor_table where user.id = doctor_table.user_id');
                    return  $query-> result_array();
                   
                }
                $query1 = $this->db->query('select * from user, doctor_table where user.id = doctor_table.user_id AND fullname LIKE "%'.$search_input.'%"');
                $result1 =  $query1-> result_array();

                $query2 = $this->db->query('select * from user, doctor_table where user.id = doctor_table.user_id AND speciality LIKE  "%'.$search_input.'%"');
                $result2 =  $query2-> result_array();

                $query3 = $this->db->query('select * from user, doctor_table where user.id = doctor_table.user_id AND town LIKE "%'.$search_input.'%"');
                $result3 =  $query3-> result_array();

                $query4 = $this->db->query('select * from user, doctor_table where user.id = doctor_table.user_id AND country LIKE "%'.$search_input.'%"');
                $result4 =  $query4-> result_array();
                return array_unique(array_merge($result1,$result2,$result3,$result4), SORT_REGULAR);
                
        }
        public function get_all_patients() {
            $query = $this->db->query("select * from user, patient_table where user.id = patient_table.user_id AND user.user_type = 'patient'");
            return $query->result_array();
        }
        
        
        public function update_patient($data) {
            // patient details 

            $id = $data['id'];
            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];
            $country = $data['country'];
            $address = $data['address'];
            $occupation = $data['occupation'];
            $gender = $data['gender'];
            $dob = $data['dob'];
            $email = $data['email'];
            
            $this->db->db_debug = FALSE;
            $query = "
                UPDATE patient_table SET 
                        fullname = ".$this->db->escape($fullname).", 
                        town = ".$this->db->escape($town).", 
                        country = ".$this->db->escape($country).", 
                        phone = ".$this->db->escape($phone).", 
                        postal_address = ".$this->db->escape($address).",
                        occupation = ".$this->db->escape($occupation).", 
                        sex = ".$this->db->escape($gender).", 
                        country = ".$this->db->escape($country).", 
                        dob = ".$this->db->escape($dob)." WHERE user_id = ".$id."";
                return $this->db->query($query);
        }

        public function update_account_details($patient_id) {
        
            // patient details 

            $fullname = $this->input->post('patient_fullname');
            $phone = $this->input->post('patient_phone');
            $town = $this->input->post('patient_town');
            $country = $this->input->post('patient_country');
            $address = $this->input->post('patient_address');
            $occupation = $this->input->post('patient_occupation');
            $gender = $this->input->post('patient_gender');
            $dob = $this->input->post('patient_dob');
            $email = $this->input->post('patient_email');
        
            $this->db->db_debug = FALSE;
            $query = "
                UPDATE patient_table SET 
                        fullname = ".$this->db->escape($fullname).", 
                        town = ".$this->db->escape($town).", 
                        country = ".$this->db->escape($country).", 
                        phone = ".$this->db->escape($phone).", 
                        postal_address = ".$this->db->escape($address).",
                        occupation = ".$this->db->escape($occupation).", 
                        sex = ".$this->db->escape($gender).", 
                        country = ".$this->db->escape($country).", 
                        dob = ".$this->db->escape($dob)." WHERE user_id = ".$patient_id."";
            $this->db->query($query); 
            //echo $query;
            return TRUE;
        }
        public function delete_patient($id) {
            $this->db->query(" DELETE FROM patient_table WHERE user_id = ".$this->db->escape($id)."");
            $this->db->query(" DELETE FROM user WHERE id = ".$this->db->escape($id)."");
        }
}       

?>