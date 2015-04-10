@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Org-Organization</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Organization</a></li>
        <li class="active">Applicants</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Applicants</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-12">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @include('flash::message')                                                                     
                            @foreach($applicants as $app)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $app->member->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/org/applicants" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$app->id}}" />
                                            <input type="hidden" name="status" value="1" />
                                            <button class="btn-sm btn-success fa fa-thumbs-up"></button>                  
                                        </form>
                                        <form class="form-horizontal" role="form" method="POST" action="/org/applicants" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$app->id}}" />
                                            <input type="hidden" name="status" value="2" />
                                            <button class="btn-sm btn-warning fa fa-thumbs-down"></button>
                                        </form>
                                        <form class="form-horizontal" role="form" method="POST" action="/org/applicants" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" value="{{$app->id}}" />
                                            <button class="btn-sm btn-danger fa fa-times" style="width: 35px;"></button>  
                                        </form>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$app->member->first_name}} {{$app->member->mi}} {{$app->member->last_name}}</strong>
                                    <span>{{$app->member->course}}</span>
                                    <span>{{$app->member->contact}}</span>
                                    <span>{{$app->member->email}}</span>
                                    @if($app->status == '0')
                                        <span class="label label-primary label-form stat">Pending</span>
                                    @elseif($app->status == '2')
                                        <span class="label label-warning label-form stat">Rejected</span>
                                    @endif
                                </div>                                
                            </a>
                            @endforeach  
                        </div>  
                        <ul class="pagination pagination-sm pull-right push-down-20">
                            {!! html_entity_decode($applicants->render()) !!}
                        </ul>                          
                    </div>                    
                </div>
            </div>                 
        </div>                                                
    </div>
@stop