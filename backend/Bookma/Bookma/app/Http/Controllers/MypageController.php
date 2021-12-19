<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// モデル
use App\UserProfile;
use App\User;

class MypageController extends Controller
{

    // 購入者メニュー
    public function profileEdit()
    {
        return view('pages.myPage.profileEdit');
    }
    public function purchaseHistoryTransaction()
    {
        return view('pages.myPage.purchaseHistoryTransaction');
    }
    public function purchaseHistoryPastTransaction()
    {
        return view('pages.myPage.purchaseHistoryPastTransaction');
    }
    public function favorites()
    {
        return view('pages.myPage.favorite');
    }
    public function follow()
    {
        return view('pages.myPage.followList');
    }
    public function messages()
    {
        return view('pages.myPage.messagesList');
    }
   

    // 出品者メニュー
    public function sellerProfileEdit()
    {
        return view('pages.myPage.seller.profileEdit');
    }
    public function sellerbooks()
    {
        return view('pages.myPage.seller.books');
    }
    public function sellerTransferAccountSetting()
    {
        return view('pages.myPage.seller.transferAccountSetting');
    }
    public function sellerSalesHistory()
    {
        return view('pages.myPage.seller.salesHistory');
    }
    public function sellerTransferApplicationHistory()
    {
        return view('pages.myPage.seller.transferApplicationHistory');
    }
    public function sellerTransferApplication()
    {
        return view('pages.myPage.seller.transferApplication');
    }
    public function sellerCommission()
    {
        return view('pages.myPage.seller.commission');
    }
    public function sellerSalesBooks()
    {
        return view('pages.myPage.seller.salesBooks');
    }
};
