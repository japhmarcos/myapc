<!DOCTYPE html>
<html lang="en">
    <head>
    	@section('head')
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                                <div class="input-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" name="input" required class="form-control" placeholder="Search..."/>
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
                            </ul>
                        </li>
                        <li>
                            <a style="cursor: pointer;">School Directory</a>
                            <ul>
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
                                    <li><a href="/applications">My Applications</a></li>
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
                                <h3>About Template</h3>
                                <p>Lorem ipsum dolor natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
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
                                            <a href="#">@JohnDoe</a> Hello, here is my new front-end template. Check it out
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <a href="#">@Aqvatarius</a> Release of new update for Atlant is done and ready to use
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <a href="#">@Aqvatarius</a> Check out my new admin template Atlant, it's realy awesome template
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
                                        000 StreetName, Suite 111,<br/> 
                                        City Name, ST 01234
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-phone"></span>
                                        (123) 456-7890
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-envelope"></span>
                                        <strong>John Doe</strong><br>
                                        <a href="mailto:#">johndoe@domain.com</a>
                                    </div>                                    
                                </div>
                                
                                <h3>Subscribe</h3>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Your email"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-paper-plane"></span></button>
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
                            &copy; 2014 Atlant Theme by <a href="#">Aqvatarius</a> - All Rights Reserved                            
                        </div>
                        
                        <!-- social links -->
                        <div class="social-links">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-linkedin"></span></a>
                            <a href="#"><span class="fa fa-vimeo-square"></span></a>
                            <a href="#"><span class="fa fa-dribbble"></span></a>
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
        
        <script type="text/javascript" src="/front/js/actions.js"></script>
        <script type="text/javascript" src="/front/js/plugins.js"></script>
        <script type="text/javascript" src="/front/js/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/front/js/slider.js"></script>
        <script type="text/javascript" src="/front/js/summernote.js"></script>
    </body>
</html>