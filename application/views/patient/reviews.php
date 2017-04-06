<<<<<<< HEAD
   <div class="top-bar secondary_menu">
=======

    <div class="top-bar secondary_menu">
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient/my_account'); ?>"> My Account </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient/my_appointments'); ?>"> My Appointments </a>
            </li>
             <li class="menu-text active">
              <a href="<?php echo base_url('index.php/patient/my_reviews'); ?>"> My Reviews </a>
<<<<<<< HEAD
             </li>
=======
            </li>
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
          </ul>
        </div>
      </div>
    </div>

<<<<<<< HEAD
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
             <?php for($i=0 ; $i < count($doctor_reviews); $i++){ ?>
             <div class="insuarance_item">
                        <div class = "row">
                            <div class="large-2 columns">
                                <img src="<?php echo $doctor_reviews[$i]['user_avatar']; ?>" class="user_img">
                            </div>
                            <div class="large-3 columns">
                                <div class="appointment_user"> <?php echo $doctor_reviews[$i]['fullname']; ?> </div>
                                 <div class="appointment_user_title">
                                     <?php echo $doctor_reviews[$i]['speciality']; ?>
                                 </div>
                                 <div class="appointment_user_office">
                                     <?php echo $doctor_reviews[$i]['office_address']; ?>
                                 </div>
                                 <div class="appointment_user_phone">
                                     <?php echo '0'.$doctor_reviews[$i]['phone']; ?>
                                 </div>
                                 <div class="appointment_user_email">
                                     <a href="mailto:<?php echo $doctor_reviews[$i]['email']; ?>"><?php echo $doctor_reviews[$i]['email']; ?>
                                     </a>
                                 </div>
                            </div>
                            <div class="large-5 columns">
                                <div class="review_details">
                                    <div class="appointment_desc_title">
                                    Doctor Rating : 
                                    </div>
                                    <div class="appointment_reason">
                                        <span class="stars">
                                            <?php echo $doctor_reviews[$i]['review_rating']; ?>
                                        </span>
                                    </div>
                                 </div>
                                 
                                  <div class="appointment_time">
                                      Doctor Review : <br/>
                                  </div>
                                  <div class="doctor_review">
                                      <?php echo $doctor_reviews[$i]['review_desc']; ?>
                                  </div>
                            </div>
                           
                            <div class="large-2 columns">
                                  <a class="button button_appointment" href="<?php echo base_url("index.php/patient/edit_review/".$doctor_reviews[$i]['review_id']); ?>">
                                      EDIT REVIEW
                                  </a>
                            </div>
                          
                        </div>
             </div>
             <?php } ?>
        </div>
        <div style="clear: both"></div>
    </div>
        </div>
   </div>
=======
  
   <div class="insuarance_products">
    <div class="row">
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
      </div>
      <div style="clear: both"></div>
    </div>
        </div>
   </div>
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
