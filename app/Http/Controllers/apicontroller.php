<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class apicontroller extends Controller
{
    function books(){
        $books=Book::select('id','name','desc')->with('categories')->get();
        return $books;
    }
    function users(){
        $users=User::select('id','email','is_admin')->with('notes')->get();
        return $users;
    }
    function register(Request $request){
        $user=new user();
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->api_token=str::random(64);
        $user->save();
        return ['api_token'=>$user->api_token,'status'=>'success'];
    }
    function login(Request $request){
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        {
            if(Auth::user()->api_token==0)
            {
                Auth::user()->api_token=str::random(64);
            }
        return ['api_token'=>Auth::user()->api_token,'status'=>'success'];
        }
        else 
        { 
            return ['api_token'=>'00000','status'=>'fail'];
        }
       
    }

  

}
