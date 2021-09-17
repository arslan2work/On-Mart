@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
        <div id="page-content" style="margin-top: 70px;">
            <!--Collection Banner-->
            <div class="collection-header">
                <div class="collection-hero">
                    <div class="collection-hero__image"><img class="blur-up lazyload"  src="{{asset('frontend/assets/images/cat-women.jpg')}}" alt="Women" title="Women" /></div>
                    <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Browse our shop</h1></div>
                  </div>
            </div>
            <!--End Collection Banner-->
            
            <div class="container">
                <form action="{{route('shop.filter')}}" method="POST">
                @csrf
                    <div class="row">
                        <!--Sidebar-->
                        
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                            <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                            
                                <div class="sidebar_tags">
                                    <!--Categories-->
                                    @if(count($cats) > 0)
                                    <div class="sidebar_widget filterBox filter-widget">
                                        <div class="widget-title"><h2>Categories</h2></div>
                                        <ul>
                                            @if (!empty($_GET['category']))
                                                    @php
                                                        $filter_cats = explode(',', $_GET['category'])
                                                    @endphp
                                            @endif
                                            @foreach ($cats as $cat)
                                                <li>
                                                    <input type="checkbox" @if(!empty($filter_cats) && in_array($cat->slug, $filter_cats)) checked @endif id="{{$cat->slug}}" name="category[]" onchange="this.form.submit()" value="{{$cat->slug}}">
                                                    <label for="{{$cat->slug}}"><span><span></span></span>{{ucfirst($cat->title)}}<samp class="text-muted">({{count($cat->products)}})</samp></label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{-- <div class="sidebar_widget categories filter-widget">
                                        <div class="widget-title"><h2>Categories</h2></div>
                                        <div class="widget-content">
                                            <ul class="sidebar_categories">
                                                @if (!empty($_GET['category']))
                                                    @php
                                                        $filter_cats = explode(',', $_GET['category'])
                                                    @endphp
                                                @endif
                                                @foreach ($cats as $cat)
                                                <li class="lvl-1">
                                                    <input type="checkbox" @if(!empty($filter_cats) && in_array($cat->slug, $filter_cats)) checked @endif id="{{$cat->slug}}" name="category[]" onchange="this.form.submit()" value="{{$cat->slug}}">
                                                    <label for="{{$cat->slug}}" class="site-nav ml-1" style="font-size: 15px;">{{ucfirst($cat->title)}}<span class="text-muted">({{count($cat->products)}})</span></label>
                                                </li>
                                                    
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> --}}
                                    @endif
                                    
                                    <!--Categories-->
                                    <!--Price Filter-->
                                    <div class="sidebar_widget filterBox filter-widget slider-range">
                                        <div class="widget-title">
                                            <h2>Price</h2>
                                        </div>
                                            <div id="slider-range" data-min="{{Helper::minPrice()}}" data-max="{{Helper::maxPrice()}}" data-unit="$" data-value-min="{{Helper::minPrice()}}" data-value-min="{{Helper::maxPrice()}}" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="no-margin">
                                                        @if (!empty($_GET['price']))
                                                            @php
                                                                $price = explode('-',$_GET['price']);
                                                            @endphp
                                                        @endif
                                                        {{-- <input id="amount" name="price_range" type="hidden" hidden> --}}
                                                        {{-- <input type="text" id="amount" readonly value="@if(!empty($_GET['price'])) {{$price[0]}} @else {{Helper::minPrice}} @endif - @if(!empty($_GET['price'])) {{$price[1]}} @else {{Helper::maxPrice}} @endif"> --}}
                                                        <input type="hidden" id="price_range" value="@if(!empty($_GET['price'])) {{$_GET['price']}} @endif" name="price_range">
                                                        <input type="text" readonly id="amount" value="$@if(!empty($_GET['price'])) {{$price[0]}} @else {{Helper::minPrice()}} @endif - @if(!empty($_GET['price'])) {{$price[1]}} @else {{Helper::maxPrice()}} @endif">
                                                    </p>
                                                </div>
                                                <div class="col-6 text-right margin-25px-top">
                                                    <button type="submit" class="btn btn-secondary btn--small">filter</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <!--End Price Filter-->
                                    <!--Size Swatches-->
                                    <div class="sidebar_widget  filter-widget size-swacthes">
                                        <div class="widget-title"><h2>Size</h2></div>
                                        <div class="filter-color swacth-list">
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="checkbox" @if (!empty($_GET['size']) && $_GET['size'] == 'S') checked @endif name="size" value="S" onchange="this.form.submit()">
                                                    <label for="checkbox"><span>S</span></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="checkbox" @if (!empty($_GET['size']) && $_GET['size'] == 'M') checked @endif name="size" value="M" onchange="this.form.submit()">
                                                    <label for="checkbox"><span>M</span></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="checkbox" @if (!empty($_GET['size']) && $_GET['size'] == 'L') checked @endif name="size" value="L" onchange="this.form.submit()">
                                                    <label for="checkbox"><span>L</span></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--End Size Swatches-->
                                    <!--Color Swatches-->
                                    <div class="sidebar_widget filterBox filter-widget">
                                        <div class="widget-title"><h2>Color</h2></div>
                                        <div class="filter-color swacth-list clearfix">
                                            <span class="swacth-btn black"></span>
                                            <span class="swacth-btn white checked"></span>
                                            <span class="swacth-btn red"></span>
                                            <span class="swacth-btn blue"></span>
                                            <span class="swacth-btn pink"></span>
                                            <span class="swacth-btn gray"></span>
                                            <span class="swacth-btn green"></span>
                                            <span class="swacth-btn orange"></span>
                                            <span class="swacth-btn yellow"></span>
                                            <span class="swacth-btn blueviolet"></span>
                                            <span class="swacth-btn brown"></span>
                                            <span class="swacth-btn darkGoldenRod"></span> 
                                            <span class="swacth-btn darkGreen"></span> 
                                            <span class="swacth-btn darkRed"></span> 
                                            <span class="swacth-btn dimGrey"></span>
                                            <span class="swacth-btn khaki"></span> 
                                        </div>
                                    </div>
                                    <!--End Color Swatches-->
                                    <!--Brand-->
                                    @if (count($brands) > 0)
                                        <div class="sidebar_widget filterBox filter-widget">
                                            <div class="widget-title"><h2>Brands</h2></div>
                                            <ul>
                                                @if (!empty($_GET['brand']))
                                                    @php
                                                        $filter_brands = explode(',', $_GET['brand'])
                                                    @endphp
                                            @endif
                                                @foreach ($brands as $brand)
                                                <li>
                                                    <input type="checkbox" id="{{$brand->slug}}" name="brand[]" @if(!empty($filter_brands) && in_array($brand->slug, $filter_brands)) checked @endif value="{{$brand->slug}}" onchange="this.form.submit()">
                                                    <label for="{{$brand->slug}}"><span><span></span></span>{{ucfirst($brand->title)}}<samp class="text-muted">({{count($brand->products)}})</samp></label>
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    @endif
                                    
                                    <!--End Brand-->
                                    <!--Popular Products-->
                                    <div class="sidebar_widget">
                                        <div class="widget-title"><h2>Popular Products</h2></div>
                                        <div class="widget-content">
                                            <div class="list list-sidebar-products">
                                            <div class="grid">
                                                <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image">
                                                        <a class="grid-view-item__link" href="#">
                                                            <img class="grid-view-item__image" src="assets/images/product-images/mini-product-img.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="details"> <a class="grid-view-item__title" href="#">Cena Skirt</a>
                                                    <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">$173.60</span></span></div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img class="grid-view-item__image" src="assets/images/product-images/mini-product-img1.jpg" alt="" /></a> </div>
                                                    <div class="details"> <a class="grid-view-item__title" href="#">Block Button Up</a>
                                                    <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">$378.00</span></span></div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img class="grid-view-item__image" src="assets/images/product-images/mini-product-img2.jpg" alt="" /></a> </div>
                                                    <div class="details"> <a class="grid-view-item__title" href="#">Balda Button Pant</a>
                                                    <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">$278.60</span></span></div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="grid__item">
                                                <div class="mini-list-item">
                                                    <div class="mini-view_image"> <a class="grid-view-item__link" href="#"><img class="grid-view-item__image" src="assets/images/product-images/mini-product-img3.jpg" alt="" /></a> </div>
                                                    <div class="details"> <a class="grid-view-item__title" href="#">Border Dress in Black/Silver</a>
                                                    <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">$228.00</span></span></div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Popular Products-->
                                    <!--Banner-->
                                    <div class="sidebar_widget static-banner">
                                        <img src="assets/images/side-banner-2.jpg" alt="" />
                                    </div>
                                    <!--Banner-->
                                    <!--Information-->
                                    <div class="sidebar_widget">
                                        <div class="widget-title"><h2>Information</h2></div>
                                        <div class="widget-content"><p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p></div>
                                    </div>
                                    <!--end Information-->
                                    <!--Product Tags-->
                                    <div class="sidebar_widget">
                                    <div class="widget-title">
                                        <h2>Product Tags</h2>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="product-tags">
                                        <li><a href="#" title="Show products matching tag $100 - $400">$100 - $400</a></li>
                                        <li><a href="#" title="Show products matching tag $400 - $600">$400 - $600</a></li>
                                        <li><a href="#" title="Show products matching tag $600 - $800">$600 - $800</a></li>
                                        <li><a href="#" title="Show products matching tag Above $800">Above $800</a></li>
                                        <li><a href="#" title="Show products matching tag Allen Vela">Allen Vela</a></li>
                                        <li><a href="#" title="Show products matching tag Black">Black</a></li>
                                        <li><a href="#" title="Show products matching tag Blue">Blue</a></li>
                                        <li><a href="#" title="Show products matching tag Cantitate">Cantitate</a></li>
                                        <li><a href="#" title="Show products matching tag Famiza">Famiza</a></li>
                                        <li><a href="#" title="Show products matching tag Gray">Gray</a></li>
                                        <li><a href="#" title="Show products matching tag Green">Green</a></li>
                                        <li><a href="#" title="Show products matching tag Hot">Hot</a></li>
                                        <li><a href="#" title="Show products matching tag jean shop">jean shop</a></li>
                                        <li><a href="#" title="Show products matching tag jesse kamm">jesse kamm</a></li>
                                        <li><a href="#" title="Show products matching tag L">L</a></li>
                                        <li><a href="#" title="Show products matching tag Lardini">Lardini</a></li>
                                        <li><a href="#" title="Show products matching tag lareida">lareida</a></li>
                                        <li><a href="#" title="Show products matching tag Lirisla">Lirisla</a></li>
                                        <li><a href="#" title="Show products matching tag M">M</a></li>
                                        <li><a href="#" title="Show products matching tag mini-dress">mini-dress</a></li>
                                        <li><a href="#" title="Show products matching tag Monark">Monark</a></li>
                                        <li><a href="#" title="Show products matching tag Navy">Navy</a></li>
                                        <li><a href="#" title="Show products matching tag new">new</a></li>
                                        <li><a href="#" title="Show products matching tag new arrivals">new arrivals</a></li>
                                        <li><a href="#" title="Show products matching tag Orange">Orange</a></li>
                                        <li><a href="#" title="Show products matching tag oxford">oxford</a></li>
                                        <li><a href="#" title="Show products matching tag Oxymat">Oxymat</a></li>
                                        </ul>
                                        <span class="btn btn--small btnview">View all</span> </div>
                                    </div>
                                    <!--end Product Tags-->
                                </div>
                            </form>
                        </div>
                        <!--End Sidebar-->
                        <!--Main Content-->
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                            <div class="category-description">
                                <h3>Category Description</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                            </div>
                            <hr>
                            <div class="productList product-load-more">
                                <!--Toolbar-->
                                <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                                <div class="toolbar">
                                    <div class="filters-toolbar-wrapper">
                                        <div class="row">
                                            <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                                <a href="shop-left-sidebar.html" title="Grid View" class="change-view change-view--active">
                                                    <img src="{{asset('frontend/assets/images/grid.jpg')}}" alt="Grid" />
                                                </a>
                                                <a href="shop-listview.html" title="List View" class="change-view">
                                                    <img src="{{asset('frontend/assets/images/list.jpg')}}" alt="List" />
                                                </a>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                                <span class="filters-toolbar__product-count">Showing: {{count($products)}}</span>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 text-right">
                                                <div class="filters-toolbar__item">
                                                    <select name="sortBy" onchange="this.form.submit()" class="filters-toolbar__input filters-toolbar__input--sort">
                                                        <option selected="selected" value=" ">Default Sort</option>
                                                        <option value="priceAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceAsc') selected @endif>Price - Lower To Higher</option>
                                                        <option value="priceDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='priceDesc') selected @endif>Price - Higher To Lower</option>
                                                        <option value="discAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discAsc') selected @endif>Discount - Lower To Higher</option>
                                                        <option value="discDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='discDesc') selected @endif>Discount - Higher To Lower</option>
                                                        <option value="titleAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleAsc') selected @endif>Alphabetical Ascending</option>
                                                        <option value="titleDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='titleDesc') selected @endif>Alphabetical Descending</option>
                                                    </select>
                                                    <input class="collection-header__default-sort" type="hidden" value="manual">
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                                {{-- <!--End Toolbar--> Done Done --}}
                                <div class="grid-products grid--view-items">
                                    <div class="row">
                                        @if (count($products) > 0)
                                        @foreach ($products as $item)
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="#">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" src="{{$item->photo}}">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"  src="{{$item->photo}}">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span class="lbl on-sale">-{{$item->discount}}%</span> <span class="lbl pr-label1">{{$item->conditions}}</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->
                                                
                                                <!-- countdown start -->
                                                <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                <!-- countdown end -->
            
                                                <!-- Start product button -->
                                                <div class="variants add" >
                                                    <button class="btn btn-addto-cart" type="button">Add to cart</button>
                                                </div>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
            
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="{{route('product.detail', $item->slug)}}">{{ucfirst($item->title)}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">${{$item->offer_price}}</span>
                                                    <span class="price">${{$item->price}}</span>
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                            <!-- countdown start -->
                                            <div class="timermobile"><div class="saleTime desktop" data-countdown="2022/03/01"></div></div>
                                            <!-- countdown end -->
                                        </div>
                                        @endforeach
                                    

                                        @else
                                        <p>No Products found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{$products->appends($_GET)->links('vendor.pagination.custom')}}
                        </div>
                        
                        <!--End Main Content-->
                    </div>
                </form>
            </div>
            
        </div>
        <!--End Body Content-->
