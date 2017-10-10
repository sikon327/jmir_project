<?php

use Illuminate\Http\Request;

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

use App\Listing;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listings', 'ListingController@index');

Route::get('listings/{id}', 'ListingController@show');

Route::post('create/', 'ListingController@create');

Route::put('listings/{id}', 'ListingController@update');

Route::delete('listings/{id}', 'ListingController@delete');
