<div class="custom-menu">
  <button type="button" id="sidebarCollapse" class="btn btn-primary">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle Menu</span>
  </button>
</div>
<div class="p-4">
  <h1>
    <a href="/" class="logo">JNK WWE <span> Admin Dashboard</span>
    </a>
  </h1>
  <ul class="list-unstyled components mb-5">
  <li class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}">
  <a href="{{ route('admin.dashboard') }}">
    <span class="fa fa-home mr-3"></span> Home
  </a>
</li>
<li class="{{ Route::currentRouteName() === 'admin.add_shipment' ? 'active' : '' }}">
  <a href="{{ route('admin.add_shipment') }}">
    <span class="fa fa-user mr-3"></span> Add Shipment
  </a>
</li>
<li class="{{ Route::currentRouteName() === 'admin.update_shipment' ? 'active' : '' }}">
  <a href="{{ route('admin.update_shipment') }}">
    <span class="fa fa-briefcase mr-3"></span> Update Shipment
  </a>
</li>
<li>
  <a href="{{ route('admin.auth.logout') }}">
    <span class="fa fa-briefcase mr-3"></span> Logout
  </a>
</li>

  </ul>
</div>