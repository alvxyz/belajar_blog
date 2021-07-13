<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'position' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $testimonial = new testimonial();

        $testimonial->name = $request->name;
        $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->name);
        $testimonial->position = $request->position;
        $testimonial->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/testimonial';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(84, 84);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/testimonial' . '/' . $image_name;
        }

        $testimonial->image = $destinationPath;
        $testimonial->save();

        toastr()->success('Testimoni berhasil ditambahkan !');
        return redirect()->route('testimonial.admin');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
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

        $testimonial = Testimonial::find($id);

        $testimonial->name = $request->name;
        $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->name);
        $testimonial->position = $request->position;
        $testimonial->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($testimonial->image)) {
                unlink($testimonial->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/testimonial';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(84, 84);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/testimonial' . '/' . $image_name;
            $testimonial->image = $destinationPath;
        }

        $testimonial->save();

        toastr()->success('Testimoni berhasil diperbarui !');
        return redirect()->route('testimonial.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        toastr()->success('Testimoni berhasil dihapus !');
        return redirect()->route('testimonial.admin');
    }
}