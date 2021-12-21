<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// モデル
use App\UserProfile;
use App\User;

// リクエスト
use App\Http\Requests\EditUserProfileRequest;

class MypageController extends Controller
{

    // 購入者メニュー
    public function profileEdit()
    {
        $user = Auth::user();
        $userProfile = UserProfile::select('*')
                            ->where('user_id', $user->id)
                            ->first();

        return view('pages.myPage.profileEdit',compact('user','userProfile'));
    }

    public function profileEditStore(EditUserProfileRequest $request)
    {
        $user = Auth::user();
        $userProfile = UserProfile::select('*')
                            ->where('user_id', Auth::id())
                            ->first();

        $user->name = $request->name;

        if($request->introduce) {
            $userProfile->introduce = $request->introduce;
        }

        if($request->file('profile_image')) {
            $profileImage = $request->file('profile_image');
            // バケットの`profileImages`フォルダへアップロード
            $path = Storage::disk('s3')->put('profileImages', $profileImage, 'public');
            // アップロードした画像のフルパスを取得
            $image_path = Storage::disk('s3')->url($path);
            $userProfile->profile_image = $image_path;
        }

        $user->save();
        $userProfile->save();

        return redirect()->route('profileEdit');
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
