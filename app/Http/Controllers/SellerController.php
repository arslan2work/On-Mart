<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::orderBy('id', 'DESC')->get();
        return view('backend.seller.index', compact('sellers'));
    }

    public function sellerStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('sellers')->where('id', $request->id)->update(['status'=> 'active']);
        }
        else{
            DB::table('sellers')->where('id', $request->id)->update(['status'=> 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }
    public function sellerVerified(Request $request){
        if($request->mode == 'true'){
            DB::table('sellers')->where('id', $request->id)->update(['is_verified'=> '1']);
        }
        else{
            DB::table('sellers')->where('id', $request->id)->update(['is_verified'=> '0']);
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
        //
    }
}
