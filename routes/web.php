<?php

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

Route::get('/', function () {
    $listings = \App\Listing::paginate(10);
    return view('index', ['listings' => $listings]);
});

Route::get('/submit', function () {
	return view('submit');
});

Route::get('/listings/{id}', function ($id) {
	$listing = \App\Listing::findOrFail($id);
	return view('update', ['listing' => $listing]);
});
