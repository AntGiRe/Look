<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add([
            'username' => Str::slug($request->get('username')),
        ]);

        $request->validate([
            'username' => 'required|min:3|max:20|not_in:login,register,logout,edit,posts,image|unique:users,username,' . auth()->user()->id,
        ]);

        if ($request->image) {
            $image = $request->file('profileImg');

            $imageName = Str::uuid() . '.' . $image->extension();

            $imageServer = Image::make($image);
            $imageServer->fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $imageServer->save($imagePath);
        }

        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->profileImg = $imageName ?? '';
        $usuario->save();

        return redirect()->route('posts.index', ['user' => $usuario->username]);
    }
}
