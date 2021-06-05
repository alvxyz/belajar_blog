<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/spatie', function () {
    // return view('auth.login');
    // $user = auth()->user();
    // auth()->user()->assignRole('admin');
});

// Route Untuk Fornt End
@include('frontend.php');


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    //User
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::delete('/user/delete/{id}', 'UserController@destroy')->name('user.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|operator']], function () {
    //User
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::delete('/user/delete/{id}', 'UserController@destroy')->name('user.delete');

    // Category
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    //Post
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::get('post/delete/{id}', 'PostController@destroy')->name('post.delete');
    Route::get('post/trash/{id}', 'PostController@trash')->name('post.trash');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

    //Tag
    Route::get('/tags', 'TagController@index')->name('tags');
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
    Route::get('tag/edit/{id}', 'TagController@edit')->name('tag.edit');
    Route::delete('tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|operator|dosen']], function () {
    //Dosen Route
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile/update/{id}', 'UserController@update_profile')->name('profile.update');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');