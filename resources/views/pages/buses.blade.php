@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                   <li class="active">Bus</li>
                </ul>
                <!-- END BREADCRUMB -->                                                                 
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- CONTACTS WITH CONTROLS -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Bus Trips</h3>
                                    <ul class="panel-controls">
                                        <!-- <li><a href="{{ URL::route('addbustype') }}"><span class="fa fa-plus"></span></a></li> -->
                                        <li><button type="button" class="btn btn-default" onclick="location.href='{{ URL::route('addbustype') }}';">Add</button></li>
                                    </ul>                                   
                                </div>

                                <div class="panel-body list-group list-group-contacts">    
                                <?php
                                        foreach ($get_buses as $buses) {
                                            echo '<a href="'.route('bustypeprofile', ['id' => $buses->id]).'" class="list-group-item">';
                                            echo '<span class="contacts-title">'.ucwords($buses->bustype_name).'</span>';
                                            // echo '<p>'.ucfirst($buses->loc_from).' to '.ucfirst($buses->loc_to).'</p>';
                                            echo '</a> ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- END CONTACTS WITH CONTROLS -->

                        </div>                                
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->    
@endsection                