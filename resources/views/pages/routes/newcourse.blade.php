@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
            <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                    <li><a href="{{ URL::route('routes') }}">Route</a></li>
                    <li class="active"><?php echo ucfirst($page);?></li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- <form class="form-horizontal"> -->
                            {!! Form::open(array('route' => 'addroute', 'class'=>'form-horizontal')) !!}   
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add</strong> New Route</h3>
                                    <ul class="panel-controls">
                                        <li><a href="{{ URL::route('routes') }}"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <!-- <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet. Vivamus volutpat erat ac vulputate laoreet. Phasellus eu ipsum massa.</p> -->
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Route Name:</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <!-- <input type="text" class="form-control"/> -->
                                                {!! Form::text('route_name', Input::old('route_name'), array('class'=>'form-control')) !!}
                                            </div>                                            
                                            <span class="help-block">This can be any name you wish.</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Origin:</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="origin" class="form-control select" data-live-search="true">
                                                <?php
                                                    foreach ($cities as $city_from) {
                                                        echo "<option value=".$city_from->id.">";
                                                        echo ucfirst($city_from->city);
                                                        echo "</option>";
                                                    }
                                                ?>

                                            </select>
                                            <!-- <span class="help-block">error message here</span> -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Destination:</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="destination" class="form-control select" data-live-search="true">
                                                <?php
                                                    foreach ($cities as $city_from) {
                                                        echo "<option value=".$city_from->id.">";
                                                        echo ucfirst($city_from->city);
                                                        echo "</option>";
                                                    }
                                                ?>

                                            </select>
                                            <!-- <span class="help-block">error message here</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">                                
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->    
@endsection  