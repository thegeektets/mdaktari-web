    <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/patient'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient/my_account'); ?>"> My Account </a>
            </li>
            <li class="menu-text">
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
                    <img src="<?php echo $doctor_profile[0]['user_avatar'] ?>" class="doctor_avatar_img">
                </div>
                <div class="large-10 columns">
                      <div class="doctor_profile_title">
                          <h3> <?php echo $doctor_profile[0]['fullname'] ?> </h3>
                          <h5> <?php echo $doctor_profile[0]['speciality'] ?> </h5>
                          <h6> <a href=""> Patient Reviews </a> </h6>
                      </div>
                </div>
              </div>
            </div>
        </div>
        <hr/>
        <div class="row">
          <div class="large-7 columns"> 
              <div class="row">
                  <div class="doctors_qualification">
                    <div class="row">
                      <h3> Qualifications and Experience </h3>
                      
                      <div class="large-3 columns">
                          <h5>Education</h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['qualification'] ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <h5>Experience Years</h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['experience'] ?></p>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="large-3 columns">
                          <h5>Speciality </h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['speciality'] ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <h5>Office Address </h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['office_address'] ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <h5> Town| Country </h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['town'] ?>, <?php echo $doctor_profile[0]['country'] ?></p>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="large-3 columns">
                          <h5>Professional Statement </h5>
                      </div>
                      <div class="large-9 columns">
                          <p><?php echo $doctor_profile[0]['personal_statement'] ?></p>
                      </div>
                    </div>
                  </div>
              </div>
              <hr/>
              <div class="row">
                  <div class="doctors_qualification">
                    <div class="row">
                      <h3> Patient Reviews </h3>
                      
                      <div class="large-3 columns">
                          <p>June 16, 2016 </br>
                             <span class="review_patient"> by Trista K. </span>
                           </p>
                      </div>
                      <div class="large-9 columns">
                          <span class="review_rating">Rating : 4/5 </span>
                          <p>
                            I couldn't recommend an office more! They are all so awesome and provide a really customized plan to fix whatever issue you're facing. I had some issues with my neck/back and have seen Rich for physical therapy, their chiropractor, a sports medicine doctor, a massage therapist and soon to be a trainer to help get me back into the condition I need -- All covered through the one visit. Amazing experience, they are doing it right!
                          </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <p>June 16, 2016 </br>
                             <span class="review_patient"> by Trista K. </span>
                           </p>
                      </div>
                      <div class="large-9 columns">
                          <span class="review_rating">Rating : 4/5 </span>
                          <p>
                            I couldn't recommend an office more! They are all so awesome and provide a really customized plan to fix whatever issue you're facing. I had some issues with my neck/back and have seen Rich for physical therapy, their chiropractor, a sports medicine doctor, a massage therapist and soon to be a trainer to help get me back into the condition I need -- All covered through the one visit. Amazing experience, they are doing it right!
                          </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <p>June 16, 2016 </br>
                             <span class="review_patient"> by Trista K. </span>
                           </p>
                      </div>
                      <div class="large-9 columns">
                          <span class="review_rating">Rating : 4/5 </span>
                          <p>
                            I couldn't recommend an office more! They are all so awesome and provide a really customized plan to fix whatever issue you're facing. I had some issues with my neck/back and have seen Rich for physical therapy, their chiropractor, a sports medicine doctor, a massage therapist and soon to be a trainer to help get me back into the condition I need -- All covered through the one visit. Amazing experience, they are doing it right!
                          </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-3 columns">
                          <p>June 16, 2016 </br>
                             <span class="review_patient"> by Trista K. </span>
                           </p>
                      </div>
                      <div class="large-9 columns">
                          <span class="review_rating">Rating : 4/5 </span>
                          <p>
                            I couldn't recommend an office more! They are all so awesome and provide a really customized plan to fix whatever issue you're facing. I had some issues with my neck/back and have seen Rich for physical therapy, their chiropractor, a sports medicine doctor, a massage therapist and soon to be a trainer to help get me back into the condition I need -- All covered through the one visit. Amazing experience, they are doing it right!
                          </p>
                      </div>
                    </div>

                  </div>
              </div>
          </div>
          <div class="large-5 columns">
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
            <div class="message">
            </div>
            <form method="post" class="appointment_form" name="new_appointment" id="new_appointment"
            onsubmit="return book_appointment()">

              <div class="appointment_title">
                  Book Appointment
              </div>
              <div class="appointment_details">
                <div class="input-group">
                    <label>Appointment Reason : </label>
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_profile[0]['user_id'] ?>">
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
                    <input type="text" name="patient_name" value="<?php echo $user_profile[0]['fullname'] ?>">
                </div>
                <div class="input-group">
                    <label> Confirm Email : </label>
                    <input type="email" name="patient_email" value="<?php echo $user_profile[0]['email'] ?>">
                </div>
                <div class="input-group">
                    <label> Confirm Phone : </label>
                    <input type="text" name="patient_phone" value="<?php echo "+".$user_profile[0]['phone'] ?>">
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
