@extends('layouts.app') 
@section('content')
<br>
@if(count($books) > 0)
<div class="col-md-12">
   <div class="dropdown" style="display: inline;">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort By ModuleCode: 
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         @foreach($categories as $category)
         <a class="dropdown-item" href="categories/{{$category->id}}">{{$category->name}}</a>
         @endforeach
      </div>
   </div>
   <div class="dropdown" style="display: inline;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Order By
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <a class="dropdown-item" href="/orderByTitle">Title </a>
         <a class="dropdown-item" href="/orderByAuthor">Author </a>
         <a class="dropdown-item" href="/NewestToOldest">Newest To Oldest </a>
         <a class="dropdown-item" href="/OldestToNewest">Oldest To Newest </a>
      </div>
   </div>
   <div class="dropdown" style="display: inline;">
      <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort By Price
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <a class="dropdown-item" href="/HighestToLowest"> Highest To lowest</a>
         <a class="dropdown-item" href="/LowestToHighest"> Lowest To Highest</a>
         <a class="dropdown-item" href="/PriceGreaterThan50"> > 50</a>
         <a class="dropdown-item" href="/PriceLessThan50"> < 50</a>
      </div>
   </div>
</div>
<br>
@foreach($books as $book)
<div class="row bg-white">
   <div class="col-md-3">
      <img class="img-fluid rounded mb-3 mb-md-0" src="/storage/image/{{$book->image}}" alt="">
   </div>
   <div class="col-md-5">
      <h3>Title: {{$book->title}}</h3>
      <p>Author: {{$book->author}}</p>
      <p>Price: £{{number_format($book->price,2)}}</p>
      <p>ISBN: {{$book->ISBN}}</p>
      <p>Posted by: {{$book->user->name}}</p>
      <p>Submitted on: {{$book->created_at->format('d/m/Y')}}
      @if(!empty($book->category->name))
      <p>Posted in: {{$book->category->name}}</p>
      @else
      <p>Posted in: Category Unavailable</p>
      @endif
      <a class="btn btn-primary" href="books/{{$book->id}}">View Book</a>
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