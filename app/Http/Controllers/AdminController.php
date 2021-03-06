<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator, Auth;
use App\Http\Controllers\LogController;
use App\Models\Log;

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
            Session::put('theme', 'dark');
            $content = Auth::guard('admin')->user()->name.' logged in to system.';
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Logged in successfully','success');
            return redirect()->route('admin.dashboard');
        }
        else
        {
            session()->flash('error', 'Email or password is incorrect');
            return view('admin.login');
        }
    }




    public function logout()
    {
        $content = Auth::guard('admin')->user()->name.' logged out from system.';
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        Auth::logout();
        return view('admin.login');
    }

}
