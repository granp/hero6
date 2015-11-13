@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active"><?php echo ucfirst($page);?></li>
                </ul>
                <!-- END BREADCRUMB -->  
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">    

                    <div class="row">                    
                                           
                        <div class="col-md-4">

                            <!-- CONTACTS WITH CONTROLS -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">City Terminals</h3>         
                                </div>
                                <div class="panel-body list-group list-group-contacts">  
                                    <?php
                                        foreach ($cities as $val) {
                                            echo '<a href="#" class="list-group-item"> ';
                                        ?>
                                            <!-- <img src="{{ asset('assets/images/users/user3.jpg') }}" class="pull-left" alt="Nadia Ali"/> -->
                                        <?php
                                            echo '<span class="contacts-title">'.ucfirst($val->city).'</span>';
                                            echo '<p>'.ucfirst($val->address).'</p>';
                                            echo '<div class="list-group-controls">';
                                            echo '<button class="btn btn-primary btn-rounded"><span class="fa fa-pencil"></span></button>';
                                            echo '</div>';
                                            echo '</a>';
                                        }
                                    ?>        
                                </div>
                            </div>
                            <!-- END CONTACTS WITH CONTROLS -->
                        </div>

                        <div class="col-md-8">
                            <div class="row">                        
                                <div class="col-md-12">
                                    <!-- START VERTICAL FORM SAMPLE -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h3>Add City Terminal</h3>
                                            {!! Form::open(array('route' => 'addcity', 'class'=>'form-horizontal')) !!}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label>City Name</label>
                                                    <input type="text" name="cityname" class="form-control" placeholder="City name"/>
                                                    <p><div class="error_msg">{{ $errors->first('cityname') }}</div></p>
                                                </div> 
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Complete address"/>
                                                    <p><div class="error_msg">{{ $errors->first('address') }}</div></p>
                                                </div>     
                                        </div>
                                        <div class="panel-footer">                                  
                                            <button class="btn btn-primary pull-right">Submit</button>
                                        </div>
                                        </form>
                                    </div>                        
                                    <!-- END VERTICAL FORM SAMPLE -->
                                </div>
                            </div> 
                        </div> 
                                            
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER --> 

        <!-- success -->
        <div class="message-box message-box-success animated fadeIn" id="message-box-success">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> Success</div>
                    <div class="mb-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna. Maecenas scelerisque molestie justo, ut tempor nunc.</p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close" id="close-modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end success -->
             
@endsection