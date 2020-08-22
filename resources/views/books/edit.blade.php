@extends('layouts.app') 
@section('content')
<h1 class="text-center">Edit Book</h1>
{!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @include('inc.editform')
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection