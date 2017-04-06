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

   <div class="insuarance_products">
        <div class="row">
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
        </div>
        <div class="row">
             <?php for($i=0 ; $i < count($user_appointments); $i++){ ?>
<<<<<<< HEAD
             <div class="insuarance_item <?php if(date('Y-m-d H:i:s',strtotime($user_appointments[$i]['appointment_date'])) < date('Y-m-d H:i:s')){ echo 'expired';}?>">
                        <div class = "row">
                           <div class="large-2 columns">
=======
             <div class="insuarance_item <?php if(date('d-m-Y',strtotime($user_appointments[$i]['appointment_date'])) < date('d-m-Y')){
                          echo 'expired';}?>">
                        <div class = "row">
                            <div class="large-2 columns">
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
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
<<<<<<< HEAD
                            <?php if(date('Y-m-d H:i:s',strtotime($user_appointments[$i]['appointment_date'])) < date('Y-m-d H:i:s')){
=======
                            <?php if(date('d-m-Y',strtotime($user_appointments[$i]['appointment_date'])) < date('d-m-Y')){
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                            ?>
                            <div class="large-2 columns">
                                  <a class="button button_appointment" href="<?php echo base_url("index.php/patient/review_doctor/".$user_appointments[$i]['doctor_id']); ?>">
                                      REVIEW DOCTOR
                                  </a>
                            </div>
                            <?php } else { ?>
                            <div class="large-2 columns">
                                  <?php if($user_appointments[$i]['appointment_status'] == 'CONFIRMED'){ ?>
                                          <div class="appointment_status">
                                              Appointment Confirmed
                                          </div>
<<<<<<< HEAD
                                          <a class="button button_appointment" href="<?php echo base_url('index.php/patient/reschedule_appointment/'.$user_appointments[$i]['appointment_id']);?>">
                                                                                   Reschedule Appointment
                                          </a>
                                          <a  class="button button_cancel" href="<?php echo base_url("index.php/patient/cancel_appointment/".$user_appointments[$i]['appointment_id']); ?>"

                                          <?php if(date('Y-m-d H:i:s',strtotime($user_appointments[$i]['appointment_date'])) < date('Y-m-d H:i:s')){
=======
                                          <a class="button button_appointment">
                                              Reschedule Appointment
                                          </a>
                                          <a  class="button button_cancel" href="<?php echo base_url("index.php/patient/cancel_appointment/".$user_appointments[$i]['appointment_id']); ?>"

                                          <?php if(date('d-m-Y',strtotime($user_appointments[$i]['appointment_date'])) < date('d-m-Y')){
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                                                                    echo 'disabled="true"';}?>">                           Cancel Appointment
                                          </a>
                                  <?php } else if ($user_appointments[$i]['appointment_status'] =='DECLINED') {
                                   ?>     
                                        <div class="appointment_status declined">
                                            Appointment Declined
                                        </div>
<<<<<<< HEAD
                                        <a class="button button_appointment" href="<?php echo base_url('index.php/patient/reschedule_appointment/'.$user_appointments[$i]['appointment_id']);?>">
                                          Reschedule Appointment
                                         </a>
                                        
                                  <?php } else { ?>
                                      <a class="button button_appointment" href="<?php echo base_url('index.php/patient/reschedule_appointment/'.$user_appointments[$i]['appointment_id']);?>">
                                          Reschedule Appointment
                                      </a>
                                      <a class="button button_cancel" href="<?php echo base_url("index.php/patient/decline_appointment/".$user_appointments[$i]['appointment_id']); ?>"<?php if(date('Y-m-d H:i:s',strtotime($user_appointments[$i]['appointment_date'])) < date('Y-m-d H:i:s')){
=======
                                        <a class="button button_appointment">
                                           Reschedule Appointment
                                        </a> 
                                        
                                  <?php } else { ?>
                                      <a class="button button_appointment">
                                          Reschedule Appointment
                                      </a>
                                      <a class="button button_cancel" href="<?php echo base_url("index.php/patient/decline_appointment/".$user_appointments[$i]['appointment_id']); ?>"<?php if(date('d-m-Y',strtotime($user_appointments[$i]['appointment_date'])) < date('d-m-Y')){
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                                                                    echo 'disabled="true"';}?>">
                                          Cancel ppointment
                                      </a>
                                  <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
             </div>
             <?php } ?>
        </div>
        <div style="clear: both"></div>
    </div>
        </div>
   </div>