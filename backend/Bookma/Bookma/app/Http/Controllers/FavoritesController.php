<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class FavoritesController extends Controller
{
    public function store(Book $book)
    {
        $book->users()->attach(Auth::id());
        return redirect()->route('book.show');
    }

    public function destroy(Book $book)
    {
        $book->users()->detach(Auth::id());
        return redirect()->route('book.show');
    }
}
