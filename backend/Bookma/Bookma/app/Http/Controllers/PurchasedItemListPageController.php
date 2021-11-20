<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasedItemListPageController extends Controller
{
    public function pastDetailItem()
    {
        return view('pages.myPage.purchasedItemList.pastDetailItem');
    }
}
