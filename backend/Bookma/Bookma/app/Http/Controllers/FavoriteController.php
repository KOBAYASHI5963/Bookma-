<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class FavoriteController extends Controller
{
    public function store(Book $book)
    {
        $book->favoriteUsers()->attach(Auth::id());
        return back();
    }

    public function destroy(Book $book)
    {
        $book->favoriteUsers()->detach(Auth::id());
        return back();
    }
}
