<?php
 use App\Events\CheckoutEvent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PagesController@index' );
Route::get('/about','PagesController@about' );
Route::resource('books', 'BooksController');
Route::resource('admin', 'AdminController');
Route::get('books/{id}/delete', ['uses' => 'BooksController@destroy', 'as' => 'home.delete'] );
Route::get('/orderByTitle', 'BooksController@orderByTitle');
Route::get('/orderByAuthor', 'BooksController@orderByAuthor');
Route::get('/PriceGreaterThan50', 'BooksController@PriceGreaterThan50');
Route::get('/PriceLessThan50', 'BooksController@PriceLessThan50');
Route::get('/HighestToLowest', 'BooksController@HighestToLowest');
Route::get('/LowestToHighest', 'BooksController@LowestToHighest');
Route::get('/NewestToOldest', 'BooksController@NewestToOldest');
Route::get('/OldestToNewest', 'BooksController@OldestToNewest');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
Route::get('/orders', 'DashboardController@orders');
route::get('/admin', 'AdminController@index');
Route::get('/addToCart/{id}', 'BooksController@getAddToCart');
Route::get('/reduce/{id}', 'BooksController@getReduceByOne');
Route::get('/removeItem/{id}', 'BooksController@getRemoveItem');
Route::get('/Requestedbook', 'BooksController@getCart');
route::get('/checkout', 'BooksController@getCheckout');
route::post('/checkout', 'BooksController@postcheckout');
route::get('/search', 'QueryController@search');
route::resource('categories', 'CategoryController', ['except' => ['create', 'edit', 'update', 'destroy']]);
Route::resource('contact', 'ContactUSController',  ['except' => ['create', 'edit', 'update', 'destroy', 'show']] );




Route::get('/notification', function () {
   event(new CheckoutEvent);

    return "Event!";
});