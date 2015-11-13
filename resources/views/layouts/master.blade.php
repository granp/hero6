<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Genki - @yield('title')</title>      

        @include('includes.head')
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                @include('includes.sidebar')
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                @include('includes.header')                
                
                @yield('content')              
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        @include('includes.footer')
    </body>
</html>






