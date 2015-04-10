@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Organizations</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">                        
                <div class="page-title">                            
                    <h1><a href="/organizations">ORGANIZATIONS</a></h1>               
                </div>
            </div>
        </div>                

        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">
                
                <div class="row">                        
                    <div class="col-md-12">                        
                        <div class="row">
                            @foreach($orgs as $org)
                            <div class="col-md-4">                                
                                <div class="blog-item this-animate" data-animate="fadeInUp">
                                    <div class="blog-media">
                                        @if($org->image1 != null)
                                            <a href="/organizations/details/{{$org->id}}"><img src="/images/org/{{$org->image1}}" class="img-responsive"/></a>
                                        @endif
                                    </div>
                                    <div class="blog-data">
                                        <h5><a href="/organizations/details/{{$org->id}}">{{$org->title}}</a></h5>
                                        {!! html_entity_decode($org->read_more) !!}                                        
                                    </div>
                                </div>                                
                            </div>
                            @endforeach
                        </div>


                        <ul class="pagination pagination-sm pull-right">
                            {!! html_entity_decode($orgs->render()) !!}
                        </ul>                        
                    </div>

                    <!-- <div class="col-md-3">                          
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('layouts.sidebar')                            
                        </div>                            
                    </div> -->
                </div>                        
            </div>
        </div>
    </div>
@stop