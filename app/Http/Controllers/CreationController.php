<?php

namespace App\Http\Controllers;

use App\CategoryCreation;
use App\Creation;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creations = Creation::all();
        return view('admin.creation.index', compact('creations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_creations = CategoryCreation::all();
        return view('admin.creation.create', compact('category_creations'));
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
            'creator' => 'required',
            'position' => 'required',
            'content' => 'required',
            'image' => 'required',
            'video' => 'required',
            'category_creation_id' => 'required'
        ]);

        // dd($request);

        $creation = new Creation();

        $creation->title = $request->title;
        $creation->slug = SlugService::createSlug(Creation::class, 'slug', $request->title);
        $creation->creator = $request->creator;
        $creation->position = $request->position;
        $creation->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/creation';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/creation' . '/' . $image_name;
        }

        $creation->image = $destinationPath;
        $creation->video = $request->video;
        $creation->category_creation_id = $request->category_creation_id;

        $creation->save();

        toastr()->success('Karya berhasil ditambahkan !');
        return redirect()->route('creation.admin');
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
        $creation = Creation::find($id);
        $category_creations = CategoryCreation::all();
        return view('admin.creation.edit', compact('creation', 'category_creations'));
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
            'title' => 'required',
            'creator' => 'required',
            'position' => 'required',
            'content' => 'required',
            'video' => 'required',
            'category_creation_id' => 'required'
        ]);

        // dd($request);

        $creation = Creation::find($id);

        $creation->title = $request->title;
        $creation->slug = SlugService::createSlug(Creation::class, 'slug', $request->title);
        $creation->creator = $request->creator;
        $creation->position = $request->position;
        $creation->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($creation->image)) {
                unlink($creation->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/creation';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/creation' . '/' . $image_name;
            $creation->image = $destinationPath;
        }

        $creation->video = $request->video;
        $creation->category_creation_id = $request->category_creation_id;

        $creation->save();

        toastr()->success('Karya berhasil diperbarui!');
        return redirect()->route('creation.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creation = Creation::find($id);
        $creation->delete();

        toastr()->success('Karya berhasil dihapus !');
        return redirect()->route('creation.admin');
    }
}