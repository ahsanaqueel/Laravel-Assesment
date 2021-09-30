@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to Laravel</h1>
    <p class="lead">This is a laravel Book Club.</p>
    <hr class="my-4">
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{ route('books') }}" role="button">Go to API</a>
      <a class="btn btn-primary btn-lg" href="{{ route('book.addbook') }}" role="button">Add Book</a>
      {{-- <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a> --}}
    </p>
  </div>
@endsection