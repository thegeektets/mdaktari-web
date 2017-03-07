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
            <li class="menu-text">
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

  
   <div class="insuarance_products">
        <div class="row">
<<<<<<< HEAD
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
            <?php for($i=0 ; $i < count($user_appointments); $i++){ ?>
             <div class="insuarance_item">
                        <div class = "row">
                            <div class="large-2 columns">
                                <img src="<?php echo $user_appointments[$i]['user_avatar']; ?>" class="user_img">
                            </div>
                            <div class="large-4 columns">
                                <div class="appointment_user"> <?php echo $user_appointments[$i]['fullname']; ?> </div>
                                 <div class="appointment_user_title">
                                     <?php echo $user_appointments[$i]['speciality']; ?>
                                 </div>
                                 <div class="appointment_user_office">
                                     <?php echo $user_appointments[$i]['office_address']; ?>
                                 </div>
                                 <div class="appointment_user_phone">
                                     <?php echo '0'.$user_appointments[$i]['phone']; ?>
                                 </div>
                                 <div class="appointment_user_email">
                                     <a href="mailto:<?php echo $user_appointments[$i]['email']; ?>"><?php echo $user_appointments[$i]['email']; ?>
                                     </a>
                                 </div>
                            </div>
                            <div class="large-4 columns">
                                 <div class="appointment_desc">
                                    <div class="appointment_desc_title">
                                    Appointment Reason : 
                                    </div>
                                    <div class="appointment_reason">
                                    <?php echo $user_appointments[$i]['appointment_reason']; ?>
                                    </div>
                                 </div>
                                  <div class="appointment_date">
                                      Appointment Date :</br>
                                      <?php 
                                      echo date('M-d-Y', strtotime($user_appointments[$i]['appointment_date']));
                                      ?> 
                                  </div>
                                  <div class="appointment_time">
                                      Appointment Time : <br/>
                                      <?php echo $user_appointments[$i]['appointment_time']; ?>
                                  </div>
                            </div>
                          
                            <div class="large-2 columns">
                              <?php if($user_appointments[$i]['appointment_status'] == 'CONFIRMED'){ ?>
                                      <div class="appointment_status">
                                          Appointment Confirmed
                                      </div>
                                      <a class="button button_appointment">
                                          Reschedule Appointment
                                      </a>
                                      <a class="button button_cancel">
                                          Cancel Appointment
                                      </a>
                              <?php } else if ($user_appointments[$i]['appointment_status'] =='DECLINED') {

                               ?>      
                              <?php } else { ?>
                                  <a class="button button_appointment" href="<?php echo base_url("index.php/doctor/confirm_appointment/".$user_appointments[$i]['appointment_id']); ?>">
                                      CONFIRM APPOINTMENT
                                  </a>
                                  <a class="button button_cancel" href="<?php echo base_url("index.php/doctor/decline_appointment/".$user_appointments[$i]['appointment_id']); ?>">
                                      Decline Appointment
                                  </a>
                              <?php } ?>
                                  
                            </div>
                        </div>
             </div>
             <?php } ?>
=======
                   <div class="insuarance_item">
                        <div class = "row">
                            <div class="large-2 columns">
                                <img src="assets/img/avatar2.png" class="insuarance_img">
                                <div class="insuarance_title"> Dr. Faith M Vuku </div>
                            </div>
                            <div class="large-4 columns">
                                 <div class="insuarance_cost">
                                     <span class="cost_number"> Heart Specialist </span>
                                 </div>
                                 <div class="appointment_desc">
                                    <h6>
                                    Appointment Reason : 
                                    </h6>
                                    <p>
                                    Lorem ipsum dolor sit amet, quis nusquam no his, novum ceteros eum at. Probo partem sea id, et delenit eligendi conclusionemque usu, qui facilis splendide intellegam ei. Quo in habeo laoreet. Sea omnes verterem constituam in.
                                    </p>
                                 </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="appointment_start">
                                      JANUARY 5, 2017 9.30 AM
                                  </div>
                                  <div class="appointment_end">
                                      JANUARY 5, 2017 10.30 AM
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="insuarance_processing">
                                      
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <a class="button button_appointment">
                                      VIEW
                                  </a>
                                  <a class="button button_appointment">
                                      Reschedule
                                  </a>
                                  <a class="button button_appointment">
                                      Cancel
                                  </a>
                            </div>
                        </div>
                    </div>
                    <div class="insuarance_item">
                        <div class = "row">
                            <div class="large-2 columns">
                                <img src="assets/img/avatar2.png" class="insuarance_img">
                                <div class="insuarance_title"> Dr. Faith M Vuku </div>
                            </div>
                                    <div class="large-4 columns">
                                 <div class="insuarance_cost">
                                     <span class="cost_number"> Heart Specialist </span>
                                 </div>
                                 <div class="appointment_desc">
                                    <h6>
                                    Appointment Reason : 
                                    </h6>
                                    <p>
                                    Lorem ipsum dolor sit amet, quis nusquam no his, novum ceteros eum at. Probo partem sea id, et delenit eligendi conclusionemque usu, qui facilis splendide intellegam ei. Quo in habeo laoreet. Sea omnes verterem constituam in.
                                    </p>
                                 </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="appointment_start">
                                      JANUARY 5, 2017 9.30 AM
                                  </div>
                                  <div class="appointment_end">
                                      JANUARY 5, 2017 10.30 AM
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="insuarance_processing">
                                      
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <a class="button button_appointment">
                                      VIEW
                                  </a>
                                  <a class="button button_appointment">
                                      Reschedule
                                  </a>
                                  <a class="button button_appointment">
                                      Cancel
                                  </a>
                            </div>
                        </div>
                    </div>
                    <div class="insuarance_item">
                        <div class = "row">
                            <div class="large-2 columns">
                                <img src="assets/img/avatar2.png" class="insuarance_img">
                                <div class="insuarance_title"> Dr. Betty G Kanini </div>
                            </div>
                                    <div class="large-4 columns">
                                 <div class="insuarance_cost">
                                     <span class="cost_number"> Heart Specialist </span>
                                 </div>
                                 <div class="appointment_desc">
                                    <h6>
                                    Appointment Reason : 
                                    </h6>
                                    <p>
                                    Lorem ipsum dolor sit amet, quis nusquam no his, novum ceteros eum at. Probo partem sea id, et delenit eligendi conclusionemque usu, qui facilis splendide intellegam ei. Quo in habeo laoreet. Sea omnes verterem constituam in.
                                    </p>
                                 </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="appointment_start">
                                      JANUARY 5, 2017 9.30 AM
                                  </div>
                                  <div class="appointment_end">
                                      JANUARY 5, 2017 10.30 AM
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <div class="insuarance_processing">
                                      
                                  </div>
                            </div>
                            <div class="large-2 columns">
                                  <a class="button button_appointment">
                                      View
                                  </a>
                                  <a class="button button_appointment">
                                      Reschedule
                                  </a>
                                  <a class="button button_appointment">
                                      Cancel
                                  </a>
                            </div>
                        </div>
                    </div>
>>>>>>> 1db99937cfa4211d6d9ce5399ea6cba18ed50fdd
        </div>
        <div style="clear: both"></div>
    </div>
        </div>
   </div>