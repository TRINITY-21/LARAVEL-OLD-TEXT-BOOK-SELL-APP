<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\CheckoutNotification;
use App\Mail\CheckoutMail;
use App\Book;
use Mail;

use App\Cart;

//use Stripe\Stripe;
use App\Events\CheckoutEvent;

use Session;

use Auth;
use App\User;
use App\Order;

use App\Category;

//use LVR\CreditCard\CardCvc;
//use LVR\CreditCard\CardNumber;
//use LVR\CreditCard\CardExpirationYear;
//use LVR\CreditCard\CardExpirationMonth;

class BooksController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'getAddToCart', 'getCart', 'getReduceByOne','getRemoveItem', 'orderByTitle', 'orderByAuthor', 'HighestToLowest', 'LowestToHighest', 'PriceLessThan50', 'PriceGreaterThan50', 'NewestToOldest', 'OldestToNewest']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $books = Book::all();
        $categories = Category::all();
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('books.index')->with('books', $books)->with('categories', $categories );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('books.create')->with('categories',  $categories );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999',
            'author' => 'required',
            'publishedOn' => 'required|date|before:tomorrow',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'type' => 'required',
            //'ISBN' => ['somestimes|regex:/((978[\--– ])?[0-9][0-9\--– ]{10}[\--– ][0-9xX])|((978)?[0-9]{9}[0-9Xx])$/'],
            'quantity' => 'required|numeric',
            'location' => 'required',
            'category_id' => 'integer',
            'contact' =>'required|numeric|min:10',
        ]);

        //Handles the uploading of the image 
        if ($request->hasFile('image')){
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
           //Gets the filename to store 
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
   
            //Uploads the image 
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
   
             } else {
   
                 $fileNameToStore = 'noimage.jpg';
             }

        $Book = new Book;
        $Book->title = $request->input('title');
        $Book->description = $request->input('description');
        $Book->image = $fileNameToStore;
        $Book->author = $request->input('author');
        $Book->publishedOn = $request->input('publishedOn');
        $Book->price = $request->input('price');
        $Book->type = $request->input('type');
        $Book->ISBN = $request->input('ISBN');
        $Book->quantity = $request->input('quantity');
        $Book->location = $request->input('location');
        $Book->category_id = $request->input('category_id');
        $Book->contact = $request->input('contact');
        $Book->user_id = auth()->user()->id;
        $Book->save();
        return redirect('/books')->with('success', 'Book Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view ('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        if(auth()->user()->id !== $book->user_id){
            return redirect ('/books')->with('error', 'Unauthorised Page');
        }
        return view ('books.edit')->with('book', $book)->with('categories', $categories );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publishedOn' => 'required|date|before:tomorrow',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'type' => 'required',
            //'ISBN' => ['somestimes|regex:/((978[\--– ])?[0-9][0-9\--– ]{10}[\--– ][0-9xX])|((978)?[0-9]{9}[0-9Xx])$/'],
            'quantity' => 'required|numeric',
            'location' => 'required',
            'category_id' => 'integer',
            'contact' => 'numeric',

        ]);

      //Handles the uploading of the image 
      if ($request->hasFile('image')){
        //Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        //just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
       //Gets the filename to store 
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //Uploads the image 
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

         } else {

             $fileNameToStore = 'noimage.jpg';
         }

        $Book = Book::findOrFail($id);
        $Book->title = $request->input('title');
        $Book->description = $request->input('description');
        $Book->author = $request->input('author');
        $Book->quantity = $request->input('quantity');
        $Book->publishedOn = $request->input('publishedOn');
        $Book->price = $request->input('price');
        $Book->type = $request->input('type');
        $Book->ISBN = $request->input('ISBN');
        $Book->category_id = $request->input('category_id');
        $Book->location = $request->input('location');
        $Book->contact = $request->input('contact');
        if ($request->hasFile('image')){
            $Book->image = $fileNameToStore;
        }
        $Book->save();
        return redirect('/books')->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if(auth()->user()->id !== $book->user_id){
            return redirect ('/books')->with('error', 'Unauthorised Page');
        }
        $book->delete();
        return redirect('/books')->with('success', 'Book Deleted');
    }

    
    /**
     * Add an item to the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAddToCart(Request $request, $id){

        $book = Book::findOrFail($id);
        $book->decrement('quantity');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($book, $book->id);
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Added book');
    }

    /**
     * Reduce an item by one in the shopping cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getReduceByOne($id){
        $book = Book::findOrFail($id);
        $book->increment('quantity');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        // $book->increment('quantity');
        return redirect()->back()->with('success', 'Reduced by one');

    }

    /**
     * Remove an item from the shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRemoveItem($id){
        $book = Book::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $book->increment('quantity', $cart->items[$id]['qty']);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->back()->with('success', 'Removed Item');
    }

    /**
     * Get shopping cart
     */
    public function getCart(){
         
        if(!Session::has('cart')){
            return view('cart.index',['books' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('cart.index',['books' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Get the checkout
     */
   public function getCheckout(){

    if(!Session::has('cart')){
        return view('cart.index',['books' => null]);
    }

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    $total = $cart->totalPrice;
    return view ('cart.checkout')->with('total', $total);
   }

  /**
     * Post checkout stripe payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function postcheckout(Request $request){
    
    $this->validate($request,[
        'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        'phone' => 'required|max:10',
    ]);

    if(!Session::has('cart')){
        return redirect()->back();
    }

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);

    //Stripe::setApiKey('sk_test_eO1eHIzneDLjxooZHBoQFDUR');
    //try {
     // $token = $_POST['stripeToken'];
     // $charge =  \Stripe\Charge::create([
         //   "amount" => $cart->totalPrice * 100,
        //    "currency" => "gbp",
       //     "source" => 'tok_visa', // obtained with Stripe.js
        //    "description" => "Test Charge
       //     'source' => $token,
       //   ]);
      $order = new Order();
      $order->bookcart = serialize($cart);
      $order->address = $request->input('address');
      $order->phone = $request->input('phone');
      $order->name = $request->input('name');
      $order->status = 'Order Placed';
      //$order->order_payment_id = $charge->id;
      Auth::user()->orders()->save($order);
   //} catch (\Exception $e) {
       // return redirect('/books')->with('error', $e->getMessage());
   // } 

        Session::forget('cart');
      //auth()->user()->notify(new CheckoutNotification);
        //mail::to($users->books->email)->send(
           //new CheckoutMail($books));

        event(new CheckoutEvent('Someone'));
        

        //dd($user->books->email);
        return redirect('/books')->with('success', 'Contact Owner for the books!!!');
    }


    /**
     * Order a book by its title 
     */
    public function orderByTitle()
    {
        $categories = Category::all();
        $books = Book::orderBy('title')->paginate(10);
        return view('books.orderByTitle')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Order a book by its author
     */

    public function orderByAuthor()
    {
        $categories = Category::all();
        $books = Book::orderBy('author')->paginate(10);
        return view('books.orderByAuthor')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Filters books that are greater than £50
     */
    public function PriceGreaterThan50()
    {
        $categories = Category::all();
        $books = Book::PriceGreaterThan(50)->paginate(10);
        return view('books.PriceGreaterThan50')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Filters books that are less than £50
     */
    public function PriceLessThan50()
    {
        $categories = Category::all();
        $books = Book::PriceLessThan(50)->paginate(10);
        return view('books.PriceLessThan50')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Order the price of books by highest to lowest
     */
    public function HighestToLowest()
    {
        $categories = Category::all();
        $books = Book::orderBy('price','desc')->paginate(10);
        return view('books.HighestToLowest')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Order the price of books by lowest to highest
     */
    public function LowestToHighest()
    {
        $categories = Category::all();
        $books = Book::orderBy('price','asc')->paginate(10);
        return view('books.LowestToHighest')->with('books', $books)->with('categories', $categories);
    }

    /**
     * Order book by newest to oldest
     */
    public function NewestToOldest()
    {
        $categories = Category::all();
        $books = Book::orderBy('created_at','desc')->paginate(10);
        return view('books.NewestToOldest')->with('books', $books)->with('categories', $categories);
    }

     /**
     * Order book by oldest to newest
     */
    public function OldestToNewest()
    {
        $categories = Category::all();
        $books = Book::orderBy('created_at','asc')->paginate(10);
        return view('books.OldestToNewest')->with('books', $books)->with('categories', $categories);
    }

}
