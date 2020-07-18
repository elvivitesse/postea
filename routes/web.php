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
/*
Route::get('/', 'PostController@index');
Route::view('/posts/create', 'create');
Route::post('/posts/create', 'PostController@create');
Route::get('/posts/{id}', 'PostController@show')->name('post');

Route::get('/post/{id}', 'PostController@show');

Route::get('/base', function(){
    return view('base');
});
Route::get('/today', 'PostController@indexd');

Route::get('/content', function(){
    return view('child',['mvariable' => 5]);
});

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/


Route::redirect('/', '/posts');
Route::redirect('/home', '/posts');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/myPosts', 'PostController@userPosts');
Route::get('/posts/{id}' , 'PostController@show')->name('post');
Route::post('/comments', 'CommentController@store');

Route::get('/config/{id}', 'PostController@config');
Route::post('/confi', 'PostController@update');
Route::delete('/delete/{id}', 'PostController@dropPost');
Route::delete('/dropUser/{id}', 'PostController@dropUser');


Auth:: routes() ;
