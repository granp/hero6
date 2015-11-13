<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        {!! Html::style( asset('css/theme-default.css'), array('id' => 'theme')) !!}
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        <div class="error-container">
            <div class="error-code">401</div>
            <div class="error-text">INSUFFICIENT ROLE</div>
            <div class="error-subtext">You are not authorized to access this Page.</div>            
        </div>                 
    </body>
</html>
