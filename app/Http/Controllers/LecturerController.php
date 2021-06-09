<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('admin.lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Tag
        return view('admin.lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'biography' => 'required',
            'expertise' => 'required',
        ]);

        // Menyimpan data dari form
        $lecturer = new Lecturer();
        $lecturer->tag = $request->tag;
        $lecturer->save();

        toastr()->success('Lecturer has been created succesfully!');

        return redirect()->route('lecturers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Edit data Tag
        $lecturer = Lecturer::with('Profile')->find(Auth::id());
        return view('admin.lecturer.edit', compact('lecturer'));
    }


    public function edit_from_dosen()
    {
        // Edit data Tag
        $user = User::with('Lecturer')->find(Auth::id());
        return view('admin.lecturer.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update Data Tag
        $lecturer = User::find($id);

        $lecturer->biography = $request->biography;
        $lecturer->education1 = $request->education1;
        $lecturer->education2 = $request->education2;
        $lecturer->education3 = $request->education3;
        $lecturer->education4 = $request->education4;
        $lecturer->publication1 = $request->publication1;
        $lecturer->publication2 = $request->publication2;
        $lecturer->publication3 = $request->publication3;
        $lecturer->publication4 = $request->publication4;
        $lecturer->expertise = $request->biography;

        $lecturer->save();

        toastr()->success('Lecturer has been updated succesfully!');
        return redirect()->route('lecturers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data Tag
        $lecturer = Lecturer::find($id);
        $lecturer->delete();
        // toastr()->success('Lecturer has been deleted succesfully!');
        return redirect()->route('lecturers');
    }
}