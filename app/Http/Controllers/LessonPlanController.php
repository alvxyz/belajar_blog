<?php

namespace App\Http\Controllers;

use App\LessonPlan;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonplans = LessonPlan::all();
        return view('admin.lessonplan.index', compact('lessonplans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lessonplan.create');
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
            'curriculum' => 'required',
            'file' => 'required'
        ]);

        $lessonplan = new LessonPlan();
        $lessonplan->curriculum = $request->curriculum;
        $lessonplan->slug = SlugService::createSlug(LessonPlan::class, 'slug', $request->curriculum);

        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/file/', $file_name);

            $destinationPath = 'uploads/file/' . $file_name;
        }

        $lessonplan->file = $destinationPath;

        $lessonplan->save();
        toastr()->success('Rencana Pembelajaran berhasil ditambahkan!');
        return redirect()->route('lessonplans');
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
        $lessonplan = LessonPlan::find($id);

        return view('admin.lessonplan.edit', compact('lessonplan'));
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

        $lessonplan = LessonPlan::find($id);

        $lessonplan->curriculum = $request->curriculum;
        $lessonplan->slug = SlugService::createSlug(LessonPlan::class, 'slug', $request->curriculum);

        if ($request->hasFile('file')) {
            if (file_exists($lessonplan->file)) {
                unlink($lessonplan->file);
            }
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/file/', $file_name);

            $destinationPath = 'uploads/file/' . $file_name;
            $lessonplan->file = $destinationPath;
        }


        $lessonplan->save();
        toastr()->success('Rencana Pembelajaran berhasil diperbarui!');
        return redirect()->route('lessonplans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessonplan = LessonPlan::find($id);
        $lessonplan->delete();
        toastr()->success('Rencana Pembelajaran berhasil dihapus!');
        return redirect()->route('lessonplans');
    }
}