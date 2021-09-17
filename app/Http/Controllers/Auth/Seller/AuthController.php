<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('seller')->attempt(['email'=>$request->email, 'password'=> $request->password])) {
            return redirect()->intended(route('seller'))->with('success', 'Your are logged in as an Seller');
        }
        return back()->withInput($request->only('email'));
    }
}
