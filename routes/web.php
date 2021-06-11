<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
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

    //Partner
    Route::get('/partner_admin', 'PartnerController@index')->name('partner.admin');
    Route::get('/partner/create', 'PartnerController@create')->name('partner.create');
    Route::post('/partner/store', 'PartnerController@store')->name('partner.store');
    Route::post('/partner/update/{id}', 'PartnerController@update')->name('partner.update');
    Route::get('partner/edit/{id}', 'PartnerController@edit')->name('partner.edit');
    Route::delete('partner/delete/{id}', 'PartnerController@destroy')->name('partner.delete');

    //Facility
    Route::get('/facility_admin', 'FacilityController@index')->name('facility.admin');
    Route::get('/facility/create', 'FacilityController@create')->name('facility.create');
    Route::post('/facility/store', 'FacilityController@store')->name('facility.store');
    Route::post('/facility/update/{id}', 'FacilityController@update')->name('facility.update');
    Route::get('facility/edit/{id}', 'FacilityController@edit')->name('facility.edit');
    Route::delete('facility/delete/{id}', 'FacilityController@destroy')->name('facility.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|operator']], function () {

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

    //Repositori
    Route::get('/repositorys', 'RepositoryController@index')->name('repository');
    Route::get('/repository/create', 'RepositoryController@create')->name('repository.create');
    Route::post('/repository/store', 'RepositoryController@store')->name('repository.store');
    Route::post('/repository/update/{id}', 'RepositoryController@update')->name('repository.update');
    Route::get('repository/edit/{id}', 'RepositoryController@edit')->name('repository.edit');
    Route::delete('repository/delete/{id}', 'RepositoryController@destroy')->name('repository.delete');

    //Agenda
    Route::get('/agenda_admin', 'AgendaController@index')->name('agenda.admin');
    Route::get('/agenda/create', 'AgendaController@create')->name('agenda.create');
    Route::post('/agenda/store', 'AgendaController@store')->name('agenda.store');
    Route::post('/agenda/update/{id}', 'AgendaController@update')->name('agenda.update');
    Route::get('agenda/edit/{id}', 'AgendaController@edit')->name('agenda.edit');
    Route::delete('agenda/delete/{id}', 'AgendaController@destroy')->name('agenda.delete');

    //Slider
    Route::get('/slider_admin', 'SliderController@index')->name('slider.admin');
    Route::get('/slider/create', 'SliderController@create')->name('slider.create');
    Route::post('/slider/store', 'SliderController@store')->name('slider.store');
    Route::post('/slider/update/{id}', 'SliderController@update')->name('slider.update');
    Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::delete('slider/delete/{id}', 'SliderController@destroy')->name('slider.delete');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|operator|dosen']], function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile/update/{id}', 'UserController@update_profile')->name('profile.update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|dosen']], function () {
    //Dosen
    // Route::get('/lecturers', 'LecturerController@index')->name('lecturers');
    Route::get('/lecturer/create', 'LecturerController@create')->name('lecturer.create');
    Route::post('/lecturer/store', 'LecturerController@store')->name('lecturer.store');
    // Route::get('lecturer/edit/{id}', 'LecturerController@edit')->name('lecturer.edit');
    Route::delete('lecturer/delete/{id}', 'LecturerController@destroy')->name('lecturer.delete');


    Route::get('lecturer/edit/dosen', 'UserController@edit_from_dosen')->name('lecturer.edit_from_dosen');
    Route::post('/lecturer/update/{id}', 'UserController@update_dosen_detail')->name('lecturer.update');


    //Publikasi
    Route::get('/publications', 'PublicationController@index')->name('publications');
    Route::get('/publication/create', 'PublicationController@create')->name('publication.create');
    Route::delete('publication/delete/{id}', 'PublicationController@destroy')->name('publication.delete');

    Route::post('/publication/store', 'PublicationController@store')->name('publication.store');
    Route::post('/publication/update/{id}', 'PublicationController@update')->name('publication.update');
    Route::get('publication/edit/{id}', 'PublicationController@edit_from_dosen')->name('publication.edit_from_dosen');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');