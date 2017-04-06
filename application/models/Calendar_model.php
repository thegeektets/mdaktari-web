<?php 
class Calendar_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function update_calsettings($doctor_id) {
            
            $start_time_0 = $this->input->post("start_time_0");
            $start_time_1 = $this->input->post("start_time_1");
            $start_time_2 = $this->input->post("start_time_2");
            $start_time_3 = $this->input->post("start_time_3");
            $start_time_4 = $this->input->post("start_time_4");
            $start_time_5 = $this->input->post("start_time_5");
            $start_time_6 = $this->input->post("start_time_6");
            
            $end_time_0 = $this->input->post("end_time_0");
            $end_time_1 = $this->input->post("end_time_1");
            $end_time_2 = $this->input->post("end_time_2");
            $end_time_3 = $this->input->post("end_time_3");
            $end_time_4 = $this->input->post("end_time_4");
            $end_time_5 = $this->input->post("end_time_5");
            $end_time_6 = $this->input->post("end_time_6");
            
            $sess_duration_0 = $this->input->post("sess_duration_0");
            $sess_duration_1 = $this->input->post("sess_duration_1");
            $sess_duration_2 = $this->input->post("sess_duration_2");
            $sess_duration_3 = $this->input->post("sess_duration_3");
            $sess_duration_4 = $this->input->post("sess_duration_4");
            $sess_duration_5 = $this->input->post("sess_duration_5");
            $sess_duration_6 = $this->input->post("sess_duration_6");
            
            $off_day_0 = $this->input->post("off_day_0");
            $off_day_1 = $this->input->post("off_day_1");
            $off_day_2 = $this->input->post("off_day_2");
            $off_day_3 = $this->input->post("off_day_3");
            $off_day_4 = $this->input->post("off_day_4");
            $off_day_5 = $this->input->post("off_day_5");
            $off_day_6 = $this->input->post("off_day_6");

            $sql = "DELETE FROM calendar_settings WHERE doctor_id = ".$doctor_id;
            $this->db->query($sql);

            for($i = 0 ; $i < 7; $i++){
                if($i == 0){
                    $day = 'Monday';
                } else if($i == 1){
                    $day = 'Tuesday';
                } else if($i == 2){
                    $day = 'Wednesday';
                } else if($i == 3){
                    $day = 'Thursday';
                } else if($i == 4){
                    $day = 'Friday';
                } else if($i == 5){
                    $day = 'Saturday';
                } else {
                    $day = 'Sunday';
                }
                $query = "INSERT INTO calendar_settings (work_day, start_time, end_time, off_day , sess_duration , doctor_id)" .
                "VALUES (" . $this->db->escape($day).",".$this->db->escape(${'start_time_'.$i}).",".$this->db->escape(${'end_time_'.$i}).",".$this->db->escape(${'off_day_'.$i}).",".$this->db->escape(${'sess_duration_'.$i}) .",".$this->db->escape($doctor_id).")";
                $this->db->query($query);
            }

