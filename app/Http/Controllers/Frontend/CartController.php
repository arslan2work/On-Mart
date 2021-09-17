<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartStore(Request $request)
    {
        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');

        $product = Product::getProductByCart($product_id);
        $price = $product[0]['offer_price'];

        $cart_array = [];

        foreach(Cart::instance('shopping')->content() as $item){
            $cart_array[] = $item->id;
        }

        $result = Cart::instance('shopping')->add($product_id, $product[0]['title'], $product_qty,$price)->associate('App\Models\Product');

        if($result){
            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = "Item is added to cart";
        }
        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }

    public function cartDelete(Request $request)
    {
        $id = $request->input('cart_id');
        Cart::instance('shopping')->remove($id);
        $response['status'] = true;
        $response['message'] = 'Cart successfully removed';
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();
        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }
    public function cart()
    {
        return view('frontend.pages.cart.index');
    }

    public function cartUpdate(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'product_qty' => 'required|numeric', 
        ]);
        $rowId = $request->input('rowId');
        $request_quantity = $request->input('product_qty');
        $productQuantity = $request->input('productQuantity');

        if($request_quantity > $productQuantity) {
            $message = "We Currently do not have enough stock";
            $response['status'] = false;
        }
        elseif ($request_quantity < 1) {
            $message = "You can not add less than one quantity";
            $response['status'] = false;

        }
        else{
            Cart::instance('shopping')->update($rowId, $request_quantity);
            $message = "Quantity was updated";
            $response['status'] = true;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
        }
        if($request->ajax()){
            $header = view('frontend.layouts.header')->render();
            $cart_list = view('frontend.layouts.cart-list')->render();
            $response['header'] = $header;
            $response['cart_list'] = $cart_list;
            $response['message'] = $message;
        }
        return $response;
    }

    public function couponAdd(Request $request)
    {
        // return $request->all();
        $coupon = Coupon::where('code', $request->input('code'))->first();
        // return $coupon;
        if(!$coupon){
            return back()->with('error', 'Coupon not found');
        }
        if($coupon){
            $total_price = (float)str_replace(',','',Cart::instance('shopping')->subtotal());

            session()->put('coupon', [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'value' => $coupon->discount($total_price),
            ]);

            return back()->with('success', 'Coupon Applied');
        }
    }
}
