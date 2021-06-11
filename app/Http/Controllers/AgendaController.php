<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();
        return view('admin.agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create');
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
            'place' => 'required',
            'date' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $agenda = new Agenda();
        $agenda->title = $request->title;
        $agenda->slug = SlugService::createSlug(Agenda::class, 'slug', $request->title);
        $agenda->place = $request->place;
        $agenda->date = $request->date;
        $agenda->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();

            $destinationPath = 'uploads/agenda';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/agenda' . '/' . $image_name;
        }

        $agenda->image = $destinationPath;
        $agenda->save();

        toastr()->success('Agenda berhasil ditambahkan !');
        return redirect()->route('agenda.admin');
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
        $agenda = Agenda::find($id);
        return view('admin.agenda.edit', compact('agenda'));
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
            'place' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        $agenda = Agenda::find($id);

        $agenda->title = $request->title;
        $agenda->slug = SlugService::createSlug(Agenda::class, 'slug', $request->title);
        $agenda->place = $request->place;
        $agenda->date = $request->date;
        $agenda->content = $request->content;

        if ($request->hasFile('image')) {
            if (file_exists($agenda->image)) {
                unlink($agenda->image);
            }
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();

            $destinationPath = 'uploads/agenda';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1240, 699);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/agenda' . '/' . $image_name;
            $agenda->image = $destinationPath;
        }

        $agenda->save();

        toastr()->success('Agenda berhasil diperbarui !');
        return redirect()->route('agenda.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        toastr()->success('Agenda berhasil dihapus !');
        return redirect()->route('agenda.admin');
    }
}