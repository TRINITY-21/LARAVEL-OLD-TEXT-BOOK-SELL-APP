@extends('layouts.app')
@section('content')
<h1 class="text-center">Requested Books</h1>
@if(Session::has('cart'))
<div class="row">
   <div class="col-lg-12">
      <ul class="list-group">
         @foreach($books as $book)
         <li class="list-group-item">
            <span class="badge badge-secondary">{{ $book['qty'] }}</span>
            <strong>{{ $book['item']['title'] }}</strong>
            <span class="label label-success">GHC{{number_format($book['price'],2) }}</span>
            <div class="btn-group">
               <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/reduce/{{$book['item']['id']}}">Reduce item by one</a>
                     <a class="dropdown-item" href="/removeItem/{{$book['item']['id']}}">Remove all items</a>
                  </div>
               </div>
            </div>
         </li>
         @endforeach
      </ul>
   </div>
</div>
<div class="row">
   <div class="col-lg-6">
      <strong>Total: GHC{{number_format($totalPrice,2) }}</strong>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-lg-6">
      <a href="/checkout" type="button" class="btn btn-success">Checkout</a>
   </div>
</div>
@else
<div class="row">
   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
      <h2>No Items in Cart!</h2>
   </div>
</div>
@endif
<br>
<br>
@include('inc.footer')
@endsection