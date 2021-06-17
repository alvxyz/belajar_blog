<?php

namespace App\Http\Controllers;

use App\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::all();
        return view('admin.achievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Direct ke halaman tambah data Kategori
        return view('admin.achievement.create');
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
        $achievement = new achievement();
        $achievement->period = $request->period;
        $achievement->content = $request->content;
        $achievement->save();

        toastr()->success('Capaian Pembelajaran berhasil ditambahkan!');

        return redirect()->route('achievements');
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
        $achievement = Achievement::find($id);

        return view('admin.achievement.edit')->with('achievement', $achievement);
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
        $achievement = Achievement::find($id);

        $achievement->period = $request->period;
        $achievement->content = $request->content;
        $achievement->save();

        toastr()->success('Capaian Pembelajaran berhasil diperbarui!');
        return redirect()->route('achievements');
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
        $achievement = Achievement::find($id);
        $achievement->delete();
        toastr()->success('Capaian Pembelajaran berhasil dihapus!');
        return redirect()->route('achievements');
    }
}