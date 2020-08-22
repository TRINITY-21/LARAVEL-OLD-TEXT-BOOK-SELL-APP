@extends('layouts.app')
@section('content')
<h1 class="text-center">My orders</h1>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <div class="card-header">My Orders</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <div class="table table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                     <thead class="thead-dark">
                        <tr>
                           <th class="text-center">Order</th>
                           <th class="text-center">Order Date</th>
                           <th class="text-center">Quantity</th>
                           <th class="text-center">Total</th>
                           <th class="text-center">Location Of Item</th>
                           <th class="text-center">Delivery Address</th>
                           <th class="text-center">Contact</th>
                           <th class="text-center">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($orders as $order)
                        @foreach($order->bookcart->items as $item)
                        <tr>
                           <td class="text-center">{{ $item['item']['title'] }}</td>
                           <td class="text-center"> {{$order->created_at->format('d/m/Y')}}</td>
                           <td class="text-center">{{ $item['qty'] }}</td>
                           <td class="text-center">GHC{{number_format($item['price'],2)}} </td>
                           <td class="text-center">{{$item['item']['location']}}</td>
                           <td class="text-center">{{$order->address}}</td>
                           <td class="text-center">0{{$order->phone}}</td>
                           <td class="text-center">{{$order->status}}</td>
                        </tr>
                     </tbody>
                     @endforeach
                     @endforeach
                  </table>
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