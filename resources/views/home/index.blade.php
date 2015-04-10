@extends('layouts.front')
@section('head')
    @parent
	<title>MyAPC | Home</title>
@stop

@section('content')
   <div class="page-content">                
        
        <!-- revolution slider -->
        <div class="banner-container">
            <div class="banner">
                <ul>                            
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="500"  data-saveperformance="on">
                        <img src="/front/img/backgrounds/bg-2.jpg" />
                        
                        <div class="tp-caption lft customout rs-parallaxlevel-0"
                            data-x="150"
                            data-y="80" 
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power3.easeInOut"
                            data-elementdelay="0.1"
                            data-endelementdelay="0.1"
                            style="z-index: 2;">
                            <img src="/front/assets/slider-layers/atlant-title.png" alt="Atlant"/>
                        </div>
                                                        
                        <div class="tp-caption lft customout rs-parallaxlevel-0"
                            data-x="550"
                            data-y="230" 
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="700"
                            data-start="1200"
                            data-easing="Power3.easeInOut"
                            data-elementdelay="0.1"
                            data-endelementdelay="0.1"
                            style="z-index: 3;">
                            <img src="/front/assets/slider-layers/atlant_monitor.png" alt="Atlant"/>
                        </div>
                        
                        <div class="tp-caption black_thin_34 customin tp-resizeme rs-parallaxlevel-0"
                            data-x="0"
                            data-y="230" 
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-speed="500"
                            data-start="1000"
                            data-easing="Back.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.1"
                            data-endelementdelay="0.1"
                            style="z-index: 4;">
                            <img src="/front/assets/slider-layers/atlant_responsive.png" alt="Atlant"/>
                        </div>
                        
                        <div class="tp-caption black_thin_34 customin tp-resizeme rs-parallaxlevel-0"
                            data-x="0"
                            data-y="330" 
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-speed="500"
                            data-start="1100"
                            data-easing="Back.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.1"
                            data-endelementdelay="0.1"
                            style="z-index: 5;">
                            <img src="/front/assets/slider-layers/atlant_tempalte.png" alt="Atlant"/>
                        </div>
                        
                    </li>                                    
                                                
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="700" >
                        <img src="/front/assets/video/video_typing_cover.jpg"  alt="video_typing_cover"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">                                
                        
                        <div class="tp-caption tp-fade fadeout fullscreenvideo"
                            data-x="0"
                            data-y="0"
                            data-speed="1000"
                            data-start="1100"
                            data-easing="Power4.easeOut"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="1500"
                            data-endeasing="Power4.easeIn"
                            data-autoplay="true"
                            data-autoplayonlyfirsttime="false"
                            data-nextslideatend="true"
                            data-volume="mute" data-forceCover="1" data-aspectratio="16:9" data-forcerewind="on" style="z-index: 2;">

                            <video class="" preload="none" width="100%" height="100%" poster="assets/video/video_typing_cover.jpg"> 
                                <source src='/front/assets/video/computer_typing.mp4' type='video/mp4'/>
                                <source src='/front/assets/video/computer_typing.webm' type='video/webm'/>
                            </video>
                        </div>
                        
                        <div class="tp-caption customin ltl"
                                data-x="600"
                                data-y="280" 
                                data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="500"
                                data-start="1500"
                                data-easing="Power4.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn"
                                style="z-index: 3;">
                        </div>  
                    </li>
                </ul>                        
            </div>
        </div>                                              
                               
        
        
        <div class="page-content-wrap bg-texture-1 bg-dark light-elements">                    
            <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>
            <div class="page-content-holder">                                                
                <div class="row">     
                    <div class="col-md-12 col-xs-12">
                        <div class="text-column text-column-centralized">
                            <img src="/front/img/features.png">
                        </div>
                    </div>
                    <div class="col-md-4">                                
                        <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInLeft">
                            <div class="text-column-icon">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <h4>Connect.</h4>
                            <div class="text-column-info">
                               Staying up to date regarding the latest school news, announcements, and events is an important factor in a student's holistic educational experience. MyAPC aims to centralize all the sources of information in APC, providing the students a one-stop source of all the information they need.                                    
                            </div>
                        </div>                                
                    </div>
                    
                    <div class="col-md-4">                                
                        <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInUp">
                            <div class="text-column-icon">
                                <span class="fa fa-comments"></span>
                            </div>
                            <h4>Interact.</h4>
                            <div class="text-column-info">
                                One of MyAPC's objectives is to streamline the communication process between the institution and the students. Built with tools for interaction, the application is set to enhance the level of communication among the school, organizations, and the students.
                            </div>
                        </div>                                
                    </div>
                    
                    <div class="col-md-4">                                
                        <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInRight">
                            <div class="text-column-icon">
                                <span class="fa fa-mobile-phone"></span>
                            </div>
                            <h4>Accessibility</h4>
                            <div class="text-column-info">
                               MyAPC is a mobile-optimized application that lets its users to access the contents no matter what their devices or platforms are. Its user-friendly interface, together with the other features, intends to produce readable content that contributes to the overall user-experience.
                            </div>
                        </div>                                
                    </div>                            
                </div>                        
            </div>
        </div>

        <div class="page-content-wrap bg-light bg-texture-1">                    
            <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                  
            <div class="page-content-holder">                        
                
                <div class="quote this-animate" data-animate="fadeInDown">
                    <div class="row">
                        <div class="col-md-9">
                            <h3><strong>MyAPC</strong> &mdash;One connected community.</h3>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary btn-block btn-lg">Register for FREE!</button>
                        </div>
                    </div>
                </div>                      
            </div>
        </div>               
    </div>
@stop