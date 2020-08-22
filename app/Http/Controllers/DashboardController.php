<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Book;

use App\Cart;


use Session;

use Auth;

use App\Order;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('dashboard')->with('books', $user->books);
    }

    // Display the order made by the student
    public function orders(){
        $orders = Auth::user()->orders->sortByDesc('created_at');
        $orders->transform(function($order, $key) {
            $order->bookcart = unserialize($order->bookcart);
            return $order;
        });

        return view('orders', ['orders' => $orders]);
    }

}
