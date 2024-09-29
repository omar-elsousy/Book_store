<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\category;
use resources\views;
class BookController extends Controller
{
    function books(){
        $books=Book::get();
        return view("list_books",["books"=>$books]);
    }
    function create (){
        $categories=category::get();
        return view("create",['categories'=>$categories]);
    }
    function store(Request $request){
        //validate
        $validator = \Validator::make($request->all(), 
        [ 
         'name' => 'required|max:100|min:3', 
         'desc' => 'required|max:100|min:3', 
         //'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]); 
            if($validator->fails()) 
            { 
        return redirect('books/create')->withErrors($validator)->withInput();
            }
        //db
        $book=new Book();
        $book->name=$request->name;
        $book->desc=$request->desc;
        $book->save();
        $book->categories()->attach($request->categories);

        return redirect("/books");
    }
    function show ($id){
        $book=book::find($id);
        return view('show',['book'=>$book]);
    }
    function edit ($id){
        $book=book::find($id);
        return view('edit',['book'=>$book]);
    }
    function update(Request $request,$id){
        $book=book::find($id);
        $book->name=$request->name;
        $book->desc=$request->desc;
        $book->save();
        return redirect('books/show/'.$book->id);
    }
    function delete($id){
        $book=book::find($id);
        $book->categories()->detach();
        $book->delete();
        return redirect('books');
    }
}
