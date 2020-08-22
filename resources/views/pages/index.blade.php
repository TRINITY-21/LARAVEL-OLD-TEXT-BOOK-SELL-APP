@extends('layouts.app') @section('content')

<br>
<div class="jumbotron text-center bg-danger">
    <h3 class="text-center text-white">Latest Books</h3>
</div>

@if(count($books) > 0) @foreach($books->chunk(3) as $bookChunk)
<div class="row">
    @foreach($bookChunk as $book) 
    @if($book->quantity > 0 && !Auth::guest() && Auth::user()->id === $book->user_id)
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a> Qty: <span class="badge badge-primary">{{$book->quantity}}</span>
            </div>
        </div>
    </div>
    @elseif($book->quantity == 0 && !Auth::guest() && Auth::user()->id === $book->user_id)
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a>
                <a href="books/{{$book->id}}" class="btn btn-success disabled">Out Of Stock</a> Qty: <span class="badge badge-primary">{{$book->quantity}}</span>
            </div>
        </div>
    </div>
    @elseif($book->quantity > 0 && !Auth::guest() && Auth::user()->id !== $book->user_id)
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a>
                <a href="addToCart/{{$book->id}}" class=" btn btn-success">Add to cart</a> Qty: <span class="badge badge-primary">{{$book->quantity}}</span>
            </div>
        </div>
    </div>
    @elseif($book->quantity == 0 && !Auth::guest() && Auth::user()->id !== $book->user_id)
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a>
                <a href="addToCart/{{$book->id}}" class=" btn btn-success disabled">Out Of Stock</a> Qty: <span class="badge badge-primary">{{$book->quantity}}</span>
            </div>
        </div>
    </div>
    @elseif($book->quantity > 0 && Auth::guest())
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a>
                <a href="addToCart/{{$book->id}}" class=" btn btn-success">Add to cart</a><p> Qty: <span class="badge badge-primary">{{$book->quantity}}</span></p>
            </div>
        </div>
    </div>
    @elseif($book->quantity == 0 && Auth::guest())
    <div class="col-lg-5">
        <div class="card h-90 text-center">
            <div class="card-body">
                <img src="/storage/image/{{$book->image}}" alt="" class="main-image img-fluid rounded">
                <div class="text-justify">
                    <h5 class="card-title text-center"><strong>{{$book->title}}</strong></h5>
                    <p class="card-text">{!!$book->description!!}</p>
                </div>
                <a href="#" class="btn btn-secondary disabled">GHC{{number_format($book->price,2)}}</a>
                <a href="books/{{$book->id}}" class="btn btn-danger">View Book</a>
                <a href="addToCart/{{$book->id}}" class=" btn btn-success disabled">Out of Stock</a> Qty: <span class="badge badge-primary">{{$book->quantity}}</span>
            </div>
        </div>
    </div>
    @endif @endforeach
</div>
<br>
<br> 
@endforeach 
@endif 
{{$books->links()}} 
@include('inc.footer')
 @endsection