@extends('layouts.app') 
@section('content')
<h1 class="text-center">Submit Book</h1>
{!! Form::open(['action' => 'BooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @include('inc.createform')
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection