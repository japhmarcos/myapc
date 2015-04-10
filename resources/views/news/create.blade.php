@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-News</title>
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
        <li><a>News</a></li>
        <li class="active">Create News</li>
    </ul>
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                
                <form role="form" action="/news/create" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Create News</strong></h3>
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
                                        <input type="text" name="title" class="form-control" placeholder="Title"/>
                                    </div>                                            
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" name="author" class="form-control" placeholder="Author"/>
                                    </div>                                            
                                </div>
                            </div>
                            <label>Featured Image</label>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="image1" class="file" data-preview-file-type="any"/>                    
                                </div>
                            </div>                                                                       
                            
                            <div class="form-group">
                                <div class="block">                                            
                                    <textarea name="body" class="summernote"></textarea>
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