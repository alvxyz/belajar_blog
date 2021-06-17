<?php

namespace App\Http\Controllers;

use App\Structure;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structure::all();
        return view('admin.structure.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.structure.create');
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
            'image' => 'required'
        ]);

        $structure = new Structure();

        $structure->period = $request->period;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/structure';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/structure' . '/' . $image_name;
        }

        $structure->image = $destinationPath;
        $structure->save();

        toastr()->success('Struktur Organisasi ditambahkan !');
        return redirect()->route('structures');
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
        $structure = Structure::find($id);
        return view('admin.structure.edit', compact('structure'));
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

        $this->validate($request, [
            'period' => 'required',
        ]);

        $structure = Structure::find($id);

        $structure->period = $request->period;

        if ($request->hasFile('image')) {
            if (file_exists($structure->image)) {
                unlink($structure->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/structure';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/structure' . '/' . $image_name;
            $structure->image = $destinationPath;
        }

        $structure->save();

        toastr()->success('Struktur Organisasi diperbarui !');
        return redirect()->route('structures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $structure = Structure::find($id);
        $structure->delete();

        toastr()->success('Struktur Organisasi dihapus !');
        return redirect()->route('structures');
    }
}