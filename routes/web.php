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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/overons', 'AboutUsController@index')->name('overons');
Route::get('/activiteiten', 'ActivityController@showAll');
Route::get('/contact', 'ContactController@index');
Route::get('/nieuws', 'NewsController@showAll');
Route::get('/nieuws/details/{id}', 'NewsController@view');

Route::group(['middleware' => 'App\Http\Middleware\CheckIfAdmin'], function(){
    Route::get('/activiteit/verwijderen/{id}', 'ActivityController@delete');
    Route::get('/activiteit/aanpassen/{id}', 'ActivityController@edit');
    Route::post('/activiteit/aanpassen/{id}', 'ActivityController@update');
});

Route::match(['get'], '/cms/edit/{name}', 'CmsController@edit')->name('editcms');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
});

Route::group(['middleware' => 'App\Http\Middleware\CheckIfAdmin'], function(){
    Route::match(['get'], '/cms', 'CmsController@index')->name('cms');
    Route::match(['get'], '/cms_overons', 'CmsController@overonsindex')->name('overonscms');
    Route::match(['get'], '/cms_contact', 'CmsController@contactindex')->name('contactcms');
    Route::match(['get'], '/cms/edit/{name}', 'CmsController@edit')->name('editcms');
    Route::match(['post'], '/cms/edit/{name}', 'CmsController@update')->name('editcms');
});

Route::group(['middleware' => 'App\Http\Middleware\CheckIfAdmin'], function(){
    Route::match(['get'], '/panel', 'AdminController@index')->name('admin');
    Route::match(['get'], '/users/panel', 'AdminController@userPanel');
    Route::match(['get'], '/panel/verwijder/{email}', 'AdminController@deleteUser');
    Route::match(['get'], '/panel/accepteren/{email}', 'AdminController@acceptUser');
    Route::match(['get'], '/panel/makeAdmin/{email}', 'AdminController@makeAdmin');
    Route::match(['get'], '/panel/removeAdmin/{email}', 'AdminController@removeAdmin');

    Route::match(['get'],'/nieuws/verwijderen/{id}', 'NewsController@delete');
    Route::match(['get'],'/nieuws/wijzigen/{id}', 'NewsController@edit');
    Route::match(['post'],'/nieuws/wijzigen/{id}', 'NewsController@update');

    Route::match(['get'],'/nieuws/nieuw', 'NewsController@create');
    Route::match(['post'],'/nieuws/nieuw', 'NewsController@store');
});




Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedIn'], function() {
    Route::match(['get'], '/advertenties', 'AdController@showAll');
    Route::get('/profiel/{email}', 'ProfileController@index');
    Route::get('/activiteitPlaatsen', 'ActivityController@create');
    Route::post('/activiteitPlaatsen', 'ActivityController@store');
    Route::get('/activiteitDetails/{id}', 'ActivityController@view');
    Route::get('/activiteit/deelnemen/{id}', 'ActivityController@deelnemen');
    Route::match(['get'], '/advertenties', 'AdController@showAll');
    Route::match(['post'], '/advertenties', 'AdController@filter');
    Route::get('/advertentiePlaatsen', 'AdController@create');
    Route::post('/advertentiePlaatsen', 'AdController@store');
    Route::get('/advertentieDetails/{id}', 'AdController@view');
    Route::match(['get', 'post'], '/inbox', 'MessageController@index');
    Route::match(['get', 'post'], '/inbox/verzonden', 'MessageController@indexSend');
    Route::match(['get', 'post'], '/inbox/view/{id}', 'MessageController@view');
    Route::match(['get', 'post'], '/inbox/zoeken', 'MessageController@indexSearch');
    Route::match(['get', 'post'], '/inbox/verzonden/zoeken', 'MessageController@indexSendSearch');
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
    Route::match(['get', 'post'], '/transactie/{id}', 'TransactionController@index');
    Route::match(['get', 'post'], '/transacties', 'TransactionController@showAll');
    Route::match(['get'], '/transacties/maken/nieuw', 'TransactionController@create');
    Route::match(['post'], '/transacties/maken/nieuw', 'TransactionController@store');
    Route::match(['get', 'post'], '/transactie/accepteer/{id}', 'TransactionController@accept');


    Route::match(['get', 'post'], '/inbox/reageren/{email}', 'MessageController@respond');
    //maybe another middleware?
    Route::match(['get'], '/advertentie/verwijderen/{id}', 'AdController@delete');
    Route::match(['get'], '/advertentie/wijzigen/{id}', 'AdController@edit');
    Route::match(['post'], '/advertentie/wijzigen/{id}', 'AdController@update');
});

