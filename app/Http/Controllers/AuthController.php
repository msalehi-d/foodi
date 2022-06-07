<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginCheck(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->get('remember') ? true : false;
        if (auth()->attempt($credentials, $remember)) {
            if (auth()->user()->role == config('constants.roles.admin'))
                return redirect(route('admin.order.index'));
            return redirect()->intended('home');
        }
        return back()->withErrors(['incorrect' => 'اطلاعات وارد شده صحیح نمی باشد']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerCheck(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $user = new \App\User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->route('home');
    }
}
