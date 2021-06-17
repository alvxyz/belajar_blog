<?php

namespace App\Http\Controllers;

use App\VisionAndMission;
use Illuminate\Http\Request;

class VisionAndMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visionandmissions = VisionAndMission::all();
        return view('admin.visionandmission.index', compact('visionandmissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.visionandmission.create');
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
            'vision' => 'required',
            'mission' => 'required'
        ]);

        // Menyimpan data dari form
        $visionandmission = new VisionAndMission();
        $visionandmission->period = $request->period;
        $visionandmission->vision = $request->vision;
        $visionandmission->mission = $request->mission;
        $visionandmission->save();

        toastr()->success('Visi dan Misi berhasil ditambahkan!');

        return redirect()->route('visionandmissions');
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
        $visionandmission = VisionAndMission::find($id);

        return view('admin.visionandmission.edit')->with('visionandmission', $visionandmission);
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
        $visionandmission = VisionAndMission::find($id);

        $visionandmission->period = $request->period;
        $visionandmission->vision = $request->vision;
        $visionandmission->mission = $request->mission;
        $visionandmission->save();

        toastr()->success('Visi dan Misi berhasil diperbarui!');
        return redirect()->route('visionandmissions');
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
        $visionandmission = VisionAndMission::find($id);
        $visionandmission->delete();
        toastr()->success('Visi dan Misi berhasil dihapus!');
        return redirect()->route('visionandmissions');
    }
}