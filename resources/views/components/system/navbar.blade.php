<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     

       @if(isset($path))
        @foreach($path as $part)
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ $part->link }}" class="nav-link">{{ shortText($part->title, 50) }}</a>
          </li>
        @endforeach
      @endif
        <li class="nav-item d-none d-sm-inline-block">
          <span href="#" class="nav-link">@yield('title')</span>
        </li>


    </ul>

    
  </nav>

   
   
  