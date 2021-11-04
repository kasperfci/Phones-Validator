<!doctype html>
<html lang="en">

@include('components.website.head')





<body>
 
<!-- Loading starts -->

<!-- Loading ends -->

<!-- BEGIN .app-wrap -->
<div id="page">
    @if(isset($website)&&$website->canShowHeader())
    	@include('components.website.header')
    @endif	
  
    @yield('content')

    @if(isset($website)&&$website->canShowFooter())
    	@include('components.website.footer')
   	@endif 	
</div>
<!-- END: .app-wrap -->

@include('components.website.script')



</body>

</html>