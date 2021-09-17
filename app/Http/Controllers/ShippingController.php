<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::orderBy('id', 'DESC')->get();
        return view('backend.shipping.index', compact('shippings'));
    }

    public function shippingStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('shippings')->where('id', $request->id)->update(['status'=> 'active']);
        }
        else{
            DB::table('shippings')->where('id', $request->id)->update(['status'=> 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'shipping_address'=> 'string|required',
            'delivery_time'=> 'string|required',
            'delivery_charge'=> 'numeric|required',
            'status'=> 'nullable|in:active, inactive',
        ]);

        $data = $request->all();
        $status = Shipping::create($data);
        if($status){
            return redirect()->route('shipping.index')->with('success', 'Successfully created Shipment');
        }
        else{
            return back()->with('error', 'Somwthing went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = Shipping::find($id);
        if($shipping){
            return view('backend.shipping.edit', compact('shipping'));
        }
        else{
            return back()->with('error', 'Data not found');
        }
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
        $shipping = Shipping::find($id);
        if($shipping){
            $this->validate($request, [
                'shipping_address'=> 'string|required',
            'delivery_time'=> 'string|required',
            'delivery_charge'=> 'numeric|required',
            'status'=> 'nullable|in:active, inactive',
            ]);
    
            $data = $request->all();
            
            $status = $shipping->fill($data)->save();
            if($status){
                return redirect()->route('shipping.index')->with('success', 'Successfully updated shipping');
            }
            else{
                return back()->with('error', 'Somwthing went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        if($shipping){
            $status = $shipping->delete();
            if($status)
            {
                return redirect()->route('shipping.index')->with('success', 'shipping Successfully deleted');
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
