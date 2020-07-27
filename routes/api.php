<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
    Route::post('/token', 'Auth\ApiAuthController@getToken')->name('token.api');

});

Route::middleware('auth:api')->group(function () {

    Route::get('/articles', 'ArticleController@index')->middleware('api.admin')->name('articles');
    Route::get('/articles/paginate', 'ArticleController@paginate')->middleware('api.admin')->name('articles');
    
    Route::get('/promotions', 'PromotionController@index')->middleware('api.admin')->name('promotions');
    Route::get('/promotions/search/{id}', 'PromotionController@search')->middleware('api.admin')->name('promotions');

});