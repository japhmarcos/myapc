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
        <li class="active">Current</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Current Users</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">  
            <div class="col-md-12">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @foreach($current as $cur)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $cur->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/users" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{$cur->id}}" />
                                            <button class="btn-xs btn-danger" style="width: 60px;">Delete</button>
                                        </form>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$cur->first_name}} {{$cur->mi}} {{$cur->last_name}}</strong>
                                    <span>{{$cur->course}}</span>
                                    <span>{{$cur->contact}}</span>
                                    <span>{{$cur->email}}</span>
                                </div>                                
                            </a>  
                            @endforeach                         
                        </div>  
                        <ul class="pagination pagination-sm pull-right push-down-20">
                            {!! html_entity_decode($current->render()) !!}
                        </ul>                          
                    </div>                    
                </div>
            </div>                 
        </div>                                                
    </div>
@stop