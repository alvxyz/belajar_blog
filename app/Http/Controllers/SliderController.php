<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'sub_title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $slider = new Slider();

        $slider->title = $request->title;
        $slider->slug = SlugService::createSlug(Slider::class, 'slug', $request->title);
        $slider->sub_title = $request->sub_title;
        $slider->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/slider';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1925, 820);
            $image_resize->save($destinationPath . '/' . $image_name, 30);
            $destinationPath = 'uploads/slider' . '/' . $image_name;
        }

        $slider->image = $destinationPath;
        $slider->save();

        toastr()->success('Slider berhasil ditambahkan !');
        return redirect()->route('slider.admin');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
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
            'sub_title' => 'required',
            'content' => 'required',
        ]);

        $slider = Slider::find($id);

        $slider->title = $request->title;
        // $slider->slug = Str::slug($request->title);
        $slider->slug = SlugService::createSlug(Slider::class, 'slug', $request->title);
        $slider->sub_title = $request->sub_title;
        $slider->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/slider';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1925, 820);
            $image_resize->save($destinationPath . '/' . $image_name, 30);
            $destinationPath = 'uploads/slider' . '/' . $image_name;
            $slider->image = $destinationPath;
        }

        $slider->save();

        toastr()->success('Slider berhasil diperbarui !');
        return redirect()->route('slider.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        toastr()->success('Slider berhasil dihapus !');
        return redirect()->route('slider.admin');
    }
}
