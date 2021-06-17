<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::all();
        return view('admin.calendar.index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calendar.create');
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
            'image' => 'required',
            'file' => 'required'
        ]);

        $calendar = new Calendar();

        $calendar->period = $request->period;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/calendar';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/calendar' . '/' . $image_name;
        }

        $calendar->image = $destinationPath;

        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/calendar/', $file_name);

            $destinationPathFile = 'uploads/calendar/' . $file_name;
        }

        $calendar->file = $destinationPathFile;

        $calendar->save();

        toastr()->success('Kalender Akademik berhasil ditambahkan!');
        return redirect()->route('calendars');
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
        $calendar = Calendar::find($id);
        return view('admin.calendar.edit', compact('calendar'));
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

        $calendar = Calendar::find($id);

        $calendar->period = $request->period;

        if ($request->hasFile('image')) {
            if (file_exists($calendar->image)) {
                unlink($calendar->image);
            }
            $image = $request->image;
            $image_real_name = $image->getClientOriginalName();
            $image_name = time() . str_replace(' ', '',  $image_real_name);
            $image_name = str_replace('(', '',  $image_name);
            $image_name = str_replace(')', '',  $image_name);

            $destinationPath = 'uploads/calendar';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1600, 800);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/calendar' . '/' . $image_name;
            $calendar->image = $destinationPath;
        }


        if ($request->hasFile('file')) {
            if (file_exists($calendar->file)) {
                unlink($calendar->file);
            }
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/calendar/', $file_name);

            $destinationPathFile = 'uploads/calendar/' . $file_name;
            $calendar->file = $destinationPathFile;
        }


        $calendar->save();

        toastr()->success('Kalender Akademik berhasil diperbarui!');
        return redirect()->route('calendars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        $calendar->delete();

        toastr()->success('Kalender Akademik berhasil dihapus!');
        return redirect()->route('calendars');
    }
}