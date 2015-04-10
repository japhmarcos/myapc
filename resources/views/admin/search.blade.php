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
        <h2>{{$news->count() + $announcements->count() + $orgs->count() + $events->count()}} results for "<b>{{$keyword}}</b>"</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
        	<!-- NEWS -->
        	<div class="col-md-12">
        		@if($news->count() != 0)
        			<h3>News</h3>
        		@endif
        		@foreach($news as $new)
	        		<div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($new->image1 != null)
	                                <a href="/news/{{$new->id}}"><img src="/images/news/{{$new->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/news/{{$new->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/news/{{$new->id}}">{{$new->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($new->created_at)) }} / by {{$new->author}}</div>
	                            <p>{!!html_entity_decode($new->read_more)!!}</p>
	                            <a href="/news/{{$new->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($new->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endforeach
        	</div>

        	<!-- ANNOUNCEMENTS -->
        	<div class="col-md-12">
        		@if($announcements->count() != 0)
        			<h3>Announcements</h3>
    			@endif
        		@foreach($announcements as $announcement)
	    			<div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($announcement->image1 != null)
	                                <a href="/announcements/{{$announcement->id}}"><img src="/images/announcements/{{$announcement->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/announcements/{{$announcement->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/announcements/{{$announcement->id}}">{{$announcement->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($announcement->created_at)) }} / by {{$announcement->author}}</div>
	                            <p>{!!html_entity_decode($announcement->read_more)!!}</p>
	                            <a href="/announcements/{{$announcement->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($announcement->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endforeach
        	</div>

        	<!-- ORGANIZATIONS -->
        	<div class="col-md-12">
        		@if($orgs->count() != 0)
	        		<h3>Organizations</h3>
        		@endif
        		@foreach($orgs as $org)
	        		<div class="col-md-4">
	                    <div class="panel panel-default">                            
	                        <div class="panel-body panel-body-image">
	                            @if($org->image1 != null)
	                                <a href="/org/{{$org->id}}"><img src="/images/org/{{$org->image1}}" class="img-responsive img-text"/></a>
	                            @endif
	                            <a href="/org/{{$org->id}}" class="panel-body-inform">
	                                <span class="glyphicon glyphicon-info-sign"></span>
	                            </a>
	                        </div>
	                        <div class="panel-body">
	                            <h3><a href="/org/{{$org->id}}">{{$org->title}}</a></h3>
	                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($org->created_at)) }} / by {{$org->org->first_name}}</div>
	                            <p>{!!html_entity_decode($org->read_more)!!}</p>
	                            <a href="/org/{{$org->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
	                        </div>
	                        <div class="panel-footer text-muted">
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($org->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                        </div>
	                    </div>
	                </div>
                @endforeach
        	</div>

        	<div class="col-md-12">
        		@if($events->count() != 0)
        			<h3>Events</h3>
    			@endif
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
	                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($event->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
	                            <span class="fa fa-comment-o"></span> 
	                        </div>
	                    </div>
	                </div>
	            @endforeach 
        	</div>            
        </div>                                                
    </div>
@stop