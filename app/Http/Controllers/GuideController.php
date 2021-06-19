<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::all();
        return view('admin.guide.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.guide.create');
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
            'title' => 'required',
            'content' => 'required',
        ]);

        // Menyimpan data dari form
        $guide = new guide();
        $guide->title = $request->title;
        $guide->content = $request->content;
        $guide->save();

        toastr()->success('Panduan berhasil ditambahkan!');

        return redirect()->route('guides');
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
        $guide = Guide::find($id);

        return view('admin.guide.edit')->with('guide', $guide);
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
        $guide = Guide::find($id);

        $guide->title = $request->title;
        $guide->content = $request->content;
        $guide->save();

        toastr()->success('Panduan berhasil diperbarui!');
        return redirect()->route('guides');
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
        $guide = Guide::find($id);
        $guide->delete();
        toastr()->success('Panduan berhasil dihapus!');
        return redirect()->route('guides');
    }
}