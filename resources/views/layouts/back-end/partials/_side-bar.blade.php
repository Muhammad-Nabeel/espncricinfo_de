<div class="custom-menu">
  <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
  </button>
</div>
<div class="p-4">
  <h5>
    <a href="/" class="logo" style="color:white;">ESPN CRICINFO <br /> <span> Admin Dashboard</span>
    </a>
  </h5>
  <ul class="list-unstyled components mb-5">
  <li class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}">
  <a href="{{ route('admin.dashboard') }}">
    <span class="fa fa-home mr-3"></span> Home
  </a>
</li>
<li class="{{ Route::currentRouteName() === 'admin.add_post' ? 'active' : '' }}">
  <a href="{{ route('admin.add_post') }}">
    <span class="fa fa-user mr-3"></span> Add Post
  </a>
</li>
<li class="{{ Route::currentRouteName() === 'admin.add_post' ? 'active' : '' }}">
  <a href="{{ route('admin.post_list') }}">
    <span class="fa fa-user mr-3"></span> Post List
  </a>
</li>
<li>
  <a href="{{ route('admin.auth.logout') }}">
    <span class="fa fa-briefcase mr-3"></span> Logout
  </a>
</li>

  </ul>
</div>