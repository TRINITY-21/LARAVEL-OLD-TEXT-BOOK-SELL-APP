@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <div class="card-header">Dashboard</div>
            <example-component></example-component>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               @if(count($books) > 0)
               <h1 class="text-center text-inverse text-dark" style="padding:35px">My Books for sale</h1>
               <div class="table table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                     <thead class="thead-dark">
                        <tr>
                           <th class="text-center">Title</th>
                           <th class="text-center">Description</th>
                           <th class="text-center">Price</th>
                           <th class="text-center" colspan="2">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($books as $book)
                        <tr>
                           <td class="text">{{$book->title}}</td>
                           <td class="text"> {!!$book->description!!} </td>
                           <td class="text-center"> GHC{{number_format($book->price, 2)}} </td>
                           @auth
                           @if(Auth::user()->id == $book->user_id)
                           <td>
                              <div class="btn-group d-flex" role="group" aria-label="Options">
                                 <a type="button "href="{{ route('books.edit',$book->id)}}" class="btn btn-primary w-100">Edit</a>
                                 <a type="button "href="{{ route('home.delete',$book->id)}}" Onclick="return ConfirmDelete()"  class="btn btn-danger w-100">Delete</a>
                              </div>
                           </td>
                           @endif
                           @endauth
                        </tr>
                     </tbody>
                     @endforeach
                     @else
                     <h1 class="text-center text-inverse text-dark" style="padding:35px">No Books Avaliable</h1>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     @endif
                  </table>
                  <a href="categories" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">View Categories</a>

                   <a href="/books/create" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Add Book</a>
               </div>
            </div>
         </div>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
      </div>
   </div>
</div>
@include('inc.footer')
@endsection