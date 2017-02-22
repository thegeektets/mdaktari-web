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
    <?php //var_dump($user_profile) ?>
    <div class="my_pimabima">
         <div class="large-2 columns">
         </div>
         <div class="large-3 columns my_pimabima_item">
              <img src="<?php echo base_url('/assets/img/avatar.png')?>" class="avatar_img">
              <div>  <?php echo $user_profile['0']['fullname']; ?> </div>
         </div>
         <div class="large-2 columns my_pimabima_item">
              <div class="mypb_item_title"> APPOINTMENT HISTORY </div>
              <div> 3 Pending Appointments   </div>
         </div>
         <div class="large-2 columns my_pimabima_item">
              <div class="mypb_item_title"> ACCOUNT INFO </div>
              YOUR MDAKTARI ACCOUNT #
              006 
         </div>
         <div class="large-2 columns">
         </div>
         
   </div>

   <div class="earn_points">
        <div class="row">
          <div class="points_title">
            Find a Doctor
          </div>
          <p>
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
          </p>
          <div class="points_desc">
             find a doctor by searching a condition,symptom , doctor name or locatin and make an appointment instantly.
          </div>
          
        </div>
   </div>

