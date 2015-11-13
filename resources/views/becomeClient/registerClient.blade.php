<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- CSS INCLUDE -->        
        {!! Html::style( asset('css/theme-default.css'), array('id' => 'theme')) !!}
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100% !important; 
                display: table;
                font-weight: 100;
                
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                font-family: 'Lato';
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">


                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">                        
                        <div class="col-md-12">
                            <!-- START VERTICAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Client Registration</h3>
                                    {!! Form::open(array('route' => 'registerClient', 'class'=>'form-horizontal')) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="name" class="form-control" placeholder="Full name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" id="password"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Re-Password</label>
                                            <input type="password" class="form-control" name="repassword" placeholder="Re-Password"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Full name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Oraganization</label>
                                            <input type="text" name="organization" class="form-control" placeholder="Organization or Company name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Office Address</label>
                                            <input type="text" name="com_address" class="form-control" placeholder="Company Address"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Office Phone Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Telephone number"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="email" class="form-control" placeholder="Valid email address"/>
                                        </div>                  
                                </div>
                                <div class="panel-footer">                                  
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                                </form>
                            </div>                        
                            <!-- END VERTICAL FORM SAMPLE -->
                        </div>
                    </div>     
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
        </div>

        <!-- START PLUGINS -->
        {!! HTML::script('js/plugins/jquery/jquery.min.js'); !!}
        {!! HTML::script('js/plugins/jquery/jquery-ui.min.js'); !!}
        {!! HTML::script('js/plugins/bootstrap/bootstrap.min.js'); !!}     
        <!-- END PLUGINS -->


        <!-- START TEMPLATE -->
        <!-- {!! HTML::script('js/settings.js'); !!}  -->

        {!! HTML::script('js/plugins.js'); !!} 
        {!! HTML::script('js/actions.js'); !!} 

        {!! HTML::script('js/demo_larga.js'); !!} 
        
        <!-- END TEMPLATE -->   
    </body>


</html>
