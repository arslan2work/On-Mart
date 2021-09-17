<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=> $request->password])) {
            return redirect()->intended(route('admin'))->with('success', 'Your are logged in as an Admin');
        }
        return back()->withInput($request->only('email'));
    }
}
