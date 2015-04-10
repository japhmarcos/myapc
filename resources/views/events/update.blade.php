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
        <li><a href="/events/{{$update->id}}">{{$update->title}}</a></li>
        <li class="active">Update</li>
    </ul>              
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">              

            <div class="col-md-12">                            
                <div class="panel panel-default">
                    <div class="panel-body posts">
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
                        <form role="form" action="/events/update/{{$update->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Update Events</strong></h3>
                            </div>
                            <div class="panel-body"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Title</label>
                                            <div class="col-md-9">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" name="title" class="form-control" value="{{$update->title}}"/>
                                                </div>    
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Date Start</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input type="text" name="date_start" class="form-control datepicker" value="{{$update->date_start}}">
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Date End</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input type="text" name="date_end" class="form-control datepicker" value="{{$update->date_end}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-3 col-xs-12 control-label">Time Start</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group bootstrap-timepicker">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time" ></span></span>
                                                    <input type="text" name="time_start" class="form-control timepicker24" value="{{$update->time_start}}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group"> 
                                            <label class="col-md-3 col-xs-12 control-label">Time End</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group bootstrap-timepicker">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time" ></span></span>
                                                    <input type="text" name="time_end" class="form-control timepicker24" value="{{$update->time_end}}"/>
                                                </div>
                                            </div>
                                         </div>   


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Location</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    <input type="text" name="location" class="form-control" value="{{$update->location}}"/>
                                                </div>                                            
                                            </div>
                                        </div>   
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Body</label>
                                            <div class="col-md-9 col-xs-12">                                            
                                                <textarea name="body" class="summernote" rows="5">{{{$update->body}}}</textarea>
                                            </div>
                                        </div>
                                        
                                        @if($update->image != null)
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-3">
                                                    <img src="/images/events/{{$update->image}}" class="img-responsive img-text"/>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9 col-xs-12">
                                                    <input type="file" name="image" class="file" data-preview-file-type="image" file-preview-image="/images/news/{{$update->image1}}"/>                    
                                            </div>
                                        </div>                                  
                                    </div>

                                    @if(Auth::user()->user_type_id == '1')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Post Status</label>
                                                <div class="col-md-9">                                                                     
                                                    <select class="form-control select" name="status">
                                                        @if($update->status =='0')
                                                        <option value="0" selected="selected">Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">For Revision</option>
                                                        <option value="3">Rejected</option>

                                                        @elseif($update->status =='1')
                                                        <option value="1" selected="selected">Approved</option>
                                                        <option value="0">Pending</option>
                                                        <option value="2">For Revision</option>
                                                        <option value="3">Rejected</option>

                                                        @elseif($update->status =='2')
                                                        <option value="2" selected="selected">For Revision</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="3">Rejected</option>

                                                        @elseif($update->status =='3')
                                                        <option value="3" selected="selected">Rejected</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">For Revision</option>

                                                        @endif
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Notes</label>
                                                <div class="col-md-9">
                                                    <textarea name="notes" class="form-control" style="resize: none;" rows="5">{{{$update->notes}}}</textarea>
                                                </div>
                                            </div>                               
                                        </div>
                                     @else
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Post Status</label>
                                                <div class="col-md-9">                                                                     
                                                        @if($update->status =='0')
                                                        <span class="label label-primary label-form">Pending</span>
                                                        @elseif($update->status =='1')
                                                        <span class="label label-info label-form">Approved</span>
                                                        @elseif($update->status =='2')
                                                        <span class="label label-warning label-form">For Revision</span>
                                                        @elseif($update->status =='3')
                                                        <span class="label label-danger label-form">Rejected</span>
                                                        @endif
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Notes</label>
                                                <div class="col-md-9">
                                                    <textarea name="notes" class="form-control" style="resize: none;" rows="5" readonly>{{{$update->notes}}}</textarea>
                                                </div>
                                            </div>                               
                                        </div>
                                    @endif                                
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>                             
                    </div>
                </div>                
            </div>               
        </div>                                                
    </div>
@stop