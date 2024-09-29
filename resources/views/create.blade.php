@extends('layouts/app')

@section('title')
create
@endsection

@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form method="post" action="{{url('books/store')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="name" value="{{old('name')}}" placeholder="Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    <label for="exampleInputEmail1" class="form-label">desc</label>
    <input type="text" name="desc" value="{{old('desc')}}" placeholder="Desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    @foreach($categories as $category)
    <input type="checkbox" name="categories[]" value="{{$category->id}}" >
    {{$category->name}}
    @endforeach
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection