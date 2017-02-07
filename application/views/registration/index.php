
<div class="patient_login">
  <div class="row">
     <div class="large-7 columns">
        <div class="large-6 columns">
          <div class="login_title">
              Login to </br>
              Mdaktari
          </div>
        </div>
        <div class="large-6 columns">
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
            <form name="login_form" id="login_form" <?php echo form_open('registration/login_user'); ?>
              <input type="text" name="login_email" placeholder="Email" class="primary_color" required="">
              <input type="password" name="login_password" placeholder="Password" class="primary_color" required="">
              <span class="login_forgort"> <a href="<?php echo base_url('index.php/registration/forgot'); ?>"> FORGOT PASSWORD ? </a></span>
              <button type="submit" class="button button_info"> SIGN IN</button>
            </form>
            <div class="login_footer">
              <span class="login_join"> NOT A MDAKTARI MEMBER? SIGN UP</span>
              <a href="<?php echo base_url('index.php/registration/patient_registration'); ?>" class="button button_primary"> MDAKTARI PATIENT SIGN UP </a>

              <span class="login_join"> ARE YOU A DOCTOR ? SIGN UP</span>
              <a href="<?php echo base_url('index.php/registration/doctor_registration'); ?>" class="button button_primary"> MDAKTARI DOCTOR SIGN UP </a>
            </div>
      </div>
    </div>
  </div>
</div>
