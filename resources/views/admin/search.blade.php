@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Search</title>
@stop

@section('content')
	<!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Search</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>{{$posts->count() + $events->count()}} results for "<b>{{$keyword}}</b>"</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            @foreach($posts as $post)
            	@if($post->module_id == 1)
	                <div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($post->image1 != null)
	                                <a href="/news/{{$post->id}}"><img src="/images/news/{{$post->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/news/{{$post->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/news/{{$post->id}}">{{$post->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($post->created_at)) }} / by {{$post->author}}</div>
	                            <p>{!!html_entity_decode($post->read_more)!!}</p>
	                            <a href="/news/{{$post->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endif
                @if($post->module_id == 2)
	                <div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($post->image1 != null)
	                                <a href="/announcements/{{$post->id}}"><img src="/images/announcements/{{$post->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/announcements/{{$post->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/announcements/{{$post->id}}">{{$post->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($post->created_at)) }} / by {{$post->author}}</div>
	                            <p>{!!html_entity_decode($post->read_more)!!}</p>
	                            <a href="/announcements/{{$post->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endif
                @if($post->module_id == 3)
	                <div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($post->image1 != null)
	                                <a href="/org/{{$post->id}}"><img src="/images/org/{{$post->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/org/{{$post->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/org/{{$post->id}}">{{$post->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($post->created_at)) }} / by {{$post->org->first_name}}</div>
	                            <p>{!!html_entity_decode($post->read_more)!!}</p>
	                            <a href="/org/{{$post->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endif
            @endforeach 
            @foreach($events as $event)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($event->image != null)
                                <a href="/events/{{$event->id}}"><img src="/images/events/{{$event->image}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/events/{{$event->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/events/{{$event->id}}">{{$event->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($event->created_at)) }} / by {{$event->author->first_name}}</div>
                            <p>{!!html_entity_decode($event->read_more)!!}</p>
                            <a href="/events/{{$event->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
                            <span class="fa fa-comment-o"></span> 
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>                                                
    </div>
@stop