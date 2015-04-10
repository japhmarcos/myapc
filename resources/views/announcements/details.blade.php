<!-- @extends('layouts.front') -->
@section('head')
    @parent
    <title>MyAPC | Announcements</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
                <!-- page title -->
                <div class="page-title">                            
                    <h1><a href="/announcements">ANNOUNCEMENTS</a></h1>               
                </div>
            </div>
        </div>                
                       
        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">

                <div class="row">                        
                    <div class="col-md-9">
                        <div class="blog-content">
                            @if($article->image1 != null)
                                <img src="/images/announcements/{{$article->image1}}" class="img-responsive"/>
                            @endif
                            <h2>{{$article->title}}</h2>
                            <span class="blog-date">{{ date("F d, Y l", strtotime($article->created_at)) }} / {{$count}} Comments / by {{$article->author}}</span>                                    
                            {!! html_entity_decode($article->body) !!}                            
                        </div>
                        
                        <div class="text-column">
                            <h3>Comments</h3>
                        </div>
                        <div class="block">                            
                            <ul class="media-list">
                                @foreach ($comments as $comment)
                                    <li class="media">
                                        <a class="pull-left">
                                            <img class="media-object img-text" src="/images/users/{{$comment->commenter->image}}" width="64">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="media-heading">{{$comment->commenter->first_name}} {{$comment->commenter->last_name}}</h6>
                                            <p>{{$comment->body}}</p>
                                            @if(!Auth::guest() && ($comment->commenter->id == Auth::user()->id || Auth::user()->user_type_id == '1' || $article->writer->id == Auth::user()->id))
                                                <form class="form-horizontal" role="form" method="POST" action="/announcements/details/{{$article->id}}/del" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$comment->id}}" />
                                                    <p class="text-muted">
                                                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}} &nbsp;&nbsp;&nbsp;
                                                        <button class="blink"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </p>
                                                </form>
                                            @endif
                                        </div>                                            
                                    </li>
                                @endforeach
                            </ul>                                                                
                        </div>
                        <div class="text-column">
                            <h3>New Comment</h3>
                            @if(Auth::guest())
                                <div class="text-column-info">You must be <a href="/auth/login">logged in</a> to post a comment.</div>
                            @else
                                <form role="form" action="/announcements/details/{{$article->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Comment <span class="text-hightlight">*</span></label>
                                        <textarea class="form-control" rows="5" name="body"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-lg pull-right">Submit</button>
                                </form>
                            @endif         
                        </div>
                    </div>
                    <div class="col-md-3">                                
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('announcements.sidebar')
                        </div>                                 
                    </div>
                </div>                        
            </div>
        </div>
    </div>
@stop         