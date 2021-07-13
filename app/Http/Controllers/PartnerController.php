<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.parnter.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parnter.create');
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

        $partner = new Partner();

        $partner->name = $request->name;
        $partner->slug = SlugService::createSlug(Partner::class, 'slug', $request->name);
        $partner->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/partner';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/partner' . '/' . $image_name;
        }

        $partner->image = $destinationPath;
        $partner->save();

        toastr()->success('Partner berhasil ditambahkan !');
        return redirect()->route('partner.admin');
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
        $partner = Partner::find($id);
        return view('admin.parnter.edit', compact('partner'));
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

        $partner = Partner::find($id);

        $partner->name = $request->name;
        // $partner->slug = SlugService::createSlug(Partner::class, 'slug', $request->name);
        $partner->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($partner->image)) {
                unlink($partner->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/partner';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/partner' . '/' . $image_name;
            $partner->image = $destinationPath;
        }

        $partner->save();

        toastr()->success('Partner berhasil diperbarui !');
        return redirect()->route('partner.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        toastr()->success('Partner berhasil dihapus !');
        return redirect()->route('partner.admin');
    }
}