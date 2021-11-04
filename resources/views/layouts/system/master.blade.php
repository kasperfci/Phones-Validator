<!doctype html>
<html lang="en">

@include('components.system.head')




<body class="hold-transition sidebar-mini layout-fixed">




<!-- Loading starts -->

<!-- Loading ends -->
@include('components.system.navbar')
@include('components.system.sidebar')
<!-- BEGIN .app-wrap -->
 <div class="wrapper">
     
    	<div class="content-wrapper" id="sound_div">
		
		


    		@include('components.system.heading')
            @yield('content')
        </div>    

    <!-- END: .app-container -->
    @include('components.system.footer')
</div>
<!-- END: .app-wrap -->

@include('components.system.script')



</body>

</html>