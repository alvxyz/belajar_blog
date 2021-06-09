<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\Profile;
use App\Publication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
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
            'name' => 'required|min:5',
            'email' => 'required|email',
            'roles' => 'required'
        ]);

        // Menyimpan data dari form
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->email)
        ]);

        $user->assignRole($request->input('roles'));

        if ($request->roles[0] == 3) {
            $lecturer = Lecturer::create([
                'users_id' => $user->id,
            ]);
        }

        $profile = Profile::create([
            'users_id' => $user->id,
        ]);

        toastr()->success('User has been created succesfully!');

        return redirect()->route('users');
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
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
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

        $user = User::find($id);

        if ($request->input('password')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        $user->save();

        toastr()->success('Akun berhasil diperbarui!');

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        // toastr()->success('Akun berhasil dihapus!');
        return redirect()->route('users');
    }

    public function profile()
    {
        $user = User::with('Profile')->find(Auth::id());
        return view('admin.profile.index', compact('user'));
    }


    public function update_profile(Request $request, $id)
    {
        // dd($request);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->input('password')) {
            $user->password = bcrypt($request->password);
        }

        $about = $request->about;

        if ($request->hasFile('avatar')) {
            if (file_exists($user->profile->avatar)) {
                unlink($user->profile->avatar);
            }
            $image = $request->avatar;
            $image_name = time() . $image->getClientOriginalName();

            $destinationPath = 'uploads/thumbnail';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->fit(1000);
            $image_resize->save($destinationPath . '/' . $image_name);
            $destinationPath = 'uploads/thumbnail' . '/' . $image_name;

            $user->profile()->update([
                'about' => $about,
                'avatar' => $destinationPath,
            ]);
        }

        $user->profile()->update([
            'about' => $about,
        ]);

        // $user->profile()->associate($users_id);
        // $user->profile()->attach($avatar);
        // $user->profile()->attach($about);

        // $user->profile()->attach(['avatar' => $avatar], ['about' => $about]);


        $user->save();

        toastr()->success('Profile berhasil diperbarui!');

        return redirect()->route('profile');
    }

    public function edit_from_dosen()
    {
        // Edit data Tag
        $user = User::with('Lecturer')->find(Auth::id());
        return view('admin.lecturer.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_dosen_detail(Request $request, $id)
    {
        // Update Data Tag
        $user = User::find($id);

        $biography = $request->biography;
        $education = $request->education;
        $research = $request->research;
        $expertise = $request->expertise;

        $user->lecturer()->update([
            'biography' => $biography,
            'education' => $education,
            'research' => $research,
            'expertise' => $expertise,
        ]);

        // $publication = Publication::create([ // Publication dibuat saat user input data
        //     'lecturer_id' => $user->id,
        // ]);

        $user->save();

        toastr()->success('Lecturer has been updated succesfully!');
        return redirect()->route('lecturer.edit_from_dosen');
    }
}