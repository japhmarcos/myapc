@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Organizations</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/org/list">Organizations</a></li>
        <li class="active">{{$org->title}}</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title"> 
        <h2>Organizations</h2>                 
        <span class="pull-right">
            <a href="/org/update/{{$org->id}}"><button class="btn btn-info"><span class="fa fa-pencil-square-o"></span>Edit</button></a>
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
                                {{$org->title}}
                            </div>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($org->created_at)) }} / by {{$org->org->first_name}}</div>
                            <div class="post-text"> 
                                @if($org->image1 != null)
                                    <img src="/images/org/{{$org->image1}}" class="img-text"/>
                                @endif
                                {!! html_entity_decode($org->body) !!}
                            </div>
                        </div>                                    
                    </div>
                </div>                
            </div> 
            <div class="col-md-1"></div>                
        </div>                                                
    </div>
@stop