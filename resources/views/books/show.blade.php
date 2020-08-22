@extends('layouts.app') 
@section('content')
<div class="row">
        <div class="col-lg-4">
                <div class="card mt-4">
                   <img class="card-img-top img-fluid" src="/storage/image/{{$book->image}}" alt="">
                </div>
             </div>
   <div class="col-lg-8">
      <div class="card mt-4">
         <div class="card-body">
            {{-- <h2 class="card-title">{{$book->title}}</h3> --}}
            <blockquote class="blockquote">
                <h2 class="card-title">{{$book->title}}</h2>
                <footer class="blockquote-footer">Author: <span class="text-primary">{{$book->author}} </span></footer>
            </blockquote>
            {{-- <h4>Author: <span class="text-primary">{{$book->author}} </span></h4> --}}
            <h4>Published On:<span class="badge badge-info">{{date('d-m-Y', strtotime($book->publishedOn))}}</span></h4>
            <h4>Price:<span class="badge badge-info">GHC{{$book->price}}</span></h4>
            @if($book->quantity > 0)
            <h4>Quantity Available: <span class="badge badge-info">{{$book->quantity}}</span></h4>
            @elseif($book->quantity == 0)
            <h4>Quantity Available <span class="badge badge-danger">Out of Stock</span></h4>
            @endif
            <h4 class="card-text">Description</h1>
            <p class="lead">{!!$book->description!!}</p>

            
            <br>
            <br>
            <br>
            <br>
            <br>
            
            @if($book->quantity > 0 && !Auth::guest() && Auth::user()->id === $book->user_id )
            <div style="display:inline">
                <a href="/books" class="btn btn-secondary">Go back </a>
             </div>
             @elseif($book->quantity == 0 && !Auth::guest() && Auth::user()->id === $book->user_id )
             <div style="display:inline">
             <a href="/books" class="btn btn-secondary ">Go back </a>
            </div>
            @endif

            @if($book->quantity > 0 && Auth::guest() )
            <div style="display:inline">
                <a href="/books" class="btn btn-secondary">Go back </a>
                <a href="/addToCart/{{$book->id}}" class=" btn btn-success">Add to cart</a>
                <a href="/Requestedbook" class=" btn btn-danger">View Cart</a>
             </div>
             @elseif($book->quantity == 0 && Auth::guest())
             <div style="display:inline">
             <a href="/books" class="btn btn-secondary ">Go back </a>
             <a href="#" class="btn btn-success disabled" role="button" aria-disabled="true">Add to cart</a>
             <a href="/Requestedbook" class=" btn btn-danger">View Cart</a>
             </div>
            @endif

            @if($book->quantity > 0 && !Auth::guest() && Auth::user()->id !== $book->user_id )
            <div style="display:inline">
                <a href="/books" class="btn btn-secondary">Go back </a>
                <a href="/addToCart/{{$book->id}}" class=" btn btn-success">Add to cart</a>
                <a href="/Requestedbook" class=" btn btn-danger">View Cart</a>
             </div>
             @elseif($book->quantity == 0 && !Auth::guest() && Auth::user()->id !== $book->user_id )
             
                    <a href="/books" class="btn btn-secondary">Go back </a>
                    <a href="#" class="btn btn-success disabled" role="button" aria-disabled="true">Add to cart</a>
                    <a href="/Requestedbook" class=" btn btn-danger">View Cart</a>
                 
            @endif
            
         </div>
      </div>
   </div>
</div>
<br>
<br>
<br>
<br>
@include('inc.footer')
@endsection