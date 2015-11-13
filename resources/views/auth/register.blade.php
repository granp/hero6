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
        
        <div class="registration-container">            
            <div class="registration-box animated fadeInDown">
                <div class="registration-logo"></div>
                <div class="registration-body">
                    <div class="registration-title"><strong>Registration</strong>, use form below</div>
                    <div class="registration-subtitle"></div>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                             @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                             @endforeach

                        </ul>
                        </div>

                        @endif

                    <form class="form-horizontal" role="form" method="POST" action="/auth/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h4>Personal info</h4>
                    <!-- <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="First Name"/>
                        </div>
                    </div> -->
                        <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="text" class="form-control" placeholder="Full Name"/> -->
                            {{ $errors->first('name') }}
                            {!! Form::text('name', Input::old('name'), array('placeholder' => 'Full Name', 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="text" class="form-control" placeholder="E-mail"/> -->
                            {{ $errors->first('email') }}
                            {!! Form::text('email', Input::old('email'), array('placeholder' => 'E-mail', 'class'=>'form-control')) !!}
                        </div>
                    </div>
                    
                    <h4>Authentication</h4>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="text" class="form-control" placeholder="Login"/> -->
                            {{ $errors->first('username') }}
                            {!! Form::text('username', Input::old('username'), array('placeholder' => 'Username', 'class'=>'form-control')) !!}
                        </div>
                    </div>                        
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="password" class="form-control" placeholder="Password"/> -->
                            {{ $errors->first('password') }}
                            {!! Form::password('password', array('placeholder' => 'Password', 'class'=>'form-control')) !!}
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <input type="password" class="form-control" placeholder="Re-Password"/> -->
                            {{ $errors->first('password_confirmation') }}
                            {!! Form::password('password_confirmation', array('placeholder' => 'Re-Password', 'class'=>'form-control')) !!}
                        </div>
                    </div>             
                    
                    <div class="form-group push-up-30">
                        <div class="col-md-6">
                            <!-- <a href="#" class="btn btn-link btn-block">Already have account?</a> -->
                            {!! link_to_route('login', $title = 'Already have account?', $parameters = array(), $attributes = array('class' => 'btn btn-link btn-block')) !!}
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger btn-block">Sign Up</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
                <div class="registration-footer">
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






