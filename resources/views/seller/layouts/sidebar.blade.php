<nav class="sidebar " id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{asset('backend/assets/images/faces/face8.jpg')}}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ucfirst(auth('seller')->user()->full_name)}}<span>@if (auth('seller')->user()->is_verified) <i class="fa fa-check-circle text-success" data-toggle="tooltip" title="Verified" data-placement="bottom" aria-hidden="true"></i> @else <i class="fa fa-times-circle text-danger" data-toggle="tooltip" title="Unverified" data-placement="bottom" aria-hidden="true"></i> @endif</span></p>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('seller')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Products Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('seller-product.index')}}">All Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('seller-product.create')}}">Add Products</a>
            </li>
          </ul>
        </div>
      </li>





    </ul>
  </nav>