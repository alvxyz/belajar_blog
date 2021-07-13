<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilitys = Facility::all();
        return view('admin.facility.index', compact('facilitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
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
            'name' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $facility = new Facility();

        $facility->name = $request->name;
        $facility->slug = SlugService::createSlug(Facility::class, 'slug', $request->name);
        $facility->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/facility';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/facility' . '/' . $image_name;
        }

        $facility->image = $destinationPath;
        $facility->save();

        toastr()->success('Fasilitas berhasil ditambahkan !');
        return redirect()->route('facility.admin');
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
        $facility = Facility::find($id);
        return view('admin.facility.edit', compact('facility'));
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
            'name' => 'required',
            'content' => 'required'
        ]);

        $facility = Facility::find($id);

        $facility->name = $request->name;
        // $facility->slug = SlugService::createSlug(Facility::class, 'slug', $request->name);
        $facility->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($facility->image)) {
                unlink($facility->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/facility';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/facility' . '/' . $image_name;
            $facility->image = $destinationPath;
        }

        $facility->save();

        toastr()->success('Fasilitas berhasil diperbarui !');
        return redirect()->route('facility.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->delete();

        toastr()->success('Fasilitas berhasil dihapus !');
        return redirect()->route('facility.admin');
    }
}