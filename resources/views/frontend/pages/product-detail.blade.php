@extends('frontend.layouts.master')

@section('content')
            <!--Body Content-->
            <div id="page-content">
                <!--MainContent-->
                <div id="MainContent" class="main-content" style="padding-top: 70px" role="main">
                    <!--Breadcrumb-->
                    <div class="bredcrumbWrap">
                        <div class="container breadcrumbs">
                            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Product Layout Style1</span>
                        </div>
                    </div>
                    <!--End Breadcrumb-->
                    
                    <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                        <!--product-single-->
                        <div class="product-single">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product-details-img">
                                        <div class="product-thumb">
                                            <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                                @php
                                                    $photos = explode(',',$product->photo)
                                                @endphp
                                                @foreach ($photos as $photo)
                                                    <a data-image="{{$product->photo}}" data-zoom-image="{{$product->photo}}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                                        <img class="blur-up lazyload" data-src="{{$product->photo}}" src="{{$product->photo}}" alt="" />
                                                    </a>
                                                    
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                        <div class="zoompro-wrap product-zoom-right pl-20">
                                            <div class="zoompro-span">
                                                <img class="blur-up lazyload zoompro" data-zoom-image="{{$product->photo}}" alt="" src="{{$product->photo}}" />
                                            </div>
                                            <div class="product-labels"><span class="lbl on-sale">Sale</span><span class="lbl pr-label1">{{$product->conditions}}</span></div>
                                            <div class="product-buttons">
                                                <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a>
                                                <a href="#" class="btn prlightbox" title="Zoom"><i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-single__meta">
                                            <h1 class="product-single__title">{{$product->title}}</h1>
                                            <div class="product-nav clearfix">					
                                                <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="prInfoRow">
                                                <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                                <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                                <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div>
                                            </div>
                                            <p class="product-single__price product-single__price-product-template">
                                                <span class="visually-hidden">Regular price</span>
                                                <s id="ComparePrice-product-template"><span class="money">${{$product->price}}</span></s>
                                                <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                    <span id="ProductPrice-product-template"><span class="money">${{$product->offer_price}}</span></span>
                                                </span>
                                                <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                                    <span>You Save</span>
                                                    <span id="SaveAmount-product-template" class="product-single__save-amount">
                                                    <span class="money">$100.00</span>
                                                    </span>
                                                    <span class="off">(<span>{{$product->discount}}</span>%)</span>
                                                </span>  
                                            </p>
                                            <div class="orderMsg" data-user="23" data-time="24">
                                                <img src="assets/images/order-icon.jpg" alt="" /> <strong class="items">5</strong> sold in last <strong class="time">26</strong> hours</div>
                                            </div>
                                        <div class="product-single__description rte">
                                            <ul>
                                                <li>{{$product->description}}</li>
                                                <li>{{$product->summary}}</li>
                                            </ul>
                                        </div>
                                        <div id="quantity_message">Hurry! Only  <span class="items">4</span>  left in stock.</div>
                                        <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                <div class="product-form__item">
                                                  <label class="header">Color: <span class="slVariant">Black</span></label>
                                                  <div data-value="Red" class="swatch-element color red available">
                                                    <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url({{$product->photo}});" title="Red"></label>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                <div class="product-form__item">
                                                  <label class="header">Size Guide</label>
                                                  @php
                                                      $size_guide = explode(',',$product->size_guide);
                                                  @endphp
                                                  @foreach ($size_guide as $sg)
                                                    <div data-value="Red" class="swatch-element color red available">
                                                        <a class="swatchInput" id="swatch-0-red" href="{{$sg}}"></a>
                                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url({{$sg}});" title="Red"></label>
                                                    </div>   
                                                  @endforeach
                                                </div>
                                            </div>
                                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                                <div class="product-form__item">
                                                  <label class="header">Size: <span class="slVariant">{{$product->size}}</span></label>
                                                  @php
                                                      $product_attr=\App\Models\ProductAttribute::where('product_id', $product->id)->get();

                                                  @endphp
                                                  @foreach ($product_attr as $size)
                                                    <div data-value="{{$size->size}}" class="swatch-element xs available">
                                                        <input class="swatchInput" id="{{$size->id}}" type="radio" name="size" value="{{$size->size}}">
                                                        <label class="swatchLbl medium rectangle" for="{{$size->id}}" title="{{$size->size}}">{{$size->size}}</label>
                                                    </div>
                                                  @endforeach
                                                </div>
                                            </div>
                                            <p class="infolinks"><a href="#sizechart" class="sizelink btn"> Size Guide</a> <a href="#productInquiry" class="emaillink btn"> Ask About this Product</a></p>
                                            <!-- Product Action -->
                                            <div class="product-action clearfix">
                                                <div class="product-form__item--quantity">
                                                    <div class="wrapQtyBtn">
                                                        <div class="qtyField">
                                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                            <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>                                
                                                <div class="product-form__item--submit">
                                                    <button type="button" name="add" class="btn product-form__cart-submit">
                                                        <span>Add to cart</span>
                                                    </button>
                                                </div>
                                                <div class="shopify-payment-button" data-shopify="payment-button">
                                                    <button type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded">Buy it now</button>
                                                </div>
                                            </div>
                                            <!-- End Product Action -->
                                        </form>
                                        <div class="display-table shareRow">
                                                <div class="display-table-cell medium-up--one-third">
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="display-table-cell text-right">
                                                    <div class="social-sharing">
                                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                                            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                                        </a>
                                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                                            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                                        </a>
                                                        <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                                            <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                                        </a>
                                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                                            <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                                        </a>
                                                        <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                                        </a>
                                                     </div>
                                                </div>
                                            </div>
                                            
                                        <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> GETTING CLOSER! ONLY <b class="freeShip"><span class="money" data-currency-usd="$199.00" data-currency="USD">$199.00</span></b> AWAY FROM <b>FREE SHIPPING!</b></p>
                                        <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY BETWEEN <b id="fromDate">Wed. May 1</b> and <b id="toDate">Tue. May 7</b>.</p>
                                        <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div>
                                    </div>
                            </div>
                        </div>
                        <!--End-product-single-->
                        <!--Product Fearure-->
                        <div class="prFeatures">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                                    <img src="{{asset('frontend/assets/images/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
                                    <div class="details"><h3>Safe Payment</h3>Pay with the world's most payment methods.</div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                                    <img src="{{asset('frontend/assets/images/shield.png')}}" alt="Confidence" title="Confidence" />
                                    <div class="details"><h3>Confidence</h3>Protection covers your purchase and personal data.</div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                                    <img src="{{asset('frontend/assets/images/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
                                    <div class="details"><h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.</div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                                    <img src="{{asset('frontend/assets/images/phone-call.png')}}" alt="Hotline" title="Hotline" />
                                    <div class="details"><h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888</div>
                                </div>
                            </div>
                        </div>
                        <!--End Product Fearure-->
                        <!--Product Tabs-->
                        <div class="tabs-listing">
                            <ul class="product-tabs">
                                <li rel="tab1"><a class="spr-badge-caption">Product Details</a></li>
                                <li rel="tab2"><a class="spr-badge-caption">Product Reviews</a></li>
                                <li rel="tab3"><a class="spr-badge-caption">Size Chart</a></li>
                                <li rel="tab4"><a class="spr-badge-caption">Shipping &amp; Returns</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="tab1" class="tab-content">
                                    <div class="product-description rte">

                                        <h2>Description</h2>
                                        <p>{{$product->description}}</p>
                                        <h2>Additional Info</h2>
                                        <p>{{$product->description}}</p>
                                        <h2>Return Policy</h2>
                                        <p>{{$product->return_cancellation}}</p>
                                        <h3>1914 translation by H. Rackham</h3>
                                    </div>
                                </div>
                                
                                <div id="tab2" class="tab-content">
                                    <div id="shopify-product-reviews">
                                        <div class="spr-container">
                                            <div class="spr-header clearfix">
                                                <div class="spr-summary">
                                                    <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on {{\App\Models\ProductReview::where('product_id', $product->id)->count()}} reviews</span></span>
                                                    <span class="spr-summary-actions">
                                                        <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="spr-content">
                                                <div class="spr-form clearfix">
                                                    @auth
                                                        <form method="post" action="{{route('product.review', $product->slug)}}" id="new-review-form" class="new-review-form">
                                                            @csrf
                                                            <h3 class="spr-form-title">Write a review</h3>
                                                            <fieldset class="spr-form-review">
                                                                <label for="">Rate</label>
                                                                <div class="rating"> 
                                                                    <input type="radio" name="rate" value="5" id="5">
                                                                    <label for="5">☆</label> 
                                                                    <input type="radio" name="rate" value="4" id="4">
                                                                    <label for="4">☆</label> 
                                                                    <input type="radio" name="rate" value="3" id="3">
                                                                    <label for="3">☆</label> 
                                                                    <input type="radio" name="rate" value="2" id="2">
                                                                    <label for="2">☆</label> 
                                                                    <input type="radio" name="rate" value="1" id="1">
                                                                    <label for="1">☆</label>
                                                                </div>
                                                                @error('rate')
                                                                <P class="text-danger">{{$message}}</P>
                                                                @enderror
                                                            <div class="form-group">
                                                                <label for="options">Reason for rating</label>
                                                                <select class="form-control small right py-0 w-100" id="options" name="reason">
                                                                    <option value="quality" {{old('reason') == 'quality' ? 'selected' : ''}}>Quality</option>
                                                                    <option value="value" {{old('reason') == 'value' ? 'selected' : ''}}>Value</option>
                                                                    <option value="design" {{old('reason') == 'design' ? 'selected' : ''}}>Design</option>
                                                                    <option value="price" {{old('reason') == 'price' ? 'selected' : ''}}>Price</option>
                                                                    <option value="others" {{old('reason') == 'others' ? 'selected' : ''}}>Others</option>
                                                                </select>
                                                                @error('reason')
                                                                <P class="text-danger">{{$message}}</P>
                                                                @enderror
                                                            </div>
                                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <div class="spr-form-review-body">
                                                                <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                                <div class="spr-form-input">
                                                                <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" name="review" rows="10" placeholder="Write your comments here"></textarea>
                                                                @error('review')
                                                                <P class="text-danger">{{$message}}</P>
                                                                @enderror
                                                                </div>
                                                            </div>
                                                            </fieldset>
                                                            <fieldset class="spr-form-actions">
                                                                <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                                            </fieldset>
                                                        </form>
                                                    @else    
                                                        <p>You Need to Log in!   <a href="{{route('user.auth')}}">Click here!</a></p>
                                                    @endif
                                                </div>
                                                <div class="spr-reviews">
                                                    @php
                                                        $reviews = \App\Models\ProductReview::where('product_id', $product->id)->latest()->paginate(10);
                                                    @endphp
                                                    @if (count($reviews) > 0)
                                                    @foreach ($reviews as $review)
                                                        
                                                    
                                                        <div class="spr-review">
                                                            <div class="spr-review-header">
                                                                <span class="product-review spr-starratings spr-review-header-starratings">
                                                                    <span class="reviewLink">
                                                                        @for($i =0; $i<5;$i++)
                                                                        @if ($review->rate>$i)
                                                                        <i class="font-13 fa fa-star"></i>
                                                                        @else
                                                                        <i class="font-13 fa fa-star-o"></i>
                                                                        @endif
                                                                        @endfor
                                                                    </span>
                                                                </span>
                                                                <h3 class="spr-review-header-title">{{$review->reason}}</h3>
                                                                <span class="spr-review-header-byline"><strong>{{\App\Models\User::where('id', $review->user_id)->value('full_name')}}</strong> on <strong>{{\Carbon\Carbon::parse($review->created_at)->format('M, d, Y')}}</strong></span>
                                                            </div>
                                                            <div class="spr-review-content">
                                                                <p class="spr-review-content-body">{{$review->review}}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @else
                                                        <p>No reviews for this product</p>
                                                    @endif
                                                    {{$reviews->links('vendor.pagination.custom')}}
                                                    
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div id="tab3" class="tab-content">
                                    <h3>WOMEN'S BODY SIZING CHART</h3>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <th>Size</th>
                                          <th>XS</th>
                                          <th>S</th>
                                          <th>M</th>
                                          <th>L</th>
                                          <th>XL</th>
                                        </tr>
                                        <tr>
                                          <td>Chest</td>
                                          <td>31" - 33"</td>
                                          <td>33" - 35"</td>
                                          <td>35" - 37"</td>
                                          <td>37" - 39"</td>
                                          <td>39" - 42"</td>
                                        </tr>
                                        <tr>
                                          <td>Waist</td>
                                          <td>24" - 26"</td>
                                          <td>26" - 28"</td>
                                          <td>28" - 30"</td>
                                          <td>30" - 32"</td>
                                          <td>32" - 35"</td>
                                        </tr>
                                        <tr>
                                          <td>Hip</td>
                                          <td>34" - 36"</td>
                                          <td>36" - 38"</td>
                                          <td>38" - 40"</td>
                                          <td>40" - 42"</td>
                                          <td>42" - 44"</td>
                                        </tr>
                                        <tr>
                                          <td>Regular inseam</td>
                                          <td>30"</td>
                                          <td>30½"</td>
                                          <td>31"</td>
                                          <td>31½"</td>
                                          <td>32"</td>
                                        </tr>
                                        <tr>
                                          <td>Long (Tall) Inseam</td>
                                          <td>31½"</td>
                                          <td>32"</td>
                                          <td>32½"</td>
                                          <td>33"</td>
                                          <td>33½"</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <h3>MEN'S BODY SIZING CHART</h3>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <th>Size</th>
                                          <th>XS</th>
                                          <th>S</th>
                                          <th>M</th>
                                          <th>L</th>
                                          <th>XL</th>
                                          <th>XXL</th>
                                        </tr>
                                        <tr>
                                          <td>Chest</td>
                                          <td>33" - 36"</td>
                                          <td>36" - 39"</td>
                                          <td>39" - 41"</td>
                                          <td>41" - 43"</td>
                                          <td>43" - 46"</td>
                                          <td>46" - 49"</td>
                                        </tr>
                                        <tr>
                                          <td>Waist</td>
                                          <td>27" - 30"</td>
                                          <td>30" - 33"</td>
                                          <td>33" - 35"</td>
                                          <td>36" - 38"</td>
                                          <td>38" - 42"</td>
                                          <td>42" - 45"</td>
                                        </tr>
                                        <tr>
                                          <td>Hip</td>
                                          <td>33" - 36"</td>
                                          <td>36" - 39"</td>
                                          <td>39" - 41"</td>
                                          <td>41" - 43"</td>
                                          <td>43" - 46"</td>
                                          <td>46" - 49"</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="text-center">
                                        <img src="assets/images/size.jpg" alt="" />
                                    </div>
                              </div>
                                
                                <div id="tab4" class="tab-content">
                                    <h4>Returns Policy</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                                    <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                                    <h4>Shipping</h4>
                                    <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                                </div>
                            </div>
                        </div>
                        <!--End Product Tabs-->
                        
                        <!--Related Product Slider-->
                        <div class="related-product grid-products">
                            <header class="section-header">
                                <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                                <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
                            </header>
                            <div class="productPageSlider">
                                @if (count($product->rel_prods) > 0)
                                    @foreach ($product->rel_prods as $item)
                                                
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="#">
                                                    <!-- image -->
                                                    @php
                                                     $photos = explode(',',$item->photo)
                                                     @endphp
                                                    <img class="primary blur-up lazyload" data-src="" src="{{$photos[0]}}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="" src="{{$photos[0]}}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span class="lbl on-sale">-{{$item->discount}}%</span> <span class="lbl pr-label1">{{$item->conditions}}</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->
                    
                                                <!-- Start product button -->
                                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
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
                                                    <a href="#">{{$item->title}}</a>
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
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                    @endforeach
                                    
                                @endif
                               
                            </div>
                            </div>
                        <!--End Related Product Slider-->
                        
                        <!--Recently Product Slider-->
                        <div class="related-product grid-products">
                                <header class="section-header">
                                    <h2 class="section-header__title text-center h2"><span>Recently Viewed Product</span></h2>
                                    <p class="sub-heading">You can manage this section from store admin as describe in above section</p>
                                </header>
                                <div class="productPageSlider">
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image6.jpg" src="assets/images/product-images/product-image6.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image6-1.jpg" src="assets/images/product-images/product-image6-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Zipper Jacket</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image7.jpg" src="assets/images/product-images/product-image7.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image7-1.jpg" src="assets/images/product-images/product-image7-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Zipper Jacket</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image8.jpg" src="assets/images/product-images/product-image8.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image8-1.jpg" src="assets/images/product-images/product-image8-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
    
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Workers Shirt Jacket</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image9.jpg" src="assets/images/product-images/product-image9.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image9-1.jpg" src="assets/images/product-images/product-image9-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Watercolor Sport Jacket in Brown/Blue</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image10.jpg" src="assets/images/product-images/product-image10.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image10-1.jpg" src="assets/images/product-images/product-image10-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Washed Wool Blazer</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image13.jpg" src="assets/images/product-images/product-image13.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image13-1.jpg" src="assets/images/product-images/product-image13-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
    
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Ashton Necklace</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image14.jpg" src="assets/images/product-images/product-image14.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image14-1.jpg" src="assets/images/product-images/product-image14-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Ara Ring</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="#">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image15.jpg" src="assets/images/product-images/product-image15.jpg" alt="image" title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image15-1.jpg" src="assets/images/product-images/product-image15-1.jpg" alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->
                                        </div>
                                        <!-- end product image -->
    
                                        <!--start product details -->
                                        <div class="product-details text-center">
                                            <!-- product name -->
                                            <div class="product-name">
                                                <a href="#">Ara Ring</a>
                                            </div>
                                            <!-- End product name -->
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                </div>
                            </div>
                        <!--End Recently Product Slider-->
                        </div>
                    <!--#ProductSection-product-template-->
                </div>
                <!--MainContent-->
            </div>
            <!--End Body Content-->
@endsection