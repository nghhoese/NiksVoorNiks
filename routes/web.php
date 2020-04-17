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

Route::get('/', function () {
    return view('home');
});

Route::get('/advertentiePlaatsen', 'AdvertentieController@create');
Route::post('/advertentiePlaatsen', 'AdvertentieController@store');


Route::get('/advertentieDetails/{id}', 'AdvertentieController@view');

Route::get('/activiteiten', function () {
    return view('activiteiten');
});

Route::get('/overons', 'HomeController@overOns')->name('overons');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return view('home');
});
Route::get('/nicksadvertenties', 'AdvertentieController@showAll');

Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedIn'], function() {
    Route::match(['get'], '/advertenties', 'AdvertentieController@showAll');
    Route::match(['post'], '/advertenties', 'AdvertentieController@filter');
    Route::match(['get', 'post'], '/inbox', 'MessageController@index');
    Route::match(['get', 'post'], '/inbox/verzonden', 'MessageController@indexSend');
    Route::match(['get', 'post'], '/inbox/verzenden', 'MessageController@store');
    Route::match(['get', 'post'], '/inbox/nieuw', 'MessageController@create');
    Route::match(['get'], '/inbox/view/{id}', 'MessageController@view');
    Route::match(['get'], '/inbox/delete/{id}', 'MessageController@delete');
});
