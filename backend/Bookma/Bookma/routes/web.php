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
Route::get('searchFunction', 'TopController@searchFunction')->name('searchFunction');

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
    //お気に入りする
    Route::post('/book/{book}/favorite', 'FavoriteController@store')->name('favorites.favorite');
    //お気に入り解除
    Route::delete('/book/{book}/unfavorite', 'FavoriteController@destroy')->name('favorites.unfavorite');

    //フォローリスト
    Route::get('/myPage/followList', 'MypageController@follow')->name('followList');
    //フォローする
    Route::post('/user/{id}/follow', 'FollowController@store')->name('user.follow');
    //フォロー解除する
    Route::delete('/user/{id}/unfollow', 'FollowController@destroy')->name('user.unfollow');
    Route::get('followings', 'UsersController@followings')->name('users.followings');
    Route::get('followers', 'UsersController@followers')->name('users.followers');
    //メッセージ
    Route::get('/myPage/messagesList', 'MypageController@messages')->name('messagesList');

    //お届け先の住所一覧
    Route::get('/myPage/shippingAddressList', 'MypageController@shippingAddressList')->name('shippingAddressList');

    //お届け先の住所フォームページ
    Route::get('/myPage/shippingAddress', 'MypageController@shippingAddress')->name('shippingAddress');
    //お届け先の住所設定(新規作成)
    Route::post('/myPage/shippingAddress', 'MypageController@shippingAddressCreate')->name('shippingAddressCreate');
    //お届け先の住所設定(編集するページ)
    Route::get('/myPage/shippingAddress/{id}/edit', 'MypageController@shippingAddressEdit')->name('shippingAddressEdit');
    //お届け先の住所設定(編集更新)
    Route::post('/myPage/shippingAddress/{id}/update', 'MypageController@shippingAddressUpdate')->name('shippingAddressUpdate');
    //お届け先の住所設定(削除)
    Route::delete('/myPage/shippingAddress/{id}/destroy', 'MypageController@shippingAddressDestroy')->name('shippingAddressDestroy');

    
    // 出品者メニュー
    //出品本
    Route::get('/myPage/seller/books', 'MypageController@sellerbooks')->name('sellerbooks');
    
    //振込口座設定
    Route::get('/myPage/seller/TransferAccountSetting', 'MypageController@sellerTransferAccountSetting')->name('sellerTransferAccountSetting');
    //振込口座設定(編集更新)
    Route::post('/myPage/seller/TransferAccountSetting/update', 'MypageController@sellerTransferAccountSettingUpdate')->name('sellerTransferAccountSettingUpdate');
    //振込口座設定(新規作成)
    Route::post('/myPage/seller/TransferAccountSetting', 'MypageController@sellerTransferAccountSettingCreate')->name('sellerTransferAccountSettingCreate');
    //売上履歴
    Route::get('/myPage/seller/salesHistory', 'MypageController@sellerSalesHistory')->name('sellerSalesHistory');
    //振込申請履歴
    Route::get('/myPage/seller/transferApplicationHistory', 'MypageController@sellerTransferApplicationHistory')->name('sellerTransferApplicationHistory');
    //振込申請
    Route::get('/myPage/seller/transferApplication', 'MypageController@sellerTransferApplication')->name('sellerTransferApplication');
    //手数料について説明
    Route::get('/myPage/seller/commission', 'MypageController@sellerCommission')->name('sellerCommission');

    //振込申請完了ページ
    Route::post('/Application/complete', 'ApplicationController@completeApplication')->name('completeApplication');

    //出品フォームページ
    Route::get('/myPage/seller/salesBooks', 'MypageController@sellerSalesBooks')->name('sellerSalesBooks');
    //出品する(ログインユーザーが新規で出品)
    Route::post('/myPage/seller/salesBooks', 'MypageController@sellerSalesBooksCreate')->name('sellerSalesBooksCreate');
    //出品する(ログインユーザーが出品登録したものを編集するページ)
    Route::get('/myPage/seller/salesBooks/{id}/edit', 'MypageController@sellerSalesBooksEdit')->name('sellerSalesBooksEdit');
    //出品する(編集更新)
    Route::post('/myPage/seller/salesBooks/{id}/update', 'MypageController@sellerSalesBooksUpdate')->name('sellerSalesBooksUpdate');
    //出品する(削除)
    Route::delete('/myPage/seller/salesBooks/{id}/destroy', 'MypageController@sellerSalesBooksDestroy')->name('sellerSalesBooksDestroy');

    //購入手続き確認ページ
    Route::get('/book/{id}/purchase', 'BookController@purchase')->name('book.purchase');
    //購入後ページ
    Route::get('/book/{id}/purchase/complete', 'BookController@complete')->name('book.complete');

    // カート一覧ページ
    Route::get('/carts', 'CartController@show')->name('cart.show');
    // カートに入れる
    Route::post('/cart/add', 'CartController@store')->name('cart.add');
    // カートから削除
    Route::delete('/cart/{id}/destroy', 'CartController@destroy')->name('cart.destroy');
    // カートから決済画面
    Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
    // カートからの決済成功
    Route::get('/cart/success/{shippingAddressID}', 'CartController@success')->name('cart.success');
    //  単品（商品詳細ページ）から決済画面
    Route::get('/book/checkout/{id}', 'BookController@checkout')->name('book.checkout');
    // 単品（商品詳細ページ）からの決済成功
    Route::get('/book/success/{id}/{shippingAddressID}', 'BookController@success')->name('book.success');

    //管理者画面
    //出金済
    Route::get('/Administrator/application', 'AdministratorController@application')->name('application');
    //出金済
    Route::get('/Administrator/pay', 'AdministratorController@pay')->name('pay');
});


  // 本の詳細ページ
  Route::get('/book/{id}', 'BookController@show')->name('book.show');
  // ユーザーの詳細ページ
  Route::get('/user/{id}', 'UserController@show')->name('user.show');



Route::get('/home', 'HomeController@index')->name('home');


