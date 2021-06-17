<?php

namespace App\Http\Controllers;

use App\Accreditation;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accreditations = Accreditation::all();
        return view('admin.accreditation.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.accreditation.create');
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
            'accreditation' => 'required'
        ]);

        // Menyimpan data dari form
        $accreditation = new Accreditation();
        $accreditation->period = $request->period;
        $accreditation->accreditation = $request->accreditation;
        $accreditation->save();

        toastr()->success('Akreditasi berhasil ditambahkan!');

        return redirect()->route('accreditations');
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
        $accreditation = Accreditation::find($id);

        return view('admin.accreditation.edit')->with('accreditation', $accreditation);
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
        $accreditation = Accreditation::find($id);

        $accreditation->period = $request->period;
        $accreditation->accreditation = $request->accreditation;
        $accreditation->save();

        toastr()->success('Akreditasi berhasil diperbarui!');
        return redirect()->route('accreditations');
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
        $accreditation = Accreditation::find($id);
        $accreditation->delete();
        toastr()->success('Akreditasi berhasil dihapus!');
        return redirect()->route('accreditations');
    }
}