@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Attendees</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/events/{{$id}}">Back</a></li>
        <li class="active">Attendees</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Attendees</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">  
            <div class="col-md-12">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @foreach($attendees as $attendee)
                                <a class="gallery-item" data-gallery>
                                    <div class="image">                              
                                        <img src="{{ asset('/images/users/' . $attendee->attend->image) }}"/>         
                                    </div>
                                    <div class="meta">
                                        <strong>{{$attendee->attend->first_name}} {{$attendee->attend->mi}} {{$attendee->attend->last_name}}</strong>
                                        <span>{{$attendee->attend->course}}</span>
                                        <span>{{$attendee->attend->contact}}</span>
                                        <span>{{$attendee->attend->email}}</span>
                                    </div>                                
                                </a>  
                            @endforeach                         
                        </div>  
                        <ul class="pagination pagination-sm pull-right push-down-20">
                            {!! html_entity_decode($attendees->render()) !!}
                        </ul>                          
                    </div>                    
                </div>
            </div>                 
        </div>                                                
    </div>
@stop