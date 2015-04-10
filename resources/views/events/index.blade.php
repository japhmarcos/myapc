@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Events</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">                        
                <div class="page-title">                            
                    <h1><a href="/events">EVENTS</a></h1>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a class="active" style="cursor: default;">Events</a></li>
                    </ul>               
                </div>
            </div>
        </div>                

        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                
                <div class="row">                        
                    <div class="col-md-9">                        
                        <div class="row">
                            @foreach($events as $event)
                            <div class="col-md-6">                                
                                <div class="blog-item this-animate" data-animate="fadeInUp">
                                    <div class="blog-media">
                                        @if($event->image != null)
                                            <a href="/events/details/{{$event->id}}"><img src="/images/events/{{$event->image}}" class="img-responsive"/></a>
                                        @endif
                                        
                                    </div>
                                    <div class="blog-data">
                                        <h5><a href="/events/details/{{$event->id}}">{{$event->title}}</a></h5> <br>
                            <span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;{{ date("F d, Y", strtotime($event->date_start)) }} |<br>
                            <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp;{{ date("g:i A", strtotime($event->time_start))}} to {{date("g:i A", strtotime($event->time_end))}}<br>
                            <span class="fa fa-map-marker"></span><strong>&nbsp;&nbsp;&nbsp;{{ $event->location}}</strong><br>


                                        <p><a href="/events/details/{{$event->id}}"><span class="label label-primary">Read the details.</span></a></p>
                                        <hr>
                                        <span class="blog-date"><a href="/events/details/{{$event->id}}">{{ date("F d, Y l", strtotime($event->created_at)) }}</a> / <span class="fa fa-comment"></span> {{$event->comments->count()}} Comments / By {{$event->author->first_name}} / <span class="fa fa-users"></span> {{$event->attendee->count()}} Attendees</span>
                                        <hr>
                                    </div>
                                </div>                                
                            </div>

                            @endforeach
                            <ul class="pagination pagination-sm pull-right">
                                {!! html_entity_decode($events->render()) !!}
                            </ul>                        
                        </div>                    
                    </div>    
                    <div class="col-md-3">                          
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('events.sidebar')                    
                        </div>                            
                    </div>                 
                </div>
            </div>
        </div>
    </div>
@stop