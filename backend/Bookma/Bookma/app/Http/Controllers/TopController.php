<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Category;
use App\ProductCondition;
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
        $books = Book::orderBy('id', 'ASC')->take(4)->get();
        $categories = Category::all();

        return view('pages.top',compact('newBooks','books','categories'));
    }

    public function searchFunction(Request $request)
    {
        $categories = Category::all();
        $productConditions = ProductCondition::all();
        $category = Category::find($request->category_id);
        $productCondition = ProductCondition::find($request->product_condition);

        $categoryID = $request->category_id;
        $productConditionID = $request->product_condition;
        $priceID = $request->price;
        


        // 5
        // $request->input()で検索時に入力した項目を取得
        $searchKeyword = $request->input('keyword');
        $searchCategory = $request->input('category_id');
        $searchProductCondition = $request->input('product_condition');
        $searchPeice = $request->input('price');

        $_keyword = str_replace('　', ' ', $searchKeyword);  //全角スペースを半角に変換
        $_keyword = preg_replace('/\s(?=\s)/', '', $_keyword); //連続する半角スペースは削除
        $_keyword = trim($_keyword); //文字列の先頭と末尾にあるホワイトスペースを削除

        // トップページのキーワード検索
        if($request->keyword)
        {
            $books = Book::where('title', 'like', "%$_keyword%")
                          ->orWhere('content', 'like', "%$_keyword%")
                          ->paginate(5);
            $message =$request->keyword;
        }
        // トップページのジャンル検索
        if($request->category_id)
        {
            $books = Book::select('*')
                ->where(function($query) use($categoryID){
                    $query->where('category_id', $categoryID);
                })
                ->paginate(5);

                $searchResultWord = [];
                array_push($searchResultWord, $category->name);
                    $message = implode(' ｜ ', $searchResultWord);
        }

        //以下から詳細ページ
        // A のみ⇨もし「キーワード」のみ入力されていたら(キーワードのみ)
        if($request->keyword && (!$request->category_id && !$request->product_condition) && !$request->price)
        {
            $books = Book::where('title', 'like', "%$_keyword%")
                          ->orWhere('content', 'like', "%$_keyword%")
                          ->paginate(5);
            $message =$request->keyword;
        }
        
        // A and B ⇨もし「キーワード」かつ「プルダウン」が入力されていたら(キーワード、カテゴリー、コンディション)
        if($request->keyword && ($request->category_id || $request->product_condition) && !$request->price)
        {
            $books = Book::select('*')
                ->where(function($query) use($_keyword){
                    $query->where('title', 'like', "%$_keyword%")
                          ->orWhere('content', 'like', "%$_keyword%");
                })
                ->where(function($query) use($categoryID, $productConditionID ){
                    $query->where('category_id', $categoryID)
                          ->orWhere('product_condition', $productConditionID);
                })
                ->paginate(5);

                $searchResultWord = [];

                if($request->keyword && ($request->category_id && !$request->product_condition) && !$request->price){
                    array_push($searchResultWord, $request->keyword, $category->name);
                    $message = implode(' ｜ ', $searchResultWord);
                }else if($request->keyword && (!$request->category_id && $request->product_condition) && !$request->price){
                    array_push($searchResultWord, $request->keyword, $productCondition->condition);
                    $message = implode(' ｜ ', $searchResultWord);
                }else{
                    array_push($searchResultWord, $request->keyword, $category->name, $productCondition->condition);
                    $message = implode(' ｜ ', $searchResultWord);
                }
        }

        // A and B and C ⇨もし「キーワード」かつ「プルダウン」が入力されていたら(キーワード、カテゴリー、コンディション、プライス)
        if($request->keyword && ($request->category_id || $request->product_condition) && $request->price)
        {
            $books = Book::select('*')
            ->where(function($query) use($_keyword){
                $query->where('title', 'like', "%$_keyword%")
                      ->orWhere('content', 'like', "%$_keyword%");
            })
            ->where(function($query) use($categoryID, $productConditionID ){
                $query->where('category_id', $categoryID)
                      ->orWhere('product_condition', $productConditionID);
            })
            ->where(function($query) use($priceID){
                $query->when($priceID == 1, function($query) {
                    return $query->where('price', '<=', 500);
            })
            ->when($priceID == 2, function($query) {
                return $query->where('price', '<=', 1000)
                             ->where('price', '>=', 501);
            })
            ->when($priceID == 3, function($query) {
                return $query->where('price', '<=', 2000)
                             ->where('price', '>=', 1001);
            })
            ->when($priceID == 4, function($query) {
                return $query->where('price', '<=', 3000)
                             ->where('price', '>=', 2001);
            })
            ->when($priceID == 5, function($query) {
                return $query->where('price', '<=', 5000)
                             ->where('price', '>=', 3001);
            })
            ->when($priceID == 6, function($query) {
                return $query->where('price', '<=', 10000)
                              ->where('price', '>=', 5001);
            })
            ->when($priceID == 7, function($query) {
                return $query->where('price', '<=', 50000)
                             ->where('price', '>=', 10001);
            })
            ->when($priceID == 8, function($query) {
                return $query->where('price', '<=', 100000)
                             ->where('price', '>=', 50001);
            })
            ->when($priceID == 9, function($query) {
                return $query->where('price', '>=', 100001);
            });
        })
        ->paginate(5);

        $searchResultWord = [];

        if($request->keyword && ($request->category_id && !$request->product_condition) && $request->price){
             array_push($searchResultWord, $request->keyword, $category->name);
            $message = implode(' ｜ ', $searchResultWord);
            }else if($request->keyword && (!$request->category_id && $request->product_condition) && $request->price){
            array_push($searchResultWord, $request->keyword, $productCondition->condition);
            $message = implode(' ｜ ', $searchResultWord);
            }else{
            array_push($searchResultWord, $request->keyword, $category->name, $productCondition->condition);
            $message = implode(' ｜ ', $searchResultWord);
            }
        }

        // A and C ⇨もし「キーワード」かつ「プルダウン」が入力されていたら(キーワード、プライス)
        if($request->keyword && (!$request->category_id && !$request->product_condition) && $request->price)
        {
            $books = Book::select('*')
            ->where(function($query) use($_keyword){
                $query->where('title', 'like', "%$_keyword%")
                      ->orWhere('content', 'like', "%$_keyword%");
            })
            ->where(function($query) use($priceID){
                $query->when($priceID == 1, function($query) {
                    return $query->where('price', '<=', 500);
            })
            ->when($priceID == 2, function($query) {
                return $query->where('price', '<=', 1000)
                             ->where('price', '>=', 501);
            })
            ->when($priceID == 3, function($query) {
                return $query->where('price', '<=', 2000)
                             ->where('price', '>=', 1001);
            })
            ->when($priceID == 4, function($query) {
                return $query->where('price', '<=', 3000)
                             ->where('price', '>=', 2001);
            })
            ->when($priceID == 5, function($query) {
                return $query->where('price', '<=', 5000)
                             ->where('price', '>=', 3001);
            })
            ->when($priceID == 6, function($query) {
                return $query->where('price', '<=', 10000)
                              ->where('price', '>=', 5001);
            })
            ->when($priceID == 7, function($query) {
                return $query->where('price', '<=', 50000)
                             ->where('price', '>=', 10001);
            })
            ->when($priceID == 8, function($query) {
                return $query->where('price', '<=', 100000)
                             ->where('price', '>=', 50001);
            })
            ->when($priceID == 9, function($query) {
                return $query->where('price', '>=', 100001);
            });
        })
        ->paginate(5);
        $message = "$request->keyword";
        }

        // カテゴリー、コンディションのみ
        if(!$request->keyword && ($request->category_id || $request->product_condition) && !$request->price)
        {
            $books = Book::select('*')
            ->where(function($query) use($categoryID, $productConditionID){
                $query->where('category_id', $categoryID)
                      ->orwhere('product_condition', $productConditionID);
            })
            ->paginate(5);

            $searchResultWord = [];

            if(!$request->keyword && ($request->category_id && !$request->product_condition) && !$request->price){
                array_push($searchResultWord, $category->name);
               $message = implode(' ｜ ', $searchResultWord);
              }else if(!$request->keyword && (!$request->category_id && $request->product_condition) && !$request->price){
               array_push($searchResultWord, $productCondition->condition);
               $message = implode(' ｜ ', $searchResultWord);
               }else{
               array_push($searchResultWord, $category->name, $productCondition->condition);
               $message = implode(' ｜ ', $searchResultWord);
               }
        }

        // B and C ⇨もし「プルダウン」が入力されていたら(カテゴリー、コンディション、プライス)
        if(!$request->keyword && ($request->category_id || $request->product_condition) && $request->price)
        {
            $books = Book::select('*')
            ->where(function($query) use($categoryID, $productConditionID, $priceID){
            $query->where('category_id', $categoryID)
                  ->orWhere('product_condition', $productConditionID);
            })
            ->where(function($query) use($priceID){
            $query->when($priceID == 1, function($query) {
                return $query->where('price', '<=', 500);
            })
            ->when($priceID == 2, function($query) {
                return $query->where('price', '<=', 1000)
                             ->where('price', '>=', 501);
            })
            ->when($priceID == 3, function($query) {
                return $query->where('price', '<=', 2000)
                             ->where('price', '>=', 1001);
            })
            ->when($priceID == 4, function($query) {
                return $query->where('price', '<=', 3000)
                             ->where('price', '>=', 2001);
            })
            ->when($priceID == 5, function($query) {
                return $query->where('price', '<=', 5000)
                             ->where('price', '>=', 3001);
            })
            ->when($priceID == 6, function($query) {
                return $query->where('price', '<=', 10000)
                              ->where('price', '>=', 5001);
            })
            ->when($priceID == 7, function($query) {
                return $query->where('price', '<=', 50000)
                             ->where('price', '>=', 10001);
            })
            ->when($priceID == 8, function($query) {
                return $query->where('price', '<=', 100000)
                             ->where('price', '>=', 50001);
            })
            ->when($priceID == 9, function($query) {
                return $query->where('price', '>=', 100001);
            });
        })
        ->paginate(5);

        $searchResultWord = [];

        if(!$request->keyword && ($request->category_id && !$request->product_condition) && $request->price){
            array_push($searchResultWord, $category->name);
           $message = implode(' ｜ ', $searchResultWord);
           }else if(!$request->keyword && (!$request->category_id && $request->product_condition) && $request->price){
           array_push($searchResultWord, $productCondition->condition);
           $message = implode(' ｜ ', $searchResultWord);
           }else{
           array_push($searchResultWord, $category->name, $productCondition->condition);
           $message = implode(' ｜ ', $searchResultWord);
           }
        }

        // プライスのみ
        if(!$request->keyword && (!$request->category_id && !$request->product_condition) && $request->price)
        {
            $books = Book::select('*')
            ->where(function($query) use($priceID){
            $query->when($priceID == 1, function($query) {
                return $query->where('price', '<=', 500);
            })
            ->when($priceID == 2, function($query) {
                return $query->where('price', '<=', 1000)
                             ->where('price', '>=', 501);
            })
            ->when($priceID == 3, function($query) {
                return $query->where('price', '<=', 2000)
                             ->where('price', '>=', 1001);
            })
            ->when($priceID == 4, function($query) {
                return $query->where('price', '<=', 3000)
                             ->where('price', '>=', 2001);
            })
            ->when($priceID == 5, function($query) {
                return $query->where('price', '<=', 5000)
                             ->where('price', '>=', 3001);
            })
            ->when($priceID == 6, function($query) {
                return $query->where('price', '<=', 10000)
                              ->where('price', '>=', 5001);
            })
            ->when($priceID == 7, function($query) {
                return $query->where('price', '<=', 50000)
                             ->where('price', '>=', 10001);
            })
            ->when($priceID == 8, function($query) {
                return $query->where('price', '<=', 100000)
                             ->where('price', '>=', 50001);
            })
            ->when($priceID == 9, function($query) {
                return $query->where('price', '>=', 100001);
            });
        })
        ->paginate(5);
        $message = "";
        }

        // 検索欄に何も入力がなかったら
        if(!$request->keyword && (!$request->category_id && !$request->product_condition) && !$request->price)
        {
            $books = Book::select('*')
            ->paginate(5);
            $message = "全本一覧";
        }
    
        return view('pages.searchFunction',compact('categories','productConditions','searchPeice','books','message'));
    }
}