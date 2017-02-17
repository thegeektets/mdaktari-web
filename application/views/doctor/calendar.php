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
            <li class="menu-text active">
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

          <ul class="tabs product_tabs" data-tabs id="product-tabs">
                <li class="tabs-title is-active"><a href="#calendar" aria-selected="true"> Calendar </a></li>
                <li class="tabs-title"><a href="#cal_set"> Calender Settings </a></li>
          </ul>

          
          <div class="tabs-content product_tab_content" data-tabs-content="product-tabs">
                
                <div class="tabs-panel is-active" id="calendar">
                  <div class="main">
                      <div class="mini-cal">
                          <div class="calender">
                              <div class="column_left_grid calender">
                                          <div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">September 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-08-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2015-08-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2015-09-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-09-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2015-09-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-09-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2015-09-05"><div class="day-contents">5</div></td></tr><tr><td class="day past calendar-day-2015-09-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-09-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-09-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2015-09-09"><div class="day-contents">9</div></td><td class="day past event calendar-day-2015-09-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2015-09-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2015-09-12"><div class="day-contents">12</div></td></tr><tr><td class="day past event calendar-day-2015-09-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2015-09-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2015-09-15"><div class="day-contents">15</div></td><td class="day past calendar-day-2015-09-16"><div class="day-contents">16</div></td><td class="day past calendar-day-2015-09-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2015-09-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2015-09-19"><div class="day-contents">19</div></td></tr><tr><td class="day past calendar-day-2015-09-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2015-09-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2015-09-22"><div class="day-contents">22</div></td><td class="day past event calendar-day-2015-09-23"><div class="day-contents">23</div></td><td class="day past calendar-day-2015-09-24"><div class="day-contents">24</div></td><td class="day past calendar-day-2015-09-25"><div class="day-contents">25</div></td><td class="day today calendar-day-2015-09-26"><div class="day-contents">26</div></td></tr><tr><td class="day calendar-day-2015-09-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-09-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-09-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-09-30"><div class="day-contents">30</div></td><td class="day adjacent-month next-month calendar-day-2015-10-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-10-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-10-03"><div class="day-contents">3</div></td></tr></tbody></table></div></div>
                                </div>
                          </div>
                      </div>
                      <div class="slide">
                          <h3 class="schedule_title"> Todays Schedule </h3>
                          <hr/>
                          <div class="schedule_link">
                              <a href="<?php echo base_url('index.php/doctor/update_schedule'); ?>">
                                  Update Personal Schedule
                                  <a href="#" class="button round">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                  </a>

                                  
                              </a>
                          </div>
                          <div class="schedule_link">
                              <a href="<?php echo base_url('index.php/doctor/add_appointment'); ?>">
                                  Add New Appointment
                                  <button class="button"></button>
                              </a>
                          </div>
                          
                        
                      </div>
                  </div>
                </div>      
                

                <div class="tabs-panel" id="cal_set">

                   
                   <form name="calset_form" id="calset_form" <?php echo form_open('calendar/calset_form'); ?>
                       
                       <div class="large-6 columns">
                             <label>Monday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_0" value="<?php echo $calendar['0']['start_time']; ?>">

                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_0" value="<?php echo $calendar['0']['end_time']; ?>">

                             </div>
                       
                             <label>Tuesday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_1" value="<?php echo $calendar['1']['start_time']; ?>">

                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_1" value="<?php echo $calendar['1']['end_time']; ?>">

                             </div>
                       
                             <label>Wensday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_2" value="<?php echo $calendar['2']['start_time']; ?>">

                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_2" value="<?php echo $calendar['2']['end_time']; ?>">

                             </div>
                       
                             <label>Thursday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_3" value="<?php echo $calendar['3']['start_time']; ?>">


                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_3" value="<?php echo $calendar['3']['end_time']; ?>">

                             </div>
                       
                             <label>Friday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_4" value="<?php echo $calendar['4']['start_time']; ?>">
                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_4" value="<?php echo $calendar['4']['end_time']; ?>">

                             </div>
                       
                             <label>Saturday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_5" value="<?php echo $calendar['5']['start_time']; ?>">

                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_5" value="<?php echo $calendar['5']['end_time']; ?>">

                             </div>
                       
                             <label>Sunday </label>
                             <div class="large-6 columns">
                                  <label>Start Time</label>
                                  <input type="time" name="start_time_6" value="<?php echo $calendar['6']['start_time']; ?>">

                             </div>
                             <div class="large-6 columns">
                                  <label>End Time</label>
                                  <input type="time" name="end_time_6" value="<?php echo $calendar['6']['end_time']; ?>">

                             </div>
                        </div>
                        
                        <div class="large-3 columns">
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_0" value="<?php echo $calendar['0']['sess_duration']; ?>">
                          </div>
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_1" value="<?php echo $calendar['1']['sess_duration']; ?>">
                          </div> 
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_2" value="<?php echo $calendar['2']['sess_duration']; ?>">
                          </div> 
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_3" value="<?php echo $calendar['3']['sess_duration']; ?>">
                          </div> 
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_4" value="<?php echo $calendar['4']['sess_duration']; ?>">
                          </div> 
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_5" value="<?php echo $calendar['5']['sess_duration']; ?>">
                          </div>
                          <div class="session_div">  
                            <label> Duration Per Session </label>
                            <input type="text" name="sess_duration_6" value="<?php echo $calendar['6']['sess_duration']; ?>">
                          </div>   
                        </div>
                       
                       <div class="large-3 columns">
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_0" value="<?php echo $calendar['0']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_1" value="<?php echo $calendar['1']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_2" value="<?php echo $calendar['2']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_3" value="<?php echo $calendar['3']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_4" value="<?php echo $calendar['4']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_5" value="<?php echo $calendar['5']['off_day']; ?>">
                          </div>
                          <div class="availability_div">  
                            <label>Off Day </label>
                            <input type="checkbox" name="off_day_6" value="<?php echo $calendar['6']['off_day']; ?>">
                          </div>
                       </div>
                       <div class="large-2 columns pull-right">
                          <button type="submit" class="button button_info"> SUBMIT </button>
                        </div>
                     </form>
               
                </div>
          </div>
      </div>
   </div>