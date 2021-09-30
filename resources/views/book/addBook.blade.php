@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron">
    <h1>Add Book</h1>
<form class="form" method="POST" enctype="multipart/form-data" action="{{route('book.addingbook')}}">
    @csrf
    <div class="form-group">
      <h3><label for="name">Name</label></h3>
      <input type="text" name="name" class="form-control" id="title" placeholder="Enter Title">
      @error('name')
      <div class="text-danger">{{ $message }}</div>
      @enderror
      </div>
    <div class="form-group">
      <h3><label for="author">Author</label></h3>
      <input type="text" name="author" class="form-control" id="author" placeholder="Enter Author">
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

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href={{ route('mainPage') }} class="btn btn-dark">Go Back</a>
  </form> 
</div> 
</div>
@endsection