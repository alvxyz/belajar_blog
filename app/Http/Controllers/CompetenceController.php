<?php

namespace App\Http\Controllers;

use App\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competences = Competence::all();
        return view('admin.competence.index', compact('competences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.competence.create');
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
        $competence = new Competence();
        $competence->period = $request->period;
        $competence->content = $request->content;
        $competence->save();

        toastr()->success('Kompetensi Lulusan berhasil ditambahkan!');

        return redirect()->route('competences');
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
        $competence = Competence::find($id);

        return view('admin.competence.edit')->with('competence', $competence);
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
        $competence = Competence::find($id);

        $competence->period = $request->period;
        $competence->content = $request->content;
        $competence->save();

        toastr()->success('Kompetensi Lulusan berhasil diperbarui!');
        return redirect()->route('competences');
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
        $competence = Competence::find($id);
        $competence->delete();
        toastr()->success('Kompetensi Lulusan berhasil dihapus!');
        return redirect()->route('competences');
    }
}