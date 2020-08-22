{{-- @extends('layouts.app')
@section('content')
<br>
<br>
<div class="jumbotron text-center bg-danger">
        <h3 class="text-center text-white">About Us</h3>
     </div>
     <p>   Do you have old, unused books? Do you want to help someone in a lower year and make a bit of money doing that? Using this platform you will be able to!</p>
     <h3>How do I sell my books?</h3>
@include('inc.footer')
@endsection --}}

@extends('layouts.app') 
@section('content')

<br>
<div class="jumbotron text-center bg-danger">
        <h3 class="text-white">About</h3>
</div>
{{-- <h3>Do you have old, unused university textbooks? Do you want to help someone in a lower year and make a bit of money doing that? Using this platform, you can sell your unused textbooks!</h3> --}}

<div class="row">
    <div class="col-lg-4">
                                        {{-- <div class="card h-50 text-center sellbooks" style="background: #ff3300">
                                        <div class="card-body">
                                                <img src="" alt="" class="main-image img-fluid rounded">
                                                <div class="text-justify">
                                                <h4 class="card-title text-center text-white">How do I sell my books?</strong></h4>
                                                <li class="card-text text-white">
                                                        To sell your books: <a href="/register">Make an account</a> 
                                                </li>
                                                </div> --}}

                                                <div class="card  w-100 h-100" style="width: 18rem;">
                                                <div class="card-body">
                                                <h5 class="card-title text-center">How Do I Sell My Books?</h5>
                                                <li class="card-text">
                                                                To sell your books: <a href="/register" class="text-danger">Make an account here</a> 
                                                </li>
                                                <li class="card-text ">
                                                                Click on the add book link on the navigation bar
                                                </li>  
                                                <li class="card-text ">
                                                                Fill in the book's details
                                                </li>   
                                                <li class="card-text ">
                                                               Hit submit
                                                </li>         
                                                </div>
                                                </div>
            </div>

                <div class="col-lg-4">
                                <div class="card  w-100 h-100" style="width: 18rem;">
                                                <div class="card-body">
                                                <h5 class="card-title text-center">How Do I Buy Books?</h5>
                                                <li class="card-text">
                                                                To buy a book: <a href="/register" class="text-danger">Make an account here</a> 
                                                </li>
                                                <li class="card-text ">
                                                                Click on the add to cart button
                                                </li>  
                                                <li class="card-text ">
                                                                Navigate to the Requested Book
                                                </li>   
                                                <li class="card-text ">
                                                              Click checkout and fill in your payment details
                                                </li>         
                                                </div>
                                                </div>
            </div>

                <div class="col-lg-4">
                                <div class="card  w-100 h-100" style="width: 18rem;">
                                                <div class="card-body">
                                                <h5 class="card-title text-center">How Do I Track My Order(s)?</h5>
                                                <li class="card-text">
                                                                To track your order: Make sure you are logged in</a> 
                                                </li>
                                                <li class="card-text ">
                                                                Click on your account name and my orders
                                                </li>   
                                                <li class="card-text ">
                                                                Here you will be able to track your order(s)
                                                </div>
                                                </div>
            </div>
        </div>
        <br>
        <br>
   @include('inc.footer')
@endsection
