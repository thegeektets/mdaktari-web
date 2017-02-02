<?php 
class User_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function create_facebook_user($profile) {
            $user_profile = $profile;
            $username = $user_profile['displayName'];
            $useremail = $user_profile['email'];
            $fname = $user_profile['firstName'];
            $mname = $user_profile['lastName'];
            $country = $user_profile['country'];
            $city = $user_profile['city'];
            $phone = $user_profile['phone'];
            $address = $user_profile['address'];
            $zip = $user_profile['zip'];
            $avatar = $user_profile['photoURL'];
            $password = '';

            $cquery = $this->db->query("select * from users where email = '".$useremail ."'");
                        foreach ($cquery->result() as $row)
                            {
                            $result = $row->id;
                            }
            
            if(isset($result)){
                // user exists do nothing;
            } else {
                $sql = "INSERT INTO users (username,email,password,avatar) " .
                "VALUES (" . $this->db->escape($username) . ",".$this->db->escape($useremail) .",".$this->db->escape(md5($password)).",".$this->db->escape($avatar) .")";
                        if(!$this->db->query($sql)) {
                            return $this->db->error(); 
                        } else {
                            $fquery = $this->db->query("select * from users where email = '".$useremail ."'");
                            foreach ($fquery->result() as $row)
                                {
                                $queryid = $row->id;
                                }
                            $query = "INSERT INTO user_details (firstname,middlename,postaladdress,zipcode,city,country,telnumber,email,user_id) " .
                            "VALUES (".$this->db->escape($fname).",".$this->db->escape($mname).",".$this->db->escape($address).",".$this->db->escape($zip).",".$this->db->escape($city).",".$this->db->escape($country).",".$this->db->escape($phone).",".$this->db->escape($useremail).",". $this->db->escape($queryid).")";
                             $this->db->query($query);
                            return TRUE;
                        }     
            }
           
        }

        public function insert_new_patient() {
            $password = $this->input->post("patient_password");
            $useremail = $this->input->post("patient_email");
            $usertype = 'patient';

            // patient details 

            $fullname = $this->input->post('patient_fullname');
            $phone = $this->input->post('patient_phone');
            $town = $this->input->post('patient_town');
            $country = $this->input->post('patient_country');
            $address = $this->input->post('patient_address');
            
         
            $this->db->db_debug = FALSE;
            $sql = "INSERT INTO user (email, password, user_type) " .
            " VALUES (" .$this->db->escape($useremail) .",".$this->db->escape(md5($password)) .",".$this->db->escape($usertype) .")";
                   
                    if(!$this->db->query($sql)) {
                        return $this->db->error(); 
                    } else {
                        $fquery = $this->db->query("select * from user where email = '".$useremail ."'");
                        
                        foreach ($fquery->result() as $row)
                            {
                            $queryid = $row->user_id;
                            }
                        $query = "INSERT INTO patient_table (user_id,fullname,town,country,postal_address,phone)" .
                        "VALUES (" . $this->db->escape($queryid).",".$this->db->escape($fullname).",".$this->db->escape($town).",".$this->db->escape($country).",".$this->db->escape($address).",".$this->db->escape($phone).")";
                         $this->db->query($query);
                        return TRUE;
                    }
        }
        public function update_user_password($password) {
            $useremail = $this->input->post('txt_email');
            $sql = "UPDATE users SET password = ".
             $this->db->escape(md5($password)) ." WHERE email = ".$this->db->escape($useremail);
             $this->db->query($sql);        
        }
        public function update_user_idfile($id,$id_name) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $pic = base_url("assets/uploads/".$ppic); 
            $query = $this->db->query("select * from user_details where user_id = '".$id ."'");
            $result = $query->result_array();
            if(sizeof($result) > 0){
                $sql = "UPDATE user_details SET id_file = '".$pic ."' , id_status = 'Uploaded', id_name = '".$id_name."' where user_id = '".$id ."'";
                $this->db->query($sql);    
            } else {
                $sql = "INSERT INTO user_details (id_file, id_status , id_name user_id)  VALUES (".$pic.", Uplaoded ,".$id_name.",".$id.")";
                $this->db->query($sql);    
            }
            
        }
        public function update_user_avatar($id) {
            $this->load->helper('url');
            $this->load->library('session');
            $upload_data = $this->upload->data(); 
            $ppic =   $upload_data['file_name'];
            $pic = base_url("assets/uploads/".$ppic); 
            $query = 
            $this->db->query(" UPDATE users SET avatar = ".$this->db->escape($pic)." WHERE id = ".$this->db->escape($id));
        }
        public function change_user_password($id) {
            $password = $this->input->post('txt_npassword');
            $sql = "UPDATE users SET password = ".
             $this->db->escape(md5($password)) ." WHERE id = ".$this->db->escape($id);
             $this->db->query($sql);        
        }
        public function update_approve_status($email){
            $sql = "UPDATE users SET approve_status = TRUE WHERE email = ".$this->db->escape($email);
             $this->db->query($sql);           
        }
        public function update_approve_code($code,$email){
            $sql = "UPDATE users SET approve_code = ".
             $this->db->escape($code) ." WHERE email = ".$this->db->escape($email);
             $this->db->query($sql);           
        }
        public function update_user_login($email, $account) {
           $sql = "UPDATE users SET login = TRUE , account =  ".
            $this->db->escape($account)." WHERE email = ".$this->db->escape($email);
            if(!$this->db->query($sql)) {
                return $this->db->error(); 
            } else {
                $fquery = $this->db->query("select * from users where email = '".$email ."'");
                foreach ($fquery->result() as $row)
                    {
                    $queryid = $row->id;
                    }
                $check =$this->db->query("select * from user_payment_details where user_id = '".$queryid ."'");
                if(sizeof($check->result_array()) > 0) {
                    // do nothing   

                } else {
                    $query = "INSERT INTO user_payment_details (user_id) " .
                    "VALUES (" . $this->db->escape($queryid).")";
                     $this->db->query($query);
                }   
                return TRUE;
            }
        }
        public function get_user_pass() {
                $email = $this->input->post("txt_email");
                $query = $this->db->query("select * from users where email = '".$email ."'");
                foreach ($query->result() as $row)
                    {
                    return $row->password;
                    }
        }
        public function get_code_user($code) {
                $query = $this->db->query("select * from users where approve_code = '".$code."'");
                return $query->result_array();
        }

        public function get_user_approval() {
                $email = $this->input->post("txt_email");
                $query = $this->db->query("select * from users where email = '".$email ."'");
                foreach ($query->result() as $row)
                    {
                    return $row->approve_status;
                    }
        }
        public function get_user_smeta($email) {
                $query = $this->db->query("select * from users where email = '".$email ."'");
                   return $query->result_array();
        }
        public function get_user_meta() {
                $email = $this->input->post("txt_email");
                $query = $this->db->query("select * from users where email = '".$email ."'");
                   return $query->result_array();
        }
        public function get_user_details($id) {
                $query = $this->db->query("select * from user_details,users where users.id = user_details.user_id AND users.email = '".$id ."'");
                   return $query->result_array();
        }
        public function get_payment_details($id) {
                $query = $this->db->query("select * from user_payment_details,users where users.id = user_payment_details.user_id AND users.email = '".$id ."'");
                   return $query->result_array();
        }
        public function update_account_details($id){
                $fname = $this->input->post("txt_fname");
                $email = $this->input->post("txt_email");
                $mname = $this->input->post("txt_mname");
                $sname = $this->input->post("txt_sname");
                $zcode = $this->input->post("txt_zcode");
                $city = $this->input->post("txt_city");
                $paddress = $this->input->post("txt_paddress");
                $poaddress = $this->input->post("txt_poaddress");
                $telnumber = $this->input->post("txt_telnumber");
                $country = $this->input->post("slc_country");
                $user_id = $id;


                $query = $this->db->query("select * from user_details where user_id = '".$id ."'");
                $result = $query->result_array();
                if(sizeof($result) > 0){
                    $sql = " UPDATE user_details SET firstname = ".$this->db->escape($fname).", middlename = ".$this->db->escape($mname).", surname = ".$this->db->escape($sname).", postaladdress = ".$this->db->escape($paddress).", postaddress = ".$this->db->escape($poaddress).", zipcode = ".$this->db->escape($zcode).", city = ".$this->db->escape($city).", country = ".$this->db->escape($country).", telnumber = ".$this->db->escape($telnumber).", email = ".$this->db->escape($email)." where user_id = ".$id ."";
                    $this->db->query($sql);    
                } else {
                    $this->db->query("     
                    INSERT INTO user_details (firstname, middlename, surname, postaladdress, postaddress, zipcode, city, country, telnumber,email,user_id)
                VALUES(".$this->db->escape($fname).",".$this->db->escape($mname).",".$this->db->escape($sname).",".$this->db->escape($paddress).",".$this->db->escape($poaddress).",".$this->db->escape($zcode).",".$this->db->escape($city).",".$this->db->escape($country).",".$this->db->escape($telnumber).",".$this->db->escape($email).",".$this->db->escape($user_id).")");
                }
            
        }
        public function update_upload_status($id , $status){
                $user_id = $id;
                $sql = "UPDATE user_details SET upload_status = ".
                     $this->db->escape($status) ." WHERE user_id = ".$this->db->escape($id);
                     $this->db->query($sql);                     
        }
        public function update_edit_status($id , $status){
                $user_id = $id;
                $sql = "UPDATE user_details SET edit_status = ".
                     $this->db->escape($status) ." WHERE user_id = ".$this->db->escape($id);
                     $this->db->query($sql);                     
        }
        public function update_video_upload_status($id , $status){
                $user_id = $id;
                $sql = "UPDATE user_details SET video_upload_status = ".
                     $this->db->escape($status) ." WHERE user_id = ".$this->db->escape($id);
                     $this->db->query($sql);                     
        }
        public function update_video_edit_status($id , $status){
                $user_id = $id;
                $sql = "UPDATE user_details SET video_edit_status = ".
                     $this->db->escape($status) ." WHERE user_id = ".$this->db->escape($id);
                     $this->db->query($sql);                     
        }
        public function update_payment_details($id){
                $payment_mode = $this->input->post("slc_payment");
                $bank_name = $this->input->post("bank_name");
                $account_name = $this->input->post("account_name");
                $account_number = $this->input->post("account_number");
                $branch_name = $this->input->post("branch_name");
                $mobile_number = $this->input->post("mobile_number");
                $email_address = $this->input->post("email_address");
                $user_id = $id;

                $query = $this->db->query("     
                REPLACE INTO user_payment_details (payment_mode, bank_name, account_name, account_number, branch_name, mobile_number, email_address, user_id)
                VALUES(".$this->db->escape($payment_mode).",".$this->db->escape($bank_name).",".$this->db->escape($account_name).",".$this->db->escape($account_number).",".$this->db->escape($branch_name).",".$this->db->escape($mobile_number).",".$this->db->escape($email_address).",".$this->db->escape($user_id).")");
                      
        }
}

?>