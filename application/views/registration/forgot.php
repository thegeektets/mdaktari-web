
<div class="patient_login">
  <div class="row">
     <div class="large-7 columns">
        <div class="large-6 columns">
          <div class="login_title">
              Forgot </br>
              Password
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
            <form name="forgot_form" id="forgot_form" <?php echo form_open('registration/forgot_password'); ?>
              <input type="text" name="login_email" placeholder="Email" class="primary_color" value="<?php echo set_value('login_email'); ?>">
              <span class="login_forgort"> <a href="<?php echo base_url('index.php/registration'); ?>"> LOGIN ? </a></span>
              <button type="submit" class="button button_info"> RESET PASSWORD </button>
            </form>
           
      </div>
    </div>
  </div>
</div>
