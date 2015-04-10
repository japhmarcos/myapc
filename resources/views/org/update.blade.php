@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Organizations</title>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        @if(Auth::user()->user_type_id == '1')
            <li><a href="/org/list">Organizations</a></li>
            <li><a href="/org/{{$update->id}}">{{$update->title}}</a></li>
        @else
            <li><a href="/org">{{$update->title}}</a></li>
        @endif
        <li class="active">Update</li>
    </ul>
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                
                <form role="form" action="/org/update/{{$update->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Create Organization</strong></h3>
                        </div>
                        <div class="panel-body">  

                            <!-- Error Notifications -->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @include('flash::message')                                                                      
                                
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="title" class="form-control" value="{{$update->title}}" placeholder="Name of Organization"/>
                                    </div>                                            
                                </div>
                            </div>

                            <label>Featured Image</label>
                            @if($update->image1 != null)
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <img src="/images/org/{{$update->image1}}" class="img-responsive img-text"/>
                                    </div>
                                </div>
                            @endif 

                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="image1" class="file" data-preview-file-type="any"/>                    
                                </div>
                            </div>     

                            @if(Auth::user()->user_type_id == '1')
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">                      
                                        {!! Form::select('user_id', $orgs, null, ['class' => 'form-control select']) !!}
                                    </div>
                                </div>  
                            @endif                                                                
                            
                            <div class="form-group">
                                <div class="block">                                            
                                    <textarea name="body" class="summernote">{{{$update->body}}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer text-center">                                 
                            <button class="btn btn-primary pull ">Submit</button>
                        </div>
                    </div>
                </form>                         
            </div>
        </div>  
    </div> 
@stop