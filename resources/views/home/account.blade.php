@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Account</title>
@stop

@section('content')
	<div class="page-content-wrap">
	    <div class="row">
			<div class="panel-body posts">
			 	<div class="panel panel-default">
			 		<!-- PERSONAL -->
			 		<div class="col-md-6">
				        <div class="panel-body profile">
				            <div class="profile-image">
				            <img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
				            </div>

							<div class="profile-data" align="center">
							    <div class="profile-data-name">Name: {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->mi }}</div>
							    <div class="profile-data-name">Course: {{ Auth::user()->course }}</div>     
					    	</div> 
				    	</div>

						<div class="panel-body" align="center">                                    
		                    <div class="contact-info">
		                        <p><small>Mobile</small><br/>{{ Auth::user()->contact }}</p>
		                        <p><small>Email</small><br/>{{ Auth::user()->email }}</p>     
		                        <p><small>Member Since</small><br/>{{ Auth::user()->created_at->format('M-d-Y') }}</p>                            
		                    </div>

							<div>
	                            <a type="submit" class="btn btn-primary pull-right" href="/account/update"><span class="fa fa-edit"></span>Update</a>
			                </div> 
		                </div>
		            </div>
			 		<!-- MY APPS -->
			 		<div class="col-md-6">
                    	@include('flash::message')
			 			<h4>My Organizations</h4>                                         
		 				<table class="table table-bordered table-hover">
	                        <thead>
	                            <tr>
	                                <th width="100" class="text-center">Organization</th>
	                                <th width="100" class="text-center">Status</th>
	                                <th width="100" class="text-center">Application Date</th>
	                                <th width="100" class="text-center">Actions</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                           @foreach($apps as $app)                                            
	                                <tr id="trow_1">
	                                	<input type="hidden" value="{{$post = $app->post_id}}" />
	                                	<input type="hidden" value="{{$user = DB::table('posts')->where('id', $post)->pluck('user_id')}}" />
	                                    <td><strong>{{DB::table('users')->where('id', $user)->pluck('first_name')}}</strong></td>
	                                    <td class="text-center">
	                                        @if($app->status == '0') <span class="label label-primary label-form">Pending</span>
	                                        @elseif($app->status == '1')<span class="label label-success label-form">Approved</span>
	                                        @elseif($app->status == '2')<span class="label label-danger label-form">Rejected</span>
	                                        @endif
	                                    </td>
	                                    <td class="text-center">{{ date("F d, Y l", strtotime($app->created_at)) }}</td>
	                                    <td>
	                                        <form class="form-horizontal" role="form" method="POST" action="/account/del" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete?')">
	                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                            <input type="hidden" name="id" value="{{$app->id}}" />
	                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
	                                        </form>
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                    </table> 
		 			</div>
	            </div>
			</div>
		</div>
	</div>
@stop