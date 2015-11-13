@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
				<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Forms Stuff</a></li>
                    <li><a href="#">Form Layout</a></li>
                    <li class="active">Two Column</li>
                </ul>
                <!-- END BREADCRUMB -->

                <?php
                	foreach ($bustypeprofile_data as $bpdata) {
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
                ?>

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(array('route' => array('updateBusProfile', '5'), 'class'=>'form-horizontal')) !!}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Two Column</strong> Layout</h3>
                                    <ul class="panel-controls">
                                    <label class="switch">
                                    	<?php
                                    		if($status == 0){
                                    			echo "<input type='checkbox' value='0'/>";
                                    		}else{
                                    			echo "<input type='checkbox' checked value='1'/>";
                                    		}
                                    	?>
                                        	<span></span>
                                        </label>
                                    </ul>
                                </div>

                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                           <!--  <div class="form-group">
                                                <label class="col-md-4 control-label">Bus Type Name</label>
                                                <div class="col-md-8">   
                                                    <div class="input-group">
	                                                    <input type="text" class="form-control" name="btnameprofile-textb" id="btnameprofile-textb-id" disabled value='<?php //echo $bustype_name; ?>' placeholder="<?php //echo $bustype_name; ?>"/>
	                                                    <span class="input-group-btn bustypeprofile-edit" id="btname" data-placement='top' data-target='#bustypename-modal' data-toggle='modal' value='<?php //echo $bustype_name;?>'>	                                                        
                                                            <button class="btn btn-default bustypename-edit" type="button" data-toggle="tooltip" title="edit"><span class="fa fa-pencil" ></span></button>
                                                        </span>
	                                                </div>                                        
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Seat Count</label>
                                                <div class="col-md-8">    
	                                                <div class="form-group">
			                                            <input type="text" class="form-control" disabled value="<?php //echo ($seatrow_count*3) + 1; ?>" />
			                                        </div>                                
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Departure Date and Time</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
	                                                    <input type="text" class="form-control" name="dtdateprofile-textb" id="dtdateprofile-textb-id" disabled value placeholder="<?php //echo $deptre_datetime; ?>"/>
	                                                    <span class="input-group-btn bustypeprofile-edit" id='dtdate' data-placement='top' data-target='#dtdate-modal' data-toggle='modal' value='<?php //echo $deptre_datetime;?>'>
	                                                        <button class="btn btn-default dep_tdate-edit" type="button" data-toggle="tooltip" title="edit"><span class="fa fa-pencil"></span></button>
	                                                    </span>
	                                                </div>                                            
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Arrival Date and Time</label>
                                                <div class="col-md-8"> 
                                                	<div class="input-group">
	                                                    <input type="text" class="form-control" name="artdateprofile-textb" id="artdateprofile-textb-id" disabled placeholder="<?php //echo $arr_datetime; ?>"/>
	                                                    <span class="input-group-btn bustypeprofile-edit" id='atdate' data-placement='top' data-target='#dtdate-modal' data-toggle='modal' value='<?php //echo $arr_datetime;?>'>
	                                                        <button class="btn btn-default ar_tdate-edit" type="button" data-toggle="tooltip" title="edit"><span class="fa fa-pencil"></span></button>
	                                                    </span>
	                                                </div>                                             
                                                                                             
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Seat Price</label>
                                                <div class="col-md-8">  
                                                   	<div class="input-group">
	                                                    <input type="text" class="form-control" name="spriceprofile-textb" id="spriceprofile-textb-id" disabled placeholder="<?php //echo $seatPrice.".00"; ?>"/>
	                                                    <span class="input-group-btn bustypeprofile-edit" id='sprice' data-placement='top' data-target='#sprice-modal' data-toggle='modal' value='<?php //echo $seatPrice;?>'>
	                                                        <button class="btn btn-default seatprice-edit" type="button" data-toggle="tooltip" title="edit"><span class="fa fa-pencil pin-asd"></span></button>
	                                                    </span>
	                                                </div>                                       
                                                                                               
                                                </div>
                                            </div> -->
                                            
                                           
                                           <div class="form-group">
                                                <label class="col-md-4 control-label">Bus Type Name</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        {!! Form::text('bustypename', Input::old('bustypename'), array('class'=>'form-control', 'placeholder'=> $bustype_name )) !!}
                                                    </div>                                                                              
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Seat Count</label>
                                                <div class="col-md-8">    
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" disabled value="<?php echo ($seatrow_count*3) + 1; ?>" />
                                                    </div>                                
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Departure Date</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
                                                        {!! Form::text('deptre_date', Input::old('deptre_date'), array('class'=>'form-control', 'id'=>'departure_date','value'=>date("m/d/Y"), 'placeholder'=>date("m/d/Y"))) !!}
                                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>                                                                              
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Departure Time</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
                                                        {!! Form::text('deptre_time', Input::old('deptre_time'), array('class'=>'form-control timepicker',)) !!}
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    </div>                                                                              
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Arrival Date</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
                                                        {!! Form::text('arrival_date', Input::old('arrival_date'), array('class'=>'form-control', 'value'=>date("m/d/Y"), 'id'=>'arrival-date', 'placeholder'=>date("m/d/Y"))) !!}
                                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>                                                                              
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Arrival Time</label>
                                                <div class="col-md-8">  
                                                    <div class="input-group">
                                                        <input type="text" class="form-control timepicker" name="arrival_time" />
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    </div>                                                                              
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Seat Count</label>
                                                <div class="col-md-8">    
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" disabled value="<?php echo $seatPrice.".00"; ?>" />
                                                    </div>                                
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-md-6">

                                            <div class="col-md-6">
                                                
                                                <label class="control-label">Bus Seat Map</label>

                                                <table>
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
                                                    $jdata = json_decode(json_encode($jdata),true);
                                                    
                                                    foreach ($jdata as $key => $value) {
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
                                                                echo "<td class='SeatMapCell' id='".$seatname."'>";
                                                                    echo "<div class='Cell dropdown-toggle' id='cell".substr($seatname, 1)."' title='".$seatname."' data-toggle='tooltip'>";
                                                                        echo "<div class='cxSeat seatmap_child' id='cxSeat".substr($seatname, 1)."' data-placement='top' data-target='#modal_no_head' data-toggle='modal'>";
                                                                            echo $value['col'.$i]['seatname'];
                                                                        echo "</div>";
                                                                    echo "</div>";
                                                            }
                                                            echo "</td>";
                                                        }
                                                        echo "</tr>";
                                                    }
                                                ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">


                                            </div>
                                            
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


        <div class="modal" id="modal_no_head" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Seat Name</label>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="col-md-12 input-group">
                                                <div id='tbox-busSeat'></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Seat Price</label>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="col-md-12 input-group">
                                                  <div id='tbox-price'></div>
                                                  <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label"></label>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="col-md-12 input-group">
                                                  <input type="checkbox" class="icheckbox"/> Available to Mobile?
                                            </div>
                                            <div class="col-md-12 input-group">
                                                  <input type="checkbox" class="icheckbox"/> Set as Comfort Room?
                                            </div>
                                        </div>
                                    </div>

                                    
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="saveBusSeatName" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

