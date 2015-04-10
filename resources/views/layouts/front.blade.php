<!DOCTYPE html>
<html lang="en">
    <head>
        @section('head')
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="/front/img/apclogo.ico" type="image/x-icon" /> 
        <!-- END META SECTION -->
        
        <link rel="stylesheet" type="text/css" href="/front/css/revolution-slider/extralayers.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/front/css/revolution-slider/settings.css" media="screen" />
        
        <link rel="stylesheet" type="text/css" href="/front/css/theme-dark.css"/>    
        <link rel="stylesheet" type="text/css" href="/front/css/styles.css" media="screen" />                  
        <link rel="stylesheet" type="text/css" href="/front/css/summernote.css" media="screen" />                  
        @show
    </head>
    <body>
        <div class="page-container">
            <div class="page-header">
                <div class="page-header-holder">
                    <div class="logo">
                        <a href="/">MyAPC</a>
                    </div>                    

                    <!-- search -->
                    <div class="search">
                        <div class="search-button"><span class="fa fa-search"></span></div>
                        <div class="search-container animated fadeInDown">
                            <form role="form" action="/searchresults" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-group">
                                    <input name="input" type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    
                    <!-- navigation -->
                    <ul class="navigation">
                        <li><a href="/">Home</a></li>
                        <li><a href="/news">News</a></li>
                        <li><a href="/events">Events</a></li>
                        @if(Auth::check())
                            <li><a href="/announcements">Announcements</a></li>
                        @endif
                        <li><a href="/organizations">Organizations</a></li>

                        <li>
                            <a style="cursor: pointer;">APC Links</a>
                            <ul>
                                <li><a href="https://apc.edu.ph/" target="_blank">APC Website</a></li>
                                <li><a href="http://www.apc.edu.ph/flavio/Apps/StudentFlowchart.php" target="_blank">Flowchart Viewer</a></li>
                                <li><a href="http://www.apc.edu.ph/flavio/Apps/StudentGrades.php" target="_blank">Grades Viewer</a></li>
                                <li><a href="http://www.apc.edu.ph/flavio/Apps/StudentAssessment.php" target="_blank">Registration/ Assessment Form Viewer</a></li>
                                <li><a href="http://www.apc.edu.ph/flavio/Apps/SubjectOffering.php" target="_blank">Master List of Subject Offerings Viewer</a></li>
                                <li><a href="/directory">Office Directory</a></li>
                                <li><a href="/bus">Bus Schedules</a></li>
                            </ul>
                        </li>

                        @if(Auth::guest())                        
                            <li><a href="/auth/register">Register</a></li>
                            <li><a href="/auth/login">Login</a></li>                            
                        @else
                            <li>
                                <a style="cursor: pointer;">{{ Auth::user()->first_name }}</a>
                                <ul>
                                    @if(Auth::user()->user_type_id=='1' || Auth::user()->user_type_id=='2')
                                        <li><a href="/dashboard">Dashboard</a></li>
                                    @endif
                                    <li><a href="/account">My Profile</a></li>
                                    <li><a href="/auth/logout">Logout</a></li>                                    
                                </ul>
                            </li>
                        @endif
                    </ul>                                       
                </div>                
            </div>
            
            @yield('content')
            
            <div class="page-footer">
                <div class="page-footer-wrap bg-dark-gray">
                    <div class="page-footer-holder page-footer-holder-main">                                                
                        <div class="row">                            
                            <!-- about -->
                            <div class="col-md-3">
                                <h3>About MyAPC</h3>
                                <p>MyAPC’s primary goal is to centralize all the sources and serve as a tool that will provide the students the information they need. The app is envisioned to bridge the gap between the students and the school, enhancing and bringing the communication to a higher level, reaching a wider network. All at the palm of their hands.</p>
                            </div>
                            
                            <!-- quick links -->
                            <div class="col-md-3">
                                <h3>Quick links</h3>
                                
                                <div class="list-links">
                                    <a href="/">Home</a>                                    
                                    <a href="/news">News</a>
                                    <a href="/events">Events</a>
                                    @if(Auth::check())                                    
                                        <a href="/announcements">Announcements</a>
                                    @endif
                                    <a href="/organizations">Organizations</a>

                                </div>                                
                            </div>
                            
                            <!-- recent tweets -->
                            <div class="col-md-3">
                                <h3>Recent Tweets</h3>
                                
                                <div class="list-with-icon small">
                                    <div class="item">
                                        <div class="icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <a href="https://twitter.com/apcrams">@APCRAMS</a> Sample tweet. Hello world!
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <a href="#">@TeamGentle</a> MyAPC Static Test Tweet
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <a href="#">@MyAPC</a> Cool application!
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            
                            <!-- contacts -->
                            <div class="col-md-3">
                                <h3>Contacts</h3>                                
                                <div class="footer-contacts">
                                    <div class="fc-row">
                                        <span class="fa fa-home"></span>
                                        3 Humabon Place Magallanes<br/> 
                                        1232 Makati City, Philippines
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-phone"></span>
                                        852-9670 to 71
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-envelope"></span>
                                        <strong>MyAPC</strong><br>
                                        <a href="/">ssmyapc.com</a>
                                    </div>                                    
                                </div>                               
                            </div>                            
                        </div>                        
                    </div>
                </div>
                
                <div class="page-footer-wrap bg-darken-gray">
                    <div class="page-footer-holder">    

                        <!-- copyright -->
                        <div class="copyright">
                            &copy; 2015 MyAPC by Team Gentle SS111                           
                        </div>
                        
                        <!-- social links -->
                        <div class="social-links">
                            <a href="https://www.facebook.com/asiapacificcollege.edu"><span class="fa fa-facebook"></span></a>
                            <a href="https://twitter.com/apcrams"><span class="fa fa-twitter"></span></a>
                            <a href="https://plus.google.com/115246115970737251075"><span class="fa fa-google-plus"></span></a>
                        </div>   
                    </div>
                </div>                
            </div>            
        </div>        
        
        <!-- page scripts -->
        <script type="text/javascript" src="/front/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/front/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/front/js/plugins/bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="/front/js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="/front/js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="/front/js/plugins/revolution-slider/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/front/js/plugins/revolution-slider/jquery.themepunch.revolution.min.js"></script>

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='/front/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="/front/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="/front/js/plugins/highlight/jquery.highlight-4.js"></script>
        <script type="text/javascript" src="/front/js/faq.js"></script>
        <!-- END THIS PAGE PLUGINS-->     
        
        <script type="text/javascript" src="/front/js/actions.js"></script>
        <script type="text/javascript" src="/front/js/plugins.js"></script>
        <script type="text/javascript" src="/front/js/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/front/js/slider.js"></script>
        <script type="text/javascript" src="/front/js/summernote.js"></script>
    </body>
</html>