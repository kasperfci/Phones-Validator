 <nav class="top-bg">
      <div class="nav-wrapper container">
        <a id="logo-container" href="{{route('home')}}" class="brand-logo"><img src="/assets/site/images/logo.png"></a>

        <div class="lan"><label class="">Language:</label>   
          &nbsp;
          <a class="active-eng" href="javascript:window.location.href='index.html'">English</a> &nbsp; <a style="font-size:13px !important" class="" href="javascript:window.location.href='index.html'">عربي</a>
        </div>


        <div class="fh5co-nav" role="navigation">
          <div class="top-menu">
            <div class="col s10 text-right menu-1">
              <ul>
                <!-- <li class="active"><a href="index.html">Home</a></li> -->
                <li class="active"><a href="{{route('home')}}">HOME</a></li>
            <li class=""><a href="{{route('website_pages',['pageTitle'=>'about-us'])}}">ABOUT US</a></li>
            <li class=""><a href="{{route('stores')}}">STORES</a></li>
            <li class=""><a href="{{route('menu')}}">MENU</a></li>
            <li class="has-dropdown "> <a href="page/contact-us.html">CONTACT US</a> <span><i class="fa fa-chevron-down" aria-hidden="true" ></i></span>
              <ul class="dropdown">
                <li><a href="page/career.html">Career</a></li>
                <li><a href="page/franchise.html">Franchise</a></li>
                <li><a href="page/feedback.html">Feedback</a></li>
              </ul>
            </li>
            <li class="top-link login_btn dummyClassForMobile"> <a class="waves-effect waves-light modal-trigger" onclick="checkCustomerLogin();">MEMBERSHIP PROGRAM <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> </li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>