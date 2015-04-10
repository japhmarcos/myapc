@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-News</title>
@stop

@section('content')
	<!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>News</a></li>
        @if($article->status == '1')
            <li><a href="/news/posted">Posted</a></li>
        @else
            <li><a href="/news/pending">Pending</a></li>
        @endif
        <li class="active">{{$article->title}}</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title"> 
        @if($article->status == '1')
            <h2>News | Posted</h2>
        @else
            <h2>News | Pending</h2>
        @endif                   
        <span class="pull-right">
            <a href="/news/update/{{$article->id}}"><button class="btn btn-info"><span class="fa fa-pencil-square-o"></span>Edit</button></a>
        </span>               
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-1"></div>                

            <div class="col-md-10">                            
                <div class="panel panel-default">
                    <div class="panel-body posts">
                                
                        <div class="post-item">
                            <div class="post-title">
                                {{$article->title}}
                            </div>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($article->created_at)) }} /
                                @if($article->status == '1')
                                    {{$count}} Comments /
                                @endif
                                by {{$article->author}}</div>
                            <div class="post-text"> 
                                <div class="text-center">
                                @if($article->image1 != null)
                                    <img src="/images/news/{{$article->image1}}" class="img-text img-responsive"/>
                                @endif
                                </div>
                                {!! html_entity_decode($article->body) !!}
                            </div>
                        </div>                                            
                           
                        <div id="comments">
                            @if($article->status == '1')
                                <h3 class="push-down-20">Comments</h3>
                                <ul class="media-list">
                                    @foreach($comments as $comment)
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-text" src="/images/users/{{$comment->commenter->image}}" width="64">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$comment->commenter->first_name}} {{$comment->commenter->last_name}}</h4>
                                            <p>{{$comment->body}}</p>
                                            <form class="form-horizontal" role="form" method="POST" action="/news/{{$article->id}}/del" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{$comment->id}}" />
                                                <p class="text-muted">
                                                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
                                                    <button class="blink"><span class="glyphicon glyphicon-trash"></span></button>
                                                </p>
                                            </form>                                                            
                                        </div>                                            
                                    </li>
                                    @endforeach
                                </ul> 
                            @else
                                <h3 class="push-down-20">Admin Notes</h3>
                                <p>{{$article->notes}}</p>
                                @if($article->status == '2' || $article->status == '3')
                                    <p><b>Status:</b>
                                    @if($article->status == '2')
                                        For revision
                                    @else
                                        Rejected
                                    @endif
                                 </p>
                                @endif
                            @endif 
                        </div>                                  
                    </div>
                </div>                
            </div> 
            <div class="col-md-1"></div>                
        </div>                                                
    </div>
@stop