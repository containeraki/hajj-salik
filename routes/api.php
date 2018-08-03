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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Use App\Article;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() {

    /*Route::get('user',function (Request $request) {
        return $request->user();
    });*/
    Route::post('user', 'UserController@show');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('articles', 'ArticleController@index');
    Route::get('articles/{article}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{article}', 'ArticleController@update');
    Route::delete('articles/{article}', 'ArticleController@delete');

    Route::get('shipments', 'ShipmentController@index');
    Route::get('allshipments', 'ShipmentController@all');
    Route::get('tracks', 'TrackController@index');

    Route::get('testchain', 'ChainController@test');
    Route::get('liststreams', 'ChainController@liststreams');
    Route::get('createstream/{stream_name}', 'ChainController@createstream');
    Route::get('createfromaddress/{stream_name}', 'ChainController@createfromaddress');
    Route::get('publish', 'ChainController@publish');
    Route::get('liststreamitems', 'ChainController@liststreamitems');
    Route::get('liststreamkeyitems', 'ChainController@liststreamkeyitems');
});