            return TRUE;
        }

    public function update_schedule($doctor_id) {
        $date = $this->input->post('date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');

        $query = "INSERT INTO schedule_calendar (doctor_id, date, start_time, end_time ) 
                  VALUES (". $this->db-> escape($doctor_id) . ", ". $this->db->escape($date).","
                  .$this->db->escape($start_time).",".$this->db->escape($end_time).")";
        $this->db->query($query);
        return TRUE;

    }
    public function load_calendar($doctor_id){
        $query = $this->db->query("select * from calendar_settings WHERE doctor_id = ".$doctor_id);
        return $query->result_array();  
    }

    public function load_bookings($doctor_id , $date ) {
        $query = $this->db->query("select * from bookings_calendar WHERE doctor_id = ".$doctor_id." AND appointment_date = '".$date."'" );
        return $query-> result_array();
    }
    public function load_personalschedule($doctor_id){
        $query = $this->db->query("select * from schedule_calendar WHERE doctor_id = ".$doctor_id);
        return $query->result_array();
    }

    // check date availabilty 

    public function check_date_availability ($doctor_id, $appointment_date) {

        $day = date("D", strtotime($appointment_date));

        $query = $this->db->query('select * from calendar_settings WHERE doctor_id = '.$doctor_id.' AND  work_day LIKE "'.$day.'%"');
        $result = $query->result_array();
        
        $off_day = $result['0']['off_day'];
        $start_time = $result['0']['start_time'];
        $end_time = $result['0']['end_time'];
        $session = $result['0']['sess_duration'];

        $bookings = $this->load_bookings($doctor_id , $appointment_date);
        if($off_day == TRUE){
            echo 0;
        } else {
            // check if day is on personal shedule - if not check bookings

            $queryp = $this->db->query('select * from schedule_calendar WHERE doctor_id = '.$doctor_id.' AND date = "'.$appointment_date.'"');
            $resultp = $queryp->result_array();

            if(count($resultp)< 1){
                
                // echo 'date is not on personal schedule';
                // check bookings
                // create time array 
                $times = abs(($end_time - $start_time)/$session);
                $time_array = array();
                $bookings_array = array();

                for($t=0; $t < $times; $t++){
                    $time_array[$t] = date('H:i:s', strtotime('+'.$session*$t.'hours', strtotime($start_time)));  
                }

                for($b=0; $b < count($bookings); $b++){
                    $bookings_array[$b] = $bookings[$b]['appointment_time'];
                }

                $result_array = array();
                $result_array = array_diff($time_array, $bookings_array);
                
                echo json_encode($result_array);


            } else {
                // check hours
                if(($resultp['0']['start_time'] == $start_time) && ($resultp['0']['end_time'] == $end_time)){
                    echo "0";
                } else {
                    $morning = $start_time - $resultp['0']['start_time'] ;
                    $evening = $end_time - $resultp['0']['end_time'] ;
                    // array
                        $timem_array = array();
                        $timee_array = array();
                        if($morning > 0 || $morning < 0 ) {
                           $times = abs($morning)/$session; 
                           for ($m=0; $m < $times; $m++) {
                                if($m === 0){
                                   $timem_array[$m] = $start_time; 
                                } else {
                                  $timem_array[$m] = date('H:i:s', strtotime('+'.$session*$m.'hours', strtotime($start_time)));  
                                }
                           }
                        } 

                        if($evening > 0 || $evening < 0 ) {
                           $times = abs($evening)/$session; 
                           for ($m=0; $m < $times; $m++) {
                                if($m === 0){
                                   $timee_array[$m] = $resultp['0']['end_time']; 
                                } else {
                                  $timee_array[$m] = 
                                  date('H:i:s', strtotime('+'.$session*$m.'hours', 
                                    strtotime($resultp['0']['end_time'])));  
                                }
                           }
                       }

                       $time_array = array();
                       $time_array  = array_merge($timem_array , $timee_array);


                       $bookings_array = array();

                       for($b=0; $b < count($bookings); $b++){
                           $bookings_array[$b] = $bookings[$b]['appointment_time'];
                       }

                       $result_array = array();
                       $result_array = array_diff($time_array, $bookings_array);
                       
                       echo json_encode($result_array);

                }
            }
        }
    }
    
    // mirror function check date availability for api

    public function check_doctor_availability ($doctor_id, $appointment_date) {

        $day = date("D", strtotime($appointment_date));

        $query = $this->db->query('select * from calendar_settings WHERE doctor_id = '.$doctor_id.' AND  work_day LIKE "'.$day.'%"');
        $result = $query->result_array();
        
        $off_day = $result['0']['off_day'];
        $start_time = $result['0']['start_time'];
        $end_time = $result['0']['end_time'];
        $session = $result['0']['sess_duration'];

        $bookings = $this->load_bookings($doctor_id , $appointment_date);
        if($off_day == TRUE){
            return 0;
        } else {
            // check if day is on personal shedule - if not check bookings

            $queryp = $this->db->query('select * from schedule_calendar WHERE doctor_id = '.$doctor_id.' AND date = "'.$appointment_date.'"');
            $resultp = $queryp->result_array();

            if(count($resultp)< 1){
                
                // echo 'date is not on personal schedule';
                // check bookings
                // create time array 
                $times = abs(($end_time - $start_time)/$session);
                $time_array = array();
                $bookings_array = array();

                for($t=0; $t < $times; $t++){
                    $time_array[$t] = date('H:i:s', strtotime('+'.$session*$t.'hours', strtotime($start_time)));  
                }

                for($b=0; $b < count($bookings); $b++){
                    $bookings_array[$b] = $bookings[$b]['appointment_time'];
                }

                $result_array = array();
                $result_array = array_diff($time_array, $bookings_array);
                
                return $result_array;


            } else {
                // check hours
                if(($resultp['0']['start_time'] == $start_time) && ($resultp['0']['end_time'] == $end_time)){
                    return 0;
                } else {
                    $morning = $start_time - $resultp['0']['start_time'] ;
                    $evening = $end_time - $resultp['0']['end_time'] ;
                    // array
                        $timem_array = array();
                        $timee_array = array();
                        if($morning > 0 || $morning < 0 ) {
                           $times = abs($morning)/$session; 
                           for ($m=0; $m < $times; $m++) {
                                if($m === 0){
                                   $timem_array[$m] = $start_time; 
                                } else {
                                  $timem_array[$m] = date('H:i:s', strtotime('+'.$session*$m.'hours', strtotime($start_time)));  
                                }
                           }
                        } 

                        if($evening > 0 || $evening < 0 ) {
                           $times = abs($evening)/$session; 
                           for ($m=0; $m < $times; $m++) {
                                if($m === 0){
                                   $timee_array[$m] = $resultp['0']['end_time']; 
                                } else {
                                  $timee_array[$m] = 
                                  date('H:i:s', strtotime('+'.$session*$m.'hours', 
                                    strtotime($resultp['0']['end_time'])));  
                                }
                           }
                       }

                       $time_array = array();
                       $time_array  = array_merge($timem_array , $timee_array);


                       $bookings_array = array();

                       for($b=0; $b < count($bookings); $b++){
                           $bookings_array[$b] = $bookings[$b]['appointment_time'];
                       }

                       $result_array = array();
                       $result_array = array_diff($time_array, $bookings_array);
                       
                       return $result_array;

                }
            }
        }
    }
}  
  