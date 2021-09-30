@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron">
    <h1>Edit Post</h1>
<form class="form" method="POST" enctype="multipart/form-data" action="{{route('editedbook')}}">
    @csrf
    <input type="text" name="id" hidden value="{{$book->id}}">
    <div class="form-group">
      <h3><label for="name">Name</label></h3>
      <input type="text" name="name" value="{{$book->name}}" class="form-control" id="title" placeholder="Enter Title">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      </div>
    <div class="form-group">
      <h3><label for="author">Author</label></h3>
      <input type="text" name="author" class="form-control" id="author" value="{{$book->author}}" placeholder="Enter Author">
      @error('author')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <input required name="coverImg" class="form-control" type="file">
      @error('coverImg')
      <div class="text-danger">{{ $message }}</div>
  @enderror 
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
    <a href={{ route('books') }} class="btn btn-dark">Go Back</a>
  </form> 
</div> 
</div>
@endsection