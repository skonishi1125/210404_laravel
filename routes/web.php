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
   return view('welcome');
});

Route::get('tests/test', 'TestController@index');

// 認証のオンオフ
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// postのデフォルトアクション全てをルート指定する
// これで指定した場合、posts/でアクセスするとインデックスに飛ぶが、
// posts/indexに飛ぶと非表示になる
// Route::resource('post', 'PostController');

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function () {

   Route::get('index', 'PostController@index')->name('post.index');
   Route::get('create', 'PostController@create')->name('post.create');
   Route::post('store', 'PostController@store')->name('post.store');
   Route::get('show/{id}', 'PostController@show')->name('post.show');
   Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
   Route::post('update/{id}', 'PostController@update')->name('post.update');
   Route::post('destroy/{id}', 'PostController@destroy')->name('post.destroy');
   Route::get('reply/{id}', 'PostController@reply')->name('post.reply');
   //session,cookie練習
   Route::post('session', 'PostController@session')->name('post.session');
   Route::post('cookie', 'PostController@cookie')->name('post.cookie');
   Route::get('d_session', 'PostController@d_session')->name('post.d_session');
   Route::get('d_cookie', 'PostController@d_cookie')->name('post.d_cookie');

});

// ajax
Route::group(['prefix' => 'testajax', 'middleware' => 'auth'], function() {
  Route::get('index', 'testAjaxController@index')
    ->name('testajax_index');
  Route::get('first_fnc', 'testAjaxController@first_fnc')
    ->name('testajax_first_fnc');
  Route::post('second_fnc', 'testAjaxController@secondFnc')
    ->name('testajax_second_fnc');
});

// Book
Route::get('book/list','BookController@list');
Route::get('book/plain','BookController@plain');
Route::get('book/header','BookController@header');
Route::get('book/outJson','BookController@outJson');
Route::get('book/outCsv','BookController@outCsv');
Route::get('book/lesson/two','BookController@lesson2');

// Mail
Route::get('mail/log', 'MailController@log');
