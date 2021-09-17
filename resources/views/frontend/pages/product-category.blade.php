@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
    <div id="page-content">
    	<!--Collection Banner-->
    	<div class="collection-header">
			<div class="collection-hero">
        		<div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{asset('frontend/assets/images/cat-women2.jpg')}}" src="assets/images/cat-women2.jpg" alt="Women" title="Women" /></div>
        		<div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Shop Fashion Products</h1></div>
      		</div>
		</div>
        <!--End Collection Banner-->
        
        <div class="container-fluid">
        	<div class="row">
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="productList">
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
                                    	<span class="filters-toolbar__product-count">Showing: 22</span>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-right">
                                    	<div class="filters-toolbar__item">
                                      		<label for="SortBy" class="hidden">Sort</label>
                                      		<select id="sortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                                <option selected="selected">Default</option>
                                                <option value="priceAsc" {{old('sortBy') == 'priceAsc' ? 'selected' : ''}}>Price - Lower To Higher</option>
                                                <option value="priceDesc">Price - Higher To Lower</option>
                                                <option value="discAsc">Discount - Lower To Higher</option>
                                                <option value="discDesc">Discount - Higher To Lower</option>
                                                <option value="titleAsc">Alphabetical Ascending</option>
                                                <option value="titleDesc">Alphabetical Descending</option>
                                      		</select>
                                      		<input class="collection-header__default-sort" type="hidden" value="manual">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row" id="product-data">

                                @include('frontend.layouts.single-product')

                                
                                 
                            	</div>
                                
                        </div>
                        <div class="ajax-load text-center" style="display: none">
                            <img src="{{asset('frontend/assets/images/gif.gif')}}" style="width: 120px !important;">
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>
    </div>
    <!--End Body Content-->
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#sortBy').change(function () {
           var sort = $('#sortBy').val();
        //    alert(sort);
        window.location = "{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
        });
    </script>
   
    <script>
        function loadmoreData(page) {
            $.ajax({
                url:'?page='+page,
                type: 'get',
                beforeSend: function () {
                    $('.ajax-load').show();
                },
            })
            .done(function (data) {
                if(data.html == ''){
                    $('.ajax-load').html('No more products available');
                    return;
                }
                $('.ajax-load').hide();
                $('#product-data').append(data.html);
            })
            .fail(function () {
                alert('Something went wrong');
            })
        }

        var page = 1;
        $(window).scroll(function () {
            if($(window).scrollTop()+$(window).height()+120>=$(document).height()){
                page++;
                loadmoreData(page);
            }
        })
    </script>
{{-- Add to cart --}}
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');
            
            var token = "{{csrf_token()}}";
            var path = "{{route('cart.store')}}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_cart' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('#add_to_cart' + product_id).html('<i class="icon anm anm-bag-l"></i>');
                },
                success: function (data) {
                    console.log(data);
                    $('body #header-ajax').html(data['header']);
                    if(data['status']){
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok!",
                        });
                    }
                },
          error:function(err){
            console.log(err);
          }
            });
        });
    </script>
{{-- Addto wishlist --}}
    <script>
        $(document).on('click', '.add-to-wishlist', function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');
            
            var token = "{{csrf_token()}}";
            var path = "{{route('wishlist.store')}}";

            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function () {
                    $('#add_to_wishlist_' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function () {
                    $('#add_to_wishlist_' + product_id).html('<i class="icon anm anm-heart-l"></i>');
                },
                success: function (data) {
                    console.log(data);
                    
                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_Counter').html(data['wishlist_count']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok!",
                        });
                    }
                    else if(data['present']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_Counter').html(data['wishlist_count']);
                        swal({
                            title: "Oops!",
                            text: data['message'],
                            icon: "warning",
                            button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",
                            text: "You can not add that product",
                            icon: "error",
                            button: "Ok!",
                        });
                    }
                },
          error:function(err){
            console.log(err);
          }
            });
        });
    </script>
@endsection