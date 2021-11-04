@extends('layouts.website.master')

@section('title')
@lang('tr.error')
@stop

@section('pagecss')

@stop

@section('content')
  
  <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <div class="gf-menu-device-wrapper">
      <div class="close-menu">x</div>
      <div class="gf-menu-device-container"></div>
    </div>             
  </nav>
  
  <!--<div class="se-pre-con"></div> -->
  <div id="PageContainer"></div>   
  <div class="quick-view"></div>  
   

    	<div class="error-screen">
		    <h1 style="color: red;text-align: center;">{{ $code }}  </h1>
		    <h5 style="color: red;text-align: center;">@lang("tr.$message" ) </h5>
		    <a href="{{ route('home') }}" class="btn btn-info " style="position: relative;left: 550px;margin-bottom: 10px">@lang('tr.backToHomePage')</a>
		</div>

@stop

@section('pagejs')
 

@stop