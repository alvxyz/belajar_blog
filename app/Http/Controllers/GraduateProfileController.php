<?php

namespace App\Http\Controllers;

use App\GraduateProfile;
use Illuminate\Http\Request;

class GraduateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduateprofiles = GraduateProfile::all();
        return view('admin.graduateprofile.index', compact('graduateprofiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.graduateprofile.create');
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
            'period' => 'required',
            'content' => 'required',
        ]);

        // Menyimpan data dari form
        $graduateprofile = new graduateprofile();
        $graduateprofile->period = $request->period;
        $graduateprofile->content = $request->content;
        $graduateprofile->save();

        toastr()->success('Profil Lulusan berhasil ditambahkan!');

        return redirect()->route('graduateprofiles');
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
    public function edit($id)
    {
        // Edit data kategori
        $graduateprofile = Graduateprofile::find($id);

        return view('admin.graduateprofile.edit')->with('graduateprofile', $graduateprofile);
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
        // Update Data Kategori
        $graduateprofile = Graduateprofile::find($id);

        $graduateprofile->period = $request->period;
        $graduateprofile->content = $request->content;
        $graduateprofile->save();

        toastr()->success('Profil Lulusan berhasil diperbarui!');
        return redirect()->route('graduateprofiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data kategori
        $graduateprofile = Graduateprofile::find($id);
        $graduateprofile->delete();
        toastr()->success('Profil Lulusan berhasil dihapus!');
        return redirect()->route('graduateprofiles');
    }
}