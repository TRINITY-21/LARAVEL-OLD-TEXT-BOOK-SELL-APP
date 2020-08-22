<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Book;
use Session;
use App\Cart;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
        {
        $this->guard()->logout();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $books = Book::all();

        if($cart->items > 0)
        {
        foreach($cart->items as $item){
            foreach($books as $book){
                if($book->id == $item['item']['id']){
                    $book->increment('quantity', $cart->items[$book->id]['qty']);
                }
             }
            }
        }

            $request->session()->invalidate();

            return redirect('/');
        }

}
