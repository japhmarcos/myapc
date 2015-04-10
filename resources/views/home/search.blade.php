@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Search Results</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
            </div>
        </div>                

        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                
                <div class="row">                        
                    <div class="col-md-12">                        
                        <h2>{{$posts->count() + $events->count()}} results for "<b>{{$input}}</b>"</h2>
                        <div class="row">
                            @foreach($posts as $post)
                                @if($post->module_id == 1)
                                    <div class="col-md-4">                                
                                        <div class="blog-item this-animate" data-animate="fadeInUp">
                                            <div class="blog-media">
                                                @if($post->image1 != null)
                                                    <a href="/news/details/{{$post->id}}"><img src="/images/news/{{$post->image1}}" class="img-responsive"/></a>
                                                @endif
                                            </div>
                                            <div class="blog-data">
                                                <h5><a href="/news/details/{{$post->id}}">{{$post->title}}</a></h5>
                                                <span class="blog-date">{{ date("F d, Y", strtotime($post->created_at)) }} / {{$post->comments->count()}} Comments / By {{$post->author}}</span>
                                                {!! html_entity_decode($post->read_more) !!}                                        
                                            </div>
                                        </div>                                
                                    </div>
                                @elseif($post->module_id == 2 && !Auth::guest())
                                    <div class="col-md-4">                                
                                        <div class="blog-item this-animate" data-animate="fadeInUp">
                                            <div class="blog-media">
                                                @if($post->image1 != null)
                                                    <a href="/announcements/details/{{$post->id}}"><img src="/images/announcements/{{$post->image1}}" class="img-responsive"/></a>
                                                @endif
                                            </div>
                                            <div class="blog-data">
                                                <h5><a href="/announcements/details/{{$post->id}}">{{$post->title}}</a></h5>
                                                <span class="blog-date">{{ date("F d, Y", strtotime($post->created_at)) }} / {{$post->comments->count()}} Comments / By {{$post->author}}</span>
                                                {!! html_entity_decode($post->read_more) !!}                                        
                                            </div>
                                        </div>                                
                                    </div>
                                @elseif($post->module_id == 3)
                                    <div class="col-md-4">                                
                                        <div class="blog-item this-animate" data-animate="fadeInUp">
                                            <div class="blog-media">
                                                @if($post->image1 != null)
                                                    <a href="/organizations/details/{{$post->id}}"><img src="/images/org/{{$post->image1}}" class="img-responsive"/></a>
                                                @endif
                                            </div>
                                            <div class="blog-data">
                                                <h5><a href="/organizations/details/{{$post->id}}">{{$post->title}}</a></h5>
                                                {!! html_entity_decode($post->read_more) !!}                                        
                                            </div>
                                        </div>                                
                                    </div>
                                @endif
                            @endforeach
                            @foreach($events as $events)
                                <div class="col-md-4">                                
                                    <div class="blog-item this-animate" data-animate="fadeInUp">
                                        <div class="blog-media">
                                            @if($events->image != null)
                                                <a href="/events/details/{{$events->id}}"><img src="/images/events/{{$events->image}}" class="img-responsive"/></a>
                                            @endif
                                        </div>
                                        <div class="blog-data">
                                            <h5><a href="/events/details/{{$events->id}}">{{$events->title}}</a></h5>
                                            <span class="blog-date">{{ date("F d, Y", strtotime($events->created_at)) }} / {{$events->comments->count()}} Comments</span>
                                            {!! html_entity_decode($events->read_more) !!}                                        
                                        </div>
                                    </div>                                
                                </div>
                            @endforeach
                        </div>                      
                    </div>
                </div>                        
            </div>
        </div>
    </div>
@stop