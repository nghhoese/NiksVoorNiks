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

Route::get('/', 'HomeController@index');

Route::get('/advertentiePlaatsen', 'AdvertentieController@create');
Route::post('/advertentiePlaatsen', 'AdvertentieController@store');


Route::get('/advertentieDetails/{id}', 'AdvertentieController@view');

Route::get('/activiteiten', function () {
    return view('activiteiten');
});


Route::get('/activiteiten', 'ActivityController@showAll');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
});
Route::get('/nicksadvertenties', 'AdvertentieController@showAll');

Route::group(['middleware' => 'App\Http\Middleware\CheckIfAdmin'], function(){
    Route::match(['get'], '/cms', 'CmsController@index')->name('cms');
    Route::match(['get'], '/cms_overons', 'CmsController@overonsindex')->name('overonscms');
    Route::match(['get'], '/cms/edit/{name}', 'CmsController@edit')->name('editcms');
    Route::match(['post'], '/cms/edit/{name}', 'CmsController@update')->name('editcms');
});

Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedIn'], function() {
    Route::match(['get'], '/advertenties', 'AdvertentieController@showAll');
    Route::match(['post'], '/advertenties', 'AdvertentieController@filter');

    Route::match(['get', 'post'], '/inbox', 'MessageController@index');
    Route::match(['get', 'post'], '/inbox/verzonden', 'MessageController@indexSend');
    Route::match(['get', 'post'], '/inbox/view/{id}', 'MessageController@view');
    Route::match(['get', 'post'], '/inbox/viewSend/{id}', 'MessageController@viewSend');
    Route::match(['get', 'post'], '/inbox/nieuw', 'MessageController@create');
    Route::get('/inbox/reply/{id}', 'MessageController@reply');
    Route::get('/inbox/reageer/{id}', 'MessageController@replyOnMessage');
    Route::match(['get', 'post'], '/inbox/verzenden', 'MessageController@store');
    Route::match(['get', 'post'], '/inbox/verwijder/{id}', 'MessageController@delete');
    Route::match(['get', 'post'], '/inbox/verwijder-verzonden/{id}', 'MessageController@deleteSend');
    Route::get('/test','MessageController@test');
    Route::post('/test1','MessageController@search');
    Route::match(['get', 'post'], '/inbox/bericht/{id}', 'MessageController@message');


    Route::match(['get', 'post'], '/inbox/reageren/{email}', 'MessageController@respond');
});

Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedIn'], function () {
    Route::get('/profiel/{email}', 'ProfileController@index');
});

