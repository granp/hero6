@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active"><?php echo ucfirst($page);?></li>
                </ul>
                <!-- END BREADCRUMB -->  
@endsection 