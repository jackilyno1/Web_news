<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-decoration: none" href="/dashboard" class="brand-link">
      <img src="{{url('template/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('template/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" style="text-decoration: none" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group">
            <input type="search" name="keywords" class="form-control" 
            placeholder="Search keywords" value="{{request()->keywords}}">
          <div class="input-group-append">
            <button type="submit" class="btn btn- btn-block">
              <i class=" nav-icon fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa fa-address-book" aria-hidden="true"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cate.addCate')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cate.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa fa-table" aria-hidden="true"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.addPost')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Posts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class=" nav-icon fa fa-user-circle-o" aria-hidden="true"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.addUser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="{{ route('admin.login') }}">
              <i class=" nav-icon fa fa-sign-out" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>