<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'TopController@index')->name('top');

// Auth::routes();
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);


    // 購入者メニュー
    //プロフィール編集ページ表示
    Route::get('/myPage/profileEdit', 'MypageController@profileEdit')->name('profileEdit');
    //プロフィール編集
    Route::post('/myPage/profileEdit', 'MypageController@profileEditStore')->name('profileEditStore');
   //購入履歴
   //取引中
    Route::get('/myPage/purchasedItem/transaction', 'MypageController@purchaseHistoryTransaction')->name('purchaseHistory_transaction');

    //過去の取引
    Route::get('/myPage/pastPurchasedItem/pastTransaction', 'MypageController@purchaseHistoryPastTransaction')->name('purchaseHistory_past_transaction');

    Route::get('/transaction/{id}', 'TransactionController@show')->name('transaction.show');

    //お気に入り一覧
    Route::get('/myPage/favorites', 'MypageController@favorites')->name('favorites');

    //フォローリスト
    Route::get('/myPage/followList', 'MypageController@follow')->name('followList');
    //メッセージ
    Route::get('/myPage/messagesList', 'MypageController@messages')->name('messagesList');

    // 出品者メニュー
    //プロフィール編集
    Route::get('/myPage/seller/profileEdit', 'MypageController@sellerProfileEdit')->name('sellerProfileEdit');
    //出品本
    Route::get('/myPage/seller/books', 'MypageController@sellerbooks')->name('sellerbooks');
    //振込口座設定
    Route::get('/myPage/seller/TransferAccountSetting', 'MypageController@sellerTransferAccountSetting')->name('sellerTransferAccountSetting');
    //売上履歴
    Route::get('/myPage/seller/salesHistory', 'MypageController@sellerSalesHistory')->name('sellerSalesHistory');
    //振込申請履歴
    Route::get('/myPage/seller/transferApplicationHistory', 'MypageController@sellerTransferApplicationHistory')->name('sellerTransferApplicationHistory');
    //振込申請
    Route::get('/myPage/seller/transferApplication', 'MypageController@sellerTransferApplication')->name('sellerTransferApplication');
    //手数料について説明
    Route::get('/myPage/seller/commission', 'MypageController@sellerCommission')->name('sellerCommission');

    //出品する
    Route::get('/myPage/seller/salesBooks', 'MypageController@sellerSalesBooks')->name('sellerSalesBooks');
});


  // 本の詳細ページ1
  Route::get('/book/{id}', 'BookController@show')->name('book.show');


Route::get('/home', 'HomeController@index')->name('home');


