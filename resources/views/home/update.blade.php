@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Update Account</title>
@stop

@section('content')
	<ul class="breadcrumb">
	    <li><a href="/account">Account</a></li>
	    <li class="active">Update</li>
	</ul>
	<!-- START PAGE CONTAINER -->
	<div class="page-container">
		<!-- PAGE CONTENT WRAPPER -->
		<div class="page-content-wrap">
		    <div class="row">
				<div class="panel-body posts">
					<div class="panel panel-default tabs">
						<ul class="nav nav-tabs" role="tablist">
				            <li class="active"><a href="/account/update#tab-first" role="tab" data-toggle="tab">Personal Details</a></li>
				            <li><a href="/account/update#tab-second" role="tab" data-toggle="tab">Account Details</a></li>
				        </ul>
						<div class="panel-body tab-content">
							<!-- PERSONAL DETAILS -->
							<div class="tab-pane active" id="tab-first">
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

								<div class="panel-body profile" align="center">
									<div class="profile-image">
						            	<img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
						            </div>
								</div>

								<form role="form" action="/account/update" class="form-horizontal" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
							        <div class="panel-body">       
										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">Profile Picture: </label>
										    <div class="col-md-6 col-xs-12">
			                                    <input type="file" name="image"/>      
			                                </div>
										</div>

										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">Last Name: </label>
										    <div class="col-md-6 col-xs-12">                                            
										        <div class="input-group">
										            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										            <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}"/>
										        </div>                                           
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">First Name: </label>
										    <div class="col-md-6 col-xs-12">                                            
										        <div class="input-group">
										            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										            <input type="text" name="first_name" class="form-control" value="{{ Auth::user()->first_name }}"/>
										        </div>                                           
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">Middle Initial: </label>
										    <div class="col-md-6 col-xs-12">                                            
										        <div class="input-group">
										            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										            <input type="text" name="mi" class="form-control" value="{{ Auth::user()->mi }}"/>
										        </div>                                           
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">Course: </label>
										    <div class="col-md-6 col-xs-12">                                            
										        <div class="input-group">
										            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										            <input type="text" name="course" class="form-control" value="{{ Auth::user()->course }}"/>
										        </div>                                           
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-md-3 col-xs-12 control-label">Contact No.: </label>
										    <div class="col-md-6 col-xs-12">                                            
										        <div class="input-group">
										            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										            <input type="text" name="contact" class="form-control" value="{{ Auth::user()->contact }}"/>
										        </div>                                           
										    </div>
										</div> 

										<div align="center">                                                             
								            <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
								            <a class="btn btn-primary" href="/account"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</a>
								    	</div>
							    	</div>
				    			</form>
							</div>
							<!-- ACCOUNT DETAILS -->
							<div class="tab-pane" id="tab-second">
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
								<div class="col-md-6">
									<form role="form" action="/account/update/pass" class="form-horizontal" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Password (Current): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="password" name="current_password" class="form-control" placeholder="Enter Current Password"/>
											        </div>                                           
											    </div>
											</div>
										</div>

										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Password (New): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="password" name="password" class="form-control" placeholder="Enter Desired Password">
											        </div>                                           
											    </div>
											</div>
										</div>

										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Password (Confirm New): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter Desired Password"/>
											        </div>                                           
											    </div>
											</div>
										</div>

										<div align="center">                                                             
								            <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
								            <a class="btn btn-primary" href="/account"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</a>
								    	</div>
									</form>
								</div>

								<div class="col-md-6">
									<form role="form" action="/account/update/email" class="form-horizontal" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Email (Current): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="email" name="current_email" class="form-control" placeholder="email@example.com"/>
											        </div>                                           
											    </div>
											</div>
										</div>

										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Email (New): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="email" name="email" class="form-control" placeholder="email@example.com"/>
											        </div>                                           
											    </div>
											</div>
										</div>

										<div class="panel-body">                                                                        
											<div class="form-group">
											    <label class="col-md-3 col-xs-12 control-label">Email (Confirm New): </label>
											    <div class="col-md-6 col-xs-12">                                            
											        <div class="input-group">
											            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											            <input type="email" name="email_confirmation" class="form-control" placeholder="email@example.com"/>
											        </div>                                           
											    </div>
											</div>
										</div>

										<div align="center">                                                             
								            <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
								            <a class="btn btn-primary" href="/account"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</a>
								    	</div>
								    </form>
						    	</div>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>
@stop