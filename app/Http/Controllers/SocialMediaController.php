<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialmedias = SocialMedia::all();
        return view('admin.socialmedia.index', compact('socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.socialmedia.create');
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
            'kolom' => 'required',
            'title' => 'required',
            'destination' => 'required',
        ]);

        // Menyimpan data dari form
        $socialmedia = new SocialMedia();
        $socialmedia->kolom = $request->kolom;
        $socialmedia->title = $request->title;
        $socialmedia->destination = $request->destination;
        $socialmedia->save();

        toastr()->success('Social Media berhasil ditambahkan!');

        return redirect()->route('socialmedias');
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
        $socialmedia = SocialMedia::find($id);

        return view('admin.socialmedia.edit')->with('socialmedia', $socialmedia);
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
        $socialmedia = SocialMedia::find($id);

        $socialmedia->kolom = $request->kolom;
        $socialmedia->title = $request->title;
        $socialmedia->destination = $request->destination;
        $socialmedia->save();

        toastr()->success('Social Media berhasil diperbarui!');
        return redirect()->route('socialmedias');
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
        $socialmedia = SocialMedia::find($id);
        $socialmedia->delete();
        toastr()->success('Social Media berhasil dihapus!');
        return redirect()->route('socialmedias');
    }
}