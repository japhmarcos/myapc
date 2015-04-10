@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Announcements</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Announcements</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Announcements</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- ANNOUNCEMENT WIDGET -->
            @include('flash::message')
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
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($announcement->created_at)) }} at {{ date("g:ha",strtotime($announcement->created_at)) }} | <span class="fa fa-user"></span> by {{$announcement->author}}</div>
                            <p>{!!html_entity_decode($announcement->read_more)!!}</p>
                            <a href="/announcements/{{$announcement->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer">
                            <form class="form-horizontal" role="form" method="POST" action="/announcements/list" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{$announcement->id}}" />
                                <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($announcement->created_at))->diffForHumans()}} 
                                &nbsp; <span class="fa fa-comment-o"></span> {{$announcement->comments->count()}}
                                || &nbsp;&nbsp;
                                <a href="/announcements/update/{{$announcement->id}}" class="info"><span class="fa fa-edit "></span></a>&nbsp;&nbsp;
                                <button class="blink"><span class="glyphicon glyphicon-remove-circle"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
        <ul class="pagination pagination-sm pull-right push-down-20">
            {!! html_entity_decode($announcements->render()) !!}
        </ul>                                                
    </div>
@stop