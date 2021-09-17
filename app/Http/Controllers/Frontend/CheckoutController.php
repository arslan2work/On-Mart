<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkout1()
    {
        $user = Auth::user();
        $shippings = Shipping::where('status', 'active')->orderBy('shipping_address', 'ASC')->get();
        return view('frontend.pages.checkout.checkout1',compact(['user', 'shippings']));
    }

    public function checkout1Store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'first_name' => 'string|required', 
            'last_name' => 'string|required',
            'email' => 'email|required|exists:users,email', 
            'phone' => 'string|string', 
            'country' => 'string|required', 
            'address' => 'string|required', 
            'city' => 'string|required', 
            'state' => 'string|required', 
            'postcode' => 'string|required', 
            'sfirst_name' => 'string|required', 
            'slast_name' => 'string|required',
            'semail' => 'email|required|exists:users,email', 
            'sphone' => 'string|string', 
            'scountry' => 'string|required', 
            'saddress' => 'string|required', 
            'scity' => 'string|required', 
            'sstate' => 'string|required', 
            'spostcode' => 'string|required', 
            'payment_method' => 'required', 
        ]);

        $order = new Order();
        $order['user_id'] = auth()->user()->id;
        $order['order_number'] = Str::upper('ORD-'.Str::random(8));
        $order['sub_total'] = (float)str_replace(',','',Cart::instance('shopping')->subtotal());
        if(Session::has('coupon')){
            $order['coupon'] = Session::get('coupon')['value'];
        }
        if(Session::has('coupon')){
            $order['total_amount'] = (float) str_replace(',','',Cart::subtotal())-Session::get('coupon')['value'];
        }
        else{
            $order['total_amount'] = (float) str_replace(',','',Cart::subtotal());
        }
        $order['delivery_charge'] = $request->delivery_charge;
        $order['payment_method'] = $request->payment_method;
        $order['payment_status'] = 'unpaid';
        $order['condition'] = 'pending';
        $order['first_name'] = $request->first_name;
        $order['last_name'] = $request->last_name;
        $order['email'] = $request->email;
        $order['phone'] = $request->phone;
        $order['country'] = $request->country;
        $order['address'] = $request->address;
        $order['city'] = $request->city;
        $order['state'] = $request->state;
        $order['postcode'] = $request->postcode;
        $order['sfirst_name'] = $request->sfirst_name;
        $order['slast_name'] = $request->slast_name;
        $order['semail'] = $request->semail;
        $order['sphone'] = $request->sphone;
        $order['scountry'] = $request->scountry;
        $order['saddress'] = $request->saddress;
        $order['scity'] = $request->scity;
        $order['sstate'] = $request->sstate;
        $order['spostcode'] = $request->spostcode;
        $order['note'] = $request->note;
        $status = $order->save();

        foreach (Cart::instance('shopping')->content() as $item) {
            $product_id[] = $item->id;
            $product = Product::find($item->id);
            $quantity = $item->qty;
            $order->products()->attach($product, ['quantity'=> $quantity]);
            
        }

        if($status){
            Mail::to($order['email'])->bcc($order['semail'])->cc('asghararslan710@gmail.com')->send(new OrderMail($order));
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            return redirect()->route('complete', $order['order_number']);
        }else{
            return redirect()->route('checkout1')->with('error', 'order incomplete');
        }
    }
    public function complete($order)
    {
        $order = $order;
        return view('frontend.pages.checkout.complete', compact('order'));
    }
}
