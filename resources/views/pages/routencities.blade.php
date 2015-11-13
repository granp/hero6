@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                    <li class="active">Routes</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-4">

                            <!-- DEFAULT LIST GROUP -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">City Destinations</h3>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group border-bottom">

                                    <?php
                                        foreach ($cities as $cities) {
                                            echo "<li class='list-group-item'>";
                                            echo ucfirst($cities->city);
                                            echo "</li>";
                                        }
                                    ?>
                                    </ul>                                
                                </div>
                            </div>
                            <!-- END DEFAULT LIST GROUP -->

                        </div>
                        <div class="col-md-8">

                            <!-- CONTACTS WITH CONTROLS -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Routes</h3>
                                    <ul class="panel-controls">     
                                        <li><a href="{{ URL::route('addroute') }}"><span class="fa fa-plus"></span></a></li>
                                        
                                    </ul>                                   
                                </div>
                                <div class="panel-body list-group list-group-contacts">                                
                                                                                                    
                                    <?php
                                        foreach ($get_routes as $route) {
                                            echo '<a href="#" class="list-group-item">';
                                            echo '<span class="contacts-title">'.ucwords($route->name).'</span>';
                                            echo '<p>'.ucfirst($route->origin).' to '.ucfirst($route->destination).'</p>';
                                            echo '<div class="list-group-controls">';
                                            echo '<button class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-pencil"></span></button>';
                                            echo '<span>&nbsp;</span>';
                                            echo '<button class="btn btn-primary btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onClick="notyConfirm();"><span class="fa fa-times"></span></button>';
                                            echo '</div>';
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

                <script type="text/javascript">                                            
                function notyConfirm(){
                    noty({
                        text: 'Do you want to continue?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $noty.close();
                                    noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    noty({text: 'You clicked "Cancel" button', layout: 'topRight', type: 'error'});
                                    }
                                }
                            ]
                    })                                                    
                }                                            
            </script>
@endsection                