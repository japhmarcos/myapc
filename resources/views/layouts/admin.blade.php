<!DOCTYPE html>
<html lang="en">
    <head>     
        @section('head')       
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="/admin/img/apclogo.ico" type="image/x-icon" />   
        <link rel="stylesheet" type="text/css" id="theme" href="/admin/css/theme-dark.css"/>                
        <link rel="stylesheet" type="text/css" href="/admin/css/summernote/summernote.css" media="screen" />
        @show                                
    </head>
    <body>
    <!-- NAV VARIABLES -->    
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top-fixed page-sidebar-fixed">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar page-sidebar-fixed scroll">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="/dashboard">MyAPC</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ Auth::user()->first_name }}</div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li>
                        <a href="/dashboard"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">News</span></a>
                        <ul>
                            @if(Auth::user()->user_type_id == '1')
                            <li><a href="/news/posted"><span class="fa fa-check"></span>Approved News</a></li>
                            @else
                            <li><a href="/news/posted"><span class="fa fa-check"></span>My Approved News</a></li>
                            @endif
                            @if(Auth::user()->user_type_id == '1')
                            <li><a href="/news/pending"><span class="fa fa-archive"></span>Pending News</a></li>
                            @else
                            <li><a href="/news/pending"><span class="fa fa-archive"></span>My Pending News</a></li>
                            @endif
                            <li><a href="/news/create"><span class="fa fa-edit"></span>Create News</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-calendar"></span> <span class="xn-text">Events</span></a>
                        <ul>
                            @if(Auth::user()->user_type_id == '1')
                            <li><a href="/events/posted"><span class="fa fa-check"></span>Approved Events</a></li>
                            @else
                            <li><a href="/events/posted"><span class="fa fa-check"></span>My Approved Events</a></li>
                            @endif
                            @if(Auth::user()->user_type_id == '1')
                            <li><a href="/events/pending"><span class="fa fa-archive"></span>Pending Events</a></li>
                            @else
                            <li><a href="/events/pending"><span class="fa fa-archive"></span>My Pending Events</a></li>
                            @endif
                            <li><a href="/events/create"><span class="fa fa-edit"></span> Create</a></li>
                        </ul>
                    </li> 
                    @if(Auth::user()->user_type_id == '2')
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">{{Auth::user()->first_name}}</span></a>
                            <ul>
                                <li><a href="/org"><span class="fa fa-bars"></span> View</a></li>
                                <li><a href="/org/applicants"><span class="fa fa-users"></span> Applicants</a></li>
                                <li><a href="/org/approved"><span class="fa fa-check"></span> Members</a></li>
                            </ul>
                        </li> 
                    @endif
                    @if(Auth::user()->user_type_id == '1')
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-clipboard"></span> <span class="xn-text">Announcements</span></a>
                            <ul>
                                <li><a href="/announcements/list"><span class="fa fa-bars"></span>List of Announcements</a></li>
                                <li><a href="/announcements/create"><span class="fa fa-edit"></span> Create</a></li>
                            </ul>
                        </li> 
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Organizations</span></a>
                        <ul>
                            <li><a href="/org/list"><span class="fa fa-bars"></span> List of Organizations</a></li>
                            <li><a href="/org/create"><span class="fa fa-edit"></span> Create</a></li>
                        </ul>
                    </li>                  
                    <li class="xn-openable">
                            <a href="#"><span class="fa fa-group"></span> <span class="xn-text">Users</span></a>
                            <ul>
                                <li><a href="/users"><span class="fa fa-user"></span> Current</a></li>
                                <li><a href="/users/pending"><span class="fa fa-users"></span> Pending</a></li>
                            </ul>
                        </li> 
                    @endif
                    <li>
                        <a href="/" target="_blank"><span class="fa fa-desktop"></span> <span class="xn-text">Link to MyAPC</span></a>
                    </li>                
                </ul>
            </div>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>

                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form" action="/search" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" name="keyword" placeholder="Search..." required/>
                        </form>
                    </li>  

                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li> 
                </ul>              
                
                @yield('content')
                                              
            </div>            
        </div>

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="/auth/logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="/admin/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/admin/audio/fail.mp3" preload="auto"></audio>                

        <!-- START PLUGINS -->
        <script type="text/javascript" src="/admin/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap.min.js"></script>  

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='/admin/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="/admin/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="/admin/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='/admin/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="/admin/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="/admin/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/daterangepicker/daterangepicker.js"></script>  
        <script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>  
        <script type="text/javascript" src="/admin/js/plugins/bootstrap/bootstrap-select.js"></script>

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="/front/js/summernote.js"></script>
        <script type="text/javascript" src="/admin/js/plugins.js"></script>        
        <script type="text/javascript" src="/admin/js/actions.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="/admin/js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="/admin/js/plugins/filetree/jqueryFileTree.js"></script>        
        <script type="text/javascript" src="/front/js/jquery.mCustomScrollbar.min.js"></script>
        
        
        <script type="text/javascript" src="/admin/js/demo_dashboard.js"></script>    

        <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    script: 'assets/filetree/jqueryFileTree.php',
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
        </script>  
    </body>
</html>