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

// Kan weg, we hebben al Auth::router() die dat voor ons doet

Route::get('/login', function () {
    return view('login');
});

// ------------------------------------------------------------------

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
    Route::match(['get', 'post'], '/advertenties', 'AdvertentieController@showAll');
    Route::match(['get', 'post'], '/inbox', 'MessageController@index');
    Route::match(['get', 'post'], '/inbox/view/{id}', 'MessageController@view');
    Route::match(['get', 'post'], '/inbox/nieuw', 'MessageController@create');
    Route::get('/inbox/reply/{id}', 'MessageController@reply');
    Route::match(['get', 'post'], '/inbox/verzenden', 'MessageController@store');
});
