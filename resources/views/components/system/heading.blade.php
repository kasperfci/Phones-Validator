<section style="margin-bottom: 15px">
  <header class="main-heading" >
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-8 col-4">
                <div class="page-icon" >
                    <i class="@yield('titleicon')"></i>
                </div>
                <div class="page-title">
                    <h5>@yield('title')</h5>
                    <h6 class="sub-heading" >@yield('subtitle')</h6>
                </div>
            </div>
            @if (trim($__env->yieldContent('actiontitle')))
            <div class="col-md-2 col-4">
                <div class="right-actions" >
                    <a href="@yield('actionlink')" class="btn btn-@yield('actiontype', 'primary') float-right">
                        <i class="@yield('actionicon')"></i> @yield('actiontitle')
                    </a>
                </div>
            </div>
            @endif
            @yield('advancedaction')
        </div>
    </div>
  </header> 
 </section>

<!-- END: .main-heading -->
<!-- END: .main-heading -->

