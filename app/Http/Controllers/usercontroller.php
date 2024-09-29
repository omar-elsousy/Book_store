<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    function register(){
        return view('users/register');
    }
    function handle_register(Request $request){
        $user=new user();
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->save();
        return redirect('users/login');
    }
    function login(){
        return view('users/login');
    }
    function handle_login(Request $request){
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        return redirect('books');
        else 
        return "invalid email and password";
    }
    function logout(){
        Auth::logout();
        return redirect('users/login');
    }
}
