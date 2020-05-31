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
    Route::match(['get'], '/categorie', 'CategoryController@index');
    Route::match(['post'],'/categorie/nieuw', 'CategoryController@store');
    Route::match(['get'], '/categorie/verwijderen/{naam}', 'CategoryController@delete');
    Route::match(['get'], '/activiteit/deelnemer/verwijderen/{id}/{email}', 'ActivityController@removeUser');
    Route::match(['get'], '/plaats', 'PlaceController@index');
    Route::match(['get'], '/users/index', 'AdminController@userPanel');
    Route::match(['post'], '/users/wijzigen/{email}', 'AdminController@updateUser');
    Route::match(['get'], '/panel/verwijder/{email}', 'AdminController@deleteUser');
    Route::match(['get'], '/panel/wijzig/{email}', 'AdminController@editUser');
    Route::match(['get'], '/panel/accepteren/{email}', 'AdminController@acceptUser');
    Route::match(['get'], '/panel/makeAdmin/{email}', 'AdminController@makeAdmin');
    Route::match(['get'], '/panel/removeAdmin/{email}', 'AdminController@removeAdmin');
    Route::match(['get'],'/nieuws/nieuw', 'NewsController@create');
    Route::match(['get'],'/nieuws/verwijderen/{id}', 'NewsController@delete');
    Route::match(['get'],'/nieuws/wijzigen/{id}', 'NewsController@edit');
    Route::match(['get'], '/cms', 'CmsController@index')->name('cms');
    Route::match(['get'], '/cms/edit/{name}', 'CmsController@edit')->name('editcms');
    Route::match(['get'],'/plaats/verwijderen/{naam}', 'PlaceController@delete');
    Route::match(['post'], '/cms/edit/{name}', 'CmsController@update')->name('editcms');
    Route::match(['post'],'/nieuws/wijzigen/{id}', 'NewsController@update');
    Route::match(['post'],'/nieuws/nieuw', 'NewsController@store');
    Route::match(['post'],'/plaats/nieuw', 'PlaceController@store');
});

Route::group(['middleware' => 'App\Http\Middleware\CheckLoggedIn'], function() {

    //get
    Route::get('/inbox/reply/{id}', 'MessageController@reply');
    Route::get('/inbox/reageer/{id}', 'MessageController@replyOnMessage');
    Route::get('/profiel/{email}', 'ProfileController@index');
    Route::get('/activiteitPlaatsen', 'ActivityController@create');
    Route::get('/activiteitDetails/{id}', 'ActivityController@view');
    Route::get('/activiteit/deelnemen/{id}', 'ActivityController@participate');
    Route::get('/advertentieDetails/{id}', 'AdController@view');
    Route::get('/advertentiePlaatsen', 'AdController@create');
    Route::get('/activiteiten', 'ActivityController@showAll');
    Route::get('/nieuws', 'NewsController@showAll');
    Route::get('/nieuws/details/{id}', 'NewsController@view');

    //post
    Route::post('/advertentiePlaatsen', 'AdController@store');
    Route::post('/activiteitPlaatsen', 'ActivityController@store');

    //match get
    Route::match(['get'], '/advertenties', 'AdController@showAll');
    Route::match(['get'], '/advertenties', 'AdController@showAll');
    Route::match(['get'], '/advertentie/wijzigen/{id}', 'AdController@edit');

    //match post
    Route::match(['get'], '/transacties/maken/nieuw', 'TransactionController@create');
    Route::match(['post'], '/transacties/maken/nieuw', 'TransactionController@store');
    Route::match(['post'], '/advertentie/wijzigen/{id}', 'AdController@update');
    Route::match(['post'], '/advertenties', 'AdController@filter');

    //match get post
    Route::match(['get', 'post'], '/inbox', 'MessageController@index');
    Route::match(['get', 'post'], '/inbox/verzonden', 'MessageController@indexSend');
    Route::match(['get', 'post'], '/inbox/view/{id}', 'MessageController@view');
    Route::match(['get', 'post'], '/inbox/zoeken', 'MessageController@indexSearch');
    Route::match(['get', 'post'], '/inbox/verzonden/zoeken', 'MessageController@indexSendSearch');
    Route::match(['get', 'post'], '/inbox/viewSend/{id}', 'MessageController@viewSend');
    Route::match(['get', 'post'], '/inbox/nieuw', 'MessageController@create');
    Route::match(['get', 'post'], '/inbox/verzenden', 'MessageController@store');
    Route::match(['get', 'post'], '/inbox/verwijder/{id}', 'MessageController@delete');
    Route::match(['get', 'post'], '/inbox/verwijder-verzonden/{id}', 'MessageController@deleteSend');
    Route::match(['get', 'post'], '/inbox/bericht/{id}', 'MessageController@message');
    Route::match(['get', 'post'], '/transactie/{id}', 'TransactionController@index');
    Route::match(['get', 'post'], '/transacties', 'TransactionController@showAll');
    Route::match(['get', 'post'], '/transactie/accepteer/{id}', 'TransactionController@accept');
    Route::match(['get', 'post'], '/inbox/reageren/{email}', 'MessageController@respond');
    Route::match(['get', 'post'], '/advertentie/verwijderen/{id}', 'AdController@delete');
});

