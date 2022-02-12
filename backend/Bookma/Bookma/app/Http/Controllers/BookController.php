<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\ProductCondition;
use App\ShippingArea;
use App\SippingMethod;
use App\Book;

use App\Enums\ShippingBearerStatus;

class BookController extends Controller
{
    public function show($id)
    {
        
        $book = Book::find($id);
        $category = Category::find($id);
        $productCondition = ProductCondition::find($id);
        $shippingArea = ShippingArea::find($id);
        $sippingMethod = SippingMethod::find($id);
        $book->shipping_bearer = ShippingBearerStatus::getDescription($book->shipping_bearer);

        return view('pages.book.show',compact('book','category','productCondition','shippingArea','sippingMethod'));
    }
}
