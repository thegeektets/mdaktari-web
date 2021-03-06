  <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor/my_account'); ?>"> My Account </a>
            </li>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/doctor/my_calendar'); ?>"> My Calendar </a>
            </li>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/doctor/my_appointments'); ?>"> My Appointments </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor/my_reviews'); ?>"> My Reviews </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="doctors_profile">
        <div class="row">
            <div class="doctors_head">
              <div class="row">
                <div class="large-2 columns doctor_avatar">
                    <?php if (isset($user_profile)) { ?>
                    <img src="<?php echo $user_profile['0']['user_avatar'];?>" class="doctor_avatar_img">
                    <?php  } else { ?>
                    <img src="<?php echo base_url('assets/img/avatar.png'); ?>" class="doctor_avatar_img">
                    <?php } ?>
                </div>
                <div class="large-10 columns">
                      <div class="doctor_profile_title">
                          <h3> 
                            <?php if (isset($user_profile)) {
                              echo $user_profile['0']['fullname'];
                            } ?>
                          </h3>
                          <h5>
                            <?php if (isset($user_profile)) {
                              echo $user_profile['0']['speciality'];
                            } ?>
                          </h5>
                        
                      </div>
                </div>
              </div>
            </div>
        </div>
        <hr/>
        <div class="row">
          

          <div class="large-7 columns">
            <?php
                if( isset($success) && ($success === TRUE)) {
                    echo '<div class="alert-box success">'
                          .$message.'
                          <a href="#"" class="close" id="close">&times;</a>
                          </div>';
                } else if( isset($success) && ($success === FALSE)) {
                    echo '<div class="alert-box warning">'
                          .$message.'
                          <a href="#"" class="close" id="close">&times;</a>
                          </div>';
                }
             ?>
            <form name="schedule_form" id="schedule_form" <?php echo form_open('calendar/update_schedule'); ?>
              <div class="appointment_title">
                  Update Personal Schedule
              </div>
              <div class="appointment_details">
                <p> update date unavailable date </p>
                <div class="input-group">
                    <label> Date : </label>
                    <input type="date" name="date" required value="<?php echo set_value('date'); ?>"></input>
                </div>
                              
                <div class="input-group">
                    <label> Start Time : </lab<div class="input-group">
                    <input type="time" name="start_time" required value="<?php echo set_value('start_time'); ?>"></input>
                </div>

                <div class="input-group">
                    <label> End Time : </lab<div class="input-group">
                    <input type="time" name="end_time" required value="<?php echo set_value('end_time'); ?>"></input>
                </div>
               
                <div class="input-group-button">
                    <button type="submit" class="button appointment_button">Update Schedule </button>
                </div>
              </div>
            </form>
          </div>

          <div class="large-5 columns">
            <div class="slide_full">
                          <h5 class="schedule_title"> Personal Schedule </h5>
                          <hr/>
                          <?php 
                            for($i=0; $i < count($schedule); $i++){
                          ?>
                          <div class="schedule_item">
                              <p>
                                Date : <?php echo $schedule[$i]['date']; ?>
                              </p>
                              <p>
                                Start Time : <?php echo $schedule[$i]['start_time']; ?>
                              </p>
                              <p>
                                End Time : <?php echo $schedule[$i]['end_time']; ?>
                              </p>
                                <a class="button secondary" href="<?php echo base_url('index.php/doctor/update_schedule'); ?>"> Edit Item </a>
                                <a class="button alert" href="<?php echo base_url('index.php/doctor/update_schedule'); ?>"> Delete Item </a>
                           </div>
                          <?php } ?>
                          
                        
                      </div>
        </div>
  </div>
