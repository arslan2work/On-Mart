<nav class="sidebar " id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{asset('backend/assets/images/faces/face8.jpg')}}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            
            <p class="profile-name">{{ucfirst(auth('admin')->user()->full_name)}}</p>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Banner Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('banner.index')}}">All Banners</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('banner.create')}}">Add Banners</a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Category Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('category.index')}}">All Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('category.create')}}">Add Categories</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Brand Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('brand.index')}}">All Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('brand.create')}}">Add Brands</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Products Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic5">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('product.index')}}">All Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('product.create')}}">Add Products</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Users Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic4">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.index')}}">All Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.create')}}">Add User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Coupon Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic5">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('coupon.index')}}">All Coupon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('coupon.create')}}">Add Coupon</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Shipping Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic6">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('shipping.index')}}">All Shippings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shipping.create')}}">Add Shipping</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Currency Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic7">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('currency.index')}}">All Currencies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('currency.create')}}">Add Currency</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Order Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('seller.index')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Seller Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Review Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>





    </ul>
  </nav>