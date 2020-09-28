<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function getClientRegister(){
       return view('front.auth.register');
   }
   public function Register(RegisterRequest $request){
       try {
           $request_data=$request->except(['password']);
           $request_data['password']=Hash::make($request->get('password'));
           $Students=User::create($request_data);
           return redirect()->route('get.front.login')->with(['success'=>"Add successfully You Login Now"]);
       }catch (\Exception $ex){
           return redirect()->route('get.front.login')->with(['error' => 'Sorry Something went wrong']);
       }

   }
}
