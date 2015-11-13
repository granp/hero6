@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

				<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>              
                    <li class="active"><?php echo ucfirst($page);?></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                               
                                <div class="panel-body">
                                    <p><?php echo $message;?></p>
                                </div>
                                <div class="panel-body">                                                                        
                                    

                                </div>
                            </div>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->   

@endsection