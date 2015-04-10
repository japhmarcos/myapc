@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Users</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Users</a></li>
        <li class="active">Pending</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Pending Users</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-12">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @include('flash::message')                                                                     
                            @foreach($pending as $pen)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $pen->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/users/pending" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$pen->id}}" />
                                            <input type="hidden" name="user_type_id" value="3" />
                                            <button class="btn-xs btn-info" style="width: 60px;">Student</button>
                                        </form>
                                        <form class="form-horizontal" role="form" method="POST" action="/users/pending" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$pen->id}}" />
                                            <input type="hidden" name="user_type_id" value="2" />
                                            <button class="btn-xs btn-primary" style="width: 60px;">Org</button>
                                        </form>
                                        <form class="form-horizontal" role="form" method="POST" action="/users/pending/del" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{$pen->id}}" />
                                            <button class="btn-xs btn-danger" style="width: 60px;">Delete</button>
                                        </form>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$pen->first_name}} {{$pen->mi}} {{$pen->last_name}}</strong>
                                    <span>{{$pen->course}}</span>
                                    <span>{{$pen->contact}}</span>
                                    <span>{{$pen->email}}</span>
                                </div>                                
                            </a>
                            @endforeach  
                        </div>  
                        <ul class="pagination pagination-sm pull-right push-down-20">
                            {!! html_entity_decode($pending->render()) !!}
                        </ul>                          
                    </div>                    
                </div>
            </div>                  
        </div>                                                
    </div>
@stop