<div class="col-12 col-sm-12 col-md-4 col-lg-4">
    <div class="text-center">
        
        @if (auth()->user()->photo)
        <img class="ml-2"  style="width: 100px; border-radius:50%; border-bottom: 4px solid purple" src="{{auth()->user()->photo}}" />
        @else                   
        <img class="ml-2" style="width: 100px; border-radius:50%; border-bottom: 4px solid purple" src="{{Helper::userDefaultImage()}}" />
      @endif
    </div>
    
    <hr />
    <ul class="list--inline site-footer__social-icons social-icons text-center">
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
    </ul>
    <hr />
    <div class="sidebar text-center">
        <div class="sidebar_tags">
            <div class="sidebar_widget categories">
                <div class="widget-content">
                    <ul class="sidebar_categories">
                        <li class="lvl-1 {{\Request::is('user/dashboard') ? 'active' : ''}}"><a href="{{route('user.dashboard')}}" class="site-nav lvl-1"><h3>Dashboard</h3></a></li>
                        <hr />
                        <li class="lvl-1  {{\Request::is('user/account') ? 'active' : ''}}"><a href="{{route('user.account')}}" class="site-nav lvl-1"><h3>Account Details</h3></a></li>
                        <hr />
                        <li class="lvl-1 {{\Request::is('user/order') ? 'active' : ''}}"><a href="{{route('user.order')}}" class="site-nav lvl-1"><h3>My Orders</h3></a></li>
                        <hr />
                        <li class="lvl-1 {{\Request::is('user/address') ? 'active' : ''}}"><a href="{{route('user.address')}}" class="site-nav lvl-1"><h3>Addresses</h3></a></li>
                        <hr />
                        <li class="lvl-1 "><a href="{{route('user.logout')}}" class="site-nav lvl-1"><h3>Logout</h3></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>