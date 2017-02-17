   <div class="top-bar secondary_menu">
      <div class="row">  
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text active">
              <a href="<?php echo base_url('index.php/doctor'); ?>"> My Dashboard </a>
            </li>
            <li class="menu-text">
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

    <div class="my_pimabima" style="padding-bottom: 120px">
         <div class="large-2 columns">
         </div> 
         <div class="large-3 columns my_pimabima_item">
              <img src="assets/img/avatar.png" class="avatar_img">
              <div> <?php if (isset($user_profile)) { 
                    echo $user_profile['0']['fullname'];
                  } ?> </div>
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
         <div style="clear: both;"></div>
   </div>