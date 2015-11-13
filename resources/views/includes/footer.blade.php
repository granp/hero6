<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <!-- <a href='{!! link_to_route('logout') !!}' class="btn btn-success btn-lg">Yes</a> -->
                            {!! link_to_route('logout', $title = 'Yes', $parameters = array(), $attributes = array('class' => 'btn btn-success btn-lg')) !!}
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        {!! HTML::script('js/plugins/jquery/jquery.min.js'); !!}
        {!! HTML::script('js/plugins/jquery/jquery-ui.min.js'); !!}
        {!! HTML::script('js/plugins/bootstrap/bootstrap.min.js'); !!}     
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        {!! HTML::script('js/plugins/icheck/icheck.min.js'); !!}
        {!! HTML::script('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); !!}
        <!-- {!! HTML::script('js/plugins/scrolltotop/scrolltopcontrol.js'); !!} -->

        {!! HTML::script('js/plugins/bootstrap/bootstrap-datepicker.js'); !!}
        {!! HTML::script('js/plugins/bootstrap/bootstrap-timepicker.min.js'); !!}    
        
        {!! HTML::script('js/plugins/morris/raphael-min.js'); !!}
        {!! HTML::script('js/plugins/bootstrap/bootstrap-select.js'); !!}
        {!! HTML::script('js/plugins/morris/morris.min.js'); !!}
        {!! HTML::script('js/plugins/rickshaw/d3.v3.js'); !!}
        {!! HTML::script('js/plugins/rickshaw/rickshaw.min.js'); !!}    
        {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); !!} 
        {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); !!}
        {!! HTML::script('js/plugins/bootstrap/bootstrap-datepicker.js'); !!} 
        {!! HTML::script('js/plugins/owl/owl.carousel.min.js'); !!}    

        {!! HTML::script('js/plugins/noty/jquery.noty.js'); !!}   
        {!! HTML::script('js/plugins/noty/layouts/topCenter.js'); !!}    
        {!! HTML::script('js/plugins/noty/layouts/topLeft.js'); !!}       
        {!! HTML::script('js/plugins/noty/layouts/topRight.js'); !!}    
        {!! HTML::script('js/plugins/noty/themes/default.js'); !!}            
        
        {!! HTML::script('js/plugins/moment.min.js'); !!}    
        {!! HTML::script('js/plugins/daterangepicker/daterangepicker.js'); !!}

        {!! HTML::script('js/plugins/ion/ion.rangeSlider.min.js'); !!} 

        {!! HTML::script('js/plugins/smartwizard/jquery.smartWizard-2.0.min.js'); !!} 
        {!! HTML::script('js/plugins/jquery-validation/jquery.validate.js'); !!} 
        <!-- END THIS PAGE PLUGINS-->     

        {!! HTML::script('js/jquery.tabletojson.min.js'); !!}    

        <!-- START TEMPLATE -->
        <!-- {!! HTML::script('js/settings.js'); !!}  -->

        {!! HTML::script('js/plugins.js'); !!} 
        {!! HTML::script('js/actions.js'); !!} 

        {!! HTML::script('js/demo_larga.js'); !!} 
        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         

    <!-- START SCRIPTS -->

        <!-- START THIS PAGE PLUGINS-->        
        <!-- // <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script> -->
        {!! HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places'); !!}
        {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js'); !!}
        {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-us-aea-en.js'); !!}
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        {!! HTML::script('js/demo_maps.js'); !!}
        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->        
