<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->latest()->get();
        return view('backend.order.index', compact('orders'));
    }

    public function orderStatus(Request $request)
    {
        // return $request->input('order_id');
        $order = Order::find($request->input('order_id'));
        if ($order) {
            if ($request->input('condition') == 'delivered') {
                foreach ($order->products as $item) {
                    $product = Product::where('id', $item->pivot->product_id)->first();
                    $stock = $product->stock;
                    $stock -= $item->pivot->quantity;
                    $product->update(['stock' => $stock]);
                    Order::where('id', $request->input('order_id'))->update(['payment_status' => 'paid']);
                }
            }
            $status = Order::where('id', $request->input('order_id'))->update(['condition' =>$request->input('condition')]);
            if ($status) {
                return back()->with('success', 'Successfully updated');
            }
            else {
                return back()->with('error', 'Somethng went wrong');
            }
        }
        abort(404);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return view('backend.order.show', compact('order'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if($order){
            $status = $order->delete();
            if($status)
            {
                return redirect()->route('order.index')->with('success', 'order Successfully deleted');
            }
            else{
                return back()->with('error', 'Something went wrong');
            }

        }
        else{
            return back()->with('error', 'Data not found');
        }
    }
}
