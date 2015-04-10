<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>MyAPC | Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="/admin/css/theme-default.css"/>

        <script>
            window.onload = function() {
              var input = document.getElementById("login").focus();
            }
        </script>
    </head>
    <body>
        
        <div class="login-container">        
            <div class="login-box animated fadeInDown">
                <a href="/"><div class="login-logo"></div></a>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
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
                    <form action="/auth/login" class="form-horizontal" method="POST" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="login" type="email" class="form-control" placeholder="Email" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>

                        <div class="col-md-6">
                            <a href="/auth/register" class="btn btn-link btn-block">Sign Up</a>
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