<div class="modal" id="bustype-modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label bustypeprofile-label" id="modal-label-bustype"></label>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="col-md-12 input-group span-sprice" id='tbox-busType'>
                                                
                                            </div>
                                        </div>
                                    </div>
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <!-- <div id='btn-busType-modal'></div> -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- start bus type name modal -->
        <div class="modal" id="bustypename-modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Bus Type Name</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                              {!! Form::text('bustypename-modal', Input::old('bustypename-modal'), array('class'=>'form-control', 'id'=>'btnameprofile', 'placeholder'=>'')) !!}
                                            </div>                                            
                                        </div>
                                    </div>
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <div class='btn-busType-modal'></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end bus type name modal -->

        <!-- start departure time and date modal -->
        <div class="modal" id="dtdate-modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Departure Date</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                <!-- {!! Form::text('bustypename-modal', Input::old('bustypename-modal'), array('class'=>'form-control', 'id'=>'btnameprofile', 'placeholder'=>'')) !!} -->
                                                {!! Form::text('dtdate-modal', Input::old('dtdate-modal'), array('class'=>'form-control', 'id'=>'dtdateprofile','value'=>'', 'placeholder'=>date("m/d/Y"))) !!}
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Time</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                <!-- {!! Form::text('bustypename-modal', Input::old('bustypename-modal'), array('class'=>'form-control', 'id'=>'btnameprofile', 'placeholder'=>'')) !!} -->
                                                {!! Form::text('dtime-modal', Input::old('dtime-modal'), array('class'=>'form-control timepicker','id'=>'dtimeprofile', 'placeholder'=>'')) !!}
                                            </div>                                            
                                        </div>
                                    </div>
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <div class='btn-busType-modal'></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end departure time and date modal -->

        <!-- start departure time and date modal -->
        <div class="modal" id="atdate-modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Arrival Date</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                <!-- {!! Form::text('bustypename-modal', Input::old('bustypename-modal'), array('class'=>'form-control', 'id'=>'btnameprofile', 'placeholder'=>'')) !!} -->
                                                {!! Form::text('atdate-modal', Input::old('atdate-modal'), array('class'=>'form-control', 'id'=>'atdateprofile','value'=>'', 'placeholder'=>date("m/d/Y"))) !!}
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Time</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                <!-- {!! Form::text('bustypename-modal', Input::old('bustypename-modal'), array('class'=>'form-control', 'id'=>'btnameprofile', 'placeholder'=>'')) !!} -->
                                                {!! Form::text('atime-modal', Input::old('atime-modal'), array('class'=>'form-control timepicker','id'=>'atimeprofile', 'placeholder'=>'')) !!}
                                            </div>                                            
                                        </div>
                                    </div>
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <div class='btn-busType-modal'></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end departure time and date modal -->

         <!-- start departure time and date modal -->
        <div class="modal" id="sprice-modal" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">                    
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-12 control-label">Seat Price</label>
                                        <div class="col-md-12 col-xs-12">                                            
                                            <div class="col-md-12 input-group">
                                                {!! Form::text('sprice-modal', Input::old('sprice-modal'), array('class'=>'form-control', 'id'=>'spriceprofile','value'=>'', 'placeholder'=>'')) !!}
                                            </div>                                            
                                        </div>
                                    </div>
                        <div id='cbox-mobile'></div>
                    </div>
                    <div class="modal-footer">
                        <div class='btn-busType-modal'></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end departure time and date modal -->

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
</style>
@endsection  