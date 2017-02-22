<?php 
class Patient_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function get_all_patients() {
            $query = $this->db->query("select * from user, patient_table where user.id = patient_table.user_id AND user.user_type = 'patient'");
            return $query->result_array();
        }
        
        public function add_patient($data) {
            $password = $data['password'];
            $useremail = $data['email'];
            $usertype = 'patient';

            // patient details 

            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];
            $country = $data['country'];
            $address = $data['address'];
            
            
         
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
                        $query = "INSERT INTO patient_table (user_id,fullname,town,country,postal_address,phone)" .
                        "VALUES (" . $this->db->escape($queryid).",".$this->db->escape($fullname).",".$this->db->escape($town).",".$this->db->escape($country).",".$this->db->escape($address).",".$this->db->escape($phone).")";
                         $this->db->query($query);
                        return $queryid;
                    }
        }
        
        public function update_patient($data) {
            $password = $data['password'];
            $useremail = $data['email'];
            $usertype = 'patient';

            // doctor details 

            $fullname = $data['fullname'];
            $phone = $data['phone'];
            $town = $data['town'];
            $country = $data['country'];
            $address = $data['address'];
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
                        $query = "UPDATE patient_table SET 
                        fullname = '".$this->db->escape($fullname)."', 
                        town = '".$this->db->escape($town)."',
                        country = '".$this->db->escape($country)."', 
                        address = '".$this->db->escape($address)."', 
                        phone = '".$this->db->escape($phone)."',                         
                        country = '".$this->db->escape($country)."' WHERE user_id = ".$id;    
                         $this->db->query($query);
                        return $queryid;
                    }
        }

        public function patient_doctor($id) {
            $this->db->query(" DELETE FROM patient_table WHERE user_id = ".$this->db->escape($id)."");
            $this->db->query(" DELETE FROM user WHERE id = ".$this->db->escape($id)."");
        }
}       

?>