<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\note;
use Illuminate\Http\Request;

class notecontroller extends Controller
{
    function notes(){
        return view('notes/list');
    }
    function add_notes(Request $request){
        $note=new note();
        $note->content=$request->content;
        $note->user_id=auth()->user()->id;
        $note->save();
        return redirect('users/notes');
    }
}
