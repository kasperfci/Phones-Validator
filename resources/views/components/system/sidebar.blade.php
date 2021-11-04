<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
     
      <span class="brand-text font-weight-light">Jumia Task </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/assets/system/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link active ">
              <i class="nav-icon far fa fa-cog"></i>
              <p>Cutsomers List</p>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>