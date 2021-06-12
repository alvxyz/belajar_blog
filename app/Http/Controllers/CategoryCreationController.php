<?php

namespace App\Http\Controllers;

use App\CategoryCreation;
use Illuminate\Http\Request;

class CategoryCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriycreations = CategoryCreation::all();
        return view('admin.categorycreation.index')->with('categorycreations', $categoriycreations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.categorycreation.create');
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
            'name' => 'required'
        ]);

        // Menyimpan data dari form
        $categorycreation = new CategoryCreation();
        $categorycreation->name = $request->name;
        $categorycreation->save();

        toastr()->success('Kategori berhasil disimpan!');

        return redirect()->route('categorycreation.admin');
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
        $categorycreation = CategoryCreation::find($id);

        return view('admin.categorycreation.edit')->with('categorycreation', $categorycreation);
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
        $categorycreation = CategoryCreation::find($id);

        $categorycreation->name = $request->name;
        $categorycreation->save();

        toastr()->success('Kategori berhasil diperbarui!');
        return redirect()->route('categorycreation.admin');
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
        $categorycreation = CategoryCreation::find($id);
        $categorycreation->delete();
        toastr()->success('Kategori berhasil dihapus!');
        return redirect()->route('categorycreation.admin');
    }
}