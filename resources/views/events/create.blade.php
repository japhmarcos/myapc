@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Events</title>
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
        <li><a>Events</a></li>
        <li class="active">Create New Event</li>
    </ul>
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                
                <form role="form" action="/events/create" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Create Event</strong></h3>
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
                                <div class="col-md-3 col-xs-12"></div>
                                <div class="col-md-7 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="title" class="form-control" placeholder="Event Name"/>
                                    </div>                                            
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Date Start</label>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="date_start" class="form-control datepicker" placeholder="2015-12-31">
                                    </div>
                                </div>
                                <label class="col-md-1 col-xs-12 control-label">Date End</label>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="date_end" class="form-control datepicker" placeholder="2015-12-31">
                                    </div>
                                </div>
                            </div> 


                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Time Start</label>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input-group bootstrap-timepicker">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time" ></span></span>
                                        <input type="text" name="time_start" class="form-control timepicker" placeholder="00:00 AM"/>
                                    </div>
                                </div>
                                <label class="col-md-1 col-xs-12 control-label">Time End</label>
                                <div class="col-md-3 col-xs-12">
                                    <div class="input-group bootstrap-timepicker">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time" ></span></span>
                                        <input type="text" name="time_end" class="form-control timepicker" placeholder="00:00 AM"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Location</label>
                                <div class="col-md-7 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" name="location" class="form-control"/>
                                    </div>                                            
                                </div>
                            </div>            

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Event Poster</label>
                                <div class="col-md-7 col-xs-12">
                                    <input type="file" name="image" class="file" data-preview-file-type="any"/>                    
                                </div>
                            </div>                                                           
                            
                            <div class="form-group">
                                <div class="col-md-2 col-xs-12"></div>
                                <div class="col-md-8">                                            
                                    <textarea name="body" class="summernote" rows="5"></textarea>
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