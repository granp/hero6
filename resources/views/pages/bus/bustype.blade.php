@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                    <li><a href="{{ URL::route('buses') }}">Bus</a></li>
                </ul>
                <!-- END BREADCRUMB -->                                             
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-4">
                            <!-- DEFAULT LIST GROUP -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Bus Seat Map</h3>                    
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        
                                        <div class="col-md-12 col-xs-12">                                            
                                            <!-- <div id="table_seatmap" class="Table_seatMap">
                                            </div> -->
                                            
                                            <table id='example-table'>
                                            <thead>
                                              <tr class="prototype">
                                                <th>col1</th>
                                                <th>col2</th>
                                                <th>col3</th>
                                                <th>col4</th>
                                              </tr>
                                            </thead>
                                              <tbody id="table_seatmap" class="dynamic_table Table_seatMap"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT LIST GROUP -->

                        </div>
                        <div class="col-md-8">
                             @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- CONTACTS WITH CONTROLS -->
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    <h3 class="panel-title">Bus Config</h3>
                                    <ul class="panel-controls">                                                                        
                                        <li><div class="btn-group">
                                            </div></li>
                                    </ul>                                   
                                </div> -->

                                <div class="panel-body">   
                                <!-- <form class="form-horizontal" role="form">  -->
                                {!! Form::open(array('route' => 'addBusType', 'class'=>'form-horizontal')) !!}
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Bus Type Name:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <!-- <input type="text" class="form-control"/> -->
                                                {!! Form::text('bustypename', Input::old('bustypename'), array('class'=>'form-control')) !!}
                                            </div>                                            
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Bus Map Template:</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="col-md-12">                                                                                                                                                                                                               
                                                <div class="btn-group btn-group-lg">
                                                    <button class="btn btn-default">Map 1</button>                                               
                                                    <button class="btn btn-default">Map 2</button>                                        
                                                </div>      
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Seat Map Row.</label>
                                        <div class="col-md-9 col-xs-12">
                                          <div class="col-md-12">
                                            <input type="text" id="range_47" name="busSeatRow" value="4" />
                                                <div id="table_seatmap" class="Table_seatMap"></div>
                                                
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Departure Date:</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="col-md-12 input-group">
                                              {!! Form::text('deptre_date', Input::old('deptre_date'), array('class'=>'form-control', 'id'=>'departure_date','value'=>date("m/d/Y"), 'placeholder'=>date("m/d/Y"))) !!}
                                              <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Departure Time:</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="col-md-12 input-group bootstrap-timepicker">
                                                    <!-- <input type="text" class="form-control timepicker" name="deptre_time"/> -->
                                                    {!! Form::text('deptre_time', Input::old('deptre_time'), array('class'=>'form-control timepicker',)) !!}
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Arrival Date:</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="col-md-12 input-group">
                                              <!-- <input type="text" class="form-control" value="<?php //echo date("m/d/Y")?>" id="dp-4" name="arrival_date"/> -->
                                              {!! Form::text('arrival_date', Input::old('arrival_date'), array('class'=>'form-control', 'value'=>date("m/d/Y"), 'id'=>'arrival-date', 'placeholder'=>date("m/d/Y"))) !!}
                                              <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Arrival Time:</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="col-md-12 input-group bootstrap-timepicker">
                                                    <input type="text" class="form-control timepicker" name="arrival_time" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Seat Price:</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="col-md-12 input-group">
                                                    <input type="number" class="form-control" placeholder="Price of each Seat" id="seatPrice" name="seatPrice"/>
                                                    <!-- {!! Form::text('seatPrice', Input::old('seatPrice'), array('class'=>'form-control', 'type'=>'number', 'id'=>'seatPrice', 'placeholder'=>'Price seat')) !!} -->
                                                    <span class="input-group-addon">.00</span>
                                            </div>
                                            <div class="col-md-4">                                    
                                             <!-- <label class="check"><input type="checkbox" class="icheckbox" id="allSeatPrice" /> All Seats</label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" id="div-select-route">
                                        <label class="col-md-3 col-xs-12 control-label">Route:</label>
                                        <div class="col-md-9 col-xs-12">   
                                          <div class="col-md-12 input-group">                                                                                       
                                            <select name="routetotravel" class="form-control select" data-live-search="true" id="route_name_lists">
                                                <?php
                                                        //default
                                                        echo "<option value='default' disabled selected>";
                                                        echo "Select Route";
                                                        echo "</option>";
                                                    foreach ($get_routes as $routes) {
                                                        echo "<option value=".$routes->id.">";
                                                        echo ucfirst($routes->name)." | ".ucfirst($routes->origin)." going to ".ucfirst($routes->destination)."</p>";
                                                        echo "</option>";
                                                    }
                                                ?>
                                            </select>
                                          </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="seatMapJson" value="" id="seatMapValue">
                                </div>
                                <div class="panel-footer">                                
                                    <button class="btn btn-primary pull-right" id="convert-table">Submit</button>
                                </div>
                                </form>
                            </div>
                            <!-- END CONTACTS WITH CONTROLS -->
                        </div>                                    
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->    
<style type="text/css">
    .prototype {
        display: none;
    }
    .Table_seatMap
    {
        display: table;
    }
    .Row-Default
    {
        display: table-row;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        /*border: solid;*/
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
    #drvSeat {
      position: relative;
      width: 20px;
      height: 25px;
      margin: 5px 0;
      background: #CD5C5C;
      border-radius: 50% / 10%;
      color: white;
      text-align: center;
      text-indent: .1em;
    }
    #drvSeat:before {
      content: '';
      position: absolute;
      top: 10%;
      bottom: 10%;
      right: -5%;
      left: -5%;
      background: inherit;
      border-radius: 5% / 50%;
    }

    .cxSeat {
      position: relative;
      width: 20px;
      height: 25px;
      margin: 5px 0;
      background: #6A5ACD;
      border-radius: 50% / 10%;
      color: white;
      text-align: center;
      text-indent: .1em;
    }
    .cxSeat:before {
      content: '';
      position: absolute;
      top: 10%;
      bottom: 10%;
      right: -5%;
      left: -5%;
      background: inherit;
      border-radius: 5% / 50%;
    }
</style>
          
@endsection                