<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Publication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = DB::table('publications')->where('lecturer_id', '=', Auth::user()->lecturer->id)->get();
        return view('admin.publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publication.create');
    }

    public function edit_from_dosen($id)
    {
        $publication = Publication::find($id);
        return view('admin.publication.edit', compact('publication'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_lecturer = Auth::user()->lecturer->id;

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->link1 = $request->link1;
        $publication->link2 = $request->link2;
        $publication->link3 = $request->link3;
        $publication->link4 = $request->link4;
        $publication->lecturer_id = $id_lecturer;
        $publication->save();


        // $publication = Publication::create([ // Publication dibuat saat user input data
        //     'lecturer_id' => $lecturer->id,
        // ]);

        toastr()->success('Publication has been saved succesfully!');
        return redirect()->route('publications');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $publication = Publication::find($id);

        $publication->title = $request->title;
        $publication->link1 = $request->link1;
        $publication->link2 = $request->link2;
        $publication->link3 = $request->link3;
        $publication->link4 = $request->link4;
        $publication->save();

        toastr()->success('Publication has been updated succesfully!');
        return redirect()->route('publications');
    }


    public function destroy($id)
    {
        // Menghapus data Tag
        $publication = Publication::find($id);
        $publication->delete();
        // toastr()->success('Tag has been deleted succesfully!');
        return redirect()->route('publications');
    }
}