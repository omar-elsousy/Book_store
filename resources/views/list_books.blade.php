@extends('layouts/app')

@section('title')
list | books
@endsection

@section('content') 
<h1>First view</h1>
@foreach($books as $book)
<h1><a href="{{url('/books/show',$book->id)}}">{{$book->name}}</a></h1>
<p>{{$book->desc}}</p>
@endforeach
@endsection 