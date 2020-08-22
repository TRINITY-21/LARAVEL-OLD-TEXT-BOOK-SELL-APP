@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-9">
         @foreach($orders as $order)
          @foreach($order->bookcart->items as $item)
         @if($item['item']['user_id'] == $id)
         <div class="card">
            <div class="card-header bg-dark text-white">Student Orders</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif 
               {!! Form::open(['action' => ['AdminController@update', $order->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
               <div class="form-group">
                  <h4 class="text-dark">Order ID: <span class="badge badge-secondary">{{$order->id}}</span></h4>
               </div>
               <div class="form-group">
                  <h4 class="text-dark">Ordered By: <span class="badge badge-secondary">{{$order->user->name}}</span></h4>
               </div>
               {{-- <div class="form-group">
                  <h4 class="text-dark">Item Ordered: <span class="badge badge-secondary">{{$item['item']['title']}}</span></h4>
               </div> --}}
               <div class="form-group">
                  <h4 class="text-dark">Delivery Address: <span class="badge badge-secondary">{{$order->address}}</span></h4>
               </div>
               {{-- <div class="form-group">
                  <h4 class="text-dark">Quantity Ordered: <span class="badge badge-secondary">{{ $item['qty'] }}</span></h4>
               </div> --}}
               <div class="form-group">
                  <h4 class="text-dark">Order placed on: <span class="badge badge-secondary">{{ $order->created_at->format('d/m/Y')}}</span></h4>
               </div>
               <div class="form-group">
                  <h4 class="text-dark">Current Status: <span class="badge badge-info">{{$order->status}}</span></h4>
               </div>
               <div class="form-group">
                  <h4 class="text-dark">Status</h4>
                  <select class="form-control" name="status">
                     <option disabled selected value> -- select an option -- </option>
                     <option value="Recieved">Recieved</option>
                     <option value="Order Placed">Order Placed</option>
                  </select>
               </div>
               {{Form::hidden('_method','PUT')}}
               {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
               {!! Form::close() !!}
            </div>
         </div>
          @else
          <div class="card-body">

         <h3>No Book To Cashout</h3>
      </div>
         @endif



         @endforeach

         
         @endforeach
      </div>
   </div>
   {{$orders->links()}}
</div>
@include('inc.footer')
@endsection