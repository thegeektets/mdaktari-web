<?php 
class Calendar_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database(); 
        }

        public function update_calsettings() {
            
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

            $sql = "DELETE FROM calendar_settings";
            $this->db->query($sql);

            for($i = 0 ; $i < 7; $i++){
                $query = "INSERT INTO calendar_settings (work_day, start_time, end_time, off_day , sess_duration)" .
                "VALUES (" . $this->db->escape($i).",".$this->db->escape(${'start_time_'.$i}).",".$this->db->escape(${'end_time_'.$i}).",".$this->db->escape(${'off_day_'.$i}).",".$this->db->escape(${'sess_duration_'.$i}).")";
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
    public function load_calendar(){
        $query = $this->db->query("select * from calendar_settings");
        return $query->result_array();
    }
}   

?>