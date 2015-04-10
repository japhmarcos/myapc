@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Organizations</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
                <!-- page title -->
                <div class="page-title">                            
                    <h1><a href="/organizations">ORGANIZATIONS</a></h1>
                    <!-- breadcrumbs
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="/organizations">Organizations</a></li>
                        <li class="active">{{$org->title}}</li>
                    </ul>-->             
                </div>
            </div>
        </div>                
                       
        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                <div class="row">                        
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="blog-content">
                            @include('flash::message')
                            <img src="/images/org/{{$org->image1}}" class="img-responsive"/>
                            <h2>{{$org->title}}</h2>
                            <span class="blog-date">{{ date("F d, Y l", strtotime($org->created_at)) }}</span>
                            {!! html_entity_decode($org->body) !!}                            
                        </div>
                    </div>
                    @if(!Auth::guest() && Auth::user()->id != $registration)
                        <div class="col-md-1">
                            <form class="form-horizontal" role="form" method="POST" action="/organizations/details/{{$org->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="post_id" value="{{$org->id}}" />
                                <button type="submit" class="btn btn-primary pull-right">Register</button>
                            </form>
                        </div>
                    @endif
                </div>                        
            </div>
        </div>
    </div>
@stop          