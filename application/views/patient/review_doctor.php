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
<<<<<<< HEAD
=======
                          <h6> <a href=""> Patient Reviews </a> </h6>
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                      </div>
                </div>
              </div>
            </div>
        </div>
        <hr/>
        <div class="row">
          <div class="large-8 columns"> 
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
              </div>
              <div class="row">
=======
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
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
<<<<<<< HEAD
                <form method="post" class="review_form" name="review_form" id="review_form" <?php echo form_open('patient/doctor_review/'.$doctor_profile['0']['user_id']); ?>
=======
                <form method="post" class="appointment_form" name="new_appointment" id="new_appointment"
                onsubmit="return book_appointment()">
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33

                  <h3> Review Doctor </h3>
                  
                  <div class="appointment_details">
                    <div class="input-group">
                      <label> Doctor Rating : </label>
<<<<<<< HEAD
                        <span class="rating">
                          <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                              <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                              <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                              <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                              <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                        </span>

=======
                      <span class="rating">
                              <input type="radio" class="rating-input"
                                  id="rating-input-1-5" name="rating-input-1">
                              <label for="rating-input-1-5" class="rating-star"></label>
                              <input type="radio" class="rating-input"
                                  id="rating-input-1-4" name="rating-input-1">
                              <label for="rating-input-1-4" class="rating-star"></label>
                              <input type="radio" class="rating-input"
                                  id="rating-input-1-3" name="rating-input-1">
                              <label for="rating-input-1-3" class="rating-star"></label>
                              <input type="radio" class="rating-input"
                                  id="rating-input-1-2" name="rating-input-1">
                              <label for="rating-input-1-2" class="rating-star"></label>
                              <input type="radio" class="rating-input"
                                  id="rating-input-1-1" name="rating-input-1">
                              <label for="rating-input-1-1" class="rating-star"></label>
                          </span>
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                    </div>

                    <div class="input-group">
                        <label> Doctor Review : </label>
                        <input type="hidden" name="doctor_id" value="<?php echo $doctor_profile[0]['user_id'] ?>">
<<<<<<< HEAD
                        <textarea type="text" rows="5" name="doctor_review" placeholder="Doctor Review" class="primary_color" value="<?php echo set_value('doctor_review'); ?>" required>
                            <?php echo set_value('doctor_review'); ?>
=======
                        <textarea type="text" name="appointment_reason" placeholder="Visit Reason" class="primary_color" value="<?php echo set_value('appointment_reason'); ?>">
                            <?php echo set_value('appointment_reason'); ?>
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
                        </textarea>
                    </div>
                  
                    <div class="input-group-button">
                        <button type="submit" class="button appointment_button">
                            Submit Review
                        </button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
         
        </div>
  </div>