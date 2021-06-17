<?php

use App\Agenda;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Repository;
use Illuminate\Http\Request;

// Route untuk Menu Beranda

Route::middleware('visitor')->group(function () {
    Route::get('/', 'FrontEndController@beranda')->name('beranda');

    // Route::get('/', 'FrontEndController@beranda');
    // Route::get('/beranda', 'FrontEndController@beranda');

    // Route Slider
    Route::get('/slider/detail/{slug}', 'FrontEndController@detailslider')->name('slider.detail');

    // Route Partner
    Route::get('/partner', 'FrontEndController@partner')->name('partner');
    Route::get('/partner/detail/{slug}', 'FrontEndController@detailpartner')->name('partner.detail');

    // Route Fasilitas
    Route::get('/fasilitas', 'FrontEndController@fasilitas')->name('fasilitas');
    Route::get('/fasilitas/detail/{slug}', 'FrontEndController@detailfasilitas')->name('fasilitas.detail');

    // Route Karya Terbaik
    Route::get('/karya', 'FrontEndController@karya')->name('karya');
    Route::get('/karya/detail/{slug}', 'FrontEndController@detailkarya')->name('karya.detail');

    // Route untuk Menu Profil
    Route::get('/tentangprodi', 'FrontEndController@tentangprogramstudi')->name('tentang');
    Route::get('/visidanmisi', 'FrontEndController@visidanmisi')->name('visidanmisi');
    Route::get('/akreditasi', 'FrontEndController@akreditasi')->name('akreditasi');
    Route::get('/strukturorganisasi', 'FrontEndController@struktur')->name('struktur');

    // Route Kalender Akademik
    Route::get('/kalenderakademik', 'FrontEndController@kalender')->name('kalender');
    Route::get('/kalenderakademik/donwload/{id}', 'FrontEndController@downloadFileKalender')->name('kalender.download');

    // Route Capaian Pembelajaran
    Route::get('/capaianpembelajaran', 'FrontEndController@capaianpembelajaran')->name('capaian');

    // Route Profil Lulusan
    Route::get('/profillulusan', 'FrontEndController@profillulusan')->name('profillulusan');

    // Route Kompetensi Lulusan
    Route::get('/kompetensilulusan', 'FrontEndController@kompetensi')->name('kompetensi');

    // Route Berita
    Route::get('/berita', 'FrontEndController@berita')->name('berita');
    Route::get('/berita/{slug}', 'FrontEndController@detailberita')->name('berita.detail');

    // Route Dosen
    Route::get('/dosen', 'FrontEndController@dosen')->name('dosen');
    Route::get('/dosen/detail/{id}', 'FrontEndController@dosen_detail')->name('dosen.detail');


    Route::get('/category/{id}', 'FrontEndController@category')->name('category.post');

    // Repositori
    Route::get('/repositori', 'FrontEndController@repositori')->name('repositori');
    Route::get('/repositori/detail/{slug}', 'FrontEndController@repositori_detail')->name('repositori.detail');
    Route::get('/repositori/donwload/{id}', 'FrontEndController@downloadFile')->name('repositori.download');


    // Agenda
    Route::get('/agenda', 'FrontEndController@agenda')->name('agenda');
    Route::get('/agenda/{slug}', 'FrontEndController@detailagenda')->name('agenda.detail');
    Route::get('/agenda/cari/work', 'FrontEndController@agendacari')->name('agenda.cari.work');

    Route::get('/search', function () {
        $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();
        return view('frontend.layouts.result')->with('posts', $posts)->with('query', request('query'));
    });

    Route::get('/repositori/search', function () {
        $repositories = Repository::where('title', 'like', '%' . request('query') . '%')->get();
        return view('frontend.repositori.result')->with('repositories', $repositories)->with('query', request('query'));
    });
});