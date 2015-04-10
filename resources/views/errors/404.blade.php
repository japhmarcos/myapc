@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | News</title>
@stop

@section('content')
                  <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="error-container">
                                <div class="error-code">404</div>
                                <div class="error-text">Page Not Found</div>
                                <div class="error-subtext">Unfortunately we're having trouble loading the page you are looking for. Please wait a moment and try again or use action below.</div>
                                <div class="error-actions">                                
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Previous page</button>
                                        </div>
                                        <div class="col-md-12">
                                            <br><br><br>
                                        </div>
                                    </div>                                
                                </div>
                            </div>

                        </div>
                    </div>
                    
                                                                        
                </div>                
                <!-- END PAGE CONTENT WRAPPER -->                
@stop