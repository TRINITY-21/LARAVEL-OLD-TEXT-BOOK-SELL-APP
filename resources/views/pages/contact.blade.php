@extends('layouts.app')
@section('content')
<br>
<br>
<div class="jumbotron text-center bg-danger">
        <h3 class="text-center text-white">Contact Us</h3>
     </div>
                    {!! Form::open(['action' => 'ContactUSController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('Name:') !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('Email:') !!}
                    {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    {!! Form::label('Message:') !!}
                    {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-danger">Contact Us!</button>
                    </div>
                    {!! Form::close() !!}
@include('inc.footer')
@endsection
