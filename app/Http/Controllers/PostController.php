<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->users_id = Auth::id();

        $image_path = "";

        if ($request->hasFile('featured')) {
            $image = $request->featured;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);

            $image_path = 'uploads/post/' . $image_name;
        }

        $post->featured = $image_path;
        $post->save();

        $post->tags()->attach($request->tags);

        toastr()->success('Berita berhasil ditambahkan !');
        return redirect()->route('posts');
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
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
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
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if ($request->hasFile('featured')) {
            if (file_exists($post->featured)) {
                unlink($post->featured);
            }

            $image = $request->featured;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('uploads/post/', $image_name);

            $post->featured = 'uploads/post/' . $image_name;
        }

        $post->save();

        $post->tags()->sync($request->tags);

        toastr()->success('Berita Berhasil diperbarui !');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if (file_exists($post->featured)) {
            unlink($post->featured);
        }
        $post->forceDelete();

        toastr()->success('Berita berhasil dihapus !');

        return redirect()->back();
    }

    public function trash($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        toastr()->success('Berita berhasil dipulihkan !');
        return redirect()->back();
    }
}