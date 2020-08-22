@extends('layouts.app') 
@section('content')
<br>
@if(count($books) > 0)
<div class="col-md-12">
@foreach($books as $book)
<div class="row bg-white">
   <div class="col-md-3">
      <img class="img-fluid rounded mb-3 mb-md-0" src="/storage/image/{{$book->image}}" alt="">
   </div>
   <div class="col-md-5">
      <h3>Title: {{$book->title}}</h3>
      <p>Author:{{$book->author}}</p>
      <p>Price: £{{$book->price}}</p>
      <p>Posted by: {{$book->user->name}}</p>
      @if(!empty($book->category->name))
      <p>Posted in: {{$book->category->name}}</p>
      @else
      <p>Posted in: Category Unavailable</p>
      @endif
      <a href="/books/{{$book->id}}" class="btn btn-primary">View Book</a>
   </div>
   <hr>
   <br>
</div>
<br>
@endforeach
@else
<h3>No Books Found</h3>
@endif
@include('inc.footer')
@endsection