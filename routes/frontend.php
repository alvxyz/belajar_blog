<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\Repository;

// Route untuk Menu Beranda
Route::get('/', 'FrontEndController@beranda');
// Route::get('/beranda', 'FrontEndController@beranda');

// Route untuk Menu Profil
Route::get('/tentangprodi', 'FrontEndController@tentangprogramstudi')->name('tentang');
Route::get('/visidanmisi', 'FrontEndController@visidanmisi')->name('visidanmisi');

// Route Berita
Route::get('/berita', 'FrontEndController@berita')->name('berita');
Route::get('/berita/{slug}', 'FrontEndController@detailberita')->name('berita.detail');

// Route Dosen
Route::get('/dosen', 'FrontEndController@dosen')->name('dosen');
Route::get('/dosen/detail/{id}', 'FrontEndController@dosen_detail')->name('dosen.detail');


Route::get('/category/{id}', 'FrontEndController@category')->name('category.post');

// Repositori
Route::get('/repositori', 'FrontEndController@repositori')->name('repositori');
Route::get('/repositori/detail/{id}', 'FrontEndController@repositori_detail')->name('repositori.detail');
Route::get('/repositori/donwload/{id}', 'FrontEndController@downloadFile')->name('repositori.download');


Route::get('/search', function () {
    $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('frontend.layouts.result')->with('posts', $posts)->with('query', request('query'));
});

Route::get('/repositori/search', function () {
    $repositories = Repository::where('title', 'like', '%' . request('query') . '%')->get();
    return view('frontend.repositori.result')->with('repositories', $repositories)->with('query', request('query'));
});