<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// モデル
use App\BookImage;
use App\Category;
use App\ProductCondition;
use App\ShippingArea;
use App\SippingMethod;
use App\Book;
use App\TransferAccountSetting;
use App\UserProfile;
use App\User;

// リクエスト
use App\Http\Requests\EditUserProfileRequest;
use App\Http\Requests\TransferAccountSettingRequest;
use App\Http\Requests\SellerSalesBooksRequest;

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

        $userProfile->introduce = $request->introduce;

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
    public function sellerbooks()
    {
        $books = Book::select('*')
                ->where('user_id', Auth::id())
                ->paginate(5);
    
       
        return view('pages.myPage.seller.books',compact('books'));
    }
    public function sellerTransferAccountSetting()
    {
        $user = Auth::user();
        $transferAccountSetting = TransferAccountSetting::select('*')
                            ->where('user_id', $user->id)
                            ->first();
                       
        return view('pages.myPage.seller.transferAccountSetting',compact('user','transferAccountSetting'));
    }
    
    public function sellerTransferAccountSettingUpdate(TransferAccountSettingRequest $request)
    {
        $user = Auth::user();
        $transferAccountSetting = TransferAccountSetting::select('*')
                            ->where('user_id', Auth::id())
                            ->first();

        $transferAccountSetting->bank_name = $request->bank_name;
        $transferAccountSetting->bank_code = $request->bank_code;
        $transferAccountSetting->branch_name = $request->branch_name;
        $transferAccountSetting->branch_name = $request->branch_code;
        $transferAccountSetting->deposit_type = $request->deposit_type;
        $transferAccountSetting->account_number = $request->account_number;
        $transferAccountSetting->account_name = $request->account_name;

        $user->save();
        $transferAccountSetting->save();

        return redirect()->route('sellerTransferAccountSetting');
    }
    
    public function sellerTransferAccountSettingCreate(TransferAccountSettingRequest $request)
    {
        
        $transferAccountSetting = new transferAccountSetting;

        $transferAccountSetting->user_id = Auth::id();
        $transferAccountSetting->bank_name = $request->bank_name;
        $transferAccountSetting->bank_code = $request->bank_code;
        $transferAccountSetting->branch_name = $request->branch_name;
        $transferAccountSetting->branch_code = $request->branch_code;
        $transferAccountSetting->deposit_type = $request->deposit_type;
        $transferAccountSetting->account_number = $request->account_number;
        $transferAccountSetting->account_name = $request->account_name;

        $transferAccountSetting->save();

        return redirect()->route('sellerTransferAccountSetting');
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
        $isCreateUpdate = 0;
        $categories = Category::all();
        $productConditions = ProductCondition::all();
        $shippingAreas = ShippingArea::all();
        $sippingMethods = SippingMethod::all();

        return view('pages.myPage.seller.salesBooks',compact('categories','productConditions','shippingAreas','sippingMethods','isCreateUpdate'));
    }

    public function sellerSalesBooksUpdate(sellerSalesBooksRequest $request, $id)
    {

        $book = Book::find($id);

        $book->category_id = $request->category_id;
        $book->product_condition = $request->product_condition;
        $book->shipping_method_id = $request->shipping_method_id;
        $book->title = $request->title;
        $book->content = $request->content;
        $book->shipping_bearer = $request->shipping_bearer;
        $book->shipping_area = $request->shipping_area;
        $book->delivery_days = $request->delivery_days;
        $book->price = $request->price;
        
        $book->save();

        return redirect()->route('sellerbooks');
    }

    public function sellerSalesBooksCreate(sellerSalesBooksRequest $request)
    {

        $book = new Book;

        $book->user_id = Auth::id();
        $book->category_id = $request->category_id;
        $book->product_condition = $request->product_condition;
        $book->shipping_method_id = $request->shipping_method_id;
        $book->title = $request->title;
        $book->content = $request->content;
        $book->shipping_bearer = $request->shipping_bearer;
        $book->shipping_area = $request->shipping_area;
        $book->delivery_days = $request->delivery_days;
        $book->price = $request->price;

        $book->save();

        $bookImages = [];
        $bookImage1 = $request->file('book_image1');
        array_push($bookImages,$bookImage1);

        if($request->file('book_image2')) {
            $bookImage2 = $request->file('book_image2');
            array_push($bookImages,$bookImage2);
        }
        if($request->file('book_image3')) {
            $bookImage3 = $request->file('book_image3');
            array_push($bookImages,$bookImage3);
        }
        if($request->file('book_image4')) {
            $bookImage4 = $request->file('book_image4');
            array_push($bookImages,$bookImage4);
        }
        if($request->file('book_image5')) {
            $bookImage5 = $request->file('book_image5');
            array_push($bookImages,$bookImage5);
        }

        foreach ($bookImages as $bookImagestore) {
            $bookImage = new BookImage;
             // バケットの`profileImages`フォルダへアップロード
            $path = Storage::disk('s3')->put('bookImage', $bookImagestore, 'public');
            // アップロードした画像のフルパスを取得
            $image_path = Storage::disk('s3')->url($path);
            $bookImage->book_images_url = $image_path;
            $bookImage->book_id = $book->id;

            $bookImage->save();
        }

        return redirect()->route('sellerbooks');
    }

    public function sellerSalesBooksEdit($id)
    {
        $isCreateUpdate = 1;
        $book = Book::find($id);
        $categories = Category::all();
        $productConditions = ProductCondition::all();
        $shippingAreas = ShippingArea::all();
        $sippingMethods = SippingMethod::all();


        return view('pages.myPage.seller.salesBooks',compact('book','categories','productConditions','shippingAreas','sippingMethods','isCreateUpdate'));
    }

    public function sellerSalesBooksDestroy($id)
    {
        $bookImages = BookImage::where('book_id',$id)->get();
        foreach ($bookImages as $bookImage)
        $bookImage->delete($id);
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('sellerbooks');
    }


};
