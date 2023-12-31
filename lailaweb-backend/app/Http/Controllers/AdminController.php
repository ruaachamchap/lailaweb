<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
       
        if (Auth::check()) {
            return redirect()->route('order.dashboard');
        }
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('order.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('loginadmin');
    }
}
