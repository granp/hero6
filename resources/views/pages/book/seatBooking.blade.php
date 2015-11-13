@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                    <li class="active">Book your Seat</li>
                </ul>
                <!-- END BREADCRUMB -->                                                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                    foreach ($bustypeprofile_data as $bpdata) { 
                                        $bustype_id = $bpdata->id;
                                        $bustype_name = ucfirst($bpdata->bustype_name);
                                        $seatrow_count = $bpdata->seat_row;
                                        $deptre_datetime = date('F j, Y g:i a', strtotime($bpdata->departure_datetime));
                                        $arr_datetime = date('F j, Y g:i a', strtotime($bpdata->arrival_datetime));
                                        $seatMapJson = strval($bpdata->seatmap_json);//json convert to string
                                        $seatPrice = $bpdata->seat_price;
                                        $route = $bpdata->route_id;
                                        $status = $bpdata->status;

                                        $jdata = json_decode($bpdata->seatmap_json);
                                        
                                    }
                                    
                                    $seatmap_Reserved = json_decode($seatmap_Reserved);
                                    $seatmap_Reserved = json_decode(json_encode($seatmap_Reserved),true);
                                ?>
                            <!-- START WIZARD WITH VALIDATION -->
                            <div class="panel panel-default" >
                                <div class="panel-body">
                                    <h3>Select Seat(s)</h3>                                
                                    <!-- <form action="javascript:alert('Validated!');" role="form" class="form-horizontal" id="wizard-validation"> -->
                                    <!-- {!! Form::open(array('route' => 'insertBookSeat', 'class'=>'form-horizontal', 'id'=>'wizard-validation', 'role'=>'form')) !!} -->
                                    {!! Form::open(array('route' => array('insertBookSeat', $bustype_id), 'id'=>'wizard-validation', 'role'=>'form', 'class'=>'form-horizontal')) !!}
                                    <div class="wizard show-submit wizard-validation">
                                        <ul>
                                            <li>
                                                <a href="#step-7">
                                                    <span class="stepNumber">1</span>
                                                    <span class="stepDesc">Reserve<br /><small>Seat</small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-8">
                                                    <span class="stepNumber">2</span>
                                                    <span class="stepDesc">Passenger<br /><small>Personal data</small></span>
                                                </a>
                                            </li>                                   
                                        </ul>

                                        <div id="step-7">   

                                            <div class="col-md-3">
                                                <label class="control-label">Bus Seat Map</label>
                                                    <table class="noselect">
                                                        <thead>
                                                            <tr class="prototype">
                                                                <th>col1</th>
                                                                <th>col2</th>
                                                                <th>col3</th>
                                                                <th>col4</th>
                                                              </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        
                                                        foreach ($seatmap_Reserved as $key => $value) {
                                                            echo "<tr>";
                                                            for ($i=1; $i <= count($value); $i++) { 
                                                                $seatname = $value['col'.$i]['seatname'];

                                                                if($seatname == 'driverSeat'){
                                                                    echo "<td class='SeatMapCell' id='driverSeat'>";
                                                                        echo "<div class='Cell dropdown-toggle' id='driverSeat' title='Driver Seat' data-toggle='tooltip'>";
                                                                            echo "<div class='seatmap_child' id='drvSeat' data-placement='top' title='Driver’s Seat'>";
                                                                                echo $value['col'.$i]['seatname'];
                                                                            echo "</div>";
                                                                        echo "</div>";
                                                                } else if($seatname == "") {
                                                                    echo "<td class='SeatMapCell' id='".$seatname."'>";
                                                                        echo "<div class='Cell dropdown-toggle' id='' title='".$seatname."' data-toggle='tooltip'>";
                                                                        echo "</div>";
                                                                } else{
                                                                    if($value['col'.$i]['seatAvailable'] == 1){
                                                                         echo "<td class='SeatMapCell' id='".$seatname."'>";
                                                                        echo "<div class='Cell dropdown-toggle' id='cell".substr($seatname, 1)."' title='NA' data-toggle='tooltip'>";
                                                                            echo "<div class='takenSeat toggleSeatMap seatmap_child' id='cxSeat".substr($seatname, 1)."' data-placement='top' data-target='#modal_no_head' data-toggle='modal'>";
                                                                                echo $value['col'.$i]['seatname'];
                                                                            echo "</div>";
                                                                        echo "</div>";
                                                                    }else{
                                                                         echo "<td class='SeatMapCell' id='".$seatname."'>";
                                                                        echo "<div class='Cell dropdown-toggle' id='cell".substr($seatname, 1)."' title='".$seatname."' data-toggle='tooltip'>";
                                                                            echo "<div class='cxSeat toggleSeatMap seatmap_child' id='cxSeat".substr($seatname, 1)."' data-placement='top' data-target='#modal_no_head' data-toggle='modal'>";
                                                                                echo $value['col'.$i]['seatname'];
                                                                            echo "</div>";
                                                                        echo "</div>";
                                                                    }
                                                                    
                                                                   
                                                                }
                                                                echo "</td>";
                                                            }
                                                            echo "</tr>";
                                                        }

                                                       ?>

                                                        </tbody>
                                                    </table>   
                                                    <div id="seatprice" value="<?php echo $seatPrice;?>"> </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Seat(s)</label>
                                                        <div class="col-md-6">  
                                                            <div class="input-group">
                                                                <div class="showBookedSeatsName" id=""></div>
                                                            </div>                                                                              
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Total</label>
                                                        <div class="col-md-6">  
                                                            <div class="input-group">
                                                                <div class="showBookedSeatsTotal" id=""></div>
                                                            </div>                                                                              
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>

                                        <div id="step-8">
                                            <!-- generate text fields from js -->
                                                 <div class="bookingCustomerDetails"></div>  

                                        </div>  
                                                                                                         
                                    </div>
                                        <input type="hidden" class="form-control" name="bustypeid" value="<?php echo $bustype_id?>"/>
                                        <!-- <input type="hidden" id="seatsdata" name="seatPrice2" value="<?php //echo $seatPrice;?>">  -->
                                        <input type="hidden" id="seatsdata" name="seatdatajs"> 
                                    </form>
                                </div>
                            </div>                        
                            <!-- END WIZARD WITH VALIDATION -->

                        </div>

                    </div>
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->   

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
    .bootstrap-timepicker-widget {
        z-index: 1050 !important;
    }
    .cxSeat.resrveSeat { background: #00cc00; }

    .takenSeat {
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
    .takenSeat:before {
      content: '';
      position: absolute;
      top: 10%;
      bottom: 10%;
      right: -5%;
      left: -5%;
      background: inherit;
      border-radius: 5% / 50%;
    }
    .takenSeat{
        background: red;
    }

    .noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
</style>

@endsection  