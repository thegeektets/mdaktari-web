    <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">
              <a href="<?php echo base_url('index.php/patient'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text active">
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
              <div class="account_title"> DATE OF BIRTH </div>
              <div class="account_detail"> 
                  <?php 
                  echo date('M-d-Y', strtotime($user_profile['0']['dob']));
                  ?> 
              </div>
            </div>

         </div>
         <div class="large-4 columns">
            <div class="account_item">
              <div class="account_title"> Occupation </div>
              <div class="account_detail"> <?php echo $user_profile['0']['occupation']; ?> </div>
            </div>
            <div class="account_item">
              <div class="account_title"> Gender </div>
              <div class="account_detail"> <?php echo $user_profile['0']['sex']; ?> </div>
            </div>
         </div>
         <div class="large-4 columns">
              <div class="account_item">
                <div class="account_title"> Mdaktari Patient Number </div>
                <div class="account_detail"> <?php echo $user_profile['0']['patient_id']; ?> </div>
              </div> 
         </div>
        </div>

        <div class="row item_row">
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
             
          </div>
          
          <div class="large-4 columns pull-left">
             <div class="mypb_item_title"> ADDRESS </div>
             
             <div class="account_item">
               <div class="account_title"> MAILING ADDRESS </div>
               <div class="account_detail"> 
                    <?php echo $user_profile['0']['postal_address']; ?>
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
           <button class="button button_edit"> Edit Account Details  </button>
           <div class="edit_details_modal">
                      <div class="modal_header">
                        <div class="mypb_item_title"> ACCOUNT DETAILS </div> 
                        <a class="close_modal">
                            <i class="fa fa-times"></i>
                        </a> 
                      </div>
                      <div class="modal_body">
                         <form enctype ='multipart/form-data' class="account_details_form" name="account_details" id="account_details" <?php echo form_open_multipart('patient/update_account_details'); ?>
                          <div class="row">
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       FULLNAME
                                       <input type="text" name="patient_fullname" placeholder="Fullname" class="primary_color" required="" value="<?php echo $user_profile['0']['fullname']; ?>">
                                    </div>
                                  </div>
                              </div>
                             
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       GENDER
                                       <select name="patient_gender" placeholder="Gender" class="primary_color" required="">
                                         <option> Select Gender </option>
                                         <option value="Male" <?php if( $user_profile['0']['sex'] == 'Male'){echo "Selected";} ?>> Male </option>
                                         <option value="Female"<?php if( $user_profile['0']['sex'] == 'Female'){echo "Selected";} ?>> Female</option>
                                       </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       DOB
                                       <input type="date" name="patient_dob" placeholder="DOB" class="primary_color" required="" value="<?php echo $user_profile['0']['dob']; ?>">
                                    </div>
                                  </div>
                              </div>
                            
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       OCCUPATION
                                       <input type='text' name="patient_occupation" class="primary_color" required="" value ="<?php echo $user_profile['0']['occupation']; ?>">
                                    </div>
                                  </div>
                              </div>
                             
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       PHONE NUMBER
                                       <input type='text' name="patient_phone" class="primary_color" required="" value ="<?php echo $user_profile['0']['phone']; ?>">
                                    </div>
                                  </div>
                              </div>

                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       EMAIL ADDRESS
                                       <input type='email' name="patient_email" class="primary_color" required="" value="<?php echo $user_profile['0']['email']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       MAILING ADDRESS
                                       <input type='text' name="patient_address" class="primary_color" required="" value="<?php echo $user_profile['0']['postal_address']; ?>">
                                    </div>
                                  </div>
                              </div>
                            
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                       TOWN
                                       <input type='text' name="patient_town" class="primary_color" required="" value="<?php echo $user_profile['0']['town']; ?>">
                                    </div>
                                  </div>
                              </div>
                              <div class="large-6 columns">
                                  <div class="form_group full_name">
                                    <div class="account_title">
                                        COUNTRY
                                       <input type='text' name="patient_country" class="primary_color" required="" value="<?php echo $user_profile['0']['country']; ?>">
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
  