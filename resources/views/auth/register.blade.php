<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>MyAPC | Register</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/admin/css/theme-default.css"/>
        <script>
            window.onload = function() {
              var input = document.getElementById("reg").focus();
            }
        </script>
    </head>
    <body>
        
        <div class="login-container">        
            <div class="login-box animated fadeInDown">
                <a href="/"><div class="login-logo"></div></a>                
                <div class="login-body">
                    <div class="login-title"><strong>Register</strong></div>
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

                    <form action="/auth/register" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
                        <div class="col-md-12">
                            <input id="reg" type="text" class="form-control" placeholder="Last name" name="last_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="First name" name="first_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Middle Initial" name="mi" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Course" name="course" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Contact" name="contact" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" class="form-control" placeholder="Image" name="image" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="Email" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" />
                        </div>
                    </div>                   
                    <div class="form-group">
                        <div class="col-md-12">
                    		<button class="btn btn-info btn-block">Register</button>
                        </div>
                        <div class="col-md-6">
                            <a href="/auth/login" class="btn btn-link btn-block">Already have an account?</a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 MyAPC
                    </div>
                </div>
            </div>            
        </div>        
    </body>
</html>