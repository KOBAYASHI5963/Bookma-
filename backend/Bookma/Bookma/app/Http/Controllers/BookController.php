<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\ProductCondition;
use App\SippingMethod;
use App\ShippingArea;
use App\Book;

use App\Enums\ShippingBearerStatus;

class BookController extends Controller
{
    public function show($id)
    {
        
        $book = Book::find($id);
        $book->shipping_bearer = ShippingBearerStatus::getDescription($book->shipping_bearer);

        return view('pages.book.show',compact('book'));
    }
}
