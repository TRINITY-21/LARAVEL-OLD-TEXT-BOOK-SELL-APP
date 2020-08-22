<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\ContactUS;

class ContactUSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            ]);
        ContactUS::create($request->all());
        Mail::send('email',

        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
        
        {
        $message->from('techanical-atom@gmail.com');
        $message->to('sayyidrasool0@gmail.com', 'Admin')
        ->subject('Contact Form Query');
    });

        return back()->with('success', 'Thanks for contacting us!');
    }
}
