<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    public function admin(){
        $orders = Order::orderBy('id', 'DESC')->latest()->get();
        return view('backend.index', compact('orders'));
    }
}
