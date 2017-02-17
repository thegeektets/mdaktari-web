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
                    <img src="assets/img/avatar.png" class="doctor_avatar_img">
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
            <form class="appointment_form">
              <div class="appointment_title">
                  Add New Appointment
              </div>
              <div class="appointment_details">
                <div class="input-group">
                    <label>Appointment Reason : </label>
                    <textarea type="text" name="appointment_reason" placeholder="Visit Reason" class="primary_color"></textarea>
                </div>
                <div class="input-group">
                    <label> Appointment Location : </label>
                    <p>12 West 21st Street, 2nd Floor, New York, NY, 10010</p>
                </div>
                <div class="input-group">
                    <label> Appointment Date : </label>
                    <input type="date" name="appointment_date"></input>
                </div>
                <div class="input-group">
                    <label> Appointment Time : </label>
                    <select name="appointment_date" disabled="true">
                        <option> Select the Appointment Time </option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label> Patient Name : </label>
                    <input type="text" name="patient_name">
                </div>
                <div class="input-group">
                    <label> Patient Email : </label>
                    <input type="email" name="patient_email">
                </div>
                <div class="input-group">
                    <label> Patient Phone : </label>
                    <input type="text" name="patient_phone">
                </div>
                <div class="input-group-button">
                    <button type="submit" class="button appointment_button">Book Appointment</button>
                </div>
              </div>
            </form>
          </div>
        </div>
  </div>
