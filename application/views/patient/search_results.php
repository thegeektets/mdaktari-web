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


    <div class="insuarance_products">
        <div class="row">
            <form class="doctor_search" name="doctor_search" id="doctor_search" <?php echo form_open('patient/search_doctor'); ?>
              <div class="large-2 columns">
              </div>
              <div class="large-8 columns collapse">
                <div class="large-11 columns">
                  <div class="input-group">
                    <input type="text" name="search_input" placeholder="Search Doctor" class="primary_color">
                  </div>
                </div>
                <div class="large-1 columns">  
                  <div class="input-group-button">
                      <button type="submit" class="button button_appointment">SEARCH</button>
                  </div>
                </div>
              </div>
              <div class="large-2 columns">
              </div>
            </form> 
        </div>
        <div class="row">
                   <?php for($i=0; $i < count($doctor_results); $i++) { ?>
                     <div class="insuarance_item">
                         <div class = "row">
                             <div class="large-2 columns">
                                 <img src="<?php echo $doctor_results[$i]['user_avatar'] ?>" class="insuarance_img">
                                 <div class="insuarance_title">  </div>
                             </div>
                             <div class="large-6 columns">
                                  <div class="insuarance_cost">
                                      <span class="doctor_title"> <?php echo $doctor_results[$i]['fullname'] ?> </span>
                                  </div>
                                  <div class="appointment_desc">
                                     <h6>
                                        <?php echo $doctor_results[$i]['speciality'] ?>
                                     </h6>
                                     <p>
                                     <?php echo $doctor_results[$i]['personal_statement'] ?>
                                     </p>
                                  </div>
                             </div>
                             <div class="large-2 columns">
                                   <div class="insuarance_processing">
                                       <div class="appointment_desc">
                                     <p>
                                        Experience : <?php echo $doctor_results[$i]['experience'] ?>
                                     </p>
                                     <p>
                                        Qualification : <?php echo $doctor_results[$i]['qualification'] ?>
                                     </p>
                                  </div>
                                   </div>
                             </div>
                             <div class="large-2 columns">
                                   <a class="button button_appointment" href="<?php echo base_url('index.php/patient/doctor_profile/'.$doctor_results[$i]['user_id'])?>">
                                       VIEW
                                   </a>
                                   <a class="button button_appointment" href="<?php echo base_url('index.php/patient/doctor_profile/'.$doctor_results[$i]['user_id'])?>">
                                       MAKE APPOINTMENT
                                   </a>
                                   
                             </div>
                         </div>
                     </div>
                     <?php } ?>
                 </div>
    </div>