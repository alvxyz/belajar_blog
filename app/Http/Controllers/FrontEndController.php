<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mencoba menampilkan testing di app
        return view('frontend.beranda.beranda');
    }

    public function beranda()
    {
        //mencoba mengunjungi halaman beranda
        return view('frontend.beranda.beranda');
    }

    public function tentangprogramstudi()
    {
        // mengarahkan view ke halaman tentang
        return view('frontend.profil.tetangprogramstudi');
    }

    public function visidanmisi()
    {
        // mengarahkan view ke halaman visi dan misi
        return view('frontend.profil.visidanmisi');
    }

    public function berita()
    {
        // mengarahkan view ke halaman visi dan misi
        $posts = Post::latest()->paginate(3);
        $post_recent = Post::take(5)->latest()->get();
        $category = Category::all();

        return view('frontend.berita.index', compact('posts', 'category', 'post_recent'));
    }

    public function detailberita($slug)
    {
        // mengarahkan view ke halaman visi dan misi
        $post = Post::where('slug', $slug)->first();

        // Aksi dimanipulasi kebalikannya, dikarenakan data yang tampil adalah data terbaru maka id pasti paling besar (akhir), sehingga fungsi ini sebenarnya prev
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $prev_post = Post::find($prev_id);

        // Aksi dimanipulasi kebalikannya, dikarenakan data yang tampil adalah data terbaru maka id pasti paling besar (akhir), sehingga fungsi ini sebenarnya prev
        $next_id = Post::where('id', '>', $post->id)->max('id');
        $next_post = Post::find($next_id);

        return view('frontend.berita.detail', compact('post', 'next_post', 'prev_post'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $posts = Post::where('category_id', request('id'))->orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.berita.category', compact('posts', 'category'));
    }
}