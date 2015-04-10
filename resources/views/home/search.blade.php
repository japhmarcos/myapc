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
                        @if(Auth::guest())                      
                            <h2>{{$news->count() + $orgs->count() + $events->count()}} results for "<b>{{$input}}</b>"</h2>
                        @else
                            <h2>{{$news->count() + $announcements->count() + $orgs->count() + $events->count()}} results for "<b>{{$input}}</b>"</h2>
                        @endif

                        <!-- NEWS -->
                        @if($news->count() != 0)
                            <div class="col-md-12">    
                                <div class="row">
                                    <h3><a href="/news">News</a></h3>
                                    @foreach($news as $new)
                                        <div class="col-md-4">                                
                                            <div class="blog-item this-animate" data-animate="fadeInUp">
                                                <div class="blog-media">
                                                    @if($new->image1 != null)
                                                        <a href="/news/details/{{$new->id}}"><img src="/images/news/{{$new->image1}}" class="img-responsive"/></a>
                                                    @endif
                                                </div>
                                                <div class="blog-data">
                                                    <h5><a href="/news/details/{{$new->id}}">{{$new->title}}</a></h5>
                                                    <span class="blog-date">{{ date("F d, Y", strtotime($new->created_at)) }} / {{$new->comments->count()}} Comments / By {{$new->author}}</span>
                                                    {!! html_entity_decode($new->read_more) !!}                                        
                                                </div>
                                            </div>                                
                                        </div>
                                    @endforeach
                                </div>
                                <hr />
                            </div>
                        @endif

                        <!-- ANNOUNCEMENTS -->
                        @if($announcements->count() != 0 && !Auth::guest())
                            <div class="col-md-12">    
                                <div class="row">
                                    <h3><a href="/announcements">Announcements</a></h3>
                                    @foreach($announcements as $announcement)
                                        <div class="col-md-4">                                
                                            <div class="blog-item this-animate" data-animate="fadeInUp">
                                                <div class="blog-media">
                                                    @if($announcement->image1 != null)
                                                        <a href="/announcements/details/{{$announcement->id}}"><img src="/images/announcements/{{$announcement->image1}}" class="img-responsive"/></a>
                                                    @endif
                                                </div>
                                                <div class="blog-data">
                                                    <h5><a href="/announcements/details/{{$announcement->id}}">{{$announcement->title}}</a></h5>
                                                    <span class="blog-date">{{ date("F d, Y", strtotime($announcement->created_at)) }} / {{$announcement->comments->count()}} Comments / By {{$announcement->author}}</span>
                                                    {!! html_entity_decode($announcement->read_more) !!}                                        
                                                </div>
                                            </div>                                
                                        </div>
                                    @endforeach
                                </div>
                                <hr />
                            </div>
                        @endif

                        <!-- ORGS -->
                        @if($orgs->count())
                            <div class="col-md-12">    
                                <div class="row">
                                    <h3><a href="/organizations">Organizations</a></h3>
                                    @foreach($orgs as $org)
                                        <div class="col-md-4">                                
                                            <div class="blog-item this-animate" data-animate="fadeInUp">
                                                <div class="blog-media">
                                                    @if($org->image1 != null)
                                                        <a href="/organizations/details/{{$org->id}}"><img src="/images/org/{{$org->image1}}" class="img-responsive"/></a>
                                                    @endif
                                                </div>
                                                <div class="blog-data">
                                                    <h5><a href="/organizations/details/{{$org->id}}">{{$org->title}}</a></h5>
                                                    {!! html_entity_decode($org->read_more) !!}                                        
                                                </div>
                                            </div>                                
                                        </div>
                                    @endforeach
                                </div>
                                <hr />
                            </div>
                        @endif

                        <!-- EVENTS -->
                        @if($events->count() != 0)
                            <div class="col-md-12">    
                                <div class="row">
                                    <h3><a href="/events">Events</a></h3>
                                    @foreach($events as $event)
                                        <div class="col-md-4">                                
                                            <div class="blog-item this-animate" data-animate="fadeInUp">
                                                <div class="blog-media">
                                                    @if($event->image != null)
                                                        <a href="/events/details/{{$event->id}}"><img src="/images/events/{{$event->image}}" class="img-responsive"/></a>
                                                    @endif
                                                </div>
                                                <div class="blog-data">
                                                    <h5><a href="/events/details/{{$event->id}}">{{$event->title}}</a></h5>
                                                    <span class="blog-date">{{ date("F d, Y", strtotime($event->created_at)) }} / {{$event->comments->count()}} Comments</span>
                                                    {!! html_entity_decode($event->read_more) !!}                                        
                                                </div>
                                            </div>                                
                                        </div>
                                    @endforeach
                                </div>
                                <hr />
                            </div>
                        @endif
                    </div>
                </div>                        
            </div>
        </div>
    </div>
@stop