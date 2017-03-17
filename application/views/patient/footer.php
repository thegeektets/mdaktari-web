</div>
  <footer class="footer_bar">
      <div class="row">
        <div class="large-3 columns">
            <div class="logo">
              <img src="<?php echo base_url('/assets/img/mdaktari_logo.png')?>">
            </div>
            <div class="footer_social_media">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              </div>
        </div>
        <div class="large-3 columns">
            <ul class="footer_menu">
              <li class="menu-text"><a href=""> My Dashboard </a></li>
              <li class="menu-text"><a href=""> My Account </a></li>
              <li class="menu-text"><a href=""> My Appointments </a></li>
              <li class="menu-text"><a href=""> My Reviews </a></li>
            </ul>
        </div>
        <div class="large-2 columns">
            <ul class="footer_menu">
              <li class="menu-text"><a href=""> About Us </a></li>
              <li class="menu-text"><a href=""> Contact Us </a></li>
            </ul>
        </div>
        <div class="large-3 columns">
             <ul class="footer_menu">
               <li class="menu-text"><a href=""> Privacy Policy </a></li>
               <li class="menu-text"><a href=""> Terms & Conditions </a></li>
             </ul> 
        </div>
        <div class="large-1 columns">
          
        </div>
      </div>
      <div class="copyright">
        <div class="row">
        (c) <?php echo date("Y"); ?> MDAKTARI
        </div>
      </div>
   </footer>
    
    <script src="<?php echo base_url('/assets/js/vendor/jquery.js')?>"></script>
    <script src="<?php echo base_url('/assets/js/vendor/what-input.js')?>"></script>
    <script src="<?php echo base_url('/assets/js/vendor/foundation.js')?>"></script>
    <script src="<?php echo base_url('/assets/js/app.js')?>"></script>
        <script type="text/javascript">
        $('.disabled').click(function(e) {
            e.preventDefault();
            //do other stuff when a click happens
        });
        function book_appointment(){
            $.ajax({
             type: 'post',
             url: '<?php echo base_url("/index.php/patient/post_new_appointment/")?>',
             data: $('#new_appointment').serialize(), 
             dataType: 'json',
             success: 
               function(data) {
                 console.log(data);

                 if(data == 0 ) {
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box warning");
                    $('.message').text("Failed to place Appointment Validation Error!"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout("$('.message').hide();" , 3000);
                    
                 } else if (data == 1){
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box success");
                    $('.message').text("Success Appointment Placed Successfully"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout("$('.message').hide();" , 3000);
                    // redirect to my appointment
                    window.location.replace("<?php echo base_url('index.php/patient/my_appointments'); ?>");
                 } else if (data == 2 ){
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box warning");
                    $('.message').text("Failed to place Appointment Runtime Error!"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout("$('.message').hide();" , 3000);
                 } else {
                    $('.message').hide();
                    $('.message').attr("class" ,"message alert-box warning");
                    $('.message').text("Failed to place Appointment Runtime Error!"); 
                    $('.message').append('<a href="#"" class="close" id="close">&times;</a>');
                    $('.message').show();
                    setTimeout("$('.message').hide();" , 3000);
                 }
               },
             fail: 
               function(data) {
                  console.log(data);
               }
            });
            return false;
        }
        $('.appointment_date').change(function (){

               var date = $(this).val();

               console.log('appointment date ' + date);

                $.ajax({
                 type: 'post',
                 url: '<?php echo base_url("/index.php/calendar/check_availability/".$doctor_profile[0]["user_id"]);?>/'+date,
                 data: date, 
                 dataType: 'json',
                 success: 
                   function(data) {
                     console.log(data);
                      if(data == 0){
                          $('.appointment_time').prop('disabled', true);
                          $('.appointment_message').hide();
                          $('.appointment_message').attr("class" ,"appointment_message alert-box warning");
                          $('.appointment_message').text("Doctor is UnAvailable on Selected Date!"); 
                          $('.appointment_message').append('<a href="#"" class="close" id="close">&times;</a>');
                          $('.appointment_message').show();
                          setTimeout("$('.appointment_message').hide();" , 3000);
                      
                      } else if (data == 3) {
                          $('.appointment_time').prop('disabled', true);
                          $('.appointment_message').hide();
                          $('.appointment_message').attr("class" ,"appointment_message alert-box warning");
                          $('.appointment_message').text("Date Selected is Invalid!"); 
                          $('.appointment_message').append('<a href="#"" class="close" id="close">&times;</a>');
                          $('.appointment_message').show();
                          setTimeout("$('.appointment_message').hide();" , 3000);
                      } else {
                          $('.appointment_time').empty();
                          $('.appointment_time').append('<option>Select the Appointment Time </option');
                          $('.appointment_time').prop('disabled', false);
                          var times  = data;
                          var time = [];
                          try {
                            var t = 0;
                            for(var i in times ){
                                time[t] = times[i];
                                t++;
                            } 
                            times = time;
                          } finally {
                              //do nothing here
                          }
                          console.log(times.length);
                          for(var t = 0 ; t < times.length; t++){
                            $('.appointment_time').append('<option value="'+times[t]+'">'+times[t]+'</option');
                          }
                      }
                      
                   },
                 fail: 
                   function(data) {
                      console.log(data);
                   }
                });
                         
                return false; 
        });
 
    </script>    
  </body>
</html>
