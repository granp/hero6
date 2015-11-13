<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>GPeredo - Bus Booking Template</title>          
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <!-- <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/> -->
        {!! Html::style( asset('css/theme-default.css'), array('id' => 'theme')) !!}
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>

                    <!-- <form action="index.html" class="form-horizontal" method="post"> -->
                     <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="text" class="form-control" placeholder="Username"/> -->
                            {{ $errors->first('email') }}
                            {!! Form::text('email', Input::old('email'), array('placeholder' => 'E-Mail','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="password" class="form-control" placeholder="Password"/> -->   
                            {{ $errors->first('password') }}
                            {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="/password/email" class="btn btn-link btn-block">Forgot your password?</a>
                            <div class="checkbox">
                            <label>
                               <input type="checkbox" name="remember"> Remember Me
                            </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 GPeredo
                    </div>
                    <!-- <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div> -->
                </div>
            </div>
            
        </div>
        
    </body>
</html>