@endsection

@section('scripts')
        {{-- <script>
            function price_slider(){
            $("#slider-range").slider({
                range: true,
                min: {{Helper::minPrice()}},
                max: {{Helper::maxPrice()}},
                values: [{{Helper::minPrice()}}, {{Helper::maxPrice()}}],
                slide: function(event, ui) {
                    $("#amount").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            $("#amount").val($("#slider-range").slider("values", 0) +
            "-" + $("#slider-range").slider("values", 1));
        }
        price_slider();
        </script> --}}
        <script>
            $(document).ready(function() {
                if ($("#slider-range").length > 0 ) {
                    const max_value = parseInt($('#slider-range').data('max')) || 500;
                    const min_value = parseInt($('#slider-range').data('min')) || 0;
                    const currency = $("#slider-range").data('currency') || '';
                    let price_range = min_value + '-' + max_value;

                    if ($("#price_range").length > 0 && $('#price_range').val()) {
                        price_range = $("#price_range").val().trim();
                    } 
                    let price = price_range.split('-');
                    $('#slider-range').slider({
                        range:true,
                        min:min_value,
                        max:max_value,
                        values:price,
                        slide: function (event, ui) {
                            $('#amount').val('$' + ui.values[0] + '-' + '$' + ui.values[1])
                            $('#price_range').val(ui.values[0] + '-' + ui.values[1])
                        }
                    })
                        
                    
                }
            })
        </script>
@endsection