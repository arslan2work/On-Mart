<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    public function dashboard()
    {
        $orders = Order::orderBy('id', 'DESC')->latest()->get();
        return view('seller.index', compact('orders'));
    }
}
