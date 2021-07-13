<?php

namespace App\Http\Controllers;

use App\DetailContact;
use Illuminate\Http\Request;

class DetailContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailcontacts = DetailContact::all();
        return view('admin.detailcontact.index', compact('detailcontacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.detailcontact.create');
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
        $detailcontact = new detailcontact();
        $detailcontact->kolom = $request->kolom;
        $detailcontact->title = $request->title;
        $detailcontact->destination = $request->destination;
        $detailcontact->save();

        toastr()->success('Informasi Footer berhasil ditambahkan!');

        return redirect()->route('detailcontacts');
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
        $detailcontact = DetailContact::find($id);

        return view('admin.detailcontact.edit')->with('detailcontact', $detailcontact);
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
        $detailcontact = DetailContact::find($id);

        $detailcontact->kolom = $request->kolom;
        $detailcontact->title = $request->title;
        $detailcontact->destination = $request->destination;
        $detailcontact->save();

        toastr()->success('Informasi Footer berhasil diperbarui!');
        return redirect()->route('detailcontacts');
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
        $detailcontact = DetailContact::find($id);
        $detailcontact->delete();
        toastr()->success('Informasi Footer berhasil dihapus!');
        return redirect()->route('detailcontacts');
    }
}