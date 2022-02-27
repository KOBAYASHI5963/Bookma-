<?php

namespace App\Http\Controllers;

// リクエスト
use Illuminate\Http\Request;

// モデル
use App\BookImage;
use App\Category;
use App\ProductCondition;
use App\SippingMethod;
use App\ShippingArea;
use App\Book;
use App\UserProfile;
use App\User;

// Enum
use App\Enums\ShippingBearerStatus;

class BookController extends Controller
{
    public function show($id)
    {
        
        $book = Book::find($id);
        $book->shipping_bearer = ShippingBearerStatus::getDescription($book->shipping_bearer);

        return view('pages.book.show',compact('book'));
    }

    public function purchase($id)
    {
        
        $book = Book::find($id);

        return view('pages.book. confirmPurchase',compact('book'));
    }
}
