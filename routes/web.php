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

// Auth::routes();
Auth::Routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/', function () {
    $data = App\Ebooks::paginate(3);
    return view('welcome', compact('data'));
});

Route::resource('home/ebooks', 'EbookController')->middleware('auth');
Route::get('/search', 'EbookController@search')->name('ebooks.search');
Route::get('/searchadminversion', 'EbookController@searchAdminVersion')->name('ebooks.searchAdminVersion');
Route::get('/phpinfo', function() {
    return phpinfo();
});
