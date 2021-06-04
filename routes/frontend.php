<?php

use Illuminate\Support\Facades\Route;
use App\Post;

// Route untuk Menu Beranda
Route::get('/', 'FrontEndController@beranda');
// Route::get('/beranda', 'FrontEndController@beranda');

// Route untuk Menu Profil
Route::get('/tentangprodi', 'FrontEndController@tentangprogramstudi')->name('tentang');
Route::get('/visidanmisi', 'FrontEndController@visidanmisi')->name('visidanmisi');

// Route Berita
Route::get('/berita', 'FrontEndController@berita')->name('berita');
Route::get('/berita/{slug}', 'FrontEndController@detailberita')->name('berita.detail');


Route::get('/category/{id}', 'FrontEndController@category')->name('category.post');


Route::get('/search', function () {
    $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('frontend.layouts.result')->with('posts', $posts)->with('query', request('query'));
});