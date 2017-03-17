  <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient/my_account'); ?>"> My Account </a>
            </li>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/patient/my_appointments'); ?>"> My Appointments </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient/my_reviews'); ?>"> My Reviews </a>
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
                    <?php if (isset($doctor_profile)) { ?>
                    <img src="<?php echo $doctor_profile['0']['user_avatar'];?>" class="doctor_avatar_img">
                    <?php  } else { ?>
                    <img src="<?php echo base_url('assets/img/avatar.png'); ?>" class="doctor_avatar_img">
                    <?php } ?>
                </div>
                <div class="large-10 columns">
                      <div class="doctor_profile_title">
                          <h3> 
                            <?php if (isset($doctor_profile)) {
                              echo $doctor_profile['0']['fullname'];
                            } ?>
                          </h3>
                          <h5>
                            <?php if (isset($doctor_profile)) {
                              echo $doctor_profile['0']['speciality'];
                            } ?>
                          </h5>
                        
                      </div>
                </div>
              </div>
            </div>
        </div>
        <hr/>
        <div class="row">
          <div class="large-8 columns">
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
            <form method="post" class="appointment_form" name="new_appointment" id="new_appointment" <?php echo form_open('patient/book_new_appointment/'.$doctor_profile['0']['user_id']); ?>

              <div class="appointment_title">
                  Add New Appointment
              </div>
              <div class="appointment_details">
                <div class="input-group">
                    <label>Appointment Reason : </label>
                    <textarea type="text" name="appointment_reason" placeholder="Visit Reason" class="primary_color" value="<?php echo set_value('appointment_reason'); ?>">
                        <?php echo set_value('appointment_reason'); ?>
                    </textarea>
                </div>
                <div class="input-group">
                    <label> Appointment Location : </label>
                     <p><?php echo $doctor_profile[0]['office_address'] ?></p>
                </div>
                <div class="input-group">
                    <label> Appointment Date : </label>
                     <input type="date" name="appointment_date" class="appointment_date"
                    value="<?php echo set_value('appointment_date'); ?>"></input>
                    <div class="appointment_message">
                    </div>
                </div>
                <div class="input-group">
                    <label> Appointment Time : </label>
                    <select name="appointment_time" disabled="true" class="appointment_time">
                        <option> Select the Appointment Time </option>
                    </select>
                </div>
                
                <div class="input-group">
                   <label> Confirm Name : </label>
                    <input type="text" name="patient_name" value="<?php echo $user_profile[0]['fullname']; ?>">
                </div>
                <div class="input-group">
                    <label> Confirm Email : </label>
                    <input type="email" name="patient_email" value="<?php echo $user_profile[0]['email']; ?>">
                </div>
                <div class="input-group">
                    <label> Confirm Phone : </label>
                    <input type="text" name="patient_phone" value="<?php echo "+".$user_profile[0]['phone']; ?>">
                    
                    <input type="hidden" name="patient_id" value="<?php echo $user_profile[0]['user_id'] ?>">
                </div>
                <div class="input-group-button">
                    <button type="submit" class="button appointment_button">Book Appointment</button>
                </div>
              </div>
            </form>
          </div>
        </div>
  </div>
