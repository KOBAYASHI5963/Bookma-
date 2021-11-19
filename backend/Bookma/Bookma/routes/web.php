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

    Route::get('/myPage/profile', 'MypageController@profile')->name('myPage');
    Route::get('/myPage/profileEdit', 'MypageController@profileEdit')->name('profileEdit');
    Route::get('/myPage/purchasedItem/transaction', 'MypageController@purchaseHistoryTransaction')->name('purchaseHistory_transaction');
    Route::get('/myPage/pastPurchasedItem/pastTransaction', 'MypageController@purchaseHistoryPastTransaction')->name('purchaseHistory_past_transaction');
    Route::get('/myPage/favorite', 'MypageController@favorites')->name('favorites');
    Route::get('/myPage/followList', 'MypageController@follow')->name('followList');
    Route::get('/myPage/messagesList', 'MypageController@messages')->name('messagesList');
    
});

Route::get('/home', 'HomeController@index')->name('home');


