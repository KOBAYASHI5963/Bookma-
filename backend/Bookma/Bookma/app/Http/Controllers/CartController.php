<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Book;

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
                
        return view('pages.cart.show',compact('cartBooks'));
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

}