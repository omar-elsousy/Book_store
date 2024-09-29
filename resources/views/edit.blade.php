@extends('layouts/app')

@section('title')
edit | {{$book->name}}
@endsection

@section('content')
<form method="post" action="{{url('books/update',$book->id)}}">
    @csrf
    <input type="text" name="name" value="{{$book->name}}" placeholder="Name"/>
    <br>
    <input type="text" name="desc" value="{{$book->desc}}" placeholder="Desc"/>
    <br>
    <input type="submit" value="Update"/>
    <br>
</form>
@endsection