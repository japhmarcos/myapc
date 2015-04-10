@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Events</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Events</a></li>
        <li class="active">Posted</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Events | Posted</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @include('flash::message')
            @foreach($eposted as $epost)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($epost->image != null)
                                <a href="/events/{{$epost->id}}"><img src="/images/events/{{$epost->image}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/events/{{$epost->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/events/{{$epost->id}}">{{$epost->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;{{ date("F d, Y", strtotime($epost->created_at)) }} | <span class="fa fa-user"></span> by {{$epost->author->first_name}}</div>
                            <div class="post-date"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp;{{ date("g:i A", strtotime($epost->time_start))}} to {{date("g:i A", strtotime($epost->time_end))}}</div>
                            <div class="post-date">&nbsp;<span class="fa fa-map-marker"></span><strong>&nbsp;&nbsp;&nbsp;{{ $epost->location}}</strong></div>  
                            <p>{!!html_entity_decode($epost->read_more)!!}</p>
                            <a href="/events/{{$epost->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <form class="form-horizontal" role="form" method="POST" action="/events/posted" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{$epost->id}}" />
                                <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($epost->created_at))->diffForHumans()}} 
                                &nbsp; <span class="fa fa-comment-o"></span> {{$epost->comments->count()}}
                                || &nbsp;&nbsp;
                                <a href="/news/update/{{$epost->id}}" class="info"><span class="fa fa-edit "></span></a>&nbsp;&nbsp;
                                <button class="blink"><span class="glyphicon glyphicon-remove-circle"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
        <ul class="pagination pagination-sm pull-right push-down-20">
            {!! html_entity_decode($eposted->render()) !!}
        </ul>                                                 
    </div>
@stop