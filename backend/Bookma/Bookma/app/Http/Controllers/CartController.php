<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

use App\Cart;
use App\Book;
use App\LineItem;
use App\productPurchase;
use App\shippingAddress;


class CartController extends Controller
{
    public function show()
    {

        $cart = Cart::where('user_id', Auth::id())
        ->first();

        $cartBooks = Book::select('*')
                ->whereHas('carts',function($query) use($cart) {
                    $query->whereIn('cart_books.cart_id', [$cart->id]);
                })
                ->paginate(5);

        $user = Auth::user();
        $shippingAddressLists = shippingAddress::select('*')->where('user_id', $user->id)->get();
                
        return view('pages.cart.show',compact('cartBooks','shippingAddressLists'));
    }

    public function store(Request $request)
    {
        $bookId = $request->book_id;
  
        $book = Book::find($bookId);
        $user = Auth::user();
        //ログインユーザーのカート
        $existingCart = Cart::where('user_id', $user->id)
        ->first();
        //ログインユーザーがカートを持っていない場合
        if(!$existingCart) {
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->save();
            $cart->books()->attach($book->id);
        } else {
            $cartId = $existingCart->id;
            $existingCartBook = Cart::whereHas('books', function($q) use($bookId, $cartId)  {
              $q->where('cart_books.book_id', $bookId)
                ->where('cart_books.cart_id', $cartId);
            })
            ->first();
            //ログインユーザーがカートに商品を入れていない場合
            if(!$existingCartBook){
                $existingCart->books()->attach($book->id);
            } else {
                return redirect()->route('cart.show');
            }
        }
        return redirect()->route('cart.show');
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())
        ->first();

        $cart->books()->detach($id);
        return redirect()->route('cart.show');
    }

    public function checkout(CheckoutRequest $request)
    {
        $shippingAddressID = $request->shipping_address_id;

        $cart = Cart::where('user_id', Auth::id())
        ->first();
        
        $cartBooks = Book::select('*')
                ->whereHas('carts',function($query) use($cart) {
                    $query->whereIn('cart_books.cart_id', [$cart->id]);
                })
                ->get();

                foreach ($cartBooks as $cartBook) {
                    $isSoldOut = $this->IsSoldOut($cartBook->id);
                    if($isSoldOut){
                        return redirect()->route('book.show', $cartBook->id);
                    }
                }
        
        if (count($cartBooks) <= 0) {
             return redirect(route('cart.show'));
            }

        $line_items = [];
        foreach ($cartBooks as $cartBook) {
            $line_item = [
                'name'        => $cartBook->title,
                'description' => $cartBook->content,
                'amount'      => $cartBook->price,
                'quantity'    => 1,
                'currency'    => 'jpy',
            ];
            array_push($line_items, $line_item);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [$line_items],
            'success_url'          => route('cart.success', ['shippingAddressID' => $shippingAddressID]),
            'cancel_url'           => route('top'),
        ]);
        return view('pages.cart.checkout',[
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
       ]);
    }

    public function IsSoldOut($id) {

        $productPurchase = productPurchase::where('book_id', $id)
            ->first();
    
        $isSoldOutFlag = $productPurchase == null  ? false : true;
    
        return $isSoldOutFlag;
    }

    public function success($shippingAddressID)
    {
 
        $cart = Cart::where('user_id', Auth::id())
        ->first();
        
        $cartBooks = Book::select('*')
                ->whereHas('carts',function($query) use($cart) {
                    $query->whereIn('cart_books.cart_id', [$cart->id]);
                })
                ->get();

        foreach ($cartBooks as $cartBook) {
            $PurchasedItem = new productPurchase;
    
            $PurchasedItem->user_id = Auth::id();
            $PurchasedItem->book_id = $cartBook->id;
            $PurchasedItem->shipping_address_id = $shippingAddressID;
    
            $PurchasedItem->save();
        }

        $cart->books()->detach();

        return redirect()->route('cart.show');


    }
}