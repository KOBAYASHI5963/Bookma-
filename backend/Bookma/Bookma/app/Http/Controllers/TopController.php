<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class TopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newBooks = Book::orderBy('id', 'DESC')->take(4)->get();

        return view('pages.top',compact('newBooks'));
    }
}