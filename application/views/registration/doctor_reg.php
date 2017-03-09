   
<div class="patient_login">
  <div class="row">
     <div class="large-10 columns">
        <div class="large-4 columns">
          <div class="login_title">
              Mdaktari </br>
              Doctor Registration
          </div>
        </div>
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
            <form name="doctor_form" id="doctor_form" <?php echo form_open('registration/doctor_reg'); ?>
            <div class="large-6 columns">
                  <label>FullName </label>
                  <input type="text" name="doctor_fullname" placeholder="Fullname" class="primary_color" value="<?php echo set_value('doctor_fullname'); ?>">
                  <label>Speciality </label>
                  <input type="text" name="doctor_speciality" placeholder="Your Speciality" class="primary_color" value="<?php echo set_value('doctor_speciality'); ?>">
                  <label>Email </label>
                  <input type="email" name="doctor_email" placeholder="Email" class="primary_color" value="<?php echo set_value('doctor_email'); ?>">
                  <label>Phone </label>
                  <input type="text" name="doctor_phone" placeholder="Phone" class="primary_color" value="<?php echo set_value('doctor_phone'); ?>">
                  <label>Town </label>
                  <input type="text" name="doctor_town" placeholder="Town" class="primary_color" value="<?php echo set_value('doctor_town'); ?>">
                  <label>Country </label>
                  <input type="text" name="doctor_country" placeholder="Country" class="primary_color" value="<?php echo set_value('doctor_country'); ?>">

            </div>
            <div class="large-6 columns">
                  <label>Postal Address </label>
                  <input type="text" name="doctor_address" placeholder="Postal Address" class="primary_color" value="<?php echo set_value('doctor_address'); ?>">
                  </input> 
                  <label>Password </label>
                  <input type="password" name="doctor_password" placeholder="Password" class="primary_color" value="<?php echo set_value('doctor_password'); ?>">
                  <label>Confirm Password </label>
                  <input type="password" name="doctor_cpassword" placeholder="Confirm Passoword" class="primary_color" value="<?php echo set_value('doctor_cpassword'); ?>">
                  
                  <button type="submit" class="button button_info"> SIGN UP</button>

                  <div class="login_footer">
                    <span class="login_join"> NOT A DOCTOR? SIGN UP</span>
                    <a href="<?php echo base_url('index.php/registration/patient_registration'); ?>" class="button button_primary"> MDAKTARI PATIENT SIGN UP </a>

                    <span class="login_join"> ALREADY A MEMBER? SIGN IN</span>
                    <a href="<?php echo base_url('index.php/registration'); ?>"  class="button button_primary"> SIGN IN </a>
                  </div>
            </div>
            </form>

            
        </div>
      </div>
    </div>
  </div>
</div>
