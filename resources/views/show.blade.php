@extends('layouts/app')

@section('title')
show | {{$book->name}}
@endsection

@section('content')
<a href="{{url('books/edit',$book->id)}}">Edit</a>
<br>
<a href="{{url('books/delete',$book->id)}}">Delete</a>
<h1>{{$book->name}}</h1>
<p>{{$book->desc}}</p>

@foreach($book->categories as $category)
{{$category->name}} ,
@endforeach

@endsection
