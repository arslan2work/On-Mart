
                                  @foreach ($products as $item)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 grid-view-item style2 item">
                                        <div class="grid-view_image">
                                            <!-- start product image -->
                                            <a href="product-accordion.html" class="grid-view-item__link">
                                                @php
                                                 $photo =  explode(',', $item->photo);   
                                                @endphp
                                                <!-- image -->
                                                <img class="grid-view-item__image primary blur-up lazyload" data-src="" src="{{$photo[0]}}" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="grid-view-item__image hover blur-up lazyload" data-src="" src="{{$photo[0]}}" alt="image" title="product">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span class="lbl on-sale">-{{$item->discount}}% <span class="lbl pr-label1">{{$item->conditions}}</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->
                                            
                                            <!--start product details -->
                                            <div class="product-details hoverDetails text-center mobile">
                                                <!-- product name -->
                                                <div class="brand-name">
                                                    <a href="#">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="{{route('product.detail', $item->slug)}}">{{$item->title}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">${{$item->price}}</span>
                                                    <span class="price">${{$item->offer_price}}</span>
                                                </div>
                                                <!-- End product price -->
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                                <!-- product button -->
                                                <div class="button-set">
                                                    <a href="#content_quickview" title="Quick View" class="quick-view-popup quick-view" tabindex="0">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <!-- Start product button -->
                                                    <div class="wishlist-btn">
                                                        <a class="btn btn--secondary cartIcon btn-addto-cart add_to_cart"  data-quantity="1" data-product-id="{{$item->id}}" id="add_to_cart{{$item->id}}"  title="Add to Wishlist">
                                                            <i class="icon anm anm-bag-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}" href="javascript:void(0);" title="Add to Wishlist">
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
                                            <!-- End product details -->
                                        </div>
                                    </div>
                                      
                                  @endforeach