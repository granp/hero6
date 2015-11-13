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
                                    <div class="title">Larga 1.0</div>
                                    <p><strong>BUS BOOKING APPLICATION</strong></p>
                                    </br>
                                    {!! Form::open(array('route' => 'becomeClient', 'class'=>'form-horizontal')) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Password"/>
                                            <p><div class="error_msg">{{ $errors->first('name') }}</div></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" name="email" class="form-control" placeholder="Valid email address"/>
                                            <p><div class="error_msg">{{ $errors->first('email') }}</div></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                                            <p><div class="error_msg">{{ $errors->first('name') }}</div></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Oraganization</label>
                                            <input type="text" name="organization" class="form-control" placeholder="Organization or Company name"/>
                                            <p><div class="error_msg">{{ $errors->first('organization') }}</div></p>
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
