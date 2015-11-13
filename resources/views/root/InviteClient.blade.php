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
                                    <h3 class="panel-title">Clients</h3>         
                                </div>
                                <div class="panel-body list-group list-group-contacts">  
                                    <?php
                                        foreach ($organization as $val) {
                                        ?>
                                            <!-- <a href="{{ URL::route('registerClient',['id' => $val->id]) }}" class="list-group-item"> -->
                                        <a href="#" class="list-group-item">
                                            <!-- <img src="{{ asset('assets/images/users/user3.jpg') }}" class="pull-left" alt="Nadia Ali"/> -->
                                        <?php
                                            echo '<span class="contacts-title">'.ucfirst($val->fullname).'</span>';
                                            echo '<p>'.ucfirst($val->org_name).'</p>';
                                            echo '<div class="list-group-controls">';

                                                if($val->status_conf_code == 0){
                                                    ?>
                                                    <form action="{{ URL::route('sendVerCode',['id' => $val->id]) }}" class="form-horizontal">
                                                    <?php
                                                    echo '<button class="btn btn-primary btn-rounded"><span class="fa fa-envelope-o"></span></button>';
                                                    echo '</form>';
                                                }else{
                                                    echo '<button class="btn btn-primary btn-rounded"><span class="fa fa-check"></span></button>';
                                                }
                                            
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
                                            <h3>Invite Client</h3>
                                            {!! Form::open(array('route' => 'inviteClient', 'class'=>'form-horizontal')) !!}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Full name"/>
                                                    <p><div class="error_msg">{{ $errors->first('name') }}</div></p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Oraganization</label>
                                                    <input type="text" name="organization" class="form-control" placeholder="Organization or Company name"/>
                                                    <p><div class="error_msg">{{ $errors->first('organization') }}</div></p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Valid email address"/>
                                                    <p><div class="error_msg">{{ $errors->first('email') }}</div></p>
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
@endsection