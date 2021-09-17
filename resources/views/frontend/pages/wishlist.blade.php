@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
        <div id="page-content" style="margin-top: 70px;">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper"><h1 class="page-width">Wish List</h1></div>
                  </div>
            </div>
            <!--End Page Title-->
            
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <form action="#">
                            <div class="wishlist-table table-content table-responsive" id="wishlist_list">
                                @include('frontend.layouts.wishlist')
                            </div>
                        </form>                   
                       </div>
                </div>
            </div>
            
        </div>
        <!--End Body Content-->
@endsection

@section('scripts')
    <script>
        $('.move-to-cart').on('click', function(e){
            e.preventDefault();
             var rowId = $(this).data('id');
            //  alert(rowId);
            var token = "{{csrf_token()}}";
            var path = "{{route('wishlist.move.cart')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                beforeSend: function () {
                    $(this).html('< class="fa fa-spinner fa-spin"></i> Adding...');
                },
                success: function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: "Something went wrong",
                            icon: "warning",
                            button: "Ok!",
                        });
                    }
                },
                error: function (err) {
                    swal({
                            title: "Error!",
                            text: "Error in data",
                            icon: "error",
                            button: "Ok!",
                        });
                }

            })
        })
    </script>
    <script>
        $('.delete_wishlist').on('click', function(e){
            e.preventDefault();
             var rowId = $(this).data('id');
            //  alert(rowId);
            var token = "{{csrf_token()}}";
            var path = "{{route('wishlist.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    rowId:rowId,
                },
                success: function (data) {
                    if(data['status']){
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Oops!",
                            text: "Something went wrong",
                            icon: "warning",
                            button: "Ok!",
                        });
                    }
                },
                error: function (err) {
                    swal({
                            title: "Error!",
                            text: "Error in data",
                            icon: "error",
                            button: "Ok!",
                        });
                }

            })
        })
    </script>
@endsection