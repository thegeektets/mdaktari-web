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

   <div class="personal_info">

                  <div class="main">
                  <div class="mini-cal">
                      <div class="calender">
                          <div class="column_left_grid calender">
                                      <div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">September 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-08-30"><div class="day-contents">30</div></td><td class="day past adjacent-month last-month calendar-day-2015-08-31"><div class="day-contents">31</div></td><td class="day past calendar-day-2015-09-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-09-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2015-09-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-09-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2015-09-05"><div class="day-contents">5</div></td></tr><tr><td class="day past calendar-day-2015-09-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-09-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-09-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2015-09-09"><div class="day-contents">9</div></td><td class="day past event calendar-day-2015-09-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2015-09-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2015-09-12"><div class="day-contents">12</div></td></tr><tr><td class="day past event calendar-day-2015-09-13"><div class="day-contents">13</div></td><td class="day past event calendar-day-2015-09-14"><div class="day-contents">14</div></td><td class="day past calendar-day-2015-09-15"><div class="day-contents">15</div></td><td class="day past calendar-day-2015-09-16"><div class="day-contents">16</div></td><td class="day past calendar-day-2015-09-17"><div class="day-contents">17</div></td><td class="day past calendar-day-2015-09-18"><div class="day-contents">18</div></td><td class="day past calendar-day-2015-09-19"><div class="day-contents">19</div></td></tr><tr><td class="day past calendar-day-2015-09-20"><div class="day-contents">20</div></td><td class="day past event calendar-day-2015-09-21"><div class="day-contents">21</div></td><td class="day past event calendar-day-2015-09-22"><div class="day-contents">22</div></td><td class="day past event calendar-day-2015-09-23"><div class="day-contents">23</div></td><td class="day past calendar-day-2015-09-24"><div class="day-contents">24</div></td><td class="day past calendar-day-2015-09-25"><div class="day-contents">25</div></td><td class="day today calendar-day-2015-09-26"><div class="day-contents">26</div></td></tr><tr><td class="day calendar-day-2015-09-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-09-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-09-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-09-30"><div class="day-contents">30</div></td><td class="day adjacent-month next-month calendar-day-2015-10-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-10-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-10-03"><div class="day-contents">3</div></td></tr></tbody></table></div></div>
                            </div>
                          <div class="cal-pos a">
                            <ul>
                              <li></li>
                              <li></li>
                            </ul>
                          </div>
                          <div class="cal-pos">
                            <ul>
                              <li></li>
                              <li></li>
                            </ul>
                          </div>
                      </div>
                    </div>
                  <div class="slide">
                  <div id="dd1" class="wrapper-dropdown-3" tabindex="1"><span><img src="assets/cal/images/nav.png" alt=""/></span>
                              <ul class="dropdown">
                              
                                  <li><a href="#">View Profile </a></li>
                                  <li><a href="#">Lists</a></li>
                                  <li><a href="#">Help</a></li>
                                  <li><a href="#">Activity log</a></li>
                                  <li><a href="#">Report a problem</a></li>
                                  <li><a href="#">Log Out</a></li>
                              </ul>
                                <script type="text/javascript">
                                    function DropDown(el) {
                                      this.dd = el;
                                      this.initEvents();
                                    }
                                    DropDown.prototype = {
                                      initEvents : function() {
                                        var obj = this;
                              
                                        obj.dd.on('click', function(event){
                                          $(this).toggleClass('active');
                                          event.stopPropagation();
                                        }); 
                                      }
                                    }
                                    $(function() {
                              
                                      var dd = new DropDown( $('#dd1') );
                              
                                      $(document).click(function() {
                                        // all dropdowns
                                        $('.wrapper-dropdown-3').removeClass('active');
                                      });
                              
                                    });
                            </script>
                          </div>
                          
                      <div class="callbacks_container">
                      <ul class="rslides callbacks callbacks1" id="slider4">
                        <li>
                          <div class="banner-info">
                             <h3>Fri Day</h3>
                              <p>April 3rd</p>
                            <img src="assets/cal/images/1.jpg" alt=""/>
                          </div>
                        </li>
                        <li>
                          <div class="banner-info">
                             <h3>Sat Day</h3>
                            <p>April 3rd</p>
                            <img src="assets/cal/images/2.jpg" alt=""/>
                          </div>
                        </li>
                        <li>
                          <div class="banner-info">
                             <h3>Sun Day</h3>
                              <p>April 3rd</p>
                            <img src="assets/cal/mages/1.jpg" alt=""/>
                          </div>
                        </li>
                      </ul>
                      </div>
                      <!--banner-Slider-->
                      <script src="assets/cal/js/responsiveslides.min.js"></script>
                       <script>
                      // You can also use "$(window).load(function() {"
                      $(function () {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                      auto: true,
                      pager: true,
                      nav:false,
                      speed: 500,
                      namespace: "callbacks",
                      before: function () {
                        $('.events').append("<li>before event fired.</li>");
                      },
                      after: function () {
                        $('.events').append("<li>after event fired.</li>");
                      }
                        });

                      });
                        </script>
                          <div class="clear"></div>
                      <ul class=" side-icons">
                        <li><a class="fb" href="#"></a></li>
                        <li><a class="twitt" href="#"></a></li>
                        <li><a class="goog" href="#"></a></li>
                       </ul>

                    </div>
                     
              <div class="clear"></div>
            </div>
              <div class="clear"></div>
              <!--End Calender-->
   </div>
   