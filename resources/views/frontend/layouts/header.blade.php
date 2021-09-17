    <!--Top Header-->
    <div id="header-ajax">
      <div class="top-header">
          <div class="container-fluid">
              <div class="row">
                <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                      <div class="currency-picker">
                        @php
                            Helper::currency_load();
                            $currency_code = session('currency_code');
                            $currency_symbol = session('currency_symbol');

                            if ($currency_symbol == "") {
                              $system_default_currency_info = session('system_default_currency_info');
                              $currency_symbol = $system_default_currency_info->symbol;
                              $currency_code = $system_default_currency_info->code;
                            }
                        @endphp
                          <span class="selected-currency">{{$currency_code}}</span>
                          <ul id="currencies">
                            @foreach (\App\Models\Currency::where('status', 'active')->get() as $currency)
                              <li data-currency="INR" class=""><a style="text-decoration: none" href="javascript:;" onclick="currency_change('{{$currency['code']}}');">{{$currency->code}}</a></li>
                            @endforeach
                          </ul>
                      </div>
                      <div class="language-dropdown">
                          <span class="language-dd">English</span>
                          <ul id="language">
                              <li class="">German</li>
                              <li class="">French</li>
                          </ul>
                      </div>
                      <p class="phone-no"><i class="anm anm-phone-s"></i> +440 0(111) 044 833</p>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                    <div class="text-center"><p class="top-header_middle-text">Welcome to {{\App\Models\Settings::value('title')}}</p></div>
                  </div>
                  <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                    <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                      <ul class="customer-links list-inline">
                          <li><a href="login.html">Login</a></li>
                          <li><a href="register.html">Create Account</a></li>
                          <li><a href="wishlist.html">Wishlist</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!--End Top Header-->
      <!--Header-->
      <div class="header-wrap classicHeader animated d-flex" >
        <div class="container-fluid">        
              <div class="row align-items-center">
                <!--Desktop Logo-->
                  <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                      <a href="{{route('home')}}">
                        <img src="{{asset('frontend/assets/images/On-Mart.png')}}" alt="OnMart" title="OnMart" />
                      </a>
                  </div>
                  <!--End Desktop Logo-->
                  <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                    <div class="d-block d-lg-none">
                          <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                            <i class="icon anm anm-times-l"></i>
                              <i class="anm anm-bars-r"></i>
                          </button>
                      </div>
                    <!--Desktop Menu-->
                    <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                          <ul id="siteNav" class="site-nav medium center hidearrow">
                              <li class="lvl1 parent megamenu"><a href="{{route('home')}}">Home <i class="anm anm-angle-down-l"></i></a>
                              </li>
                              <li class="lvl1 parent megamenu"><a href="{{route('shop')}}">Shop <i class="anm anm-angle-down-l"></i></a>
                              </li>
                          <li class="lvl1 parent megamenu"><a href="#">Product <i class="anm anm-angle-down-l"></i></a>
                            <div class="megamenu style2">
                                  <ul class="grid mmWrapper">
                                      <li class="grid__item one-whole">
                                          <ul class="grid">
                                              <li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1">Product Page</a>
                                                  <ul class="subLinks">
                                                      <li class="lvl-2"><a href="product-layout-1.html" class="site-nav lvl-2">Product Layout 1</a></li>
                                                      <li class="lvl-2"><a href="product-layout-2.html" class="site-nav lvl-2">Product Layout 2</a></li>
                                                      <li class="lvl-2"><a href="product-layout-3.html" class="site-nav lvl-2">Product Layout 3</a></li>
                                                      <li class="lvl-2"><a href="product-with-left-thumbs.html" class="site-nav lvl-2">Product With Left Thumbs</a></li>
                                                      <li class="lvl-2"><a href="product-with-right-thumbs.html" class="site-nav lvl-2">Product With Right Thumbs</a></li>
                                                      <li class="lvl-2"><a href="product-with-bottom-thumbs.html" class="site-nav lvl-2">Product With Bottom Thumbs</a></li>
                                                  </ul>
                                              </li>
                                              </ul>
                                      </li>
                                      <li class="grid__item large-up--one-whole imageCol"><a href="#"><img src="{{asset('frontend/assets/images/megamenu-bg2.jpg')}}" alt=""></a></li>
                                  </ul>
                              </div>
                          </li>
                          <li class="lvl1 parent dropdown"><a href="#">Pages <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                              <li><a href="cart-variant1.html" class="site-nav">Cart Page <i class="anm anm-angle-right-l"></i></a>
                                  <ul class="dropdown">
                                      <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                                      <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                                   </ul>
                              </li>
                              <li><a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-angle-right-l"></i></a>
                                  <ul class="dropdown">
                                      <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                                      <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
                                   </ul>
                              </li>
                <li><a href="checkout.html" class="site-nav">Checkout</a></li>
                              <li><a href="about-us.html" class="site-nav">About Us <span class="lbl nm_label1">New</span> </a></li>
                              <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
                              <li><a href="faqs.html" class="site-nav">FAQs</a></li>
                              <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-angle-right-l"></i></a>
                                <ul>
                                  <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                                  <li><a href="lookbook2.html" class="site-nav">Style 2</a></li>
                                </ul>
                              </li>
                              <li><a href="404.html" class="site-nav">404</a></li>
                              <li><a href="coming-soon.html" class="site-nav">Coming soon <span class="lbl nm_label1">New</span> </a></li>
                            </ul>
                          </li>
                          <li class="lvl1 parent dropdown"><a href="#">Blog <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                              <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                              <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                              <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                              <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
                              <li><a href="blog-article.html" class="site-nav">Article</a></li>
                            </ul>
                          </li>
                          <li class="lvl1"><a href="#"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a></li>
                        </ul>
                      </nav>
                      <!--End Desktop Menu-->
                  </div>
                  <!--Mobile Logo-->
                  <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                    <div class="logo">
                          <a href="index.html">
                              <img src="{{asset('frontend/assets/images/logo.svg')}}" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                          </a>
                      </div>
                  </div>
                  <!--Mobile Logo-->
                  <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                    <div class="site-cart">
                      
                      <a href="javascript:void(0);" style="border: none;cursor: pointer;" class="site-header__cart" title="Cart">
                          <i class="icon anm anm-bag-l"></i>
                          <span class="site-header__cart-count">{{Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                      </a>
                      <a href="#" class="site-header__user ">                  
                          <img class="ml-2" style="max-height: 30px; max-width: 30px; border-radius: 50%;" src="{{Helper::userDefaultImage()}}" />
                      </a>
                      
                        
                          
                          <!--Miniuser Popup-->
                          <div id="header-user" class="block block-cart">
                            <ul class="mini-products-list">
                              @auth
                              @php
                                  $first_name = explode(' ', auth()->user()->full_name);
                              @endphp
                                <li class="item">
                                  <span class="badge badge-success">Hello,</span>   {{$first_name[0]}} !
                                </li>
                                <li class="item">
                                  <a href="{{route('user.dashboard')}}">My Account</a>
                                </li>
                                <li class="item">
                                  <a href="{{route('user.order')}}">Orders List</a>
                                </li>
                                <li class="item">
                                  <a href="#">WishList</a>
                                </li>
                                <li class="item">
                                  <a href="{{route('user.logout')}}">Logout</a>
                                </li>
                              @else
                                <li class="item">
                                  <a href="{{route('user.auth')}}">Login </a>
                                </li>
                                <li class="item">
                                  <a href="{{route('user.register')}}">Register</a>
                                </li>
                              @endauth
                                  
                              </ul>
                          </div>
                          <!--Enduser Popup-->
  
  
  
  
  
  
                          <!--Minicart Popup-->
                          <div id="header-cart" class="block block-cart">
                            <ul class="mini-products-list">
                              @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                <li class="item">
                                    <div class="product-details">
                                      <a class="remove cart_delete" data-id="{{$item->rowId}}"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href="cart.html">{{$item->name}}</a>
                                        <div class="variant-cart">{{$item->size}}</div>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                              <span class="label">Qty:</span>
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="{{$item->qty}}" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                          <div class="product-price">
                                              <span class="money">${{$item->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                              @endforeach
                              </ul>
                              <div class="total">
                                <div class="total-in">
                                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">${{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></span>
                                  <hr>
                                    <span class="label">Cart Total:</span>
                                    @if (session()->has('coupon'))
                                    <span class="product-price"><span class="money">${{number_format((float) str_replace(',','',Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}</span></span>
                                    @else
                                    <span class="product-price"><span class="money">${{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></span>
                                    @endif
                                  </div>
                                   <div class="buttonSet text-center">
                                      <a href="{{route('cart')}}" class="btn btn-secondary btn--small">View Cart</a>
                                      <a href="{{route('checkout1')}}" class="btn btn-secondary btn--small">Checkout</a>
                                  </div>
                              </div>
                          </div>
                          <!--EndMinicart Popup-->
                      </div>
                      <div class="site-header__search">
                        <a type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></a>
                      </div>
                      <div class="site-header__search">
                        <a type="button" href="{{route('wishlist')}}" id="wishlist_counter" class="wish-trigger"><i class="icon anm anm-heart-l"><span class="site-header__wish-count">{{Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}</span></i></a>
                      </div>
                  </div>
            </div>
          </div>
      </div>
      <!--End Header-->
      
          <!--Mobile Menu-->
          <div class="mobile-nav-wrapper" role="navigation">
              <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
              <ul id="MobileNav" class="mobile-nav">
                  <li class="lvl1 parent megamenu"><a href="index.html">Home <i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="#" class="site-nav">Home Group 1<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="index.html" class="site-nav">Home 1 - Classic</a></li>
                      <li><a href="home2-default.html" class="site-nav">Home 2 - Default</a></li>
                      <li><a href="home15-funiture.html" class="site-nav">Home 15 - Furniture </a></li>
                      <li><a href="home3-boxed.html" class="site-nav">Home 3 - Boxed</a></li>
                      <li><a href="home4-fullwidth.html" class="site-nav">Home 4 - Fullwidth</a></li>
                      <li><a href="home5-cosmetic.html" class="site-nav">Home 5 - Cosmetic</a></li>
                      <li><a href="home6-modern.html" class="site-nav">Home 6 - Modern</a></li>
                      <li><a href="home7-shoes.html" class="site-nav last">Home 7 - Shoes</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">Home Group 2<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="home8-jewellery.html" class="site-nav">Home 8 - Jewellery</a></li>
                      <li><a href="home9-parallax.html" class="site-nav">Home 9 - Parallax</a></li>
                      <li><a href="home10-minimal.html" class="site-nav">Home 10 - Minimal</a></li>
                      <li><a href="home11-grid.html" class="site-nav">Home 11 - Grid</a></li>
                      <li><a href="home12-category.html" class="site-nav">Home 12 - Category</a></li>
                      <li><a href="home13-auto-parts.html" class="site-nav">Home 13 - Auto Parts</a></li>
                      <li><a href="home14-bags.html" class="site-nav last">Home 14 - Bags</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">New Sections<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="home11-grid.html" class="site-nav">Image Gallery</a></li>
                      <li><a href="home5-cosmetic.html" class="site-nav">Featured Product</a></li>
                      <li><a href="home7-shoes.html" class="site-nav">Columns with Items</a></li>
                      <li><a href="home6-modern.html" class="site-nav">Text columns with images</a></li>
                      <li><a href="home2-default.html" class="site-nav">Products Carousel</a></li>
                      <li><a href="home9-parallax.html" class="site-nav last">Parallax Banner</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">New Features<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="home13-auto-parts.html" class="site-nav">Top Information Bar </a></li>
                      <li><a href="#" class="site-nav">Age Varification </a></li>
                      <li><a href="#" class="site-nav">Footer Blocks</a></li>
                      <li><a href="#" class="site-nav">2 New Megamenu style</a></li>
                      <li><a href="#" class="site-nav">Show Total Savings </a></li>
                      <li><a href="#" class="site-nav">New Custom Icons</a></li>
                      <li><a href="#" class="site-nav last">Auto Currency</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
                  <li class="lvl1 parent megamenu"><a href="#">Shop <i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="#" class="site-nav">Shop Pages<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="shop-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                      <li><a href="shop-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                      <li><a href="shop-fullwidth.html" class="site-nav">Fullwidth</a></li>
                      <li><a href="shop-grid-3.html" class="site-nav">3 items per row</a></li>
                      <li><a href="shop-grid-4.html" class="site-nav">4 items per row</a></li>
                      <li><a href="shop-grid-5.html" class="site-nav">5 items per row</a></li>
                      <li><a href="shop-grid-6.html" class="site-nav">6 items per row</a></li>
                      <li><a href="shop-grid-7.html" class="site-nav">7 items per row</a></li>
                      <li><a href="shop-listview.html" class="site-nav last">Product Listview</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">Shop Features<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="shop-left-sidebar.html" class="site-nav">Product Countdown </a></li>
                      <li><a href="shop-right-sidebar.html" class="site-nav">Infinite Scrolling</a></li>
                      <li><a href="shop-grid-3.html" class="site-nav">Pagination - Classic</a></li>
                      <li><a href="shop-grid-6.html" class="site-nav">Pagination - Load More</a></li>
                      <li><a href="product-labels.html" class="site-nav">Dynamic Product Labels</a></li>
                      <li><a href="product-swatches-style.html" class="site-nav">Product Swatches </a></li>
                      <li><a href="product-hover-info.html" class="site-nav">Product Hover Info</a></li>
                      <li><a href="shop-grid-3.html" class="site-nav">Product Reviews</a></li>
                      <li><a href="shop-left-sidebar.html" class="site-nav last">Discount Label </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
                  <li class="lvl1 parent megamenu"><a href="product-layout-1.html">Product <i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="product-layout-1.html" class="site-nav">Product Page<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="product-layout-1.html" class="site-nav">Product Layout 1</a></li>
                      <li><a href="product-layout-2.html" class="site-nav">Product Layout 2</a></li>
                      <li><a href="product-layout-3.html" class="site-nav">Product Layout 3</a></li>
                      <li><a href="product-with-left-thumbs.html" class="site-nav">Product With Left Thumbs</a></li>
                      <li><a href="product-with-right-thumbs.html" class="site-nav">Product With Right Thumbs</a></li>
                      <li><a href="product-with-bottom-thumbs.html" class="site-nav last">Product With Bottom Thumbs</a></li>
                    </ul>
                  </li>
                  <li><a href="short-description.html" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="short-description.html" class="site-nav">Short Description</a></li>
                      <li><a href="product-countdown.html" class="site-nav">Product Countdown</a></li>
                      <li><a href="product-video.html" class="site-nav">Product Video</a></li>
                      <li><a href="product-quantity-message.html" class="site-nav">Product Quantity Message</a></li>
                      <li><a href="product-visitor-sold-count.html" class="site-nav">Product Visitor/Sold Count </a></li>
                      <li><a href="product-zoom-lightbox.html" class="site-nav last">Product Zoom/Lightbox </a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="product-with-variant-image.html" class="site-nav">Product with Variant Image</a></li>
                      <li><a href="product-with-color-swatch.html" class="site-nav">Product with Color Swatch</a></li>
                      <li><a href="product-with-image-swatch.html" class="site-nav">Product with Image Swatch</a></li>
                      <li><a href="product-with-dropdown.html" class="site-nav">Product with Dropdown</a></li>
                      <li><a href="product-with-rounded-square.html" class="site-nav">Product with Rounded Square</a></li>
                      <li><a href="swatches-style.html" class="site-nav last">Product Swatches All Style</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="site-nav">Product Features<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="product-accordion.html" class="site-nav">Product Accordion</a></li>
                      <li><a href="product-pre-orders.html" class="site-nav">Product Pre-orders </a></li>
                      <li><a href="product-labels-detail.html" class="site-nav">Product Labels</a></li>
                      <li><a href="product-discount.html" class="site-nav">Product Discount In %</a></li>
                      <li><a href="product-shipping-message.html" class="site-nav">Product Shipping Message</a></li>
                      <li><a href="product-shipping-message.html" class="site-nav last">Size Guide </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
                  <li class="lvl1 parent megamenu"><a href="about-us.html">Pages <i class="anm anm-plus-l"></i></a>
                <ul>
                    <li><a href="cart-variant1.html" class="site-nav">Cart Page <i class="anm anm-plus-l"></i></a>
                      <ul class="dropdown">
                          <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                          <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
                       </ul>
                  </li>
                  <li><a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-plus-l"></i></a>
                      <ul class="dropdown">
                          <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                          <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
                       </ul>
                  </li>
                  <li><a href="checkout.html" class="site-nav">Checkout</a></li>
                  <li><a href="checkout.html" class="site-nav">Checkout</a></li>
                  <li><a href="about-us.html" class="site-nav">About Us<span class="lbl nm_label1">New</span></a></li>
                  <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
                  <li><a href="faqs.html" class="site-nav">FAQs</a></li>
                  <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-plus-l"></i></a>
                    <ul>
                      <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                      <li><a href="lookbook2.html" class="site-nav last">Style 2</a></li>
                    </ul>
                  </li>
                  <li><a href="404.html" class="site-nav">404</a></li>
                  <li><a href="coming-soon.html" class="site-nav">Coming soon<span class="lbl nm_label1">New</span></a></li>
                </ul>
              </li>
                  <li class="lvl1 parent megamenu"><a href="blog-left-sidebar.html">Blog <i class="anm anm-plus-l"></i></a>
                <ul>
                  <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                  <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                  <li><a href="blog-fullwidth.html" class="site-nav">Fullwidth</a></li>
                  <li><a href="blog-grid-view.html" class="site-nav">Gridview</a></li>
                  <li><a href="blog-article.html" class="site-nav">Article</a></li>
                </ul>
              </li>
                  <li class="lvl1"><a href="#"><b>Buy Now!</b></a>
              </li>
            </ul>
          </div>
          <!--End Mobile Menu-->

    </div>