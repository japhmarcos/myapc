@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | News</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">                        
                <div class="page-title">                            
                    <h1><a href="/news">NEWS</a></h1>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a class="active mouse">News</a></li>
                    </ul>               
                </div>
            </div>
        </div>                

        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                
                <div class="row">                        
                    <div class="col-md-12">                        
                        <div class="row">
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
                                        <p>{{ $new->read_more }}</p>                                     
                                    </div>
                                </div>                                
                            </div>
                            @endforeach
                        </div>


                        <ul class="pagination pagination-sm pull-right">
                            {!! html_entity_decode($news->render()) !!}
                        </ul>                        
                    </div>

                    <!-- <div class="col-md-3">                          
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('layouts.sidebar')                            
                        </div>                            
                    </div> -->
                </div>                        
            </div>
        </div>
    </div>
@stop