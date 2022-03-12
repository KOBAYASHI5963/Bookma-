<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// モデル
use App\ShippingAddress;
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
use App\Http\Requests\ShippingAddressRequest;
use BenSampo\Enum\Rules\Enum;

// Enum
use App\Enums\IsCreateUpdateBookForm;
use App\Enums\IsCreateUpdateShippingAddressForm;
// Object
use App\Object\BookImageObj;

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
    public function shippingAddressList()
    {
        $user = Auth::user();
        $shippingAddressLists = shippingAddress::select('*')->where('user_id', $user->id)->paginate(5);
        $prefectures = ShippingArea::all();
     
        return view('pages.myPage.shippingAddressList',compact('user','shippingAddressLists','prefectures'));
    }
    public function shippingAddress()
    {
        $user = Auth::user();
        $shippingAddress = shippingAddress::select('*')->where('user_id', $user->id)->paginate(5);
        $prefectures = ShippingArea::all();
        
        return view('pages.myPage.shippingAddress',compact('user','shippingAddress','prefectures'));
    }
    public function shippingAddressUpdate(ShippingAddressRequest $request, $id)
    {
        $shippingAddress = shippingAddress::find($id);

        $shippingAddress->user_id = Auth::id();
        $shippingAddress->name = $request->name;
        $shippingAddress->post_code = $request->post_code;
        $shippingAddress->prefecture = $request->prefecture;
        $shippingAddress->city = $request->city;
        $shippingAddress->street = $request->street;
        $shippingAddress->building_name = $request->building_name;
        $shippingAddress->phone_number = $request->phone_number;

        $shippingAddress->save();

        return redirect()->route('shippingAddressList');
    }
    public function shippingAddressCreate(ShippingAddressRequest $request)
    {
        $shippingAddress = new shippingAddress;

        $shippingAddress->user_id = Auth::id();
        $shippingAddress->name = $request->name;
        $shippingAddress->post_code = $request->post_code;
        $shippingAddress->prefecture = $request->prefecture;
        $shippingAddress->city = $request->city;
        $shippingAddress->street = $request->street;
        $shippingAddress->building_name = $request->building_name;
        $shippingAddress->phone_number = $request->phone_number;

        $shippingAddress->save();

        return redirect()->route('shippingAddressList');
    }

    public function shippingAddressEdit($id)
    {

        $shippingAddress = shippingAddress::find($id);
        $prefectures = ShippingArea::all();

        return view('pages.myPage.shippingAddressEdit',compact('shippingAddress','prefectures'));
    }
    public function shippingAddressDestroy($id)
    {

        $shippingAddress = shippingAddress::find($id);
        $shippingAddress->delete();

        return redirect()->route('shippingAddressList');
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
        $isCreateUpdate = IsCreateUpdateBookForm::Create;
        $categories = Category::all();
        $productConditions = ProductCondition::all();
        $shippingAreas = ShippingArea::all();
        $sippingMethods = SippingMethod::all();

        return view('pages.myPage.seller.salesBooks',compact('categories','productConditions','shippingAreas','sippingMethods','isCreateUpdate'));
    }

    public function sellerSalesBooksUpdate(sellerSalesBooksRequest $request, $id)
    {
        // オブジェクトを作成
        $bookImageObj1 = $this->createBookImageIdObj((int)$request->imageId1, $request->file('book_image1'), (int)$request->deleteflag1);
        $bookImageObj2 = $this->createBookImageIdObj((int)$request->imageId2, $request->file('book_image2'), (int)$request->deleteflag2);
        $bookImageObj3 = $this->createBookImageIdObj((int)$request->imageId3, $request->file('book_image3'), (int)$request->deleteflag3);
        $bookImageObj4 = $this->createBookImageIdObj((int)$request->imageId4, $request->file('book_image4'), (int)$request->deleteflag4);
        $bookImageObj5 = $this->createBookImageIdObj((int)$request->imageId5, $request->file('book_image5'), (int)$request->deleteflag5);

        // イメージを新規作成 or 編集 or 削除
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj1 ,$id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj2 ,$id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj3 ,$id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj4 ,$id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj5 ,$id);

        // booksテーブルの編集
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
        // book新規作成
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

        // オブジェクトを作成
        $bookImageObj1 = $this->createBookImageIdObj((int)$request->imageId1, $request->file('book_image1'), (int)$request->deleteflag1);
        $bookImageObj2 = $this->createBookImageIdObj((int)$request->imageId2, $request->file('book_image2'), (int)$request->deleteflag2);
        $bookImageObj3 = $this->createBookImageIdObj((int)$request->imageId3, $request->file('book_image3'), (int)$request->deleteflag3);
        $bookImageObj4 = $this->createBookImageIdObj((int)$request->imageId4, $request->file('book_image4'), (int)$request->deleteflag4);
        $bookImageObj5 = $this->createBookImageIdObj((int)$request->imageId5, $request->file('book_image5'), (int)$request->deleteflag5);

        // イメージを新規作成
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj1, $book->id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj2, $book->id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj3, $book->id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj4, $book->id);
        $this->storeOrUpdateOrDeleteBookImage($bookImageObj5, $book->id);

        return redirect()->route('sellerbooks');
    }

    public function sellerSalesBooksEdit($id)
    {
        $isCreateUpdate = IsCreateUpdateBookForm::Update;
        $book = Book::find($id);
        $categories = Category::all();
        $productConditions = ProductCondition::all();
        $shippingAreas = ShippingArea::all();
        $sippingMethods = SippingMethod::all();
        $bookImages = BookImage::where('book_id', $id)->get();


        return view('pages.myPage.seller.salesBooks',compact('book','categories','productConditions','shippingAreas','sippingMethods','isCreateUpdate', 'bookImages'));
    }

    public function sellerSalesBooksDestroy($id)
    {
        $bookImages = BookImage::where('book_id',$id)->get();
        foreach ($bookImages as $bookImage){
            $bookImage->delete($id);
            Storage::disk('s3')->delete(parse_url($bookImage->book_images_url)['path']);
            }
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('sellerbooks');
    }


    // BookImageObjをインスタンス化して返す
    private function createBookImageIdObj($id, $file, $deleteflag) {
        $bookImageObj = new BookImageObj($id, $file, $deleteflag);
        return $bookImageObj;
    }

    // Bookimageを保存する

    private function storeOrUpdateOrDeleteBookImage($bookImageObj, $book_id) {
        $id = $bookImageObj->getId();
        $imageFile = $bookImageObj->getFile();
        $deleteflag = $bookImageObj->getDeleteFlag();

        if($id != 0 && isset($imageFile)) {
            // ①編集する前から画像があって、そこから下記分岐
            if($deleteflag == 0) {
                // dd('新しい画像に変換');
                $this->updateBookImage($imageFile, $id);
            } else {
                // dd('既存のを削除');
                $this->deleteBookImage($id);
            }
        } elseif($id == 0 && isset($imageFile)) {
            // ②編集する前はなにもなくて、インプットに触れている下記分岐
            if($deleteflag == 0) {
                // dd('新規作成');
                $this->storeBookImage($imageFile, $book_id);
            } else {
                // dd('特になにもせずに終了');
                return;
            }
        } elseif($id == 0 && !isset($imageFile)) {
            // ③編集する前はなにもなくてかつインプットも触れてない
            // dd('現状維持');
            return;
        } else {
            // ④編集する前から画像があって、インプットに触れずに下記分岐
            if($deleteflag == 0) {
                // dd('そのまま');
                return;
            } else {
                // dd('対象を削除sして終了');
                $this->deleteBookImage($id);
            }
        }
        return;
    }

    public function storeBookImage($imageFile, $book_id) {
        $bookImage = new BookImage;
        // バケットの`profileImages`フォルダへアップロード
        $path = Storage::disk('s3')->put('bookImage', $imageFile, 'public');
        // アップロードした画像のフルパスを取得
        $image_path = Storage::disk('s3')->url($path);
        $bookImage->book_images_url = $image_path;
        $bookImage->book_id = $book_id;

        $bookImage->save();
    }

    public function updateBookImage($imageFile, $id) {
        $bookImage = BookImage::find($id);
        // s3は削除
        Storage::disk('s3')->delete(parse_url($bookImage->book_images_url)['path']);

        // バケットの`profileImages`フォルダへアップロード
        $path = Storage::disk('s3')->put('bookImage', $imageFile, 'public');
        // アップロードした画像のフルパスを取得
        $image_path = Storage::disk('s3')->url($path);
        $bookImage->book_images_url = $image_path;
        $bookImage->save();
    }

    public function deleteBookImage($id) {
        $bookImage = BookImage::find($id);
        // s3とDBから削除
        $bookImage->delete($id);
        Storage::disk('s3')->delete(parse_url($bookImage->book_images_url)['path']);
    }


}
