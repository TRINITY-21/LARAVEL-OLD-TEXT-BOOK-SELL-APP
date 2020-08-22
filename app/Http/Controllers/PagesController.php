<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class PagesController extends Controller
{
    /**
     * Return index page of books
     */
    public function index() {

        $books = Book::orderBy('created_at', 'desc')->paginate(3);
        return view ('pages.index')->with('books', $books);
    }

    
    /**
     * Return about page of books
     */
    public function about() {

        return view ('pages.about');
    }


    /**
     * Return contact page of books
     */
    public function contact() {

        return view ('pages.contact');
    }
}
