<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class QueryController extends Controller
{
    /**
     * Search a book by title, author, ISBN
     *
     * @param  \Illuminate\Http\Request  $request
     */
public function search(Request $request){ 
  $query = $request->get('search');
  $books = DB::table('books')->where('title', 'LIKE', '%' . $query . '%')
  ->orWhere('author', 'Like', '%' . $query . '%')
  ->orwhere('type', 'like', '%' . $query . '%')
  ->orwhere('ISBN', 'like', '%' . $query . '%')
  ->orwhere('price', 'like', '%' . $query . '%')
  ->paginate(5);
      
  return view('pages.search')->with('books', $books);
 }
}
