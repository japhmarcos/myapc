@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Announcement</title>
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
        <li><a href="/announcements/list">Announcements</a></li>
        <li><a href="/announcements/{{$update->id}}">{{$update->title}}</a></li>
        <li class="active">Update</li>
    </ul>
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                
                <form role="form" action="/announcements/update/{{$update->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Update Announcement</strong></h3>
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
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{$update->title}}"/>
                                    </div>                                            
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" name="author" class="form-control" placeholder="Author" value="{{$update->author}}"/>
                                    </div>                                            
                                </div>
                            </div>
                            <label>Featured Image</label>

                            @if($update->image1 != null)
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <img src="/images/news/{{$update->image1}}" class="img-responsive img-text"/>
                                    </div>
                                </div> 
                            @endif
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <input type="file" name="image1" class="file" data-preview-file-type="image" file-preview-image="/images/announcements/{{$update->image1}}"/>                    
                                </div>
                            </div>                                                                      
                            
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