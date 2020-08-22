@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-8">
      @if(!$categories->isEmpty())
      <h1 class="text-center">Avaliable Categories</h1>
      <br>
      <table class="table">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
            </tr>
         </thead>
         <tbody>
            @foreach($categories as $category)
            <tr>
               <th>{{$category->id}}</th>
               <td>{{$category->name}}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      @else 
      <h1 class="text-center">No Categories Available </h1>
      @endif
   </div>
   <div class="col-md-3">
      <div class="well">
         {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
         <h2 class="text-dark">New Category</h2>
         {{Form::label('name', 'Name')}}
         {{Form::text('name', null, ['class' => 'form-control'])}}
         <br>
         {{Form::submit('Create', ['class' => 'btn btn-primary btn-block'])}}
         {!! Form::close()!!}
      </div>
   </div>
</div>
@include('inc.footer')
@endsection