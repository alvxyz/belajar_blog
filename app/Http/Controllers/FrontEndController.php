<?php

namespace App\Http\Controllers;

use App\About;
use App\Accreditation;
use App\Achievement;
use App\Agenda;
use App\Calendar;
use App\Category;
use App\CategoryCreation;
use App\Competence;
use App\Creation;
use App\Facility;
use App\GraduateProfile;
use App\Guide;
use App\Lecturer;
use App\LessonPlan;
use App\Partner;
use App\Post;
use App\Profile;
use App\Publication;
use App\Repository;
use App\Slider;
use App\Structure;
use App\Subject;
use App\Testimonial;
use App\User;
use App\VisionAndMission;
use App\Visitor;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Hamcrest\Core\AllOf;
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
        $sliders = Slider::latest()->take(5)->get();
        $partners = Partner::all();
        $partner = Partner::latest()->take(4)->get();
        $posts = Post::latest()->take(9)->get();
        $agendas = Agenda::orderBy('date_start', 'desc')->take(3)->get();
        // $agendas = Agenda::where('date_start', '>=', Carbon::today())->orderBy('date_start', 'asc')->take(3)->get();

        // $agendas = Agenda::where('date_start', '>=', Carbon::today())->orderBy('date_start', 'asc')->take(3)->get();

        // dd($agendas);

        // if ($agendas->count() < 0) {
        //     $agendas = Agenda::where('date_start', '<', Carbon::today())->orderBy('date_start', 'desc')->take(3)->get();
        // } else {
        //     $agendas = Agenda::where('date_start', '>=', Carbon::today())->orderBy('date_start', 'asc')->take(3)->get();
        // }

        // $agendas = DB::table('agenda')
        //     ->where('date_start', '>=', Carbon::today())->orderBy('date_start', 'asc')
        //     ->orWhere(function ($query) {
        //         $query->where('date_start', '<', Carbon::today())->orderBy('date_start', 'asc');
        //     })
        //     ->take(3)->get();


        $testimonials = Testimonial::latest()->take(8)->get();
        $creations = Creation::latest()->take(9)->get();
        $about1 = About::take(1)->latest()->get();

        $now = Carbon::now();

        $days = Visitor::whereDate('created_at', Carbon::today())->get();

        $months = Visitor::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['date', 'created_at']);

        $years = Visitor::whereYear('created_at', date('Y'))
            ->get(['date', 'created_at']);

        $total = Visitor::all();

        // dd($years);

        return view('frontend.beranda.beranda', compact('sliders', 'posts', 'agendas', 'partners', 'testimonials', 'creations', 'days', 'months', 'years', 'total', 'about1', 'partner'));
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

    public function karya()
    {
        $categorycreations = CategoryCreation::all();
        $creations = Creation::latest()->paginate(6);
        return view('frontend.karya.index', compact('creations', 'categorycreations'));
    }

    public function detailkarya($slug)
    {
        //mencoba mengunjungi halaman beranda
        $creation = Creation::where('slug', $slug)->firstOrFail();
        return view('frontend.karya.detail', compact('creation'));
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
        $about1 = About::take(1)->latest()->get();
        // $about2 = VisionAndMission::all();
        return view('frontend.profil.tetangprogramstudi', compact('about1'));
    }

    public function struktur()
    {
        // mengarahkan view ke halaman 
        $structure = Structure::all();
        $structure1 = Structure::take(1)->latest()->get();
        $structure2 = DB::table('structures')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.profil.strukturorganisasi', compact('structure1', 'structure2', 'structure'));
    }

    public function kalender()
    {
        // mengarahkan view ke halaman 
        $calendar = Calendar::all();
        $calendar1 = Calendar::take(1)->latest()->get();
        $calendar2 = DB::table('calendars')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.kalender.index', compact('calendar1', 'calendar2', 'calendar'));
    }

    public function capaianpembelajaran()
    {
        // mengarahkan view ke halaman 
        $achievement = Achievement::all();
        $achievement1 = Achievement::take(1)->latest()->get();
        $achievement2 = DB::table('achievements')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.capaian.index', compact('achievement1', 'achievement2', 'achievement'));
    }

    public function panduan()
    {
        // mengarahkan view ke halaman 
        $guides = Guide::all();
        return view('frontend.panduan.index', compact('guides'));
    }

    public function matakuliah()
    {
        // mengarahkan view ke halaman 
        $subjects = Subject::all();
        return view('frontend.matakuliah.index', compact('subjects'));
    }

    public function profillulusan()
    {
        // mengarahkan view ke halaman
        $graduateprofile = GraduateProfile::all();
        $graduateprofile1 = GraduateProfile::take(1)->latest()->get();
        $graduateprofile2 = DB::table('graduate_profiles')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.profillulusan.index', compact('graduateprofile1', 'graduateprofile2', 'graduateprofile'));
    }

    public function kompetensi()
    {
        // mengarahkan view ke halaman 
        $competence = Competence::all();
        $competence1 = Competence::take(1)->latest()->get();
        $competence2 = DB::table('competence')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.kompetensi.index', compact('competence1', 'competence2', 'competence'));
    }

    public function visidanmisi()
    {
        // mengarahkan view ke halaman visi dan misi
        $visionandmission = VisionAndMission::all();
        $visionandmissions = VisionAndMission::take(1)->latest()->get();
        $visionandmission2 = DB::table('vision_and_mission')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.profil.visidanmisi', compact('visionandmissions', 'visionandmission2', 'vissionandmission'));
    }

    public function akreditasi()
    {
        // mengarahkan view ke halaman Akreditasi
        $accreditation = Accreditation::all();
        $accreditation1 = Accreditation::take(1)->latest()->get();
        $accreditation2 = DB::table('accreditations')->orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        return view('frontend.profil.akreditasi', compact('accreditation1', 'accreditation2', 'accreditation'));
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
            ->where('model_has_roles.role_id', '=', 3)->orderBy('name', 'asc')->paginate(10);

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

    public function rencanapembelajaran()
    {
        // mengarahkan view ke halaman
        $lessonplans = LessonPlan::latest()->paginate(6);
        return view('frontend.rencanapembelajaran.index', compact('lessonplans'));
    }

    public function rencanapembelajaran_detail($slug)
    {
        // mengarahkan view ke halaman
        $lessonplan = LessonPlan::where('slug', $slug)->firstOrFail();
        return view('frontend.rencanapembelajaran.detail', compact('lessonplan'));
    }

    public function downloadFileRPS($id)
    {
        $file_name = LessonPlan::find($id);
        $file = public_path($file_name->file);
        return response()->download($file);
    }

    public function downloadFileKalender($id)
    {
        $file_name = Calendar::find($id);
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