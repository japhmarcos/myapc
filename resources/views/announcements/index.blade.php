@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Announcements</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">                        
                <div class="page-title">                            
                    <h1><a href="/announcements">ANNOUNCEMENTS</a></h1>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a class="active" style="cursor: default;">Announcements</a></li>
                    </ul>               
                </div>
            </div>
        </div>                

        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                
                <div class="row">                        
                    <div class="col-md-12">                        
                        <div class="row">
                            @foreach($announcements as $announcement)
                            <div class="col-md-6">                                
                                <div class="blog-item this-animate" data-animate="fadeInUp">
                                    <div class="blog-media">
                                        @if($announcement->image1 != null)
                                            <a href="/announcements/details/{{$announcement->id}}"><img src="/images/announcements/{{$announcement->image1}}" class="img-responsive"/></a>
                                        @endif                                        
                                    </div>
                                    <div class="blog-data">
                                        <h5><a href="/announcements/details/{{$announcement->id}}">{{$announcement->title}}</a></h5>
                                        <span class="blog-date">{{ date("F d, Y l", strtotime($announcement->created_at)) }} / {{$announcement->comments->count()}} Comments / by {{$announcement->author}}</span>
                                        {!! html_entity_decode($announcement->read_more) !!}                                        
                                    </div>
                                </div>                                
                            </div>
                            @endforeach
                        </div>
                        
                        <ul class="pagination pagination-sm pull-right">
                            {!! html_entity_decode($announcements->render()) !!}
                        </ul>                        
                    </div>

                    <!-- <div class="col-md-3">                          
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('announcements.sidebar')                            
                        </div>                              
                    </div> -->
                </div>                        
            </div>
        </div>
    </div>
@stop