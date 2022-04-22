<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

// リクエスト
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

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

        return view('pages.book.confirmPurchase',compact('book','shippingAddressLists'));
    }

    public function checkout(CheckoutRequest $request,$id)
    {
        
        $shippingAddressID = $request->shipping_address_id;
        $book = Book::find($id);
        $isSoldOut = $this->IsSoldOut($book->id);
            if($isSoldOut){
                return redirect()->route('book.show', $book->id);
            }

        $line_item = [
            'name'        => $book->title,
            'description' => $book->content,
            'amount'      => $book->price,
            'quantity'    => 1,
            'currency'    => 'jpy',
        ];

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$line_item],
            'success_url'          => route('book.success', ['id' => $book->id ,'shippingAddressID' => $shippingAddressID]),
            'cancel_url'           => route('top'),
        ]);
        return view('pages.cart.checkout',[
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
        ]);
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

    public function success($id,$shippingAddressID)
    {
 
        $book = Book::find($id);

        $PurchasedItem = new productPurchase;
    
        $PurchasedItem->user_id = Auth::id();
        $PurchasedItem->book_id = $book->id;
        $PurchasedItem->shipping_address_id = $shippingAddressID;
    
        $PurchasedItem->save();

        return redirect()->route('book.complete', ['id' => $book->id]);
        
    }
}
