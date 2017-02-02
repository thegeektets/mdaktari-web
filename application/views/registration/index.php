
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
            <form>
              <input type="text" name="login.email" placeholder="Email" class="primary_color">
              <input type="text" name="login.password" placeholder="Password" class="primary_color">
              <span class="login_forgort"> <a href="<?php echo base_url('index.php/registration/forgot'); ?>"> FORGOT PASSWORD ? </a></span>
              <button class="button button_info"> SIGN IN</button>
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
