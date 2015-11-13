@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                    <li><a href="{{ URL::route('route') }}">Routes</a></li>
                </ul>
                <!-- END BREADCRUMB --> 

<?php
	$getInvoiceNo = $chckoutDataJson["invoice_no"];
	$getInvoiceDate = $chckoutDataJson["invoiceDate"];
	$origin = $chckoutDataJson["origin"];
	$destination = $chckoutDataJson["destination"];
	$totalFare = $chckoutDataJson["totalFare"];
	$totalPayment = $chckoutDataJson["totalPayment"];
?>

<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">                            
                                    <h2>INVOICE <strong><?php echo "#".$getInvoiceNo; ?></strong></h2>
                                    <div class="push-down-10 pull-right">
                                        <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>                                        
                                    </div>
                                    <!-- INVOICE -->
                                    <div class="invoice">

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="invoice-address">
                                                    <h5>From</h5>
                                                    <h6>My Org Bus Corp</h6>
                                                    <p>45 StreetName St.</p>
                                                    <p>City, Country, 00000</p>
                                                    <p>Phone: +98(765) 432-10-98</p>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                                <!-- <div class="invoice-address">
                                                    <h5>To</h5>
                                                    <h6>Your Company Name</h6>
                                                    <p>Dmitry Ivaniuk</p>
                                                    <p>15 Nameofstreet St.</p>
                                                    <p>City, Country, 00000</p>
                                                    <p>Phone: +01(234) 567-89-01</p>
                                                </div>   -->                                      

                                            </div>
                                            <div class="col-md-4">

                                                <div class="invoice-address">
                                                    <h5>Invoice</h5>
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td width="200">Invoice Number:</td><td class="text-right"><?php echo "#".$getInvoiceNo;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Invoice Date:</td><td class="text-right"><?php echo  $getInvoiceDate?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Total:</strong></td><td class="text-right"><strong><?php echo "P".$totalPayment;?></strong></td>
                                                        </tr>
                                                    </table>

                                                </div>                                        

                                            </div>
                                        </div>
                                        
                                        <div class="table-invoice">
                                            <table class="table">
                                                <tr>
                                                    <th>Item Description</th>
                                                    <th class="text-center">Origin</th>
                                                     <th class="text-center">Destination</th>
                                                    <th class="text-center">Bus Fare</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Total</th>
                                                </tr>

                                                <?php
                                                	foreach ($chckoutDataJson['passenger'] as $key => $value) {
                                                		$fullname = $value['fname']." ".$value['lname'];
                                                		$referenceNo = $value['reference_number'];
                                                		$seatName = $value['seatname'];
                                                		$busFare = $value['busfare'];
                                                ?>
                                                	<tr>
                                                    <td>
                                                        <strong>Passenger Name</strong>
                                                        <p><?php echo $fullname;?></p>
                                                    
                                                        <strong>Reference Number</strong>
                                                        <p><?php echo $referenceNo;?></p>

                                                        <strong>Seat</strong>
                                                        <p><?php echo $seatName;?></p>
                                                    </td>
                                                    <td class="text-center"><?php echo $origin;?></td>
                                                    <td class="text-center"><?php echo $destination;?></td>
                                                    <td class="text-center"><?php echo "P".$busFare;?></td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center"><?php echo "P".$busFare;?></td>
                                                </tr>
                                                <?php
                                                	}
                                                ?>
                                                
                                               
                                              
                                            </table>
                                        </div>
                                        {!! Form::open(array('route' => 'paymentcheckout', 'class'=>'form-horizontal')) !!}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Payment Methods</h4>
                                                <!-- <div class="paymant-table">
                                                    <a href="#" class="active">
                                                        <img src="{{ asset('img/cards/paypal.png') }}"/> PayPal
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </a>
                                                    <a href="#">
                                                        <img src="{{ asset('img/cards/visa.png') }}"/> Visa
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </a>
                                                    <a href="#">
                                                        <img src="{{ asset('img/cards/mastercard.png') }}"/> Master Card
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    </a>
                                                </div> -->
                                                
                                                <div class="form-group">
			                                        <div class="col-md-12">                                    
			                                            <label class="check">
			                                            <input type="radio" class="iradio" name="iradio" checked="checked" value="paypal"/> <img src="{{ asset('img/cards/paypal.png') }}"/> PayPal
			                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			                                            </label>
			                                        </div>
			                                        <div class="col-md-12">                                    
			                                            <label class="check">
			                                            <input type="radio" class="iradio" name="iradio" checked="" value="visa"/> <img src="{{ asset('img/cards/visa.png') }}"/> Visa
			                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			                                            </label>
			                                        </div>
			                                        <div class="col-md-12">                                    
			                                            <label class="check">
			                                            <input type="radio" class="iradio" name="iradio" checked="" value="mastercard"/> <img src="{{ asset('img/cards/mastercard.png') }}"/> Master Card
			                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			                                            </label>
			                                        </div>
			                                    </div>
			                                    
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Amount Due</h4>
                                                
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td width="200"><strong>Sub Total:</strong></td><td class="text-right"><?php echo "P".$totalFare;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tax (VAT 4.5%): :</strong></td><td class="text-right">P0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>System Fee (P50.00):</strong></td><td class="text-right"><?php echo "P".count($chckoutDataJson['passenger'])*50;?></td>
                                                    </tr>
                                                    <tr class="total">
                                                        <td>Total Amount:</td><td class="text-right"><?php echo "P".$totalPayment;?></td>
                                                    </tr>
                                                </table>                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pull-right push-down-20">
                                                    <button class="btn btn-success" onClick="gotoNode(\'' + result.name + '\')"><span class="fa fa-credit-card"></span> Process Payment</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- END INVOICE -->

                                </div>
                            </div>
                    
                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->    
@endsection  