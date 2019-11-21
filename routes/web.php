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

Route::get('/', function (){
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

//Route::get('/emails',['as'=>'emails.mail','uses'=>'TestMail@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::resource('/peticion','PeticionController');

Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', ['as'=>'admin.index','uses'=>'AdminController@index']);

    Route::resource('admin/users','AdminUsersController');

    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/media','AdminMediaController');

    Route::resource('admin/peticiones','AdminPeticionController');

});
