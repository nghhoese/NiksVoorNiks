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
Route::get('/advertenties', function () {
    return view('advertenties');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/advertentiePlaatsen', function () {
    return view('advertentiePlaatsen');
});
Route::get('/advertentieDetails', function () {
    return view('advertentieDetails');
});
Route::get('/activiteiten', function () {
    return view('activiteiten');
});
Route::get('/overons', 'HomeController@index')->name('overons');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return view('activiteiten');
});
