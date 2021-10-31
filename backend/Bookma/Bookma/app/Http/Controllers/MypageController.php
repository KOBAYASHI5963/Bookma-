<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function profile()
    {
        return view('pages.myPage.profile');
    }
    public function profileEdit()
    {
        return view('pages.myPage.profileEdit');
    }
    public function purchaseHistory()
    {
        return view('pages.myPage.purchaseHistory');
    }
   
}
