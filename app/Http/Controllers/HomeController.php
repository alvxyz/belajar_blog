<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Agenda;
use App\Slider;
use App\Profile;
use App\Visitor;
use App\Creation;
use Carbon\Carbon;
use App\Repository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $roles = Role::all();
        $agendas = Agenda::all();
        $repositories = Repository::all();
        $creations = Creation::all();
        $sliders = Slider::all();
        $visitors = Visitor::all();

        $days = Visitor::whereDate('created_at', Carbon::today())->get();

        $months = Visitor::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['date', 'created_at']);

        $years = Visitor::whereYear('created_at', date('Y'))
            ->get(['date', 'created_at']);

        return view('home', compact('posts', 'roles', 'agendas', 'repositories', 'creations', 'sliders', 'visitors', 'days', 'months', 'years'));
    }
}