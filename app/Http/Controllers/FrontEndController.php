<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Category;
use App\Facility;
use App\Lecturer;
use App\Partner;
use App\Post;
use App\Profile;
use App\Publication;
use App\Repository;
use App\Slider;
use App\User;
use Carbon\Carbon;
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
        $sliders = Slider::all();
        $partners = Partner::all();
        $posts = Post::all();
        $agendas = Agenda::orderBy('date', 'asc')->take(3)->get();
        return view('frontend.beranda.beranda', compact('sliders', 'posts', 'agendas', 'partners'));
    }

    public function detailslider($slug)
    {
        //mencoba mengunjungi halaman beranda
        $sliders = Slider::where('slug', $slug)->firstOrFail();
        return view('frontend.slider.detail', compact('sliders'));
    }

    public function partner()
    {
        $partners = Partner::latest()->paginate(6);
        return view('frontend.partner.index', compact('partners'));
    }

    public function detailpartner($slug)
    {
        $partner = Partner::where('slug', $slug)->firstOrFail();
        return view('frontend.partner.detail', compact('partner'));
    }


    public function fasilitas()
    {
        $facilities = Facility::latest()->paginate(6);
        return view('frontend.fasilitas.index', compact('facilities'));
    }

    public function detailfasilitas($slug)
    {
        $facility = Facility::where('slug', $slug)->firstOrFail();
        return view('frontend.fasilitas.detail', compact('facility'));
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

        // $profil = Profile::all();
        $lecturer = Lecturer::where('id' . '=' . $request->id);

        $publication = Publication::select(
            'publications.id',
            'publications.title',
            'publications.link1',
            'publications.link2',
            'publications.link3',
            'publications.link4'
        )
            ->join('lecturers', 'publications.lecturer_id', '=', 'lecturers.id')
            ->where('lecturers.id', '=', $dosen->lecturer['id'])->get();

        return view('frontend.dosen.detail', compact('dosen', 'profil', 'lecturer', 'publication'));
    }

    public function repositori()
    {
        // mengarahkan view ke halaman
        $repositories = Repository::latest()->paginate(6);
        return view('frontend.repositori.index', compact('repositories'));
    }

    public function repositori_detail($slug)
    {
        // mengarahkan view ke halaman
        $repositories = Repository::where('slug', $slug)->firstOrFail();
        // return response()->file($repositories->file);
        return view('frontend.repositori.detail', compact('repositories'));
    }

    public function downloadFile($id)
    {
        $file_name = Repository::find($id);
        // return Storage::download(public_path('uploads/file/' . $file));
        $file = public_path($file_name->file);
        return response()->download($file);
    }

    public function agenda()
    {
        $agendas = Agenda::latest()->paginate(6);
        return view('frontend.agenda.index', compact('agendas'));
    }

    public function detailagenda($slug)
    {
        // mengarahkan view ke halaman visi dan misi
        $agenda = Agenda::where('slug', $slug)->first();
        // Aksi dimanipulasi kebalikannya, dikarenakan data yang tampil adalah data terbaru maka id pasti paling besar (akhir), sehingga fungsi ini sebenarnya prev
        $prev_id = Agenda::where('id', '<', $agenda->id)->max('id');
        $prev_post = Agenda::find($prev_id);

        // Aksi dimanipulasi kebalikannya, dikarenakan data yang tampil adalah data terbaru maka id pasti paling besar (akhir), sehingga fungsi ini sebenarnya prev
        $next_id = Agenda::where('id', '>', $agenda->id)->max('id');
        $next_post = Agenda::find($next_id);

        return view('frontend.agenda.detail', compact('agenda', 'next_post', 'prev_post'));
    }

    public function agendacari(Request $request)
    {
        // dd($request);
        $data = $request->data;
        $agendas = Agenda::where('title', 'like', '%' . $data . '%')->get();

        return view('frontend.agenda.result', compact('agendas', 'data'));
    }
}