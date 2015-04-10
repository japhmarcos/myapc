@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li class="active">Dashboard</li>
    </ul> 
    <div class="page-content-wrap">
        
        <!-- START WIDGETS -->                    
        <div class="row">
            <div class="col-md-3">
                
            <!-- START WIDGET CLOCK -->
                <div class="widget widget-danger widget-padding-sm"> 
                    <div class="widget-big-int plugin-clock">00:00</div>                            
                    <div class="widget-subtitle plugin-date">Loading...</div>                                                   
                </div>                                    
            </div>

            <div class="col-md-3">
                
                <!-- START WIDGET SLIDER -->
                <div class="widget widget-default widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                        <div onclick="location.href='/news/pending';">                                    
                            <div class="widget-title">Pending News</div>                                                                 
                            <div class="widget-subtitle">27/08/2014 15:23</div>
                            <div class="widget-int">{{$countn}}</div>
                        </div>
                        <div onclick="location.href='/events/pending';">                                    
                            <div class="widget-title">Pending Events</div>
                            <div class="widget-subtitle">Visitors</div>
                            <div class="widget-int">{{$counte}}</div>
                        </div>
                    </div>                             
                </div>                         
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                @if (Auth::user()->user_type_id == '1')
                    <div class="widget widget-default widget-item-icon" onclick="location.href='/users/pending';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>   
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$countp}}</div>
                            <div class="widget-title">Pending Users</div>
                            <div class="widget-subtitle">On your website</div>
                        </div> 
                    </div> 
                @else
                    <div class="widget widget-default widget-item-icon" onclick="location.href='/org/applicants';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>   
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$countp}}</div>
                            <div class="widget-title">Applicants</div>
                            <div class="widget-subtitle">On your org</div>
                        </div> 
                    </div>                        
                @endif
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET REGISTRED -->
                @if (Auth::user()->user_type_id == '1')
                <div class="widget widget-default widget-item-icon" onclick="location.href='/users';">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{$count}}</div>
                        <div class="widget-title">Registered Users</div>
                        <div class="widget-subtitle">On your website</div>
                    </div>                         
                </div>                                         
                @else
                    <div class="widget widget-default widget-item-icon" onclick="location.href='/org/approved';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>   
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$count}}</div>
                            <div class="widget-title">Members</div>
                            <div class="widget-subtitle">On your org</div>
                        </div> 
                    </div>                        
                @endif
            </div>
        </div>                  
        
        <div class="col-md-3">
             <!-- START PANEL WITH CONTROL CLASSES -->
            <div class="panel panel-default">
                <div class="panel-heading">
                     @if(Auth::user()->user_type_id == 1)
                    <h3 class="panel-title"><strong>Latest News</strong></h3>
                    @else
                    <h3 class="panel-title"><strong>My Latest News</strong></h3>
                    @endif
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>                                
                </div>
                <div class="panel-body">
                    @foreach($news as $new)
                        <div onclick="location.href='/news/{{$new->id}}';">
                            <h5><a href="/news/{{$new->id}}">{{$new->title}}</a></h5>
                            <p>
                                By: <b>{{$new->author}}</b> <br />
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($new->created_at))->diffForHumans()}}
                            </p>  
                        </div>  
                        <hr />
                    @endforeach
                </div>                               
            </div>
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Auth::user()->user_type_id == 1)
                    <h3 class="panel-title"><strong>Upcoming Events</strong></h3>
                    @else
                    <h3 class="panel-title"><strong>My Upcoming Events</strong></h3>
                    @endif
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>                                
                </div>
                <div class="panel-body">
                    @foreach($events as $event)
                        <div onclick="location.href='/events/{{$event->id}}';">
                            <h5><a href="/events/{{$event->id}}">{{$event->title}}</a></h5>
                            <p>
                                Date: <b>{{ date("F d, Y", strtotime($event->date_start)) }}</b> <br />
                                Location: <b>{{$event->location}}</b> <br />
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($event->date_start))->diffForHumans()}}
                            </p>  
                        </div>  
                        <hr />
                    @endforeach
                </div>                               
            </div>
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
        @if(Auth::user()->user_type_id == 1)
            <div class="col-md-6">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><a href="/users">Recent Registered Users</a></strong></h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                       </ul>                                
                    </div>
                    <div class="panel-body">
                        @foreach($users as $user)
                            <div class="col-md-4">
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $user->image) }}"  width="100px" data-toggle="tooltip" data-placement="left" title="{{$user->first_name}} {{$user->mi}} {{$user->last_name}}"/>            
                                </div>                       
                            </div>
                        @endforeach
                    </div>                                
                </div>
            </div>  

        @else
            <div class="col-md-6">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><a href="/org/applicants">New Applicants</a></strong></h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                       </ul>                                
                    </div>
                    <div class="panel-body">
                        @foreach($users as $user)
                            <div class="col-md-4">
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $user->member->image) }}"/>            
                                </div>
                                <div class="meta">
                                    <strong>{{$user->member->first_name}} {{$user->member->mi}} {{$user->member->last_name}}</strong> <br />
                                    <span>{{$user->member->course}}</span> <br />
                                    <span>{{$user->member->contact}}</span> <br />
                                    <span>{{$user->member->email}}</span>
                                </div>                                
                            </div>
                        @endforeach
                    </div>                                
                </div>
            </div>   
        @endif                  
    </div>
@stop