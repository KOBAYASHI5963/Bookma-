<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

// リクエスト
use Illuminate\Http\Request;

// モデル
use App\productPurchase;
use App\ShippingAddress;
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
        $isSoldOut = $this->IsSoldOut($id);

        $book = Book::find($id);
        $book->shipping_bearer = ShippingBearerStatus::getDescription($book->shipping_bearer);

        return view('pages.book.show',compact('book', 'isSoldOut'));
    }

    public function purchase($id)
    {
        
        $book = Book::find($id);
        $user = Auth::user();
        $shippingAddressLists = shippingAddress::select('*')->where('user_id', $user->id)
        ->get();

        return view('pages.book.confirmPurchase',compact('book','user','shippingAddressLists'));
    }

    public function complete($id)
    {
        
        $book = Book::find($id);
        
        return view('pages.book.settlement',compact('book'));
    }

    public function IsSoldOut($id) {

        $productPurchase = productPurchase::where('book_id', $id)
            ->first();
    
        $isSoldOutFlag = $productPurchase == null  ? false : true;
    
        return $isSoldOutFlag;
    }
}
