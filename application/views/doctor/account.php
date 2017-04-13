     <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/doctor/my_account'); ?>"> My Account </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor/my_calendar'); ?>"> My Calendar </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor/my_appointments'); ?>"> My Appointments </a>
            </li>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/doctor/my_reviews'); ?>"> My Reviews </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="personal_info">

        <div class="row item_row">
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
         <div class="mypb_item_title"> PERSONAL INFORMATION </div>
         
         <div class="large-4 columns">
              <img src="<?php echo $user_profile['0']['user_avatar']; ?>" class="avatar_img">
              <div class="account_item">
                <div class="account_title"> NAME </div>
                <div class="account_detail"> <?php echo $user_profile['0']['fullname']; ?> </div>
              </div>
              <div class="account_item">
                <div class="account_title"> SPECIALITY </div>
                <div class="account_detail"> <?php echo $user_profile['0']['speciality']; ?> </div>
              </div>
         </div>
         
         <div class="large-4 columns">
            
            <div class="account_item">
              <div class="account_title"> DATE OF BIRTH  </div>
              <div class="account_detail"> 
                  <?php 
                  echo date('M-d-Y', strtotime($user_profile['0']['dob']));
                  ?> 
              </div>
            </div>
            <div class="account_item">
              <div class="account_title"> Gender </div>
              <div class="account_detail"> <?php echo $user_profile['0']['gender']; ?> </div>
            </div>
         </div>
         
         <div class="large-4 columns">
              <div class="account_item">
                <div class="account_title"> PERSONAL STATEMENT </div>
                <div class="account_detail"> <?php echo $user_profile['0']['personal_statement']; ?> </div>
              </div> 
         </div>
        </div>

        <div class="row item_row">
          <div class="large-4 columns">
            
            <div class="mypb_item_title"> EDUCATION INFORMATION </div>
             <div class="account_item">
               <div class="account_title"> HIGHEST QUALIFICATION  </div>
               <div class="account_detail"> <?php echo $user_profile['0']['qualification']; ?> </div>
             </div>
             <div class="account_item">
               <div class="account_title"> YEARS OF EXPERIENCE </div>
               <div class="account_detail"> <?php echo $user_profile['0']['experience']; ?> </div>
             </div>
          </div>
          <div class="large-4 columns">
            
            <div class="mypb_item_title"> CONTACT INFORMATION </div>
             <div class="account_item">
               <div class="account_title"> EMAIL ADDRESS </div>
               <div class="account_detail"> <?php echo $user_profile['0']['email']; ?> </div>
             </div>
             <div class="account_item">
               <div class="account_title"> PHONE NUMBER </div>
               <div class="account_detail"> <?php echo $user_profile['0']['phone']; ?> </div>
             </div>
             <div class="account_item">
               <div class="account_title"> MAILING ADDRESS </div>
               <div class="account_detail"> 
                    <?php echo $user_profile['0']['postal_address']; ?>
               </div>
             </div>
          </div>
          <div class="large-4 columns pull-left">
           <div class="mypb_item_title"> ADDRESS </div>
             <div class="account_item">
                 <div class="account_title"> OFFICE ADDRESS </div>
                 <div class="account_detail"> 
                      <?php echo $user_profile['0']['office_address']; ?>
                 </div>
            </div>
             <div class="account_item">
               <div class="account_title"> TOWN </div>
               <div class="account_detail"> <?php echo $user_profile['0']['town']; ?> </div>
             </div>

             <div class="account_item">
               <div class="account_title"> COUNTRY </div>
               <div class="account_detail"> <?php echo $user_profile['0']['country']; ?> </div>
             </div>
          </div>

        </div>
        <div class="row">
           <button class="button button_edit"> Edit Account Details </button>
             <div class="edit_details_modal">
                      <div class="modal_header">
                        <div class="mypb_item_title"> ACCOUNT DETAILS </div> 
                        <a class="close_modal">
                            <i class="fa fa-times"></i>
                        </a> 
                      </div>
                      <div class="modal_body">
                         <form enctype ='multipart/form-data' class="appointment_form" name="account_details" id="account_details" <?php echo form_open_multipart('doctor/update_account_details'); ?>
                          <div class="row">
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       FULLNAME
                                       <input type="text" name="doctor_fullname" placeholder="Fullname" class="primary_color" required="" value="<?php echo $user_profile['0']['fullname']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       SPECIALITY
                                       <input type="text" name="doctor_speciality" placeholder="speciality" class="primary_color" required="" value="<?php echo $user_profile['0']['speciality']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       GENDER
                                       <select name="doctor_gender" placeholder="Gender" class="primary_color" required="">
                                         <option> Select Gender </option>
                                         <option value="Male" <?php if( $user_profile['0']['gender'] == 'Male'){echo "Selected";} ?>> Male </option>
                                         <option value="Female"<?php if( $user_profile['0']['gender'] == 'Female'){echo "Selected";} ?>> Female</option>
                                       </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       DOB
                                       <input type="date" name="doctor_dob" placeholder="DOB" class="primary_color" required="" value="<?php echo $user_profile['0']['dob']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       PERSONAL STATEMENT
                                       <textarea name="doctor_statement" col="23"class="primary_color">
                                         <?php echo $user_profile['0']['personal_statement']; ?>
                                       </textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       HIGHEST QUALIFICATION
                                       <input type='text' name="doctor_qualification" class="primary_color" required="" value ="<?php echo $user_profile['0']['qualification']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       YEARS OF EXPERIENCE
                                       <input type='text' name="doctor_experience" class="primary_color" required="" value ="<?php echo $user_profile['0']['experience']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       PHONE NUMBER
                                       <input type='text' name="doctor_phone" class="primary_color" required="" value ="<?php echo $user_profile['0']['phone']; ?>">
                                    </div>
                                  </div>
                              </div>

                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       EMAIL ADDRESS
                                       <input type='email' name="doctor_email" class="primary_color" required="" value="<?php echo $user_profile['0']['email']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       MAILING ADDRESS
                                       <input type='text' name="doctor_address" class="primary_color" required="" value="<?php echo $user_profile['0']['postal_address']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       OFFICE ADDRESS
                                       <input type='text' name="doctor_office" class="primary_color" required="" value="<?php echo $user_profile['0']['office_address']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       TOWN
                                       <input type='text' name="doctor_town" class="primary_color" required="" value="<?php echo $user_profile['0']['town']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                        COUNTRY
                                       <input type='text' name="doctor_country" class="primary_color" required="" value="<?php echo $user_profile['0']['country']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       AVATAR
                                       <input type="file" name="useravatar" class="primary_color">
                                    </div>
                                  </div>
                              </div>
                              <div class="button_complete">
                                <button type="submit" class="button button_primary "> UPDATE </button>
                              </div>
                       </form>
                      </div>
             </div>
        </div>          
   </div>
  