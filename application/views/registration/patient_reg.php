  
    <div class="patient_login">
      <div class="row">
         <div class="large-10 columns">
            <div class="large-4 columns">
              <div class="login_title">
                  Mdaktari </br>
                  Patient Registration
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
              <form name="patient_form" id="patient_form" <?php echo form_open('registration/patient_reg'); ?>  
                <div class="large-6 columns">
                      <label>FullName </label>
                      <input type="text" name="patient_fullname" placeholder="Fullname" class="primary_color" required="" value="<?php echo set_value('patient_fullname'); ?>">
                       <label>Email </label>
                      <input type="email" name="patient_email" placeholder="Email" class="primary_color" required=""  value="<?php echo set_value('patient_email'); ?>">
                      <label>Phone </label>
                      <input type="text" name="patient_phone" placeholder="Phone" class="primary_color" required="" value="<?php echo set_value('patient_phone'); ?>">
                      <label>Town </label>
                      <input type="text" name="patient_town" placeholder="Town" class="primary_color" required=""  value="<?php echo set_value('patient_town'); ?>">
                      <label>Country </label>
                      <input type="text" name="patient_country" placeholder="Country" class="primary_color" required="" value="<?php echo set_value('patient_country'); ?>">

                </div>
                <div class="large-6 columns">
                      <label>Postal Address </label>
                      <input type="text" name="patient_address" placeholder="Postal Address" class="primary_color" required="" value="<?php echo set_value('patient_address'); ?>">

                      </input> 
                      <label>Password </label>
                      <input type="password" name="patient_password" placeholder="Password" class="primary_color" required=""  value="<?php echo set_value('patient_password'); ?>">

                      <label>Confirm Password </label>
                      <input type="password" name="patient_cpassword" placeholder="Confirm Passoword" class="primary_color" required="" value="<?php echo set_value('patient_cpassword'); ?>">

                      
                      <button class="button button_info" type="submit"> SIGN UP</button>

                      <div class="login_footer">
                        <span class="login_join"> ARE YOU A DOCTOR ? SIGN UP AS A DOCTOR</span>
                        <a href="<?php echo base_url('index.php/registration/doctor_registration'); ?>" class="button button_primary"> 
                            MDAKTARI DOCTOR SIGN UP </a>

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