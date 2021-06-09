<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repositories = Repository::all();
        return view('admin.repository.index', compact('repositories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.repository.create');
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
            'file' => 'required'
        ]);

        $repository = new Repository();
        $repository->title = $request->title;

        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/file/', $file_name);

            $destinationPath = 'uploads/file/' . $file_name;
        }

        $repository->file = $destinationPath;

        $repository->save();
        toastr()->success('File berhasil ditambahkan !');
        return redirect()->route('repository');
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
        $repository = Repository::find($id);

        return view('admin.repository.edit', compact('repository'));
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

        $repository = Repository::find($id);

        $repository->title = $request->title;

        if ($request->hasFile('file')) {
            if (file_exists($repository->file)) {
                unlink($repository->file);
            }
            $file = $request->file;
            $file_name = time() . $file->getClientOriginalName();
            $file->move('uploads/file/', $file_name);

            $destinationPath = 'uploads/file/' . $file_name;
            $repository->file = $destinationPath;
        }


        $repository->save();
        toastr()->success('File berhasil diperbarui !');
        return redirect()->route('repository');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repository = Repository::find($id);
        $repository->delete();

        return redirect()->route('repository');
    }
}