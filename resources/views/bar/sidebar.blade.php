<aside class="main-sidebar sidebar-dark-primary elevation-2">
  <!-- Brand Logo -->
  <a href="/question" class="brand-link">
    <img src="{{asset('/adminlte/dist/img/AdminLTELogo.png')}}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">BanyakTanya.com</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> {{Auth::user()->name}} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Questions
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/question/create" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ask</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/question" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Questions</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Tags
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/tag/create" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Tag</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tag" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tags</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" 
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">

            <p>{{ __('Logout') }}</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>