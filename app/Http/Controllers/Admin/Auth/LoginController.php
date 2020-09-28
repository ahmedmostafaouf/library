<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }
    public function Login(LoginRequest $request)
    {
        $rememberMe=$request->has('remember_me')?true:false;
            if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
                return view('admin.dashboard');
            }
            return redirect()->back()->with(['error'=>'حدث خطأ ما اعد كتابه البيانات مره اخري']);

    }
}
