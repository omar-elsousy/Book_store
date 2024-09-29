<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    function list(){
        $categories=category::get();
        return view('categories/list',[
            'categories'=>$categories
        ]);
    }
    function add_categories(Request $request){
        $category=new category();
        $category->name=$request->name;
        $category->save();
        return redirect('categories/list');
    }
}
