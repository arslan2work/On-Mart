<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function currencyLoad(Request $request)
     {
        //  dd($request->all());
        session()->put('currency_code', $request->currency_code);
        
        $currency = Currency::where('code', $request->currency_code)->first();
        
        session()->put('currency_symbol', $currency->symbol);
        session()->put('currency_exchange_rate', $currency->exchange_rate);

        $response['status'] = true;
        
        return $response;

     }

    public function index()
    {
        $currencies = Currency::orderBy('id', 'DESC')->get();
        return view('backend.currency.index', compact('currencies'));
    }

    public function currencyStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('currencies')->where('id', $request->id)->update(['status'=> 'active']);
        }
        else{
            DB::table('currencies')->where('id', $request->id)->update(['status'=> 'inactive']);
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
        return view('backend.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'string|required',
            'symbol'=> 'string|nullable',
            'exchange_rate'=> 'numeric|nullable',
            'code'=> 'required',
            'status'=> 'nullable|in:active, inavtive',
        ]);

        $data = $request->all();
        
        $status = Currency::create($data);
        if($status){
            return redirect()->route('currency.index')->with('success', 'Successfully created banner');
        }
        else{
            return back()->with('error', 'Something went wrong!');
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
        $currency = Currency::find($id);
        if($currency){
            return view('backend.currency.edit', compact('currency'));
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
        $currency = Currency::find($id);
        if($currency){
            $this->validate($request, [
                'name'=> 'string|required',
                'symbol'=> 'string|nullable',
                'exchange_rate'=> 'numeric|nullable',
                'code'=> 'required',
                'status'=> 'nullable|in:active, inavtive',
            ]);
    
            $data = $request->all();
            
            $status = $currency->fill($data)->save();
            if($status){
                return redirect()->route('currency.index')->with('success', 'Successfully updated currency');
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
        $currency = Currency::find($id);
        if($currency){
            $status = $currency->delete();
            if($status)
            {
                return redirect()->back()->with('success', 'Currency Successfully deleted');
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
