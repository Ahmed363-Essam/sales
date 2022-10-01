<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function getLogin()
    {

        return view('admin.auth.login');
    }

    public function Login(LoginRequest $request)
    {


        if(auth()->guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password]))
        {

            return redirect()->route('admin.dashboard');
        }
    }

    public function  logout()
    {

        auth('admin')->logout();

        return redirect()->route('login');
    }
}
