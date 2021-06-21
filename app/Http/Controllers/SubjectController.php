<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.subject.create');
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
            'curriculum' => 'required',
            'subject' => 'required',
        ]);

        // Menyimpan data dari form
        $subject = new Subject();
        $subject->curriculum = $request->curriculum;
        $subject->subject = $request->subject;
        $subject->save();

        toastr()->success('Mata Kuliah berhasil ditambahkan!');

        return redirect()->route('subjects');
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
        $subject = Subject::find($id);

        return view('admin.subject.edit')->with('subject', $subject);
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
        $subject = Subject::find($id);

        $subject->curriculum = $request->curriculum;
        $subject->subject = $request->subject;
        $subject->save();

        toastr()->success('Mata Kuliah berhasil diperbarui!');
        return redirect()->route('subjects');
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
        $subject = Subject::find($id);
        $subject->delete();
        toastr()->success('Mata Kuliah berhasil dihapus!');
        return redirect()->route('subjects');
    }
}