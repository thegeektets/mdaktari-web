    <!-- start: FOOTER -->
    <div class="footer clearfix">
        <div class="footer-inner">
             &copy; (c) <?php echo date('Y')?> MDAKTARI
        </div>
        <div class="footer-items">
            <span class="go-top"><i class="clip-chevron-up"></i></span>
        </div>
    </div>
    <!-- end: FOOTER -->
    <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                    <h4 class="modal-title">Event Management</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                    Close
                </button>
                    <button type="button" class="btn btn-danger remove-event no-display">
                    <i class='fa fa-trash-o'></i> Delete Event
                </button>
                    <button type='submit' class='btn btn-success save-event'>
                    <i class='fa fa-check'></i> Save
                </button>
                </div>
            </div>
        </div>
    </div>

    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
        <script src="<?php echo base_url('/assets/admin/components/respond/dest/respond.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/admin/components/Flot/excanvas.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/admin/components/jquery-1.x/dist/jquery.min.js')?>"></script>
        <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/jquery/dist/jquery.min.js')?>"></script>
    <!--<![endif]-->

    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/jquery-ui/jquery-ui.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/blockUI/jquery.blockUI.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/iCheck/icheck.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/jquery.cookie/jquery.cookie.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/components/sweetalert/dist/sweetalert.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/admin/js/min/main.min.js')?>"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="<?php echo base_url('/assets/admin/components/Flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/Flot/jquery.flot.resize.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/plugin/jquery.sparkline.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/moment/min/moment.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/components/fullcalendar/dist/fullcalendar.min.js')?>"></script>
    <script src="<?php echo base_url('/assets/admin/js/min/index.min.js')?>"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script>
        jQuery(document).ready(function() {
            Main.init();
            Index.init();
        });
    </script>

</body>

</html>