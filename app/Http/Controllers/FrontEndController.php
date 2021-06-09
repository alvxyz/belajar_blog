<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lecturer;
use App\Post;
use App\Profile;
use App\Publication;
use App\Repository;
use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function dosen()
    {
        $dosen = User::select(
            'users.id',
            'users.name',
            'users.email'
        )
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 3)->paginate(3);

        // dd($dosen);

        $profil = Profile::all();
        $lecturer = Lecturer::all();

        return view('frontend.dosen.index', compact('dosen', 'profil', 'lecturer'));
    }

    public function dosen_detail(Request $request, $id)
    {
        $dosen = User::find($id);

        $profil = Profile::all();
        $lecturer = Lecturer::where('id' . '=' . $request->id);

        // dd($lecturer);

        return view('frontend.dosen.detail', compact('dosen', 'profil', 'lecturer', 'publications'));
    }

    public function repositori()
    {
        // mengarahkan view ke halaman
        $repositories = Repository::latest()->paginate(6);
        return view('frontend.repositori.index', compact('repositories'));
    }

    public function repositori_detail($id)
    {
        // mengarahkan view ke halaman
        $repositories = Repository::find($id);
        return view('frontend.repositori.detail', compact('repositories'));
        return response()->file($repositories->file);
    }

    public function downloadFile($id)
    {
        $file_name = Repository::find($id);
        // return Storage::download(public_path('uploads/file/' . $file));
        $file = public_path($file_name->file);
        return response()->download($file);
    }
}