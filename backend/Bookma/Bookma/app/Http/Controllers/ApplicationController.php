<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Application;
use App\productPurchase;
use App\Book;
use App\TransferAccountSetting;


class ApplicationController extends Controller
{
    public function completeApplication(Request $request)
    {
        // ユーザーが出品した本のID一覧
        $bookIds = $this->bookIds();
        // 上記のうち購入された本のID一覧
        $purchasedBookIds = $this->purchasedBookIds($bookIds);
        // ユーザーが売った本一覧
        $sellerBooks = Book::select('*')
                ->where('user_id', Auth::id())
                ->whereIn('id', $purchasedBookIds)
                ->get();
            
        //売却金額(初期設定)
        $totalPrice = 0;

        foreach ( $sellerBooks as $sellerBook ) {

        $totalPrice += $sellerBook->price;

        }
        //申請した金額
        $totalApplicationAmount = 0;

        $applicationAmounts = Application::select('*')
        ->where('user_id', Auth::id())
        ->get();


        if ($applicationAmounts) {
            foreach ( $applicationAmounts as $applicationAmount ) {

                $totalApplicationAmount += $applicationAmount->amount_money;
            }
        }
        
         $canApplicationAmount = $totalPrice - $totalApplicationAmount;


        $user = Auth::user();
         $transferAccountSetting = TransferAccountSetting::select('*')
                             ->where('user_id', $user->id)
                             ->first();

        $ApplicationInformation = new Application;

        $ApplicationInformation->user_id = Auth::id();
        $ApplicationInformation->transfer_account_id = $transferAccountSetting->id;
        $ApplicationInformation->amount_money = $canApplicationAmount;
        //申請中
        $ApplicationInformation->application_status = 1;

        $ApplicationInformation->save();


        return view('pages.Application.completeApplication');
    }

    public function purchasedBookIds($bookIds) {
        $purchasedBooks = productPurchase::select('*')
                ->whereIn('book_id', $bookIds)
                ->get();

        $purchasedBookIds = [];

        foreach ( $purchasedBooks as $purchasedBook ) {
            array_push($purchasedBookIds, $purchasedBook->book_id);
        }

        return $purchasedBookIds;

    }

    public function bookIds() {
        $books = Book::select('*')
            ->where('user_id', Auth::id())
            ->get();

        $bookIds = [];

        foreach ( $books as $book ) {
            array_push($bookIds, $book->id);
        }

        return $bookIds;

    }

}
