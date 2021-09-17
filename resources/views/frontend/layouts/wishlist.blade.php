<table class="table table-bordered">
    <thead>
        <tr>
            <th class="product-name text-center alt-font">Remove</th>
            <th class="product-price text-center alt-font">Images</th>
            <th class="product-name alt-font">Product</th>
            <th class="product-price text-center alt-font">Unit Price</th>
            <th class="stock-status text-center alt-font">Stock Status</th>
            <th class="product-subtotal text-center alt-font">Add to Cart</th>
        </tr>
    </thead>
    <tbody>
        @if (Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() > 0)
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
                <tr>
                    <td class="product-remove text-center" valign="middle"><a><i data-id="{{$item->rowId}}" class=" delete_wishlist icon icon anm anm-times-l"></i></a></td>
                    <td class="product-thumbnail text-center">
                        <a href="javascript:void(0);"><img src="{{$item->model->photo}}" alt="" title="" /></a>
                    </td>
                    <td class="product-name"><h4 class="no-margin"><a href="{{route('product.detail', $item->model->slug)}}">{{$item->name}}</a></h4></td>
                    <td class="product-price text-center"><span class="amount">${{number_format($item->price, 2)}}</span></td>
                    <td class="stock text-center">
                        <span class="in-stock">in stock</span>
                    </td>
                    <td class="product-subtotal text-center"><a href="javascript:void(0);" type="button" data-id="{{$item->rowId}}" class="btn btn-small move-to-cart">Add To Cart</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center"> You dont have any wishlist products</td>
            </tr>
        @endif
    
    </tbody>
</table>