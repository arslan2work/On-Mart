@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
        <div id="page-content" style="margin-top: 70px;">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
                  </div>
            </div>
            <!--End Page Title-->
            
            <div class="container">
                <div id="cart_list" class="row">
                    @include('frontend.layouts.cart-list')
                    
                    
                </div>
            </div>
            
        </div>
        <!--End Body Content-->
@endsection

@section('scripts')
<script>
    $(document).on('click', '.coupon-btn', function (e) {
        e.preventDefault();
        var code = $('input[name=code]').val();
        alert(code);
        $('.coupon-btn').html('<i class="fa fa-spinner fa-spin"></i> Applying...')
        $('#coupon-form').submit();
    })
</script>
<script>
    $(document).on('click', '.cart_delete', function (e) {
        e.preventDefault();
        var cart_id = $(this).data('id');
        
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.delete')}}";
  
        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
              cart_id: cart_id,
                _token: token,
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
 <script>
     $(document).on('click','.qty-text', function() {
         var id = $(this).data('id');
        //  alert(id);
        var spinner = $(this),input=spinner.closest("div.qtyField").find('input[type="number"]');
        // alert(input.val());

        if(input.val() == 1){
            return false;
        }
        if(input.val() != 1){
            var newVal = parseFloat(input.val());
            $('#qty-input-'+id).val(newVal);
        }

        var productQuantity = $("#update-cart-"+id).data('product-quantity');
        // alert(productQuantity);
        update_cart(id, productQuantity)
     });

     function update_cart(id, productQuantity) {
         var rowId = id;
         var product_qty = $('#qty-input-'+rowId).val();
         var token = "{{csrf_token()}}";
         var path = "{{route('cart.update')}}";

         $.ajax({
             url:path,
             type: "POST",
             data: {
                 _token: token,
                 product_qty: product_qty,
                 rowId: rowId,
                 productQuantity: productQuantity,
             },
             success: function (data) {
                 if(data['status']){
                     $('body #header-ajax').html(data['header']);
                     $('body #cart_counter').html(data['cart_count']);
                     $('body #cart_list').html(data['cart_list']);
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "Ok!",
                    });
                 }
             }
         })
     }

 </script>


@endsection