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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home');
});

Route::get('/dbfill', 'DBgetter@selMonth');
Route::match(['get', 'post'], "/dbfill", "DBgetter@selMonth");
//Route::get('/tasks', 'DBgetter@getData');
Route::match(['get', 'post'], "/tasks", "DBgetter@getData")->name('index');
Route::match(['get', 'post'], "/task", "DBgetter@selMonth");

Route::match(['post'], "/tasks", "DatabaseCheck@editData");
Route::match(['get', 'post'], "/edit", "DatabaseCheck@editData")->name('edit');
Route::get('/edit/id/{id}', "DatabaseCheck@editData");

Route::match(['get', 'post'], "/new", "DatabaseCheck@newData");
Route::get('/new', "DatabaseCheck@newData");

Route::get('/edit', function () {
    return view('/tasks/shortcut');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
