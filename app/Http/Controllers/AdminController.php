<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->get('remember')))
        {
            return redirect()->route('admin.select_transaction');
        }
        else
        {
            session()->flash('error', 'Email or password is incorrect');
            return view('admin.login');
        }
    }

    public function select_transaction()
    {
        return view('admin.select_transaction');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return view('admin.login');
    }
    
}
