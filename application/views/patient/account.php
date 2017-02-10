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
         <div class="mypb_item_title"> PERSONAL INFORMATION </div>
         <div class="large-4 columns">
              <img src="assets/img/avatar.png" class="avatar_img">
           
         </div>
         <div class="large-4 columns">
            <div class="account_item">
              <div class="account_title"> NAME </div>
              <div class="account_detail"> <?php echo $user_profile['0']['fullname']; ?> </div>
            </div>
            <div class="account_item">
              <div class="account_title"> BIRTH DATE </div>
              <div class="account_detail"> 
                  <?php 
                  echo date('M-d-Y', strtotime($user_profile['0']['dob']));
                  ?> 
              </div>
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
              <div class="edit_details_modal">
                      <div class="modal_header">
                        <div class="mypb_item_title"> PERSONAL INFORMATION </div> 
                        <a class="close_modal">
                            <i class="fa fa-times"></i>
                        </a> 
                      </div>
                      <div class="modal_body">
                        <form>
                          <div class="form_group full_name">
                            <div class="account_title">
                              NAME
                               <input type="text" name="patient_fullname" placeholder="Fullname" class="primary_color" required="" value="<?php echo set_value('patient_fullname'); ?>">
                            </div>
                          </div>
                          <div class="form_group gender">
                            <div class="account_title"> 
                              GENDER 
                               <select name="patient_sex" placeholder="Gender" class="primary_color" required="">
                                 <option> Select Gender </option>
                                 <option value="Male" <?php if( $user_profile['0']['sex'] == 'Male'){echo "Selected";} ?>> Male </option>
                                 <option value="Female"<?php if( $user_profile['0']['sex'] == 'Female'){echo "Selected";} ?>> Female</option>
                               </select>
                            </div>
                          </div>
                          <div class="form_group date">
                              BORN ON
                            <div class="form_group month">
                              <div class="account_title"> Month </div>
                            </div>
                            <div class="form_group day">
                              <div class="account_title"> Day </div>
                            </div>
                            <div class="form_group year">
                              <div class="account_title"> Year </div>
                            </div>
                            
                          </div> 
                          <div class="select_avatar">
                            <div class="account_title"> Select Avatar </div>
                              <img src="assets/img/avatar.png" class="avatar_select">
                              <img src="assets/img/avatar2.png" class="avatar_select">
                            
                          </div>
                          <div class="button_complete">
                            <button type="submit" class="button button_primary ">Complete</button>
                          </div>
                        </form>
                      </div>
                    </div>
              <button class="button button_edit"> Edit Personal Information </button>
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
             
             <button class="button button_edit"> Edit Contact </button>

             <div class="edit_details_modal">
               <div class="modal_header">
                 <div class="mypb_item_title"> CONTACT INFORMATION </div> 
                 <a class="close_modal">
                     <i class="fa fa-times" aria-hidden="true"></i>
                 </a> 
               </div>
               <div class="modal_body">
                 <form>
                   <div class="form_group contact_info">
                     <div class="account_title"> EMAIL ADDRESS </div>
                   </div>
                   <div class="form_group contact_info">
                     <div class="account_title"> PHONE NUMBER </div>
                   </div>
                   
                   <div class="button_complete">
                     <button class="button button_primary ">Complete</button>
                   </div>
                 </form>
               </div>
             </div>

          </div>
          
          <div class="large-4 columns">
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

             <button class="button button_edit"> Edit Address </button>
             <div class="edit_details_modal">
               <div class="modal_header">
                 <div class="mypb_item_title"> CONTACT INFORMATION </div> 
                 <a class="close_modal">
                     <i class="fa fa-times" aria-hidden="true"></i>
                 </a> 
               </div>
               <div class="modal_body">
                 <form>
                   <div class="form_group contact_info">
                     <div class="account_title"> ADDRESS </div>
                   </div>
              

                   <div class="button_complete">
                     <button class="button button_primary ">Complete</button>
                   </div>
                 </form>
               </div>
             </div>
          </div>
          
          <div class="large-4 columns">
           <div class="mypb_item_title"> PASSWORD </div>
             <div class="account_item">
               <div class="account_title"> Current Password </div>
               <div class="account_detail"> ******* </div>
             </div>
             <button class="button button_edit"> Edit Password </button>
             <div class="edit_details_modal">
               <div class="modal_header">
                 <div class="mypb_item_title"> Account INFORMATION </div> 
                 <a class="close_modal">
                     <i class="fa fa-times" aria-hidden="true"></i>
                 </a> 
               </div>
               <div class="modal_body">
                 <form>
                   <div class="form_group contact_info">
                     <div class="account_title"> PASSWORD </div>
                   </div>
              
                   
                   <div class="button_complete">
                     <button class="button button_primary ">Complete</button>
                   </div>
                 </form>
               </div>
             </div>
          </div>
            
        </div>
   </div>
  